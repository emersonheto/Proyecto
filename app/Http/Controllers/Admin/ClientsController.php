<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\User;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth'); 
        $this->middleware(['role:Admin']);      
    }

    public function index()
    {
        return view('admin.clients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $contactos=json_decode($request->get('jsonContacto'));
            $emailPrincipal=$contactos[0]->correo;
    
            //tabla => formulario 
            $usuario = new User([
                'name'=>$request->get('razonsocial'), 
                'email'=>$emailPrincipal,
                'password'=> bcrypt($request->get('ruc'))
            ]); 
            $usuario->save();
            $usuario->roles()->sync(2); //cliente por defecto
    
            // CREANDO EL CLIENTE
            $cliente=new Client();
            $cliente->ruc=$request->get('ruc');
            $cliente->razonsocial=$request->get('razonsocial');
            $cliente->bandera=$request->get('bandera');
            $cliente->direccion=$request->get('direccion');
            $cliente->grupo=$request->get('grupo');
            $cliente->contactos=$request->get('jsonContacto');
            // $cliente->activo=$request->get('email');
            $cliente->user_id=$usuario->id;
            $cliente->save();
        }
        catch(\Exception $e)
        {
            Log::error('Error save client/user:: ' . $e->getMessage());
            // return redirect()->route('clients.index')->withErrors( $e->getMessage() );
            return back()->withInput()->withErrors( $e->getMessage() );
            // ->withInput();
        }

        return redirect()->route('clients.index')->with('info',['success','Se ha creado el Cliente']);  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getData()
    {
      return datatables()
        ->eloquent(Client::query()->where('activo',1))
        ->addColumn('emailPrincipal',function($client){
            $contactos=json_decode($client->contactos);
            $emailPrincipal=$contactos[0]->correo;
            return $emailPrincipal; 
        })
        ->addColumn('btnOperaciones',function($client){ 
            $btn="";   
            $RUTA=route('client.PonerInactivo',$client->id);
            
            $btnDetalle="<a  class='btn btn-sm btn-outline-success mr-3 mostrar-detalle' data-id='$client->id' >
            <i class='fas fa-eye'></i> </a>";
            
            $btnEditar="<a  class='btn btn-sm btn-outline-primary ml-0' href='".route('clients.edit',$client->id)."'>
            <i class='fas fa-edit'></i> </a>";

            $btn="<form class='formEliminar' action=$RUTA method='POST'>
                    <div class='row justify-content-md-center'>
                        $btnDetalle   
                        $btnEditar   
                        <button  class='btn btn-outline-danger btn_eliminar btn-sm ml-3' >
                            <i class='fas fa-trash'></i></button>
                        </div>
                    </div>
                </form>";

            return $btn;
        })
        ->rawColumns(['btnOperaciones','emailPrincipal'])
        ->toJson();
    }

    public function show($id)
    {
        $client = Client::find($id);
        return response()->json($client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        $contactos = json_decode($client->contactos);
        return view('admin.clients.edit', compact('client', 'contactos'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try 
        {
            $contactos=json_decode($request->get('jsonContacto'));
            $emailPrincipal=$contactos[0]->correo;

            $client = Client::findOrFail($id);  
            $user = User::findOrFail($client->user_id);  

            $currentPass = $user->password;

            if( trim($request->get('password'),' ') != '' )
            {
                $currentPass = bcrypt(trim($request->get('password')));
            }

            $client->ruc=$request->get('ruc');
            $client->razonsocial=$request->get('razonsocial');
            $client->bandera=$request->get('bandera');
            $client->direccion=$request->get('direccion');
            $client->grupo=$request->get('grupo');
            $client->contactos=$request->get('jsonContacto');
            $client->save();

            $user->name = $client->razonsocial;
            $user->email = $emailPrincipal;
            $user->password = $currentPass;
            $user->save();
        }
        catch(\Exception $e)
        {
            DB::rollback();
            Log::error('Error update client/user: ' . $e->getMessage());
            // return redirect()->route('clients.index')->withErrors( $e->getMessage() );
            return back()->withErrors( $e->getMessage() );
            // ->withInput();
        }

        DB::commit();
        return redirect()->route('clients.index')->with('info',['success','Se ha actualizado el Cliente']); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //en vez de eliminar
    public function PonerInactivo($id)
    {
        $client = Client::findOrFail($id);  
        $client->activo = 0;
        $client->save();
        return back()->with('info',['success','Cliente Actualizado a activo = 0']);
    }
}

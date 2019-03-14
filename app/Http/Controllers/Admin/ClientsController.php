<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        return redirect('admin.clients.index')->with('info',['success','Se ha creado el Cliente']);  
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
        ->eloquent(Client::query())
        ->addColumn('emailPrincipal',function($client){ 
            $contactos=json_decode($client->contactos);
            $emailPrincipal=$contactos[0]->correo;
            return $emailPrincipal; 

        })
        ->addColumn('btnOperaciones',function($client){ 
            $btn="";   
            //  $RUTA=route('client.destroy',$client->id);        
            $RUTA="#";
            
            $btnDetalle="<a  class='btn btn-sm btn-outline-success  mr-3   mostrar-detalle  ' data-id='$client->id' >
            <i class='fas fa-eye'></i> </a>";
            
            $btnEditar="<a  class='btn btn-sm btn-outline-primary  ml-0'  href='#'>
            <i class='fas fa-edit'></i> </a>";
           
            // if(Auth::user()->hasRole('Admin'))
            // { 
                $btn="<form class='formEliminar' action=$RUTA method='DELETE'>
                    <div class='row justify-content-md-center'>
                       $btnDetalle   
                       $btnEditar   
                       <button  class='btn btn-outline-danger  btn_eliminar  btn-sm ml-3' >
                        <i class='fas fa-trash'></i> </button>
                       </div>
                    </div>
                </form>";
            // }
            return $btn;
        })
        ->rawColumns(['btnOperaciones','emailPrincipal'])  
        ->toJson();
    }



    public function show($id)
    {
        $client=Client::find($id);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

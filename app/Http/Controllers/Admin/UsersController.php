<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:Admin']);
    }
    
    public function index()
    {
        $users=User::join("user_has_roles","users.id","=","user_has_roles.user_id")->get();
        // ->where("role_id","!=","2")->get();// distinto de 2 ya que 2 es cliente 
        return view('admin.users.index',compact('users'));
    }

    public function create()
    {
        $roles=Role::all();
        return view('admin.users.create', compact('roles')); 
    }
    
    public function store(Request $request)
    {
        $user=new User();
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->password=bcrypt($request->get('password'));
        $user->save();
        //$user= User::create(request(['name','email','password','image']));
        $user->roles()->sync($request->get('roles'));
        return back()->with('info',['success','Se ha creado el usuario']);
    }
    
    public function show($id)
    {
        $user=User::find($id);
        //$permissions=$user->permissions()->get();
        return view('admin.users.show',compact('user'));
    }

    public function edit($id)
    {
        $user=User::find($id);
        $roles=Role::get();
        return view('admin.users.edit',compact('roles','user'));
    }

    public function update(Request $request, $id)
    {
        $user=User::find($id);
        $user->update($request->except('roles'));
        $user->roles()->sync($request->get('roles'));        
        return redirect()->route('user.index')->with('info',['success','Se han actualizado los datos del usuario']);
    }

    public function destroy($id)
    {
        $user=User::find($id)->delete();
        return back()->with('info',['success','Se ha eliminado el usuario']);
    }
}

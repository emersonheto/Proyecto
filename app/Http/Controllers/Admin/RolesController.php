<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:Admin']);
    }

    public function index()
    {
        $roles=Role::all();        
       return view('admin.roles.index',compact('roles'));
    }

    public function create()
    {
        $permissions=Permission::all();
        return view('admin.roles.create',compact('permissions'));        
    }
   
    public function store(Request $request)
    {
        $role=Role::create($request->except('permissions'));
        $role->permissions()->sync($request->get('permissions'));

        return back()->with('info',['success','Se ha creado el rol']);
    }

    
    public function show($id)
    {
        $role=Role::find($id);
        $permissions=$role->permissions()->get();
        return view('admin.roles.show',compact('role','permissions'));
    }
   
    public function edit($id)
    {
        $role=Role::find($id);
        $permissions=Permission::get();
        return view('admin.roles.edit',compact('role','permissions'));
    }

    public function update(Request $request, $id)
    {
        $role=Role::find($id);
        $role->update($request->except('permissions'));
        $role->permissions()->sync($request->get('permissions'));        
        return back()->with('info',['success','Se ha actualizado el rol']);
    }

   
    public function destroy($id)
    {
        $role=Role::find($id)->delete();
        return back()->with('info',['warning','Se ha eliminado el rol']);

    }
}

@extends('admin.layouts.app')
@section('page','Detalles del rol')
    
@section('content')

    <div class="form-row">
      <div class="col-sm-6 mb-3">
        <label for="RoleName">Nombre del Rol </label>
          <input type="text" name="name" class='form-control is-valid' id='RoleName' value="{{$role->name }}"  disabled >
        
      </div>
    <div class="col-sm-6 mb-3">
      <label for="" class="ml-3">Permisos que tiene el rol </label>  
        <div class="form-group">
          <ul class='nav navbar-nav list-inline'>
            <div class="col-auto my-1 row">
                @forelse ($permissions as $permission)
                  <div class="col-sm-6">
                    <li><i class="fas fa-unlock-alt "></i> {{ $permission->description }} </li>
                  </div>
                @empty
                    <li> <i class="fas fa-lock"></i> El rol no tiene ningun permiso </li>                   
                @endforelse   
            </div>
          </ul>
        </div>
    </div>  
  </div>
  <a class='btn btn-outline-success' href=" {{ route('role.index') }} "><i class="fas fa-arrow-circle-left "></i>  Volver</a>
    {{-- <button type="submit" class="btn btn-primary"><i class='fas fa-plus-circle'></i>   Actualizar</button> --}}

@endsection


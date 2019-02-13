@extends('admin.layouts.app')
@section('page','Editar rol')
    
@section('content')
<form  action="{{route('role.update',$role->id) }}" method="POST" class="was-validated">
  @csrf 
  {{-- <input type="hidden" name="_method" value="PATCH"> --}} 
  @method('PATCH')
    <div class="form-row">
      <div class="col-sm-6 mb-3">
        <label for="RoleName">Nombre del Rol </label>
          <input type="text" name="name" class='form-control is-valid' id='RoleName' value="{{$role->name }}"  required >
          <div class="invalid-feedback">¡Debes de agregar un nombre!</div>
      </div>
    <div class="col-sm-6 mb-3">
      <label for="" class="ml-3">Ten cuidado con los permisos que otorgas </label>  
        <div class="form-group">
          <ul>
            <div class="col-auto my-1">
              <div class="custom-control custom-checkbox mr-sm-2">
                @foreach ($permissions as $permission)
                    <li>
                      <input type="checkbox" name="permissions[]" class='custom-control-input' id="{{$permission->id}}" value="{{$permission->id}}"
                      @if ($role->permissions->contains($permission)) checked
                          
                      @endif
                      >
                      <label for="{{$permission->id}}" class="custom-control-label"> {{ $permission->description }}</label>
                    </li>
                @endforeach
              </div>
            </div>
          </ul>
        </div>
    </div>  
  </div>
    <button type="submit" class="btn btn-primary"><i class='fas fa-plus-circle'></i>   Actualizar</button>
</form>
@endsection


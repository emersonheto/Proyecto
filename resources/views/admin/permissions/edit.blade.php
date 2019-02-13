@extends('admin.layouts.app')
@section('page','Editar permiso')
    
@section('content')
<form  action="{{route('permission.update',$permission->id) }}" method="POST" class="was-validated">
  @csrf 
  {{-- <input type="hidden" name="_method" value="PATCH"> --}} 
  @method('PATCH')
    <div class="form-row">
      <div class="col-sm-6 mb-3">
          <label for="RoleName">Nombre del permiso (Ej: role.create) </label>
          <input type="text" name="name" class='form-control is-valid' id='RoleName' value="{{$permission->name }}"  required >
          <div class="invalid-feedback">¡Debes de agregar un nombre!</div>
      </div>

      <div class="col-sm-6 mb-3">
          <label for="RoleName">Nombre del Rol </label>
            <input type="text" name="description" class='form-control is-valid' id='RoleName' value="{{$permission->description }}"  required >
            <div class="invalid-feedback">¡La descripción no puede estar en blanco!</div>
        </div>
   
  </div>
    <button type="submit" class="btn btn-outline-success"><i class='fas fa-plus-circle'></i>   Actualizar</button>
</form>
@endsection


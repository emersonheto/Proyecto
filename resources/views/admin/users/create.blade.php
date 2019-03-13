@extends('admin.layouts.app')
@section('page','Crear un nuevo Usuario')
    
@section('content')
<form  action="{{route('user.store') }}" method="POST" class="was-validated">
  @csrf 
  <input type="hidden" name="_method" value="PATCH">
    <div class="form-row">

      <div class="col-sm-6 mb-3">
        <label for="UserName">Nombre del usuario </label>
          <input type="text" name="name" class='form-control is-valid' id='UserName' placeholder="Nombre del usuario"  required >
          <div class="invalid-feedback">¡Debes de agregar un nombre!</div>
      </div>

      <div class="col-sm-6 mb-3">
          <label for="UserEmail">Correo electronico </label>
            <input type="email" name="email" class='form-control is-valid' id='UserEmail' placeholder="ejemplo@gmail.com"  required >
            <div class="invalid-feedback">¡Debes de agregar un correo electronico!</div>
      </div>
      
      <div class="col-sm-6 mb-3">
          <label for="UserPassword">Contraseña del usuario </label>
            <input type="password" name="password" class='form-control is-valid' id='UserPassword'  required >
            <div class="invalid-feedback">¡Debes de agregar un correo!</div>
      </div>

      <div class="col-sm-6 mb-3">
          <label for="UserImage">Imagen (por defecto)</label>
            <input type="image" name="image" class='form-control' id='UserImage' value="user.svg" disabled>            
      </div>


    <div class="col-sm-6 mb-3">
      <label for="" class="ml-3">Ten cuidado con los roles que otorgas </label>  
        <div class="form-group">
          <ul>
            <div class="col-auto my-1">
              <div class="custom-control custom-checkbox mr-sm-2">
                @foreach ($roles as $role)
                    <li>
                      <input type="checkbox" name="roles[]" class='custom-control-input' id="{{$role->id}}" value="{{$role->id}}">
                      <label for="{{$role->id}}" class="custom-control-label"> {{ $role->name }}</label>
                    </li>
                @endforeach
              </div>
            </div>
          </ul>
        </div>
    </div>  
  </div>
    <button type="submit" class="btn btn-outline-success"><i class='fas fa-plus-circle'></i>   Agregar</button>
</form>
@endsection


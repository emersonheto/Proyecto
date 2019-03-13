@extends('admin.layouts.app')
@section('page','Editar datos del Usuario')
    
@section('content')
<form  action="{{route('user.update',$user->id) }}" method="POST" class="was-validated">
  @csrf 
  {{-- <input type="hidden" name="_method" value="PATCH"> --}} 
  @method('PATCH')
    <div class="form-row">
      <div class="col-sm-6 mb-3">
        <label for="RoleName">Nombre del usuario </label>
          <input type="text" name="name" class='form-control is-valid' id='UserName' value="{{$user->name }}"  required >
          <div class="invalid-feedback">¡No puedes dejar al usuario sin nombre!</div>
      </div>

      <div class="col-sm-6 mb-3">
          <label for="RoleName">Email del usuario </label>
            <input type="text" name="email" class='form-control is-valid' id='UserEmail' value="{{$user->email }}"  required >
            <div class="invalid-feedback">¡No puedes dejar al usuario sin email!</div>
      </div>

    <div class="col-sm-6 mb-3">
      <label for="" class="ml-3">Ten cuidado con los permisos que otorgas </label>  
        <div class="form-group">
          <ul>
            <div class="col-auto my-1">
              <div class="custom-control custom-checkbox mr-sm-2">
                @foreach ($roles as $role)
                    <li>
                      <input type="checkbox" name="roles[]" class='custom-control-input' id="{{$role->id}}" value="{{$role->id}}"
                      @if ($user->roles->contains($role)) checked                          
                      @endif
                      >
                      <label for="{{$role->id}}" class="custom-control-label"> {{ $role->name }}</label>
                    </li>
                @endforeach
              </div>
            </div>
          </ul>
        </div>
    </div>  
  </div>
    <button type="submit" class="btn btn-outline-success"><i class='fas fa-plus-circle'></i>   Actualizar</button>
</form>
@endsection


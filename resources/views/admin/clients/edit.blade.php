@extends('admin.layouts.app')
@section('page','Editar cliente')

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1 bg-white card">
        <form id="Form_cliente" action="{{route('clients.update',$client->id)}}" method="POST" class="was-validated m-5" autocomplete="off">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            <div class="form-row ">

                <div class="form-group col-md-6">
                    <label for="ClientName">Ruc</label>
                    <input type="text" name="ruc" class='form-control is-valid' value="{{$client->ruc}}" id='ClientName'
                        placeholder="Ruc del cliente" required>
                    <div class="invalid-feedback">¡Debes de agregar un Ruc!</div>
                </div>

                <div class="form-group col-md-6">
                    <label for="ClientName">Razon social </label>
                    <input type="text" name="razonsocial" class='form-control is-valid' value="{{ $client->razonsocial}}"
                        id='ClientName' placeholder="Razon Social" required>
                    <div class="invalid-feedback">¡Debes de agregar una Razon Social!</div>
                </div>

                <div class="form-group col-md-4">
                    <label for="ClientBandera">Bandera </label>
                    <select class="custom-select" name="bandera" id="Clientbandera">
                        <option value="Primax" <?= $client->bandera=='Primax'?'selected':'' ?>>Primax</option>  
                        <option value="Repsol" <?= $client->bandera=='Repsol'?'selected':'' ?>>Repsol</option>  
                        <option value="Pecsa" <?= $client->bandera=='Pecsa'?'selected':'' ?>>Pecsa</option> 
                    </select>
                </div>

                <div class="form-group col-md-4 mb-3">
                    <label for="ClientDireccion">Direccion </label>
                    <input type="text" name="direccion" class='form-control is-valid' value="{{ $client->direccion}}"
                        id='ClientDireccion' placeholder="Direccion  AV. " required>
                    <div class="invalid-feedback">¡Debes de agregar una direccion!</div>
                </div>

                <div class="form-group col-md-4 mb-3">
                    <label for="ClientGrupo">Grupo </label>
                    <select class="custom-select" name="grupo" id="ClientGrupo">
                        <option value="Grupo San ignacio" <?= $client->grupo=='Grupo San ignacio'?'selected':'' ?>>Grupo San ignacio</option>  
                        <option value="Gazel" <?= $client->grupo=='Gazel'?'selected':'' ?>>Gazel</option>  
                        <option value="Irasa" <?= $client->grupo=='Irasa'?'selected':'' ?>>Irasa</option>    
                    </select>
                </div>

                <div class="form-group col-md-6 mb-3">
                    <label>Contraseña </label>
                    <input type="text" name="password" class='form-control' placeholder="Cambiar contraseña">
                </div>

                <div class="form-group col-md-6 mb-3 hidden">
                    <label for="ClientDireccion">Direccion </label>
                    <input type="text" name="direccion" class='form-control is-valid' value="{{ $client->direccion}}"
                        id='ClientDireccion' placeholder="Direccion  AV. " required>
                    <div class="invalid-feedback">¡Debes de agregar una direccion!</div>
                </div>   
            </div>
            {{-- AGREGANDO CONTACTO AL CLIENTE  --}}
            <fieldset class="col-md-12" style="                 
                        border: 1px solid #ddd !important;
                        margin: 0;
                        xmin-width: 0;
                        padding: 10px;       
                        position: relative;
                        border-radius:4px;
                        background-color:#f5f5f5;
                        padding-left:10px!important;">
                <legend style="                        
                            font-size:14px;
                            font-weight:bold;
                            margin-bottom: 0px; 
                            width: 35%; 
                            border: 1px solid #ddd;
                            border-radius: 4px; 
                            padding: 5px 5px 5px 10px; 
                            background-color: #ffffff;
                            ">Lista de contactos de la estación</legend>

                <div class="panel panel-default">
                    <div class="card-body">
                        <div class=" col  text-center  mb-3">
                            <button class="btn btn-outline-info " type="button" href="#" id="btn_add"><i
                                class="fas fa-plus-circle  fa-1x"></i> AGREGAR CONTACTOS </button>
                        </div>
                        <div class="inner" id="data_contacto">
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label for="ClientNombre">Nombre</label>
                                </div>
                                <div class="col-md-3">
                                    <label for="ClientCargo">Cargo</label>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="ClientCorreo">Correo</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="ClientTelefono">Telefono</label>
                                </div>
                                <div class="col-md-1 mt-4 mb-1">
                                </div>
                            </div>
                            @foreach ($contactos as $contacto)
                                <div class="form-row row_contact">
                                    <div class="col-md-3 mb-3">
                                        <input type="text" class='form-control is-valid _nombre' value="{{ $contacto->cargo }}" required>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="custom-select _cargo">
                                            <option value="administrador" <?php if( $contacto->cargo == 'administrador' )echo'selected' ?> >Administrador</option>
                                            <option value="gerente" <?php if( $contacto->cargo == 'gerente' )echo'selected' ?> >Gerente</option>
                                            <option value="tecnico" <?php if( $contacto->cargo == 'tecnico' )echo'selected' ?> >Tecnico</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <input type="mail" class='form-control is-valid _correo' value="{{ $contacto->correo }}" required>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="text" class='form-control is-valid _telefono' value="{{ $contacto->telefono }}" required>
                                    </div>
                                    <div class="col-md-1 mb-1">
                                        <button class="btn btn-outline-danger quitar_fill" type="button" href="#"><i class="fas fa-trash fa-1x"></i></button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="col text-center mt-4">
                <input type="hidden" id="jsonContacto" name="jsonContacto">
                <button type="submit" id="btnUpdate" class="btn btn-outline-success"><i class='fas fa-plus-circle'></i>
                Actualizar</button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $("#btnUpdate").click(function (e) {

        var input = $('#jsonContacto');
        var contactos = $('.row_contact');
        var list = [];

        for (let index = 0; index < contactos.length; index++) {
            const contacto = $(contactos[index]);
            var nombre = contacto.find("._nombre").val();
            var cargo = contacto.find("._cargo").val();
            var correo = contacto.find("._correo").val();
            var telefono = contacto.find("._telefono").val();

            if (correo.trim() == "") {
                Swal.fire(
                    'Advertencia!',
                    'Algunos campos estan vacios.',
                    'warning'
                )
                return false;
            }
            list.push({ nombre, cargo, correo, telefono });
        }

        if( list.length == 0 ){
            Swal.fire(
                'Error!',
                'Debe ingresar al menos un contacto.',
                'error'
            )
            return false;
        }
        input.val(JSON.stringify(list));
        return true;
    });

    $(document).ready(function () {

        $("#btn_add").click(function () {
            //  var contador = $("input[type='text']").length;
            var fila = `
                <div class="form-row row_contact">
                    <div class="form-group col-md-3 mb-3">                     
                        <input type="text"  class="form-control is-valid _nombre" placeholder=" Nombre" required >                  
                    </div>   
                    <div class=" col-md-3">
                        <select class=" custom-select _cargo"   id="Clientbandera" >
                            <option value="administrador">Administrador</option>  
                            <option value="gerente">Gerente</option>  
                            <option value="tecnico">Tecnico</option>                  
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">                  
                        <input type="mail"  class='form-control is-valid _correo' id='ClientDireccion' placeholder="example@gmail.com "  required >                
                    </div>            
                    <div class="form-group col-md-2 mb-3">                 
                        <input type="text"   class="form-control is-valid _telefono" id="ClientDireccion" placeholder="999999999"  required >                 
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-outline-danger delete-fill quitar_fill" type="button" href="#"><i class="fas fa-trash  fa-1x"></i> </button> 
                    </div>    
                </div>
            `;
            $('.inner').append(fila);
        });

        $("#data_contacto").on("click", ".quitar_fill", function (e) {
            $(e.currentTarget).parents(".row_contact").remove();
            // $(this).parent().remove();
        });
    });
</script>

@endsection








































{{-- @extends('admin.layouts.app')
@section('page','Editar datos del Usuario')
    
@section('content')
<form  action="{{route('user.update',$user->id) }}" method="POST" class="was-validated">
@csrf

@method('PATCH')
<div class="form-row">
   <div class="col-sm-6 mb-3">
      <label for="RoleName">Nombre del usuario </label>
      <input type="text" name="name" class='form-control is-valid' id='UserName' value="{{$user->name }}" required>
      <div class="invalid-feedback">¡No puedes dejar al usuario sin nombre!</div>
   </div>

   <div class="col-sm-6 mb-3">
      <label for="RoleName">Email del usuario </label>
      <input type="text" name="email" class='form-control is-valid' id='UserEmail' value="{{$user->email }}" required>
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
                     <input type="checkbox" name="roles[]" class='custom-control-input' id="{{$role->id}}"
                        value="{{$role->id}}" @if ($user->roles->contains($role)) checked
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
<button type="submit" class="btn btn-outline-success"><i class='fas fa-plus-circle'></i> Actualizar</button>
</form>
@endsection
--}}
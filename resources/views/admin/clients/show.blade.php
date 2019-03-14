@extends('admin.layouts.app')
@section('page','Detalles del Cliente')

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1 bg-white card shadow-sm ">

        <div class="form-row  m-5  font-weight-bold  " style="font-size:1.6rem">
            <div class="form-group col-md-5">
                <label for="ClientRuc">Ruc  :</label>
                <label class="" id='ClientRuc'> {{ $client->ruc }}</label>
            </div>
            {{-- REVISA
            https://es.stackoverflow.com/questions/187507/problema-para-validar-un-registro-ya-insertado-en-mi-bd-con-ajax-laravel-5-2
            --}}

            <div class="form-group col-md-5">
                <label for="ClientRS">Razon social : </label>
                <label class='form-control-sm ' id='ClientRS'>{{ $client->razonsocial }} </label>
            </div>

            <div class="form-group col-md-5">
                <label for="ClientBandera">Bandera : </label>
                <label class='form-control-sm ' id='ClientBandera'>{{ $client->bandera }} </label>
                {{-- <div class="invalid-feedback">¡Debes seleccionar una bandera!</div> --}}
            </div>
            <div class="form-group col-md-5 mb-3">
                <label for="ClientDireccion">Direccion : </label>
                <label value="  " name="direccion" class='form-control-sm'>{{ $client->direccion }}</label>
            </div>

            <div class="form-group col-md-10 mb-3">
                <label for="ClientGrupo">Grupo : </label>
                <label class='form-control-sm ' id='ClientGrupo'>{{ $client->grupo }} </label>
            </div>
        </div>
        {{-- AGREGANDO CONTACTO AL CLIENTE --}}
        <fieldset class="col-md-12" style="                   
                      border: 1px solid #ddd !important;
                      margin: 0;
                      xmin-width: 0;
                      padding: 10px;       
                      position: relative;
                      border-radius:4px;
                      background-color:#f5f5f5;
                      padding-left:10px!important;                  	
                   ">
            <legend style="                        
                            font-size:14px;
                            font-weight:bold;
                            margin-bottom: 0px; 
                            width: 35%; 
                            border: 1px solid #ddd;
                            border-radius: 4px; 
                            padding: 5px 5px 5px 10px; 
                            background-color: #ffffff;
                         ">Lista
                de contactos de la estación</legend>

            <div class="panel panel-default">
                <div class="card-body">
                    <div class=" col  text-center  mb-3">
                        <button class="btn btn-outline-info " type="button" href="#" id="btn_add"><i class="fas fa-plus-circle  fa-1x"></i>
                            AGREGAR CONTACTOS </button>
                    </div>
                    <div class="inner" id="data_contacto">
                        <div class="form-row row_contact">
                            <div class=" col-md-3 mb-3">
                                <label for="ClientNombre">Nombre </label>
                                <label class='form-control is-valid _nombre' id='ClientNombre' placeholder="Nombre "
                                    required>
                            </div>
                            <div class=" col-md-3">
                                <label for="ClientCargo">Cargo </label>
                                <select class=" custom-select _cargo" id="ClientCargo">
                                    <option value="administrador">Administrador</option>
                                    <option value="gerente">Gerente</option>
                                    <option value="tecnico">Tecnico</option>
                                </select>
                            </div>
                            <div class=" col-md-3 mb-3">
                                <label for="ClientCorreo">Correo </label>
                                <input type="mail" class='form-control is-valid _correo' id='ClientCorreo' placeholder="example@gmail.com "
                                    required>
                            </div>
                            <div class=" col-md-2 mb-3">
                                <label for="ClientTelefono">Telefono </label>
                                <label class='form-control is-valid _telefono' id='ClientTelefono' placeholder="999999999 "
                                    required>
                            </div>
                            <div class=" col-md-1 mt-4 mb-1">
                                <button class="btn btn-outline-info  quitar_fill " type="button" href="#"><i class="fas fa-trash  fa-1x"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <div class="col text-center mt-4">
            <input type="hidden" id="jsonContacto" name="jsonContacto">
            <button type="submit" id="btnGuardar" class="btn btn-outline-success "><i class='fas fa-plus-circle'></i>
                REGISTRAR</button>
        </div>

    </div>
</div>





@endsection

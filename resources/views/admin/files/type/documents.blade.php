@extends('admin.layouts.app')

@section('combo')
<label for="">Selec. Estación</label>
<Select class="custom-select col-md-5" id="select-client">
    <option disabled selected value="nul">Selecciona</option>
    @foreach($clients as $client)
    <option value="{{ $client->razonsocial }}|{{ $client->id }}">{{ $client->razonsocial }}</option>
    @endforeach
</Select>
@endsection

@section('page','Documentos')

@section('content')

{{--  estilos del click derecho  --}}
<style>
    
ul.contextMenu{
  list-style:none; 
  border-radius: 20px;
  margin:0;padding:0;
  font: 300 15px 'Roboto', sans-serif;
  position: absolute;
  color: #333;
  box-shadow: 0 5px 15px 0 rgba(0, 0, 0, 0.5);
  z-index: 999;
}

ul.contextMenu *{
    transition:color .4s, background .4s;
}

ul.contextMenu li{
  min-width:150px;
  overflow: hidden;
  white-space: nowrap;
  padding: 12px 15px;
  background-color: #fff;
  border-bottom:1px solid #ecf0f1;
}

ul.contextMenu li a{
  color:#333;
  text-decoration:none;
}

ul.contextMenu li:hover{
  background-color: #ecf0f1;
}

ul.contextMenu li:first-child{
  border-radius: 5px 5px 0 0;
}

ul.contextMenu li:last-child{
  border-bottom:0;
  border-radius: 0 0 5px 5px
}

ul.contextMenu li:last-child a{width:26%;}
ul.contextMenu li:last-child:hover a{color:#2c3e50}
ul.contextMenu li:hover a:hover{color:#2980b9}
</style>
{{-- Click derecho --}}
    <ul class="contextMenu" style="display: none;">
        <li><a href="#"><i class="fa fa-eye text-success"></i> Ver</a></li>
        <li><a href="#"><i class="fa fa-download text-primary"></i> Descargar</a></li>
        <li><a href="#"><i class="fa fa-trash text-danger"></i> Eiminar</a></li>
      </ul>
{{-- //Click derecho --}}

<div class="container">
    <div class="row">
        <div class="col-md-12  ">
            <h1 id="estac_selected">NOMBRE ESTACION SELECCIONADA</h1>
            <div class="nav-container" style="position:relative;">
                {{-- Ruta de carpetas que se deben mostrar --}}
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#"><b>GESTION AMBIENTAL</b></a>
                    </li>
                    <li class="breadcrumb-item active">Informe de Monitoreo</li>
                </ol>
                {{-- Ruta de carpetas que se deben mostrar --}}
            </div>

            {{-- Estilos de vista de carpetas y archivos --}}
            <style>
                .item {
                    display: flex;
                    flex-direction: row;
                    align-items: center;
                    justify-content: space-between;
                    flex-wrap: wrap;
                    border-bottom: none;
                    padding: 1rem 2.4rem;
                    transition: all 0.2s;
                }

                .item:last-child {
                    /* border-bottom: solid 1px #2196F3; */
                }

                .item:hover {
                    cursor: pointer;
                    background: #E0E0E0;
                }

                .item .right {
                    display: flex;
                    flex-direction: column;
                    padding: 0 1rem;
                }

                .item span[class*="fa-"] {
                    font-size: 2.7rem;
                    text-align: center;
                    color: #2196F3;
                }

                .item span .des {
                    /* padding: 0.5rem 0; */
                }

                .item .comment {
                    max-width: 40vw;
                }

                .item span .title {
                    font-size: 1.3rem;
                }

                @media (max-width: 400px) {
                    .item span[class*="ion-"] {
                        font-size: 1.4rem;
                    }
                }

                .grid-container {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                }

                .grid-item {
                    background-color: rgba(255, 255, 255, 0.8);
                    text-align: center;
                }

                .grid-container-folder {
                    display: grid;
                    grid-template-columns: auto auto;
                }

                .grid-item-folder {
                    align-self: center;
                    padding: 2px;
                    text-align: left;
                    font-size: 13px;
                }

            </style>
            {{-- //Estilos de vista de carpetas y archivos --}}

        {{-- FOLDERES --}}
            <main>
                <div class="grid-container">
                    <div class="grid-item">
                        <div class="item">
                            <div class="grid-container-folder">
                                <div class="grid-item-folder">
                                    <span class="fa fa-folder-o"></span>
                                </div>
                                <div class="grid-item-folder">
                                    <b class="des title">Informe de Monitoreo</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="item">
                            <div class="grid-container-folder">
                                <div class="grid-item-folder">
                                    <span class="fa fa-folder-o"></span>
                                </div>
                                <div class="grid-item-folder">
                                    <b class="des title">Informe Ambiental Anual</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="item">
                            <div class="grid-container-folder">
                                <div class="grid-item-folder">
                                    <span class="fa fa-folder-o"></span>
                                </div>
                                <div class="grid-item-folder">
                                    <b class="des title">Declaración de RRSS</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="item">
                            <div class="grid-container-folder">
                                <div class="grid-item-folder">
                                    <span class="fa fa-folder-o"></span>
                                </div>
                                <div class="grid-item-folder">
                                    <b class="des title">Manifiestos de manejo de RRSS</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="item">
                            <div class="grid-container-folder">
                                <div class="grid-item-folder">
                                    <span class="fa fa-folder-o"></span>
                                </div>
                                <div class="grid-item-folder">
                                    <b class="des title">Registro de generación de RRSS</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="item">
                            <div class="grid-container-folder">
                                <div class="grid-item-folder">
                                    <span class="fa fa-folder-o"></span>
                                </div>
                                <div class="grid-item-folder">
                                    <b class="des title">Registro de Incidentes de Fugas y Derrames</b>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid-item">
                        <div class="item file">
                            <div class="grid-container-folder">
                                <div class="grid-item-folder">
                                    <span class="fa fa-file-pdf-o" style="color:red;"></span>
                                </div>
                                <div class="grid-item-folder">
                                    <b class="des title">Nombre de archivo</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="item file">
                            <div class="grid-container-folder">
                                <div class="grid-item-folder">
                                    <span class="fa fa-file-excel-o" style="color:green;"></span>
                                </div>
                                <div class="grid-item-folder">
                                    <b class="des title">Nombre de archivo</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="item file">
                            <div class="grid-container-folder">
                                <div class="grid-item-folder">
                                    <span class="fa fa-file-word-o"></span>
                                </div>
                                <div class="grid-item-folder">
                                    <b class="des title">Nombre de archivo</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="item file">
                            <div class="grid-container-folder">
                                <div class="grid-item-folder">
                                    <span class="fa fa-file-image-o" style="color:#005680"></span>
                                </div>
                                <div class="grid-item-folder">
                                    <b class="des title">Nombre de archivo</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
{{-- //FOLDERES --}}

            <div class="card-body">
                <form action=" {{ route('file.store') }}" class="dropzone" id='dropzone' method="POST"
                    enctype="multipart/form-data" class="form-control">
                    @csrf
                    <input type="hidden" id="input_estacion" name="input_estacion" value="0">
                    <table class="table table-hover table-bordered table-striped " id="datatable-documentos"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th width="5">Id</th>
                                <th>Nombre</th>
                                <th>Tipo de archivo</th>
                                <th> </th>
                            </tr>
                        </thead>
                        @csrf
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function () {

        $("#select-client").change((e) => {
            let $this = $(e.currentTarget)
            let value = $this.val()

            let estacion = value.split('|')[0]
            let id = value.split('|')[1]
            $("#estac_selected").text(estacion)
            $("#estac_selected").attr('estacion', id)
            $("#input_estacion").val(id)
        })

        var dtable = $('#datatable-documentos').DataTable({
            'language': {
                'sProcessing': " <img   src='{{ asset('img/process.gif') }}'>",
                'sLengthMenu': 'Mostrar _MENU_ archivos',
                'sZeroRecords': 'No se encontraron resultados',
                'sEmptyTable': '<i class="fa fa-upload" style="text-align:cente; font-size: 10rem;"></i><br>Click para subir archivos',
                'sInfo': 'Mostrando registros del _START_ al _END_ de un total de _TOTAL_',
                'sInfoEmpty': 'Mostrando registros del 0 al 0 de un total de 0 registros',
                'sInfoFiltered': '(filtrado de un total de _MAX_ registros)',
                'sInfoPostFix': '',
                'sSearch': 'Buscar:',
                // 'sUrl': '',
                'sInfoThousands': ',',
                'sLoadingRecords': 'Cargando...',
                'oPaginate': {
                    'sFirst': 'Primero',
                    'sLast': 'Último',
                    'sNext': 'Siguiente',
                    'sPrevious': 'Anterior'
                },
                'oAria': {
                    'sSortAscending': ': Activar para ordenar la columna de manera ascendente',
                    'sSortDescending': ': Activar para ordenar la columna de manera descendente'
                }
            },

            "processing": true,
            "autoWidth": false, //para ordenar automaticamente los tr
            "serverSide": true,
            "ajax": {
                "url": "{{route('file.gettabla')}}",
            },
            "columns": [{
                    data: 'id'
                },
                {
                    data: 'name'
                },
                {
                    data: 'type'
                },
                {
                    data: 'btnOperaciones'
                }
            ],
            'columnDefs': [{
                    'targets': 0,
                    'className': 'text-center'
                }

            ]
        });
        /* 
            // var btn = $(e.currentTarget)
            // console.log(btn); 
            // return;
            // var file_id = btn.data('file-id');
            // var file_name= btn.data('file-name');          
            // var token= $('input[name="_token"]').val(); 
            // var data=new FormData();
            // data.append('_token',token);           
            var tokensito=$('meta[name="csrf-token"]').attr('content'); //aqui tengo el tocken
            //var urll=form.attr('action');
            //console.log(id);
            //return;  
         return
         */
        $('#datatable-documentos').on("click", ".alertaa", function (e) {
            var btn1 = $(this),
                form = btn1.parents('.formEliminar'),
                url = form.attr('action'),
                id = url.split('/').pop();
            e.preventDefault();

            Swal.fire({
                title: 'Estas seguro?',
                text: "No podrás revertir esto.!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, borralo!'
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: form.attr('action'),
                        data: {
                            _method: 'DELETE',
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST'
                    }).done(function (r) {
                        dtable.ajax.reload(
                            function (json) {
                                Swal.fire(
                                    'Borrado!',
                                    'Su archivo ha sido eliminado.',
                                    'success'
                                )
                            }, false);
                    }).fail(function (xhr) {
                        console.log(xhr);
                        Swal.fire(
                            'Ocurrio un error!',
                            'Su archivo no ha sido eliminado.',
                            'error'
                        )
                    });
                }
            })
        });


        //  SCRIPT PARA SUBIR ARCHIVOS
        $(document).ready(function () {

            const opts = {
                dictDefaultMessage: " ",
                maxFilesize: 2500,
                // acceptedFiles: ".jpg",
                init: function () {
                    this.on("complete", file => {
                        var removeButton = Dropzone.createElement(
                            `<button class="btn btn-xs btn-primary">Remove file</button>`
                            );

                        // Capture the Dropzone instance as closure.
                        var _this = this;

                        // Listen to the click event
                        // removeButton.addEventListener("click", function(e) {
                        // Make sure the button click doesn't submit the form:
                        // e.preventDefault();
                        // e.stopPropagation();

                        // Remove the file preview.
                        // _this.removeFile(file);
                        // If you want to the delete the file on the server as well,
                        // you can do the AJAX request here.
                        // });
                        // Add the button to the file preview element.
                        // file.previewElement.appendChild(removeButton);

                        if (file.status == "success") {
                            _this.removeFile(file);

                            dtable.ajax.reload(
                                function (json) {
                                    Swal.fire(
                                        'Agregado!',
                                        'Se ha subido el archivo.',
                                        'success'
                                    )
                                }, false);
                        }
                    });

                    this.on('sending', function (file) {
                        if ($("#input_estacion").val() == "0") {
                            Swal.fire(
                                'Advertencia!',
                                'Seleccionar una estación antes de subir un archivo.',
                                'warning'
                            )
                            this.removeFile(file);
                        }
                    });

                    this.on('error', function (file, response) {
                        // console.log(file.previewElement, response)

                        if (response == "Upload canceled.") return

                        var spanError = Dropzone.createElement(
                            `<span class="alert alert-danger">${file.name}</span>`);

                        file.previewElement.appendChild(spanError);
                        // $(file.previewElement).find('.dz-error-message').text(response.exception);
                        $(file.previewElement).find('.dz-error-message').text(response);
                        file.previewElement.classList.add("dz-error");

                        dtable.ajax.reload(
                            function () {
                                Swal.fire(
                                    'error!',
                                    'No Se ha subido el archivo.',
                                    'error'
                                )
                            }, false
                        );
                    })
                },
            }

            var myDropzone = new Dropzone("#dropzone", opts);

        });

        // FIN SCRIPT PARA SUBIR ARCHIVOS
    });

    // clic derecho js
        $(document).bind("contextmenu", function(event) {
            event.preventDefault();
            $("ul.contextMenu")
                .show()
                .css({top: event.pageY + 15, left: event.pageX + 10});
        });
        $(document).click(function() {
            isHovered = $("ul.contextMenu").is(":hover");
            if (isHovered == false){
            $("ul.contextMenu").fadeOut("fast");
            }
        });
     // click derecho js

</script>
@endsection

@extends('admin.layouts.app')
@section('page','Lista de Clientes')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10  offset-md-1 bg-white   ">
            <div class="card-header">
                <H2>LISTA DE CLIENTES</H2>
            </div>
            <div class="col-md-10 mb-5">
                <a class="btn btn-outline-success" href=" {{ route('clients.create') }} "><i class="fas fa-plus-circle"></i>
                    Agregar un Cliente</a>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped" id="datatable-clientes" style="width:100%">
                    <thead>
                        <tr>
                            <th width="5">Ruc</th>
                            <th>Razon social</th>
                            <th>Direccion</th>
                            <th>Correo</th>
                            <th>Grupo</th>
                            <th width=""> </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script type="text/javascript">
    //MODAL VER DETALLES DEL CLIENTE   
    $("#datatable-clientes").on("click", ".mostrar-detalle", function (e) {
        var id = $(this).data("id");

        $.ajax({
            url: `clients/${id}`,
            data: {
                _method: 'GET',
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            success: function (data) {
                // console.log(data);
                var contactos = JSON.parse(data.contactos);
                var filas = "";
                for (let index = 0; index < contactos.length; index++) {
                    const contacto = contactos[index];
                    filas +=
                    `
                        <tr>
                            <td>${contacto.nombre}</td>
                            <td>${contacto.correo}</td>
                            <td>${contacto.cargo}</td>
                            <td>${contacto.telefono}</td>                         
                        </tr> 
                    `
                }
                var html =
                `
                    <div class="row" style="font-size:1rem">
                        <div class=" col-md-4">
                            <label class="float-left font-weight-bold"> RUC :</label> <br>
                            <label class="float-left font-weight-normal">20137926${data.ruc}</label>
                        </div>

                        <div class=" col-md-8">
                            <label class='float-left font-weight-bold'>Razon social : </label> <br>
                            <label class='float-left font-weight-normal' style="text-align:left !important;">${data.razonsocial}</label>
                        </div>

                        <div class="col-md-12">
                            <label class='float-left font-weight-bold'>Direccion : </label> <br>
                            <label class='float-left font-weight-normal' style="text-align:left !important;" name="direccion">${data.direccion}</label>
                        </div>

                        <div class=" col-md-6">
                            <label class='float-left font-weight-bold'>Bandera : </label> <br><br>
                            <label class='float-left font-weight-normal' style="text-align:left !important;">${data.bandera}</label>
                        </div>
                        
                        <div class="col-md-6 ">
                            <label class='float-left font-weight-bold' for="ClientGrupo">Grupo : </label> <br><br>
                            <label class='float-left font-weight-normal' style="text-align:left !important;">${data.grupo}</label>
                        </div>

                        <div class="col-md-12 table-responsive table-sm">
                            <table class="table">
                                <thead>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Cargo</th>
                                <th>Telefono</th>
                                </thead>
                                <tbody>
                                ${filas}
                                </tbody>
                            </table>
                        </div>
                    </div>
                `;
                Swal.fire({
                    title: '<strong>  <u>Datos del Cliente</u> </strong>',
                    type: ' ',
                    html: html,
                    showCloseButton: false,
                    showCancelButton: false,
                    focusConfirm: false,
                })
            }
        })
        return;
    });

    // FIN  MODAL VER DETALLES DEL  CLIENTE
    $(document).ready(function () {
        //MOSTRAR DATATABLE
        var dtable = $('#datatable-clientes').DataTable({
            'language': {
                'sProcessing': " <img   src='{{ asset('img/process.gif') }}'>",

                'sLengthMenu': 'Mostrar _MENU_ archivos',
                'sZeroRecords': 'No se encontraron resultados',
                'sEmptyTable': 'Ningún dato disponible en esta tabla',
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
            "serverSide": true,
            "ajax": {
                "url": "{{route('client.gettabla')}}",
            },
            "columns": [{
                    data: 'ruc'
                },
                {
                    data: 'razonsocial'
                },
                {
                    data: 'direccion'
                },
                {
                    data: 'emailPrincipal'
                },
                {
                    data: 'grupo'
                },
                {
                    data: 'btnOperaciones'
                }
            ],
            'columnDefs': [{
                'targets': 0,
                'className': 'text-center'
            }]
        });
        //FIN MOSTRAR DATATABLE

        //PARA ELIMINAR CLIENTE
        $('#datatable-clientes').on("click", ".btn_eliminar", function (e) {
            var btn1 = $(this)
            var form = btn1.parents('.formEliminar');
            e.preventDefault();

            Swal.fire({
                title: 'Estas seguro?',
                text: "El cliente sera eliminado!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, borralo!'
            }).then((result) => {
                if (result.value) 
                {
                    $.ajaxSetup(
                    {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax(
                    {
                        url: form.attr('action'),
                        data: {
                            _method: 'POST',
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST'
                    }).done(function (r)
                        {
                         dtable.ajax.reload(
                            function (json) {
                                Swal.fire(
                                    'Eliminado!',
                                    'Cliente eliminado correctamente.',
                                    'success'
                                )
                        }, false);
                    }).fail(function (xhr) {
                        Swal.fire(
                            'Ocurrio un error!',
                            'El cliente no pudo eliminarse.',
                            'error'
                        )
                    });
                }
            })
        });
        //FIN DE ELIMINAR 
    });
</script>
@endsection

@extends('admin.layouts.app')

@section('combo')

@endsection

@section('page','Documentos')

@section('content')
    <div class="container">
        <div class="row">                
            <div class="col-md-12  ">
                <h1 id="estac_selected"></h1>
                <div class="nav-container" style="position:relative;">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#"><b>GESTION AMBIENTAL</b></a>
                        </li>
                        <li class="breadcrumb-item active">Informe de Monitoreo</li>
                    </ol>
                    <ol class=" float-right" style="list-style:none; margin-top: -40px; margin-right: 10px;">
                        {{-- <li class="breadcrumb-item">
                            <button class="btn btn-sm btn-outline-dark" title="Ver" style="border:none;  right:1rem; top:50%; transform:translateY(-50%);">
                                <div style='text-align:center;'>
                                    <i class="fa fa-eye"></i>
                                </div> 
                            </button>
                            <button class="btn btn-sm btn-outline-primary" title="Enlace" style="border:none;  right:1rem; top:50%; transform:translateY(-50%);">
                                <div style='text-align:center;'>
                                    <i class="fa fa-link"></i>
                                </div> 
                            </button>
                            <button class="btn btn-sm btn-outline-danger" title="Eliminar Seleccion" style="border:none;  right:1rem; top:50%; transform:translateY(-50%);">
                                <div style='text-align:center;'>
                                    <i class="fa fa-trash"></i>
                                </div> 
                            </button>
                            <button class="btn btn-sm btn-outline-secondary" title="Más" style="border:none; right:1rem; top:50%; transform:translateY(-50%);">
                                <div style='text-align:center;'>
                                    <i class="fa fa-ellipsis-v"></i>
                                </div> 
                            </button>
                            <button class="btn btn-sm btn-outline-success" title="Vista" style="border:none;  right:1rem; top:50%; transform:translateY(-50%);">
                                <div style='text-align:center;'>
                                    <i class="fa fa-list"></i>
                                </div> 
                            </button>
                        </li> --}}
                    </ol>
                </div>

                <div class="card-body"> 
                    <form action=" {{ route('file.store') }}" class="dropzone"  id='dropzone' method="POST" enctype="multipart/form-data" class="form-control">
                        @csrf
                        <input type="hidden" id="input_estacion" name="input_estacion" value="0">
                        <table class="table table-hover table-bordered table-striped " id="datatable-documentos" style="width:100%" >
                            <thead>
                                <tr>
                                    <th width="5" >Id</th>
                                    <th>Nombre</th>
                                    <th>Tipo de archivo</th>
                                    <th>  </th>
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

    $(document).ready(function(){   
        
        var dtable=$('#datatable-documentos').DataTable({
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
            "autoWidth": false,//para ordenar automaticamente los tr
            "serverSide": true,
            "ajax": {
            "url":"{{route('file.getDocumentsClient')}}",
            },            
            "columns": [
                {data: 'id'},
                {data: 'name'},
                {data: 'type'},
                {data: 'btnOperaciones'} 
                ],
            'columnDefs': [
                {
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
        $('#datatable-documentos').on("click",".alertaa",function(e)
        {         
            var btn1 = $(this),
             form=btn1.parents('.formEliminar'),
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
            if (result.value)
            {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                        url: form.attr('action'),
                        data: {_method: 'DELETE', _token: $('meta[name="csrf-token"]').attr('content')
                   },
                        type:'POST'                
                   }).done(function (r) {
                        dtable.ajax.reload( 
                            function ( json ) {
                                Swal.fire(
                                    'Borrado!',
                                    'Su archivo ha sido eliminado.',
                                    'success'
                                    )
                            },false);
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
	$(document).ready(function(){

});

// FIN SCRIPT PARA SUBIR ARCHIVOS
    });
    </script>
@endsection
@extends('admin.layouts.app')
@section('page','Documentos')
@section('content')
    <div class="container">
        <div class="row">                
            <div class="col-md-12 col-sm-8">
                    <div class="card-header">Data Table Demo</div>
    
                    <div class="card-body">
                            <table class="table table-hover  
                            table-bordered table-striped  " id="datatable-documentos" >
                                <thead>
                                    <tr>
                                        <th width="5px" >Id</th>
                                        <th>Nombre</th>
                                        <th>Tipo de archivo</th>
                                        <th width="5px">Ver</th>
                                        <th width="5px">Eliminar</th>
                                    </tr>
                                </thead>
                                @csrf
                            </table>
                        </div>
                        {{-- </div> --}}
                        {{-- @include('admin.partials.modals.files') --}}
                    </div>
                </div>
            </div>
@endsection

 

@section('scripts')
    {{-- @include('admin.partials.js.deleteModal')    --}}
   
    <script type="text/javascript"> 
   
    $(document).ready(function() {
        $('#datatable-documentos').DataTable({
        'language': {
            'sProcessing': 'Procesando...',
            
            'sLengthMenu': 'Mostrar <select class=" custom-select-sm">'+
                                '<option value="10">10</option>'+
                                '<option value="20">20</option>'+
                                '<option value="30">30</option>'+
                                '<option value="40">40</option>'+
                                '<option value="50">50</option>'+
                                '<option value="-1">All</option>'+
                                '</select> Archivos',
            'sZeroRecords': 'No se encontraron resultados',
            'sEmptyTable': 'Ningún dato disponible en esta tabla',
            'sInfo': 'Mostrando registros del _START_ al _END_ de un total de _TOTAL_',
            'sInfoEmpty': 'Mostrando registros del 0 al 0 de un total de 0 registros',
            'sInfoFiltered': '(filtrado de un total de _MAX_ registros)',
            'sInfoPostFix': '',
            'sSearch': 'Buscar:',
            'sUrl': '',
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
            "ajax": "{{url('api/files')}}",
            "columns": [
                {data: 'id'},
                {data: 'name'},
                {data: 'type', name: 'type'},
                {data: 'btnMostrar'},
                {data: 'btnEliminar'},
                // {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            'columnDefs': [
                {
                    'targets': 0,
                    'className': 'text-center'
                }
            ]
        });

        
        $('#datatable-documentos').on("click",".alertaa",function(e)
        {            
            var btn = $(e.currentTarget)
            // console.log(btn); 
            // return;
            var file_id = btn.data('file-id');
            var file_name= btn.data('file-name');          
            var token= $('input[name="_token"]').val(); 
            var data=new FormData();
            data.append('_token',token);
           

                 Swal.fire({
                    title: 'Estas seguro de eliminar este archivo?<br>'+file_id+'<br><br>',
                    text: "No podras revertir este cambio!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, borralo!'
                    }).then((result) => {
                    if (result.value) {

                         $.ajax({
                            url:"{{route('file.destroy','21')}}",
                            method:"POST",
                            data:data,
                            dataType:'JSON',
                            contentType:false,
                            cache:false,
                            processData:false,
                            success:function(data)
                            {

                                Swal.fire(
                                'Borrado!',
                                'Tu archivo ha sido borrado.',
                                'success'
                                )

                                // $('#message').css('display','block');
                                // $('#message').html(data.message);
                                // $('#message').addClass(data.class_name);
                                // $('#uploaded_image').html(data.uploaded_image);
                            }
                        });   

                        
                    }
                    })
            
        }); 






    });
    </script>
        {{-- <script>

        $("#nameSearch").on('keyup',function(){
            $value=$(this).val();
             console.log("hola");
        //
        });
      
    </script> --}}
@endsection
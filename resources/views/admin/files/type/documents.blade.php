@extends('admin.layouts.app')
@section('page','Documentos')
@section('content')
{{-- 
    <div class="container">
       
        
        <div class="row">
            <div class="col-sm-12 table-responsive">              
                        @csrf
                    <div class="input-group navbar-form float-right">

                        <input type="text" id='nameSearch'  name='nameSearch' class='form-control float-right' 
                            aria-describedby="search" placeholder="Buscar">

                        <span class="input-group-text " id="search"><i class='fa fa-search'></i></span>
                   </div>  
            <hr>
            <table class='table table-hover'>
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">SUBIDO</th>
                        <th scope="col">VER</th>
                        <th scope="col">ELIMINAR</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($documents as $document)
                    {{-- <iframe width="400" height="400" src="https://docs.google.com/viewer?url={{ asset('img/files/pdf.svg') }}&embedded=true"  frameborder="0"></iframe> --}}
                  {{--       <tr>
                            <th scope='row'> 
                            @if ($document->extension=='pdf'|| $document->extension=='pdf')
                                <img class='img-responsive' width="30px" src=" {{ asset('img/files/pdf.svg') }} " alt="">    
                            @endif
                            @if ($document->extension=='xlsx'|| $document->extension=='XLSX')
                                <img class='img-responsive'width="30px" src=" {{ asset('img/files/excel.svg') }} " alt="">    
                            @endif
                            @if ($document->extension=='docx'|| $document->extension=='DOCX')
                                <img class='img-responsive'width="30px" src=" {{ asset('img/files/word.svg') }} " alt="">    
                            @endif     
                            @if ($document->extension=='doc'|| $document->extension=='DOC')
                                <img class='img-responsive'width="30px" src=" {{ asset('img/files/word.svg') }} " alt="">    
                            @endif
                            @if ($document->type=='image')
                                <img class='img-responsive'width="30px" src=" {{ asset('img/files/img.png') }} " alt="">    
                            @endif                              

                            </th>
                            <th scope='row'> {{ $document->name }} </th>
                            <th scope='row'> {{ $document->created_at->DiffForHumans()}} </th>
                            <th scope='row'>
                            @if ($document->extension=='pdf'|| $document->extension=='PDF'|| $document->type=='image')
                                <a class='btn btn-primary ' style="width:70%;" target="_blank" href="{{ asset('storage') }}/{{$document->name}}">
                                <i class="fas  fa-1x fa-eye"></i> Ver</a>                          
                            @else
                                <a class='btn btn-primary '  style="width: 70%;"  target="_blank" href="{{asset('storage')}}/{{$document->name}}">
                                    <i class="fas fa-1x fa-download "></i> Descargar
                                </a> 
                            @endif
                            </th>
                        <th scope="row">
                               {{-- BOTON QUE INCLUIRA AL MODAL --}}
                          {{--       <button type="submit" class='btn btn-danger mt-1 ' data-toggle="modal" data-target="#deleteModal"
                               data-file-id={{$document->id}}> <i class="fas fa-trash"></i> Eliminar</button>
                            </th>
                        </tr>
                    </tbody>
                    @empty
                    <div class="container mb-5">
                        <div class="alert alert-warning " role='alert'>
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">x
                            </span>
                            <strong>¡Atención!</strong> No tienes ningún Documento
                        </div>
                    </div>
                    @endforelse
               
            </table> 
            <div class='float-right '>
                {{ $documents->links() }}           
            </div>
           </div>
        </div>   
       
        {{--ADD ARCHIVO DONDE SE ENCUENTRA EL MODAL --}}
    
    {{-- </div> --}}
 



    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-8">
                <div class="panel panel-default">
                    <div class="card-header">Data Table Demo</div>
    
                    <div class="card-body">
                            {{-- table-striped  --}}
                            <table class="table table-hover  
                            table-bordered table-striped  datatable"  >
                                <thead>
                                    <tr>
                                        <th width="5px" >Id</th>
                                        <th>Nombre</th>
                                        <th>Tipo de archivo</th>
                                        <th width="5px">Ver</th>
                                        <th width="5px">Eliminar</th>
                                    </tr>
                                </thead>
                               
                            </table>
                       
                    </div>
                </div>
                @include('admin.partials.modals.files')
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    @include('admin.partials.js.deleteModal')   
   
    <script type="text/javascript">    

    $(document).ready(function() {
        $('.datatable').DataTable({
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

            // "processing": true,
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
@extends('admin.layouts.app')
@section('page','Documentos')
@section('content')
    <div class="container">


            {{-- <form action=" {{ route('file.store') }}" class="dropzone"  id='dropzone' method="POST" enctype="multipart/form-data"
            class="">
                @csrf
                    {{-- <div class="row d-flex flex-row justify-content-center align-items-center pt-3">
                            <div class="form-group ">
                                <label for="file">Selecciona un archivo para subirlo</label>				
                                <input type="file"  class="form-control-file" name="file" id='file' multiple   required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="upload" id="upload" class="btn btn-primary file">
                                    Subir archivos
                                </button>				
                            </div>			
                    </div> 
            </form> --}}
            {{-- <div class="mt-4">
                <span id='uploaded_image'></span>
            </div> --}}

        <div class="row">                
            <div class="col-md-12  ">
                    <div class="card-header"><H2>DATOS DE DOCUMENTOS</H2>     
                                       
                        <a href="{{route('file.prueba')}}" class="btn btn-primary"><h3>prueba</h3> </a>
                    </div>
    
                    <div class="card-body"> 
                        <form action=" {{ route('file.store') }}" class="dropzone"  id='dropzone' method="POST"
                        enctype="multipart/form-data" class="form-control">
                            @csrf
                                <table class="table table-hover    
                                table-bordered table-striped " id="datatable-documentos"  style="width:100%" >
                                    <thead>
                                        <tr>
                                            <th width="5" >Id</th>
                                            <th>Nombre</th>
                                            <th>Tipo de archivo</th>
                                            <th  width="206">  </th>
                                        </tr>
                                    </thead>
                                    @csrf
                                </table>
                        </form>        
                    </div>
                    {{-- <img src=" {{ asset('img/process.gif') }} " alt=""> --}}
                        {{-- </div> --}}
                        {{-- @include('admin.partials.modals.files') --}}
                    </div>
                </div>
            </div>
@endsection

@section('scripts')
    {{-- @include('admin.partials.js.deleteModal')    --}}
   
    <script type="text/javascript"> 
   

    $(document).ready(function(){
        
        // var dat={data:'btnNull'}
        // @if(Auth::user()->hasRole('Admin'))
        //      dat={data:'btnEliminar'}
        // @endif

       
        
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
            "serverSide": true,
            "ajax": {
            "url":"{{route('file.gettabla')}}",
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
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
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
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                    )
                            },false);
                    }).fail(function (xhr) {
                        console.log(xhr);
                        Swal.fire(
                                'Ocurrio un error!',
                                'Your file not has been deleted.',
                                'error'
                                )
                    });                 
            }
            })    
        }); 


//  SCRIPT PARA SUBIR ARCHIVOS
	$(document).ready(function(){

// $('#upload_form').on('submit',function(event){
//         event.preventDefault();
    
//         $.ajax({
//             url:"{{route('file.store')}}",
//             method:"POST",
//             data:new FormData(this),
//             dataType:'JSON',
//             contentType:false,
//             cache:false,
//             processData:false,
//             success:function(data)
//             {
//                 console.log("aqui");
                
//             }
//         });

// });

const opts = {
    dictDefaultMessage: " ",
    maxFilesize: 2500,
    // acceptedFiles: ".jpg",
    init: function() {
        this.on("complete", file => {
            var removeButton = Dropzone.createElement(`<button class="btn btn-xs btn-primary">Remove file</button>`);
                
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

            if( file.status == "success" ){
                _this.removeFile(file);

                dtable.ajax.reload( 
                        function ( json ) {
                            Swal.fire(
                                'Agregado!',
                                'Se ha subido el archivo.',
                                'success'
                                )
                },false);
            }


        });

        this.on('error', function(file, response) {
            // console.log(file.previewElement, response)

            var spanError = Dropzone.createElement(`<span class="alert alert-danger">${file.name}</span>`);

            file.previewElement.appendChild(spanError);
            // $(file.previewElement).find('.dz-error-message').text(response.exception);
            $(file.previewElement).find('.dz-error-message').text(response);
            file.previewElement.classList.add("dz-error");

            dtable.ajax.reload( 
                function () {
                    Swal.fire(
                            'error!',
                            'no Se ha subido el archivo.',
                            'error'
                        )
                },false
            );
        })
    },
}

var myDropzone = new Dropzone("#dropzone", opts);	

});

// FIN SCRIPT PARA SUBIR ARCHIVOS







    });
    </script>
@endsection
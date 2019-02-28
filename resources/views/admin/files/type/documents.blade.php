@extends('admin.layouts.app')
@section('page','Documentos')
@section('content')

<div class="container">
        {{-- <form action=" {{ route('file.store') }} " method="POST" enctype="multipart/form-data"
        class="dropzone" id="dropzone">
            @csrf
                <div class="row d-flex flex-row justify-content-center align-items-center pt-3">
                        <div class="form-group ">
                            <label for="file">Selecciona un archivo para subirlo</label>				
                            <input type="file"  class="form-control-file" name="file" multiple   required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary file">
                                Subir archivos
                            </button>
                        </div>			
                </div>
            </form>   --}}
        
        <div class="row">
            <div class="col-sm-12 table-responsive">                        
                <form class='navbar-form float-right'>
                        @csrf
                    <div class="input-group">
                        <input type="text" id='isearch'  name='nameSearch' class='form-control float-right' aria-describedby="search" placeholder="Buscar">
                        <span class="input-group-text " id="search"><i class='fa fa-search'></i></span>
                        
                    </div>                                    
                </form>
            {{-- BUSCADOR --}}
            <hr>
            {{-- FIN BUSCADOR  --}}
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
                        <tr>
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
                                <a class='btn btn-primary'  style="width: 70%;"  target="_blank" href="{{asset('storage')}}/{{$document->name}}">
                                    <i class="fas fa-1x fa-download "></i> Descargar
                                </a> 
                            @endif
                            </th>
                            <th scope="row">
                               {{-- BOTON QUE INCLUIRA AL MODAL --}}
                               <button type="submit" class='btn btn-danger mt-1 ' data-toggle="modal" data-target="#deleteModal"
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
        @include('admin.partials.modals.files')
    </div>

@endsection

@section('scripts')
    @include('admin.partials.js.deleteModal')
    <script>
        $("#isearch").keyup(function(e){

            console.log("hola");
           var nameSearch=$("#isearch").val();
           var da=new FormData();
           da.append('nameSearch',nameSearch);
			$.ajax({
				url:"{{route('file.prueba')}}",
				method:"GET",
				data:da,
				dataType:'JSON',
				contentType:false,
				cache:false,
				processData:false,
				success:function(data)
				{
				console.log(data);

					// $('#message').css('display','block');
					// $('#message').html(data.message);
					// $('#message').addClass(data.class_name);
					// $('#uploaded_image').html(data.uploaded_image);
				}
			});
        });
    </script>

    {{-- <script type="text/javascript">
    var img_ext=['.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JPEG','.GIF'];
    var video_ext=['.mp4','.avi','.jpeg','.mpeg','.MP4','.AVI','.JPEG','.MPEG'];
    var documento_ext=['.doc','.docx','.pdf','.odt','.DOC','.DOCX','.PDF','.ODT','.xlsx','.XLSX'];
    var audio_ext=['.mp3','.mpga','.wma','.ogg','.MP3','.MPGA','.WMA','.OGG'];

    var all_ext =.merge(img_ext,video_ext,documento_ext,audio_ext);
        console.log(all_ext);
        Dropzone.options.dropzone =
         {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            acceptedFiles: all_ext,
            addRemoveLinks: true,
            timeout: 5000,
            success: function(file, response) 
            {
                console.log(response);
            },
            error: function(file, response)
            {
               return false;
            }
        };
 </script> --}}

 <script>
     var myDropzone = new Dropzone("div#myId", { url: "/file/post"});
 </script>
@endsection
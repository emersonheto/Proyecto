@extends('admin.layouts.app')
@section('page','Imagenes')
@section('content')
<form action=" {{ route('file.store') }} " method="POST" enctype="multipart/form-data">
    @csrf
        <div class="row d-flex flex-row justify-content-center align-items-center pt-3">
                <div class="form-group ">
                    <label for="file">Selecciona un archivo para subirlo</label>				
                    <input type="file"  class="form-control-file" name="file[]" multiple   required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary file">
                        Subir archivos
                    </button>				
                    {{-- <button type="button" id='btn' class="btn btn-primary file" onclick="ver()">
                        prueba
                    </button>		 --}}
                </div>			
        </div>
</form>



    <div class="container">
        <div class="row">
            @forelse ($images as $image)
            <div class="col-sm-6 col-md-4 mt-4">
                <div class="card " style="width: 18rem;">
                    <img class='card-img-top' src=" {{ asset('storage') }}/{{$folder}}/image/{{$image->name}}"
                        alt="{{ $image->name }}">
                    <div class="card-body">
                        <a class="btn btn-primary " href=" {{ asset('storage') }}/{{$folder}}/image/{{$image->name}}"
                            target='_blank'><i class="fas fa-eye"></i>Ver</a>
                         {{-- BOTON CON EL MODAL    --}}
                        <button type="submit" class='btn btn-danger mt-1 float-right' data-toggle="modal" data-target="#deleteModal"
                        data-file-id={{$image->id}}> <i class="fas fa-trash"></i> Eliminar</button>  
                    </div>
                </div>
            </div>
            @empty
            <div class="container mb-5">
                <div class="alert alert-warning " role='alert'>
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">x
                    </span>
                    <strong>¡Atención!</strong> No se encontraron imagenes
                </div>
            </div>
            @endforelse
        </div>            
           @include('admin.partials.modals.files')
    </div>  
 @endsection

@section('scripts')
    @include('admin.partials.js.deleteModal')
@endsection


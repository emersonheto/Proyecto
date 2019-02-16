@extends('admin.layouts.app')
@section('page','Imagenes')
@section('content')
    <div class="container">
        <div class="row">
            @forelse ($images as $image)
            <div class="col-sm-6 col-md-4 mt-4">
                <div class="card " style="width: 18rem;">
                    <img class='card-img-top' src=" {{ asset('storage') }}/{{$folder}}/image/{{$image->name}}.{{ $image->extension}}"
                        alt="{{ $image->name }}">
                    <div class="card-body">
                        <a class="btn btn-primary " href=" {{ asset('storage') }}/{{$folder}}/image/{{$image->name}}.{{ $image->extension}}"
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
           {{-- AQUI ESTABA EL MODAL --}}  
           @include('admin.partials.modals.files')
    </div>  
 @endsection

@section('scripts')
    @include('admin.partials.js.deleteModal')
@endsection


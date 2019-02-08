@extends('admin.layouts.app')
@section('page','Imagenes')
@section('content')

<div class="container">
    <div class="row">
        @forelse ($images as $image)
            <div class="col-sm-6 col-md-4">
                <div class="card " style="width: 18rem;">
                    <img class='card-img-top' src=" {{ asset('storage') }}/{{$folder}}/image/{{$image->name}}.{{ $image->extension}}" 
                    alt="{{ $image->name }}">
                    <div class="card-body">
                        <a  class="btn btn-primary " href=" {{ asset('storage') }}/{{$folder}}/image/{{$image->name}}.{{ $image->extension}}" tarfget='_blank'><i class="fas fa-eye"></i>Ver</a>                
                        <form action=" {{ route('file.destroy',$image->id) }} " method="POST">
                            @csrf
                            <input type="hidden" name="_method" value='PATCH'>
                            <button type="submit" class=' float-right btn btn-danger ' ><i class="fas fa-trash">Eliminar</i></button>
                        </form>               
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
</div>
@endsection
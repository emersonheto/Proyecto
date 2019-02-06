@extends('admin.layouts.app')
@section('page','Imagenes')
@section('content')

<div class="container">
    <div class="row">
        @foreach ($images as $image)
        <div class="col-sm-6 col-md-4">
           <div class="card " style="width: 18rem;">
               <img class='card-img-top' src=" {{ asset('storage') }}/{{$folder}}/image/{{$image->name}}.{{ $image->extension}}" 
               alt="{{ $image->name }}">
            <div class="card-body">
                <a href=" {{ asset('storage') }}/{{$folder}}/image/{{$image->name}}.{{ $image->extension}}" tarfget='_blank' class="btn btn-primary"><i class="fas fa-eye"></i>Ver</a>
                <a href="#" class="btn btn-danger fa-pull-right"><i class="fas fa-trash"></i>Eliminar</a>        
            </div> 
           </div>
        </div>        
        @endforeach
    </div>
</div>
@endsection
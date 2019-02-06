@extends('admin.layouts.app')
@section('page','Audios')
@section('content')

<div class="container">
    <div class="row">
        @foreach ($audios as $audio)
            <div class="col-sm-12 col-md-4 pb-4">
            <audio src=" {{ asset('storage') }}/{{$folder}}/audio/{{$audio->name}}.{{ $audio->extension}}" controls></audio>
            <div class="card-body">
                <a href=" {{ asset('storage') }}/{{$folder}}/audio/{{$audio->name}}.{{ $audio->extension}}" tarfget='_blank' class="btn btn-primary"><i class="fas fa-eye"></i>Ver</a>
                <a href="#" class="btn btn-danger fa-pull-right"><i class="fas fa-trash"></i>Eliminar</a>        
            </div> 
           </div>
        </div>        
        @endforeach
    </div>
</div>
@endsection
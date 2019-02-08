@extends('admin.layouts.app')
@section('page','Audios')
@section('content')

<div class="container">
    <div class="row">
        @forelse ($audios as $audio)
            <div class="col-sm-12 col-md-4 pb-4">
                <audio src=" {{ asset('storage') }}/{{$folder}}/audio/{{$audio->name}}.{{$audio->extension}}" controls></audio>
                <form action="{{route('file.destroy',$audio->id)}} " method="POST">
                    @csrf
                    <input type="hidden" name="_method" value='PATCH'>
                    <button type="submit" class='btn btn-danger float-right' ><i class="fas fa-trash">Eliminar</i></button>                
                </form>            
            </div>
        @empty
            <div class="container mb-5">
                <div class="alert alert-warning " role='alert'>
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">x</span>
                    <strong>¡Atención!</strong> No tienes ningún video
                </div>
            </div>
        @endforelse
    </div>        
</div>
@endsection
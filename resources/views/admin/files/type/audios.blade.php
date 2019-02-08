@extends('admin.layouts.app')
@section('page','Audios')
@section('content')

<div class="container">
    <div class="row">
        @foreach ($audios as $audio)
            <div class="col-sm-12 col-md-4 pb-4">
            <audio src=" {{ asset('storage') }}/{{$folder}}/audio/{{$audio->name}}.{{$audio->extension}}" controls></audio>
            <form action="{{route('file.destroy',$audio->id)}} " method="POST">
                @csrf
                <input type="hidden" name="_method" value='PATCH'>
                <button type="submit" class='btn btn-danger float-right' ><i class="fas fa-trash">Eliminar</i></button>                
            </form>            
           </div>
           @endforeach
        </div>        
    </div>
@endsection
@extends('admin.layouts.app')
@section('page','Audios')
@section('content')

<div class="container">
    <div class="row">
        @forelse ($audios as $audio)
            <div class="col-sm-12 col-md-4 pb-4">
                <audio src=" {{ asset('storage') }}/{{$folder}}/audio/{{$audio->name}}.{{$audio->extension}}" controls></audio>
                {{-- BOTON QUE INCLUIRA UN ARCHIVO A UN MODAL --}}
                <button type="submit" class='btn btn-danger float-right mt-1' data-toggle="modal" data-target="#deleteModal"
                    data-file-id={{$audio->id}}>    <i class="fas fa-trash"></i> Eliminar</button>                    
            </div>
        @empty
            <div class="container mb-5">
                <div class="alert alert-warning " role='alert'>
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">x</span>
                    <strong>¡Atención!</strong> No tienes ningún audio
                </div>
            </div>
        @endforelse
    </div>        
    {{-- ADD MODAL --}}
    @include('admin.partials.modals.files')
</div>

@endsection

@section('scripts')
    @include('admin.partials.js.deleteModal')
@endsection

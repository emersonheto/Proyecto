@extends('admin.layouts.app')
@section('page','Audios')
@section('content')

<div class="container">
    <div class="row">
        @forelse ($audios as $audio)
            <div class="col-sm-12 col-md-4 pb-4">
                <audio src=" {{ asset('storage') }}/{{$folder}}/audio/{{$audio->name}}.{{$audio->extension}}" controls></audio>
                {{-- <form action="{{route('file.destroy',$audio->id)}} " method="POST">
                    @csrf
                    <input type="hidden" name="_method" value='PATCH'>
                    <button type="submit" class='btn btn-danger float-right' ><i class="fas fa-trash">Eliminar</i></button>                
                </form>             --}}
                <button type="submit" class='btn btn-danger mt-1 float-right' data-toggle="modal" data-target="#deleteModal" >
                    <i class="fas fa-trash">Eliminar</i></button>  
                    
                {{-- MODAL --}}
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop='false'>
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirmar Eliminación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>¿Estas seguro de eliminar este elemento? No podrás recuperarlo</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i>Cancelar</button>
                                    <form action="{{route('file.destroy',$audio->id)}} " method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value='PATCH'>
                                        <button type="submit" class='btn btn-danger float-right' ><i class="fas fa-trash"></i>Confirmar</button>                
                                    </form> 
                                    {{-- <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i>Confirmar</button> --}}
                                </div>
                                </div>
                            </div>
                        </div>  

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
</div>



@endsection
<!-- Modal -->
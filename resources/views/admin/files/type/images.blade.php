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
                        {{-- <form action=" {{ route('file.destroy',$image->id) }} " method="POST">
                            @csrf
                            <input type="hidden" name="_method" value='PATCH'>
                            <button type="submit" class=' float-right btn btn-danger ' ><i class="fas fa-trash">Eliminar</i></button>
                        </form>     --}}

                         {{-- BUTTON --}}
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
                                            <form action="{{route('file.destroy',$image->id)}} " method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value='PATCH'>
                                                <button type="submit" class='btn btn-danger float-right' ><i class="fas fa-trash"></i>Confirmar</button>                
                                            </form> 
                                            {{-- <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i>Confirmar</button> --}}
                                        </div>
                                        </div>
                                    </div>
                            </div>  
                            {{-- FIN MODAL--}} 
                                   
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
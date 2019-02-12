@extends('admin.layouts.app')
@section('page','Videos')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12 table-responsive">
            <table class='table table-hover'>
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">SUBIDO</th>
                        <th scope="col">VER</th>
                        <th scope="col">ELIMINAR</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($videos as $video)
                        <tr>
                            <th scope='row'> 
                            @if ($video->extension=='mp4'|| $video->extension=='MP4')
                                <img class='img-responsive' width="40px" src=" {{ asset('img/files/mp4.svg') }} " alt="">    
                            @endif
                            @if ($video->extension=='avi'|| $video->extension=='AVI')
                                <img class='img-responsive'width="40px" src=" {{ asset('img/files/avi.svg') }} " alt="">    
                            @endif
                            @if ($video->extension=='mpeg'|| $video->extension=='MPEG')
                                <img class='img-responsive'width="40px" src=" {{ asset('img/files/mpeg.svg') }} " alt="">    
                            @endif                               

                            </th>
                            <th scope='row'> {{ $video->name }} </th>
                            <th scope='row'> {{ $video->created_at->DiffForHumans() }} </th>
                            <th scope='row'> <a class='btn btn-primary' target="_blank" href="{{ asset('storage') }}/{{$folder}}/video/{{$video->name}}.{{ $video->extension}}">
                                <i class="fas fa-eye"></i> Ver</a>
                            </th>
                            <th scope="row">
                                {{-- <form action=" {{ route('file.destroy',$video->id) }} " method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value='PATCH'>
                                    <button type="submit" class='btn btn-danger pull-right' ><i class="fas fa-trash">Eliminar</i></button>
                                </form> --}}
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
                                                    <form action="{{route('file.destroy',$video->id)}} " method="POST">
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
                            </th>
                        </tr>
                </tbody>
                    @empty
                    <div class="container mb-5">
                        <div class="alert alert-warning " role='alert'>
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">x
                            </span>
                            <strong>¡Atención!</strong> No tienes ningún Documento
                        </div>
                    </div>
                    @endforelse
            </table>            
           </div>
        </div>        
    </div>
</div>
@endsection
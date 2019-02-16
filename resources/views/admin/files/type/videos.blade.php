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
                               
                               {{-- BOTON QUE INCLUIRA AL MODAL --}}
                               <button type="submit" class='btn btn-danger mt-1 ' data-toggle="modal" data-target="#deleteModal"
                               data-file-id={{$video->id}}> <i class="fas fa-trash"></i> Eliminar</button>
                            
                            </th>
                        </tr>
                </tbody>
                    @empty
                    <div class="container mb-5">
                        <div class="alert alert-warning " role='alert'>
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">x
                            </span>
                            <strong>¡Atención!</strong> No tienes ningún Video
                        </div>
                    </div>
                    @endforelse
            </table>            
           </div>
        </div>        
        {{--ADD ARCHIVO DONDE SE ENCUENTRA EL MODAL --}}
        @include('admin.partials.modals.files')
    </div>
@endsection

@section('scripts')
    @include('admin.partials.js.deleteModal')
@endsection
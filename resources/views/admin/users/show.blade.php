@extends('admin.layouts.app')
@section('page','Detalles del Usuario')
    
@section('content')
  <div class="row mb-3">

    <div class="col-sm-12 ">
      <div class="shadow mt-5 pb-5">
        <img src=" {{ asset('img') }}/{{ $user->image}}" width="120" class="img-responsive rounded-circle d-block mx-auto">
        <h4 class="text-center mt-3 mb-1"> {{ $user->name }} </h4>
        <p class="text-center">{{ $user->email }}</p>
        <div class="d-flex row-flex justify-content-center">
          <a href=" {{ route('user.edit',$user->id) }} " class="btn btn-outline-success"><i class="fas fa-edit"></i>Editar perfil</a>
        </div>
      </div>
    </div>   

  </div>


  <a class='btn btn-outline-success' href=" {{ route('user.index') }} "><i class="fas fa-arrow-circle-left "></i>  Volver</a>
 

@endsection


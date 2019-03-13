

@extends('admin.layouts.app')
@section('page','Todos los Usuarios')
    
@section('content')
<div class="container">
  <div class="row">
        <div class="col-sm-12 mb-5">
                <a class='btn btn-outline-success' href=" {{ route('user.create') }} "><i class="fas fa-plus-circle"></i> Agregar un usuario</a>  
         </div>

    
      <div class="col-sm-12 table-responsive">
          <table class='table table-hover'>
              <thead>
                  <tr>
                      <th scope="col"></th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Correo electronico</th>
                      <th scope="col">Ver</th>
                      <th scope="col">Editar</th>
                      <th scope="col">Eliminar</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($users as $user)
                      <tr>
                          <th scope='row'><img src="{{ asset('img') }}/{{ $user->image }}" width="35"></th>
                          <th scope='row'> {{ $user->name }} </th>
                          <th scope='row'> {{ $user->email }} </th>
                          <th scope='row'>
                                <a class='btn btn-outline-success' href=" {{ route('user.show',$user->id) }} "> 
                                 <i class="fas fa-eye "></i>  Ver</a>
                          </th>
                          <th scope='row'>
                                <a class='btn btn-outline-primary' href=" {{ route('user.edit',$user->id) }} "> 
                                 <i class="far fa-edit "></i>  Editar</a>
                          </th>
                          <th scope="row">
                                <form action="{{route('user.destroy',$user->id)}} " method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value='PATCH'>
                                        <button type="submit" class='btn btn-outline-danger' ><i class="fas fa-trash"></i>  Eliminar</button>                
                                    </form>                              
                          </th>
                      </tr>
              </tbody>                 
                  @endforeach
          </table>            
         </div>
      </div>        
  </div>
</div>
@endsection --}}


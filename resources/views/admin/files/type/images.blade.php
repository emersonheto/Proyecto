@extends('admin.layouts.app')
@section('page','Imagenes')
@section('content')

<div class="container">
    <div class="row">
        @foreach ($images as $image)
        <div class="col-sm-6 col-md-4">
           <div class="card" style="width: 18rem;">
               <img src=" {{ asset('storage') }}/{{ Auth::user()->name .'-'.Auth::id() }}/image/{{$image->name}}.{{ $image->extension}}" 
               alt="{{ $image->name }}">

           </div>
        </div>
        
        @endforeach
    </div>
</div>

@endsection
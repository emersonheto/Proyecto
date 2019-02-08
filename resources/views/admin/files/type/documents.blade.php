@extends('admin.layouts.app')
@section('page','Documentos')
@section('content')

<div class="container">
        {{-- {{ dd(storage_path()) }}  --}}
         {{-- {{ storage_path().$folder}}
         {{ asset('storage') }}  --}}
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
                    @forelse ($documents as $document)
                        <tr>
                            <th scope='row'> 
                            @if ($document->extension=='pdf'|| $document->extension=='pdf')
                                <img class='img-responsive' width="30px" src=" {{ asset('img/files/pdf.svg') }} " alt="">    
                            @endif
                            @if ($document->extension=='xlsx'|| $document->extension=='XLSX')
                                <img class='img-responsive'width="30px" src=" {{ asset('img/files/excel.svg') }} " alt="">    
                            @endif
                            @if ($document->extension=='docx'|| $document->extension=='DOCX')
                                <img class='img-responsive'width="30px" src=" {{ asset('img/files/word.svg') }} " alt="">    
                            @endif     
                            @if ($document->extension=='doc'|| $document->extension=='DOC')
                                <img class='img-responsive'width="30px" src=" {{ asset('img/files/word.svg') }} " alt="">    
                            @endif                            

                            </th>
                            <th scope='row'> {{ $document->name }} </th>
                            <th scope='row'> {{ $document->created_at->DiffForHumans()}} </th>
                            <th scope='row'>
                            @if ($document->extension=='pdf'|| $document->extension=='PDF')
                                <a class='btn btn-primary ' style="width:89%;" target="_blank" href="{{ asset('storage') }}/{{$folder}}/document/{{$document->name}}.{{ $document->extension}}">
                                <i class="fas  fa-1x fa-eye"></i> Ver</a>                          
                            @else
                                <a class='btn btn-primary'  style="width: 89%;"  target="_blank" href="{{ asset('storage') }}/{{$folder}}/document/{{$document->name}}.{{ $document->extension}}">
                                    Descargar <i class="fas fa-1x fa-download "></i>
                                </a> 
                            @endif
                            </th>
                            <th scope="row">
                                <form action="{{route('file.destroy',$document->id)}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="PATCH">
                                    <button type="submit" class='btn btn-danger pull-right'><i class="fas fa-trash"></i> Eliminar </button>  
                                
                                </form>    {{-- <th scope='row'> <a class='btn btn-danger pull-right' href="#"><i class="fas fa-trash">Eliminar</i> </a></th> --}}
                            </th>
                        </tr>
                    </tbody>
                    @empty
                    <div class="container mb-5">
                        <div class="alert alert-warning " role='alert'>
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">x
                            </span>
                            <strong>¡Atención!</strong> No tienes ningún video
                        </div>
                    </div>
                    @endforelse
               
            </table>            
           </div>
        </div>        
    </div>

@endsection
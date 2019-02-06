@extends('admin.layouts.app')
@section('page','Documentos')
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
                    @foreach ($documents as $document)
                    <tr>
                        <th scope='row'> 
                        @if ($document->extension=='pdf'|| $document->extension=='pdf')
                            <img class='img-responsive' width="40px" src=" {{ asset('img/files/pdf.svg') }} " alt="">    
                        @endif
                        @if ($document->extension=='xlsx'|| $document->extension=='XLSX')
                            <img class='img-responsive'width="40px" src=" {{ asset('img/files/excel.svg') }} " alt="">    
                        @endif
                        @if ($document->extension=='docx'|| $document->extension=='DOCX')
                            <img class='img-responsive'width="40px" src=" {{ asset('img/files/word.svg') }} " alt="">    
                        @endif                               

                        </th>
                        <th scope='row'> {{ $document->name }} </th>
                        <th scope='row'> {{ $document->created_at->DiffForHumans()}} </th>
                        <th scope='row'>
                        @if ($document->extension=='pdf'|| $document->extension=='pdf')
                        <a class='btn btn-primary' target="_blank" 
                        href="{{ asset('storage') }}/{{$folder}}/document/{{$document->name}}.{{ $document->extension}}">
                        <i class="fas fa-eye"></i> Ver</a>
                        @else
                        <a class='btn btn-primary' target="_blank" 
                        href="{{ asset('storage') }}/{{$folder}}/document/{{$document->name}}.{{ $document->extension}}">
                        <i class="fas fa-eye"></i> Descargar</a>
                        

                        @endif

                            
                            
                        </th>
                        <th scope='row'> <a class='btn btn-danger' href="#"><i class="fas fa-trash">Eliminar</i> </a></th>
                    </tr>
                </tbody>
                    @endforeach
            </table>            
           </div>
        </div>        
    </div>
</div>
@endsection
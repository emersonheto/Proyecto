

@if($errors->any())
{{-- {{ dd($errors) }}  --}}
    <div class="container">
        <div class="alert alert-danger" role='alert'>
            <span class="closebtn" onclick="this.parentElement.style.display='none'">x
            </span>
                @foreach ($errors->all() as $error)

                    @if ($error=='validation.mimes')
                    <strong>Error!</strong> No podemos subir ese tipo de archivo 
                     
                    @elseif ($error=='validation.max.file')
                    <strong>Error!</strong> El archivo exede el tamaño máximo 
                    @else
                     <strong>Error!</strong>  {{ $error }} 
                    @endif
                @endforeach                             
        </div>
    </div>
@endif
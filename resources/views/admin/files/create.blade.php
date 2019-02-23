@extends('admin.layouts.app')
@section('page','Creacion de Archivos')

@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@section('content')
	<div class="alert" id="message" style="display: none"></div>

	<form action=" {{ route('file.store') }} " id='upload_form' method="POST" enctype="multipart/form-data">
		@csrf
			<div class="row d-flex flex-row justify-content-center align-items-center pt-3">
					<div class="form-group ">
						<label for="file">Selecciona un archivo para subirlo</label>				
						<input type="file"  class="form-control-file" name="file" id='file' multiple   required>
								{{-- file es como select_file --}}
					</div>
					<div class="form-group">
						<button type="submit" name="upload" id="upload" class="btn btn-primary file">
							Subir archivos
						</button>				
						{{-- <button type="button" id='btn' class="btn btn-primary file" onclick="ver()">
							prueba
						</button>		 --}}
					</div>			
			</div>
	</form>
	<div class="mt-4">
		<span id='uploaded_image'></span>
	</div>


@endsection

@section('scripts')
<script>
	$(document).ready(function(){

	 $('#upload_form').on('submit',function(event){
			event.preventDefault();
		
			$.ajax({
				url:"{{route('file.store')}}",
				method:"POST",
				data:new FormData(this),
				dataType:'JSON',
				contentType:false,
				cache:false,
				processData:false,
				success:function(data)
				{
				console.log(data);

					$('#message').css('display','block');
					$('#message').html(data.message);
					$('#message').addClass(data.class_name);
					$('#uploaded_image').html(data.uploaded_image);
				}
			});

	 });

	});
</script>


		
@endsection
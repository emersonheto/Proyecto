@extends('admin.layouts.app')
@section('page','Creacion de Archivos')

@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@section('content')
	<div class="alert" id="message" style="display: none"></div>

	<form action=" {{ route('file.store') }}" class="dropzone"  id='dropzone' method="POST" enctype="multipart/form-data"
	class="">
		@csrf
			{{-- <div class="row d-flex flex-row justify-content-center align-items-center pt-3">
					<div class="form-group ">
						<label for="file">Selecciona un archivo para subirlo</label>				
						<input type="file"  class="form-control-file" name="file" id='file' multiple   required>
					</div>
					<div class="form-group">
						<button type="submit" name="upload" id="upload" class="btn btn-primary file">
							Subir archivos
						</button>				
					</div>			
			</div> --}}
	</form>
	<div class="mt-4">
		<span id='uploaded_image'></span>
	</div>


@endsection

@section('scripts')
<script>
//  SCRIPT PARA SUBIR ARCHIVOS
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

		const opts = {
			dictDefaultMessage: "Soltar archivos a subir",
			maxFilesize: 2500,
			init: function() {
				this.on("addedfile", file => {
					var removeButton = Dropzone.createElement(`<button class="btn btn-xs btn-primary">Remove file</button>`);
        
					// Capture the Dropzone instance as closure.
					var _this = this;

					// Listen to the click event
					removeButton.addEventListener("click", function(e) {
						// Make sure the button click doesn't submit the form:
						e.preventDefault();
						e.stopPropagation();

						// Remove the file preview.
						_this.removeFile(file);
						// If you want to the delete the file on the server as well,
						// you can do the AJAX request here.
					});
					// Add the button to the file preview element.
					file.previewElement.appendChild(removeButton);
				});

				this.on('error', function(file, response) {
					// console.log(file.previewElement, response)
					$(file.previewElement).find('.dz-error-message').text(response.exception);
				})
			},
		}

		var myDropzone = new Dropzone("#dropzone", opts);	
	
	});

	// FIN SCRIPT PARA SUBIR ARCHIVOS

</script>


		
@endsection
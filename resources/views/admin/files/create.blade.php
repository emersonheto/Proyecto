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

		// var img_ext=['.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JPEG','.GIF'];
    // var video_ext=['.mp4','.avi','.jpeg','.mpeg','.MP4','.AVI','.JPEG','.MPEG'];
    // var documento_ext=['.doc','.docx','.pdf','.odt','.DOC','.DOCX','.PDF','.ODT','.xlsx','.XLSX'];
    // var audio_ext=['.mp3','.mpga','.wma','.ogg','.MP3','.MPGA','.WMA','.OGG'];

    // var all_ext = merge(img_ext,video_ext,documento_ext,audio_ext);
		// console.log(all_ext);

		const opts = {
			dictDefaultMessage: "Soltar archivos a subir",
			maxFilesize: 2500,
			init: function() {
				this.on("addedfile", file => {
					// file.previewElement.addEventListener("click", function() {
					// 	myDropzone.removeFile(file);
					// });

					// Create the remove button
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
			// accept: function(file, done) {
			// 	console.log(file)
			// 	done('aaa')
			// }
		}

		var myDropzone = new Dropzone("#dropzone", opts);

		// myDropzone.on("addedfile", function(file) {
		// 	console.log("addedfile aaa")	
		// 	file.previewElement.addEventListener("click", function() {
		// 		myDropzone.removeFile(file);
		// 	});
		// });
	
	});

</script>


		
@endsection
@extends('admin.layouts.app')
@section('page','Creacion de Archivos')
@section('content')
<form action=" {{ route('file.store') }} " method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row d-flex flex-row justify-content-center align-items-center pt-5">
		<div class="form-group ">
			<label for="file">
				Selecciona un archivo para subirlo
			</label>
			{{-- 	 --}}
			<input type="file" class="form-control-file" name="file" required>

		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary file">
				Subir archivos
			</button>
		</div>
	</div>

</form>


@endsection
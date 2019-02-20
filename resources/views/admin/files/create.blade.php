@extends('admin.layouts.app')
@section('page','Creacion de Archivos')
@section('content')
<form action=" {{ route('file.store') }} " method="POST" enctype="multipart/form-data">
	@csrf
		<div class="row d-flex flex-row justify-content-center align-items-center pt-5">
			
				<div class="form-group ">
					<label for="file">Selecciona un archivo para subirlo</label>				
					<input type="file" class="form-control-file" name="file[]" multiple required>

				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary file">
						Subir archivos
					</button>
				</div>

		</div>

		<div class="container">
				<p>&nbsp;</p>
				<p>&nbsp;</p>    
					<DIV id="PANEL_0" class="panel panel-primary text-justify">
							<DIV class="panel-heading">
									<H3 class="panel-title">Envio de solicitud</H3>
							</DIV>
							<DIV class="panel-body">
									<FORM enctype="multipart/form-data">
											<label for="file-es" role="button">Seleccionar Archivos</label>
											<input id="file-es" name="file-es[]" type="file" multiple>
											<SMALL class="form-text text-muted">Seleccionar archivos de Office 201X: docx, xlsx, pptx y pdf hasta un máximo de 5.</SMALL>
									</form>
									<p>&nbsp;</p>
									<div class="alert alert-success" role="alert"></div>
							</DIV>
					</DIV>  

</form>


@endsection
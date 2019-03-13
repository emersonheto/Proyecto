@extends('admin.layouts.app')
@section('page','Crear un nuevo cliente')
    
@section('content')

<div class="row">
   <div class="col-md-10 offset-md-1 bg-white card-body " >
         <form  action="#" method="POST" class="was-validated">
               @csrf 
               <input type="hidden" name="_method" value="PATCH">
                 <div class="form-row">
                   
                     <div class="form-group col-md-6">
                         <label for="ClientName">Ruc</label>
                         <input type="text" name="name" class='form-control is-valid' id='ClientName' placeholder="Ruc del cliente"  required >
                         <div class="invalid-feedback">¡Debes de agregar un Ruc!</div>
                     </div>
             
             
             
                   <div class="form-group col-md-6">
                       <label for="ClientName">Razon social </label>
                       <input type="text" name="name" class='form-control is-valid' id='ClientName' placeholder="Razon Social"  required >
                       <div class="invalid-feedback">¡Debes de agregar una Razon Social!</div>
                   </div>
                  
             
                   <div class="form-group col-md-4">
                       <label for="ClientBandera">Bandera </label>
                         <select class=" custom-select" name="ClientBandera" id="Clientbandera" >
                           <option value="primax">Primax</option>  
                           <option value="repsol">Repsol</option>  
                           <option value="pecsa">Pecsa</option>                
                         </select>           
                         {{-- <div class="invalid-feedback">¡Debes seleccionar una bandera!</div> --}}
                   </div>
                   <div class="form-group col-md-4 mb-3">
                       <label for="ClientDireccion">Direccion </label>
                         <input type="text" name="direccion" class='form-control is-valid' id='ClientDireccion' placeholder="Direccion  AV. "  required >
                         <div class="invalid-feedback">¡Debes de agregar una direccion!</div>
                   </div>
             
                   <div class="form-group col-md-4 mb-3">
                       <label for="ClientGrupo">Grupo </label>
                         <select class="custom-select" name="ClientGrupo" id="ClientGrupo">
                           <option value="primax">Grupo San ignacio</option>  
                           <option value="repsol">Gazel</option>  
                           <option value="pecsa">Irasa</option>                
                         </select>   
                   </div>  
             
                </div>  
                   <label for="" class=" col-md-12  ml-3">Lista de contactos de la estación </label>  
                <div class="inner">
                   <div class="form-row">
                      <div class="form-group col-md-3">
                            <label for="ClientBandera">Bandera </label>
                            <select class=" custom-select" name="ClientBandera" id="Clientbandera" >
                               <option value="primax">Primax</option>  
                               <option value="repsol">Repsol</option>  
                               <option value="pecsa">Pecsa</option>                
                            </select> 
                      </div>
                      <div class="form-group col-md-3 mb-3">
                            <label for="ClientDireccion">Direccion </label>
                            <input type="text" name="direccion" class='form-control is-valid' id='ClientDireccion' placeholder="Direccion  AV. "  required >
                            <div class="invalid-feedback">¡Debes de agregar una direccion!</div>
                      </div>   
                      <div class="form-group col-md-3 mb-3">
                            <label for="ClientGrupo">Grupo </label>
                            <select class="custom-select" name="ClientGrupo" id="ClientGrupo">
                               <option value="primax">Grupo San ignacio</option>  
                               <option value="repsol">Gazel</option>  
                               <option value="pecsa">Irasa</option>                
                            </select>   
                      </div>
                      <div class="form-group col-md-2 mb-3">
                            <label for="ClientDireccion">Direccion </label>
                            <input type="text" name="direccion" class='form-control is-valid' id='ClientDireccion' placeholder="Direccion  AV. "  required >
                            <div class="invalid-feedback">¡Debes de agregar una direccion!</div>
                      </div>
                      <div class="form-group col-md-1 mt-4">
                         <button class="btn btn-outline-info " type="button" href="#" id="btn_add" ><i class="fas fa-plus-circle fa-2x"></i> </button> 
                      </div>
                   </div> 
                </div>
             
                      <div class="col text-center" >
                         <button type="submit" class="btn btn-outline-success "><i class='fas fa-plus-circle'></i>   Agregar</button>
                      </div> 
                 
             </form>



   </div>
</div>










@endsection

@section('scripts')
<script>

   $(document).ready(function(){

      $("#btn_add").click(function(){
         //  var contador = $("input[type='text']").length;
          var fila=`<div class="form-row">
            <div class="form-group col-md-3">
             <select class=" custom-select" name="ClientBandera" id="Clientbandera" >
                 <option value="primax">Primax</option> 
                 <option value="repsol">Repsol</option>  
                 <option value="pecsa">Pecsa</option>                
              </select>
            </div>
            <div class="form-group col-md-3 mb-3">                     
                  <input type="text" name="direccion" class="form-control is-valid" id="ClientDireccion" placeholder="Direccion  AV. "  required >                  
            </div>   
            <div class="form-group col-md-3 mb-3">                  
                  <select class="custom-select" name="ClientGrupo" id="ClientGrupo">
                     <option value="primax">Grupo San ignacio</option>
                     <option value="repsol">Gazel</option>
                     <option value="pecsa">Irasa</option>
                  </select>
            </div>
            <div class="form-group col-md-2 mb-3">                 
                  <input type="text" name="direccion" class="form-control is-valid" id="ClientDireccion" placeholder="Direccion  AV. "  required >                 
            </div>
            <div class="form-group col-md-1 ">
               <button class="btn btn-outline-info " type="button" href="#" id="btn_add" ><i class="fas fa-plus-circle fa-1x"></i> </button> 
            </div>
            </div>`;  
         //  $(this).before(fila);
          $('.inner').append(fila); 

      });
   
      $(document).on('click', '.delete_email', function(){
          $(this).parent().remove();
      });

});



</script>   

@endsection





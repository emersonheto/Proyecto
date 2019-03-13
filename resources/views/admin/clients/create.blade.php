@extends('admin.layouts.app')
@section('page','Crear un nuevo cliente')
    
@section('content')

<div class="row">
   <div class="col-md-10 offset-md-1 bg-white card  " >
         <form  action="#" method="POST" class="was-validated m-5">
               @csrf 
               <input type="hidden" name="_method" value="PATCH">
                 <div class="form-row">
                   
                     <div class="form-group col-md-6">
                         <label for="ClientName">Ruc</label>
                         <input type="text" name="ruc" class='form-control is-valid' id='ClientName' placeholder="Ruc del cliente"  required >
                         <div class="invalid-feedback">¡Debes de agregar un Ruc!</div>
                     </div>

             {{-- REVISA        https://es.stackoverflow.com/questions/187507/problema-para-validar-un-registro-ya-insertado-en-mi-bd-con-ajax-laravel-5-2 --}}
             
             
             
                   <div class="form-group col-md-6">
                       <label for="ClientName">Razon social </label>
                       <input type="text" name="razonsocial" class='form-control is-valid' id='ClientName' placeholder="Razon Social"  required >
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
                {{-- AGREGANDO CONTACTO AL CLIENTE  --}}
                   <label for="" class=" col-md-12  ml-3">Lista de contactos de la estación </label>  
                <div class="inner">
                   <div class="form-row">
                      
                      <div class=" col-md-3 mb-3">
                            <label for="ClientDireccion">Nombre </label>
                            <input type="text" name="direccion" class='form-control is-valid' id='ClientDireccion' placeholder="Direccion  AV. "  required >
                            <div class="invalid-feedback">¡Debes de agregar un Nombre!</div>
                      </div>  
                      
                      <div class=" col-md-3">
                        <label for="ClientBandera">Cargo </label>
                        <select class=" custom-select" name="ClientBandera" id="Clientbandera" >
                           <option value="admin">Administrador</option>  
                           <option value="gerente">Gerente</option>  
                           <option value="pecsa">Tecnico</option>                
                        </select> 
                  </div>

                      <div class=" col-md-3 mb-3">
                        <label for="ClientDireccion">Correo </label>
                        <input type="mail" name="telefono" class='form-control is-valid' id='ClientDireccion' placeholder="example@gmail.com "  required >
                        <div class="invalid-feedback">¡Debes de agregar un correo!</div>
                      </div>
                      <div class=" col-md-2 mb-3">
                            <label for="ClientDireccion">Telefono </label>
                            <input type="text" name="direccion" class='form-control is-valid' id='ClientDireccion' placeholder="Direccion  AV. "  required >
                            <div class="invalid-feedback">¡Debes de agregar una direccion!</div>

                          
                      </div>
                      <div class=" col-md-1 mt-4" >
                         <button class="btn btn-outline-info " type="button" href="#" id="btn_add" ><i class="fas fa-plus-circle  fa-1x"></i> </button> 
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
            
            <div class="form-group col-md-3 mb-3">                     
                  <input type="text" name="name" class="form-control is-valid"  placeholder=" Nombre"  required >                  
            </div>   

            <div class=" col-md-3">
             <select class=" custom-select" name="ClientBandera" id="Clientbandera" >
                 <option value="primax">Primax</option> 
                 <option value="repsol">Repsol</option>  
                 <option value="pecsa">Pecsa</option>                
              </select>
            </div>
            <div class="col-md-3 mb-3">                  
                  <input type="mail" name="telefono" class='form-control is-valid' id='ClientDireccion' placeholder="example@gmail.com "  required >
                
            </div>
            
            <div class="form-group col-md-2 mb-3">                 
                  <input type="text" name="direccion" class="form-control is-valid" id="ClientDireccion" placeholder="Direccion  AV. "  required >                 
            </div>
            <div class=" col-md-1 " >
               <button class="btn btn-outline-info delete-fill  quitar_fill  " type="button" href="#" ><i class="fas fa-plus-square  fa-1x"></i> </button> 
            </div>
             
            
            </div>`;  
         //  $(this).before(fila);
          $('.inner').append(fila); 

      });

      $( "#dataTable tbody" ).on( "click", "", function() {
         console.log( $( this ).text() );
      });
   
      $("#aaa").click(function(){          
        // var ht=$(this).parent().remove();
         console.log("ht");
      });

});



</script>   

@endsection





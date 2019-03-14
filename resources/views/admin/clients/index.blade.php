@extends('admin.layouts.app')
@section('page','Lista de Clientes')
@section('content')
    <div class="container">

        <div class="row">                
            <div class="col-md-10  offset-md-1 bg-white   ">                
                    <div class="card-header"><H2>LISTA DE CLIENTES</H2>  
                        {{-- <a href="{{route('file.prueba')}}" class="btn btn-primary"><h3>prueba</h3> </a> --}}
                    </div>
                    <div class="col-md-10 mb-5">
                            <a class="btn btn-outline-success" href=" {{ route('clients.create') }} "><i class="fas fa-plus-circle"></i> Agregar un Cliente</a>  
                     </div>  
                    <div class="card-body">                                               
                        @csrf
                            <table class="table table-hover    
                             table-striped " id="datatable-clientes"  style="width:100%" >
                                <thead>
                                    <tr>
                                        <th width="5" >Ruc</th>
                                        <th>Razon social</th>
                                        <th>Direccion</th>
                                        <th>Correo</th>
                                        <th>Grupo</th>
                                        <th  width="">  </th>
                                    </tr>
                                </thead>
                                @csrf
                            </table>                              
                    </div>             
             </div>
        </div>
    </div>
@endsection

@section('scripts')  
   
    <script type="text/javascript">
    
    $("#datatable-clientes").on("click",".mostrar-detalle",function(e){
        var id=$(this).data("id");
        
        $.ajax({
            url: `clients/${id}`,
            data: {_method: 'GET', _token: $('meta[name="csrf-token"]').attr('content')
                },
            type:'POST',
            success : function(data){
                    console.log(data);
                var contactos=JSON.parse(data.contactos);
                var filas="";
                for (let index = 0; index < contactos.length; index++) {
                    const contacto = contactos[index];
                    filas+=`
                    <tr>
                        <td>${contacto.nombre}</td>
                        <td>${contacto.correo}</td>
                        <td>${contacto.cargo}</td>
                        <td>${contacto.telefono}</td>                         
                    </tr> 
                    `  
                }
                var html=`
                <div class="row  font-weight-bold  " style="font-size:1rem">
                    <div class=" col-md-6">
                        <label for="">${data.ruc}  :</label>
                        <label class="" id=''>  123 </label>
                    </div>
                

                    <div class=" col-md-6">
                        <label for="">Razon social : </label>
                        <label class=' ' id=''>123123 </label>
                    </div>

                    <div class=" col-md-6">
                        <label for="">Bandera : </label>
                        <label class=' id=''>123123123</label>
                    
                    </div>
                    <div class="col-md-6 ">
                        <label for="">Direccion : </label>
                        <label value="  " name="direccion" class=''>123123</label>
                    </div>

                    <div class="col-md-6 ">
                        <label for="ClientGrupo">Grupo : </label>
                        <label class=' ' id=''>123123</label>
                    </div>

                    <div class="col-md-12 ">                                
                        <table class="table">
                            <thead>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Cargo</th>
                            <th>Telefono</th>
                            </thead>
                            <tbody>
                              ${filas}                                      
                            </tbody>
                        </table>
                    </div>
                  `;



        Swal.fire({
  title: '<strong >  <u>Datos del Cliente </u></strong>',
  type: ' ',
  html:
    html,
  showCloseButton: false,
  showCancelButton: false,
  focusConfirm: false,
   
})




            }                
                })

        return;





       


    });




    $(document).ready(function(){     
        
        var dtable=$('#datatable-clientes').DataTable({
        'language': {
                        'sProcessing': " <img   src='{{ asset('img/process.gif') }}'>",
                        
                        'sLengthMenu': 'Mostrar _MENU_ archivos',
                        'sZeroRecords': 'No se encontraron resultados',
                        'sEmptyTable': 'Ningún dato disponible en esta tabla',
                        'sInfo': 'Mostrando registros del _START_ al _END_ de un total de _TOTAL_',
                        'sInfoEmpty': 'Mostrando registros del 0 al 0 de un total de 0 registros',
                        'sInfoFiltered': '(filtrado de un total de _MAX_ registros)',
                        'sInfoPostFix': '',
                        'sSearch': 'Buscar:',
                        // 'sUrl': '',
                        'sInfoThousands': ',',
                        'sLoadingRecords': 'Cargando...',
                        'oPaginate': {
                            'sFirst': 'Primero',
                            'sLast': 'Último',
                            'sNext': 'Siguiente',
                            'sPrevious': 'Anterior'
                        },
                        'oAria': {
                            'sSortAscending': ': Activar para ordenar la columna de manera ascendente',
                            'sSortDescending': ': Activar para ordenar la columna de manera descendente'
                        }
                    },

            "processing": true,
            "serverSide": true,
            "ajax": {
            "url":"{{route('client.gettabla')}}",
            },            
            "columns": [
                {data: 'ruc'},
                {data: 'razonsocial'},
                {data: 'direccion'},
                {data: 'emailPrincipal'},
                {data: 'grupo'},
                {data: 'btnOperaciones'} 
                ],
            'columnDefs': [
                {
                    'targets': 0,
                    'className': 'text-center'
                }
                ]
        });      

        $('#datatable-clientes').on("click",".btn_eliminar",function(e)
        {         
            var btn1 = $(this),
             form=btn1.parents('.formEliminar'),
             url = form.attr('action'),
             id = url.split('/').pop();   
            e.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value)
            {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                        url: form.attr('action'),
                        data: {_method: 'DELETE', _token: $('meta[name="csrf-token"]').attr('content')
                   },
                        type:'POST'                 
                   }).done(function (r) {
                        dtable.ajax.reload( 
                            function ( json ) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                    )
                            },false);
                    }).fail(function (xhr) {
                        console.log(xhr);
                        Swal.fire(
                                'Ocurrio un error!',
                                'Your file not has been deleted.',
                                'error'
                                )
                    });                 
            }
            })    
        }); 

    });
    </script>
@endsection
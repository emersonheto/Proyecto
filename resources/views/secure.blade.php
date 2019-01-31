@extends('layouts.app')
@section('content')
  <main role="main">
         <section class="jumbotron bg-secure text-center mb-0 d-flex flex-row justify-content-center align-items-center">
            <div class="row pt-5 bg-secure">
               <div class="col-sm-12">
                  <h5 class="title-home">Seguridad</h5>
                  <div class="container"><img class="img-fluid shadow" width="60%" src="{{asset('img/features/secure/bg.jpg')}}">
                  </div>
               </div>
            </div>
         </section>

         <div class="container">
            <div class="d-flex flex-row justify-content-center align-items-center">
               <div class="mt-5">

                  <div class="row">

                     <div class="col-sm-12 text-center">
                        <h5 class="title-home">Estamos comprometidos con la seguridad de nuestros usuarios</h5>
                     </div>


                     <div style="margin-top: 100px;"></div>

                     <div class="col-sm-12 col-md-6 text-center my-auto">
                        <img class="img-fluid " src="{{asset('img/features/secure/key.jpg')}}">
                     </div>


                     <div class="col-sm-12 col-md-6 text-center">
                        <h5 class="title-home">Privacidad, autonomía y seguridad</h5>
                        <p class="pt-4 subtitle-home">Cada usuario registrado en nuestra plataforma tendrá acceso solamente a sus archivos. Con esto garantizamos que solamente tú puedes ver tus archivos.</p>
                        <p>En caso de que nuestro sistema reporte actividad sospechosa en tu cuenta deberemos intervenir para garantizar que <b>BuffaloSafe</b> sea un espacio seguro para todos nuestros usuarios.</p>
                     </div>
                  </div>
               </div>
            </div>


            <div class="row mt-5 pt-5 mb-5">
               <div class="col-sm-12 col-md-6 text-center my-auto">
                  <h5 class="title-home">Todo lo que necesitas en el mismo lugar</h5>
                  <p class="pt-4 subtitle-home">Nuestro diseño minimalista te permite encontrar todo fácilmente a tan sólo un clic. Interactúa con todos los elementos visuales con nuestra interfaz amigable.<b></b></p>
               </div>

               <div class="col-sm-12 col-md-6 text-center my-auto">
                  <img class="img-fluid" src=" {{ asset('img/admin.png') }} ">
               </div>
            </div>


         </div>
      </main>
@endsection
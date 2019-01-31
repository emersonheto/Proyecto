@extends('layouts.app')
@section('content')
<main role="main">
    <section class="jumbotron bg text-center mb-0">
        <div class="row pt-5 bg-home">
            <div class="col-sm-12 col-md-12 col-lg-6 pt-5 text-left">

                <div class="container">
                    <h5 class="title-home pt-5 ml-5">Almacena tus archivos <br> con más eficiencia y <b>seguridad</b></h5>
                    <p class="subtitle-home pt-4 ml-5">Obtén el espacio que necesitas. <br>Sube tus archivos y accede a
                        ellos <br> desde cualquier dispositivo cuando quieras.</p>
                    <a href="" class="btn btn-primary mt-4 ml-5">Pruébalo gratis 30 días</a>
                    <p class="mt-2 ml-5">O bien, <a href="">cómpralo ya mismo</a></p>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 d-none d-md-none d-lg-block shadow">
                <div class="container"><img class="w-100 img-home" src="{{asset('img/admin.png')}}">
                </div>
            </div>
        </div>
    </section>

    <div class="alert alert-light text-center alert-home" role="alert">
        Descubre todo el potencial que esta aplicación tiene para ti. Disponible 24/7.
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <p class="lead subtitle-home">Compara los planes y escoge el que más se adapte a lo que necesitas.</p>
    </div>

    <div class="container">
        <div class="d-flex flex-row  justify-content-center align-items-center">
            <div class="row mt-5 pt-2">
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Mensual</h4>
                        </div>
                        <div class="card-body text-left">
                            <h1 class="card-title pricing-card-title">$19 <small class="text-muted">/ mes</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li><i class="fas fa-dollar-sign"></i> <del>Descuento</del></li>
                                <li><i class="fas fa-user-circle"></i> Múltiples inicios de sesión</li>
                                <li><i class="far fa-hdd"></i> 20 GB de almacenamiento</li>
                                <li><i class="fas fa-headset"></i> Soporte técnico</li>
                                <li><i class="far fa-calendar-alt"></i> Acceso 24/7</li>
                                <li><i class="fas fa-cloud-upload-alt"></i> Subir cualquier tipo de archivos</li>
                            </ul>
                            <button type="button" class="btn btn-lg btn-block btn-outline-info">Seleccionar plan</button>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6 text-center">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Semestral</h4>
                        </div>
                        <div class="card-body text-left">
                            <h1 class="card-title pricing-card-title">$99 <small class="text-muted">/ mes</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li><i class="fas fa-dollar-sign"></i> Descuento de <b>$15</b></li>
                                <li><i class="fas fa-user-circle"></i> Múltiples inicios de sesión</li>
                                <li><i class="far fa-hdd"></i> 20 GB de almacenamiento</li>
                                <li><i class="fas fa-headset"></i> Soporte técnico</li>
                                <li><i class="far fa-calendar-alt"></i> Acceso 24/7</li>
                                <li><i class="fas fa-cloud-upload-alt"></i> Subir cualquier tipo de archivos</li>
                            </ul>
                            <button type="button" class="btn btn-lg btn-block btn-info">Seleccionar plan</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 text-center">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Anual</h4>
                        </div>
                        <div class="card-body text-left">
                            <h1 class="card-title pricing-card-title">$199 <small class="text-muted">/ mes</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li><i class="fas fa-dollar-sign"></i> Descuento de <b>$29</b></li>
                                <li><i class="fas fa-user-circle"></i> Múltiples inicios de sesión</li>
                                <li><i class="far fa-hdd"></i> 20 GB de almacenamiento</li>
                                <li><i class="fas fa-headset"></i> Soporte técnico</li>
                                <li><i class="far fa-calendar-alt"></i> Acceso 24/7</li>
                                <li><i class="fas fa-cloud-upload-alt"></i> Subir cualquier tipo de archivos</li>
                            </ul>
                            <button type="button" class="btn btn-lg btn-block btn-outline-info">Seleccionar plan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-5 pt-3 mb-5">
            <div class="col-lg-4 text-center">
                <img class="img-fluid" src="{{asset('img/features/dashboard.svg')}}" alt="Interfaz amigable" width="120">
                <h5 class="mt-5 feature-text">Interfaz amigable</h5>
            </div>

            <div class="col-lg-4 text-center">
                <img class="img-fluid" src="{{asset('img/features/secure.svg')}}" alt="Almacenamiento seguro" width="120">
                <h5 class="mt-5 feature-text">Almacenamiento seguro</h5>
            </div>

            <div class="col-lg-4 text-center">
                <img class="img-fluid" src="{{asset('img/features/support.svg')}}" alt="Soporte técnico" width="120">
                <h5 class="mt-5 feature-text">Soporte técnico</h5>
            </div>
        </div>


    </div>
</main>

@endsection

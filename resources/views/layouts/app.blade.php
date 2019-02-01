<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Proyecto') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top alert-home">
            <a class="navbar-brand" href="{{ route('home')}}">
                <img src="{{asset('img/logo.svg')}}" width="30" height="30" class="d-inline-block align-top" alt="">
                BuffaloSafe
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarBS" aria-controls="navbarBS"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarBS">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home')}}">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Características</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown06" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Más información</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown06">
                            <a class="dropdown-item" href=" {{ route('secure')}} ">Seguridad</a>
                            <a class="dropdown-item" href="{{ route('secure')}}">Clientes</a>
                            <a class="dropdown-item" href="{{ route('secure')}}">Preguntas frecuentes</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href=" {{ route('login') }} " class="btn btn-outline-primary">Ingresar</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    @yield('content')

    <div class="alert-home "></div>

    <footer class="container py-5">
        <div class="row">
            <div class="col-12 col-md">
                <img src="{{asset('img/logo.svg')}}" width="100">
                <small class="d-block mb-3 text-muted text-left">® BuffaloSafe</small>
            </div>

            <div class="col-sm-6 col-md-3">
                <h5>BuffaloSafe</h5>
                <p class="text-small text-muted">
                    Los pagos y el almacenamiento dentro de nuestra plataforma son totalmente seguros. Los archivos
                    estarán disponibles instantáneamente. Contamos con un servicio de almacenamiento 24/7
                </p>
            </div>

            <div class="col-sm-6 col-md-3 text-center">
                <h5>Más información</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Youtube</a></li>
                    <li><a class="text-muted" href="#">GitHub</a></li>
                    <li><a class="text-muted" href="#">Twitter</a></li>
                    <li><a class="text-muted" href="#">Café y Código</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-3 text-right">
                <h5>Medios de pago</h5>
                <img class="img-fluid" src="http://3.bp.blogspot.com/-oumQWdMsBL8/Vh94mt2nYLI/AAAAAAAAANQ/qPwSgz1YgJc/s400/Payment%2BCard%2BNetworks%2BLogo.jpg">
            </div>
    </footer>

    <!-- Optional JavaScript -->
    <!--         
         <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        -->
</body>

</html>

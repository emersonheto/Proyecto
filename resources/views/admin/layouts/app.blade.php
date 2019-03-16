<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Proyecto-Dashboard') }}</title>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Scripts -->
    <script src="{{ asset('js/dropzone.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <link href="{{ asset('css/admin.css')}}" rel="stylesheet">
    <link href="{{ asset('css/dropzone.css')}}" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>

<body>
    <header>
<!-- NAVBAR SUPERIOR-->
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top alert-home">
        <a class="navbar-brand" href="{{ route('clients.index') }}">
            <img src="{{asset('img/solu.jpg')}}" width="30" height="30" class="d-inline-block align-top" alt="">
            {{-- <img src="{{asset('img/logo.svg')}}" width="30" height="30" class="d-inline-block align-top" alt=""> --}}
            <b class="text-primary">SOLUGRIFOS</b> <small><b> - Plan</b>  <b class="text-success">VERDE</b></small>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarBS" aria-controls="navbarBS"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarBS">
            <ul class="navbar-nav ml-auto">
                {{-- <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home')}}">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Características</a>
                </li> --}}
                <li class="nav-item" style="margin: 0 10px 0 10px;" >
                    <div class="dropdown">
                        <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-th" ></i>
                        </button>

                        <div class="dropdown-menu dropdown-menu-right text-center" style=" min-width: 20rem; padding: 0.5rem 0;">
                            <form class="px-4 py-3">
                                    <style>
                                    .list-perf:hover{
                                        background-color: #eaeaea;
                                    }
                                    </style>
                            <div class="row">
                                <div class="col-md-4 ">
                                    <div class="list-perf card border-light mb-3" style="max-width: 18rem;">
                                        <a href="#" class="btn" title="Perfil" data-toggle="tooltip" data-placement="bottom">
                                            <img src="{{asset('img/user_perfil.svg')}}" class="card-img-top">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="list-perf card border-light mb-3" style="max-width: 18rem;">
                                        <a href="{{ route('file.documents') }}" class="btn" title="Documentos" data-toggle="tooltip" data-placement="bottom">
                                            <img src="{{asset('img/documents.svg')}}" class="card-img-top">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="list-perf card border-light mb-3" style="max-width: 18rem;">
                                        <a href="{{ route('role.index') }}" class="btn" title="Asignar Roles" data-toggle="tooltip" data-placement="bottom">
                                            <img src="{{asset('img/lock.svg')}}" class="card-img-top">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="list-perf card border-light mb-3" style="max-width: 18rem;">
                                        <a href="{{ route('permission.index') }}" class="btn" title="Asignar permisos" data-toggle="tooltip" data-placement="bottom">
                                            <img src="{{asset('img/fingerprint.svg')}}" class="card-img-top">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="list-perf card border-light mb-3" style="max-width: 18rem;">
                                        <a href="{{ route('user.index') }}" class="btn" title="Usuarios" data-toggle="tooltip" data-placement="bottom">
                                            <img src="{{asset('img/users.svg')}}" class="card-img-top">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="list-perf card border-light mb-3" style="max-width: 18rem;">
                                        <a href="{{ route('clients.index') }}" class="btn" title="Clientes" data-toggle="tooltip" data-placement="bottom">
                                            <img src="{{asset('img/client.svg')}}" class="card-img-top">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="list-perf card border-light mb-3" style="max-width: 18rem;">
                                        <a href="google.com" class="btn" title="Soporte" data-toggle="tooltip" data-placement="bottom">
                                            <img src="{{asset('img/help.svg')}}" class="card-img-top">
                                        </a>
                                    </div>
                                </div>   
                            </div>
                            {{-- <form class="px-4 py-3">
                                <div class="form-group">
                                <label for="exampleDropdownFormEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
                                </div>
                                <div class="form-group">
                                <label for="exampleDropdownFormPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
                                </div>
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="dropdownCheck">
                                <label class="form-check-label" for="dropdownCheck">
                                    Remember me
                                </label>
                                </div>
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </form> --}}
                                </form>
                            <div class="dropdown-divider"></div>
                            {{-- <div class="profile-usertitle">
                                    <div class="profile-usertitle-name text-center"> {{ Auth::User()->name }} </div>
                                    <div class="profile-usertitle-status text-center">{{ Auth::User()->email }}</div>
                                    <div class="profile-usertitle-status text-center">{{ Auth::User()->rol }}</div>
                                </div> --}}
                            <div class="row">
                                
                                    <div class="col-md-2">
                                        <!-- <img src=" {{asset('img')}}/{{Auth::User()->image}}" class="img-responsive" style="border-radius: 50%;"
                                            alt="" width="70%"> -->
                                    </div>

                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class=" profile-usertitle-name font-weight-bold text-center"> {{ Auth::User()->name }}</label>

                                            </div>
                                            <div class="col-md-12">
                                                <label class=" profile-usertitle-status text-center">{{ Auth::User()->email }}</label>

                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="dropdown-divider"></div>

                            @guest
                                <a href=" {{ route('login')}} " class="btn btn-sm btn-outline-primary">Ingresar</a>
                            @else
                                <a href=" {{route('logout')}} " class="logout btn btn-sm btn-danger" style="color: white"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="color: red">
                                    <i class="fas fa-power-off">
                                    </i> Cerrar sesión
                                </a>
                            @endguest
                    </div>
                </li>
            </ul>
        </div>
    </nav>  
    </header>
    <!-- AGREGAMOS EL SIDEBAR -->
    <div class="wrapper">

        


        <!-- aqui va el menu-->


        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light" style="margin-top: 70px; background-color:#e9ecef">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn" style="background: #e9ecef;">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                     @yield('combo')
                    <div id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                    <h1> @yield('page') </h1>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            {{-- INCLUIMOS LAS ALERTAS EN EL PROYECTO --}}
            @include('admin.partials.alert')
            @include('admin.partials.error')
            <!-- TERMINA EL SIDEBAR -->
            @yield('content')

        </div>
    </div>

    <script src="{{ asset('js/slim.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $("#sidebar").toggleClass('active');
                $(this).toggleClass('active');
            });

            $("#dropdownMenuButton").trigger("click")

            // $('#sidebarCollapse').on('click', function () {
            //     $("#sidebar").toggleClass('active');
            //     $(this).toggleClass('active');
            // });
        });

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        $(document).on("click","#left ul.nav li.parent > a > span.sign", function(){          
        $(this).find('i:first').toggleClass("icon-minus");      
    }); 
    
    // Open Le current menu
    $("#left ul.nav li.parent.active > a > span.sign").find('i:first').addClass("icon-minus");
    $("#left ul.nav li.current").parents('ul.children').addClass("in");
    </script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" defer></script>

    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    @yield('scripts')
</body>

</html>

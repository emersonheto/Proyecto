<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Proyecto-Dashboard') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/dropzone.js') }}" defer></script>

    <!-- ICONOS  ya agegados 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    -->
    <!-- Styles -->
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <link href="{{ asset('css/admin.css')}}" rel="stylesheet">
    <link href="{{ asset('css/dropzone.css')}}" rel="stylesheet">

    <link href="{{ asset('css/jquery.dataTables.min.css')}}" rel="stylesheet">

    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet"/> --}}
    {{-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"/> --}}


    
    
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/> --}}
 

</head>

<body>
    <!-- AGREGAMOS EL SIDEBAR -->
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <a class="navbar-brand ml-4 pt-4" href="#">
                <img src=" {{ asset('img/logo-white.svg') }} " width="30" height="30" class="d-inline-block align-top"
                    alt="">
                BuffaloSafe
            </a>

            <div class="container mt-4 mb-2">
                <div class="mb-2  ml-5">
                    <img src=" {{asset('img')}}/{{Auth::User()->image}}" class="img-responsive" style="border-radius: 50%;"
                        alt="" width="90">
                </div>
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name text-center"> {{ Auth::User()->name }} </div>
                    <div class="profile-usertitle-status text-center">{{ Auth::User()->email }}</div>
                </div>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#"><i class="fas fa-chart-line"></i> Panel</a>
                </li>

                <li>
                    <a href="#profileSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                            class="fas fa-user-circle"></i> Mi perfil</a>
                    <ul class="collapse list-unstyled" id="profileSubmenu">
                        <li>
                            <a href="#">Ver mi perfil</a>
                        </li>
                        <li>
                            <a href="#">Actualizar perfil</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#filesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                            class="fas fa-file-upload"></i> Mis archivos</a>
                    <ul class="collapse list-unstyled" id="filesSubmenu">
                        <li>
                            <a href=" {{ route('file.create') }} ">Agregar archivo</a>
                        </li>
                        <li>
                            <a href="{{ route('file.images') }} ">Imágenes</a>
                        </li>
                        <li>
                            <a href="{{ route('file.videos') }} ">Videos</a>
                        </li>
                        <li>
                            <a href="{{ route('file.audios') }} ">Audios</a>
                        </li>
                        <li>

                            <a href="{{ route('file.documents') }} ">Documentos</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#rolesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                            class="fas fa-unlock-alt"></i> Roles</a>
                    <ul class="collapse list-unstyled" id="rolesSubmenu">
                        <li>
                            <a href="{{route('role.index')}}">Ver todos</a>
                        </li>
                        <li>
                            <a href="{{route('role.create')}}">Agregar rol</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#permissionSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-fingerprint"></i> Permisos</a>
                    <ul class="collapse list-unstyled" id="permissionSubmenu">
                        <li>
                            <a href="{{ route('permission.index') }}">Ver todos</a>
                        </li>
                        <li>
                            <a href="{{ route('permission.create') }}">Agregar permiso</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-users"></i> Usuarios
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="{{ route('user.index') }}">Ver todos</a>
                        </li>
                        <li>
                            <a href="{{ route('user.create') }}">Agregar usuarios</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#clienteSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                            class="fas fa-users"></i> Clientes</a>
                    <ul class="collapse list-unstyled" id="clienteSubmenu">
                        <li>
                            <a id='' href="{{ route('user.index') }}">Cliente</a>
                        </li>
                        <li>
                            <a id='' href="{{ route('user.create') }}">Estacion de servicio</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="far fa-question-circle"></i> Soporte</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href=" {{route('logout')}}" class="logout btn btn-outline-danger" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off"></i> Cerrar sesión
                    </a>
                </li>
            </ul>
        </nav>
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                    <div id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                {{-- lo hacemos dinamico con page --}}
                                <a> @yield('page') </a>
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

            $('#sidebarCollapse').on('click', function () {
                $("#sidebar").toggleClass('active');
                $(this).toggleClass('active');
            });


        });

    </script>

 <script src="{{ asset('js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script> 

{{-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  --}}


    @yield('scripts')
{{-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script>




</body>

</html>

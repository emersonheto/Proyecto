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

    {{-- <link href="{{ asset('css/jquery.dataTables.min.css')}}" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


</head>

<body>
    <!-- AGREGAMOS EL SIDEBAR -->
    <div class="wrapper">

        <!-- NAVBAR SUPERIOR-->
          <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top alert-home">
                    <a class="navbar-brand" href="{{ route('home')}}">
                        <img src="{{asset('img/logo.svg')}}" width="30" height="30" class="d-inline-block align-top" alt="">
                        Gasocentro
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
                            <li class="nav-item" style="margin: 0 10px 0 10px;" >
                                <div class="dropdown">
                                    <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-th" ></i>
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-right text-center" style=" min-width: 20rem; padding: 0.5rem 0;">
                                            <form class="px-4 py-3">
                                        <div class="row">

                                                <div class="col-md-4 ">
                                                    <div class="product-panel-2"  style="cursor: pointer" onclick="">
                                                        <button class="btn btn-xs btn-primary" title="Mi Perfil"  style="
                                                        border-radius: 35px;
                                                        font-size: 24px;
                                                        line-height: 1.33;">
                                                            <i class="fas fa-user-circle"></i>
                                                        </button>
                                                    </div>
                                                </div> 
                                                <div class="col-md-4 ">
                                                        <div class="product-panel-2"  style="cursor: pointer" onclick="">
                                                            <button class="btn btn-xs btn-success" title="Mis Archivos" style="
                                                                border-radius: 35px;
                                                                font-size: 24px;
                                                                line-height: 1.33;">
                                                                <i class="fas fa-file-upload"></i>
                                                            </button>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-4 ">
                                                        <div class="product-panel-2"  style="cursor: pointer" onclick="">
                                                            <button class="btn btn-xs btn-danger" title="Asignar Roles"  style="
                                                            border-radius: 35px;
                                                            font-size: 24px;
                                                            line-height: 1.33;">
                                                            <i class="fas fa-unlock-alt"></i>
                                                            </button>
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
                                            
                                                <div class="col-md-4">
                                                    <img src=" {{asset('img')}}/{{Auth::User()->image}}" class="img-responsive" style="border-radius: 50%;"
                                                        alt="" width="70%">
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
                    {{-- <div class="profile-usertitle-status text-center">{{ Auth::User()->rol }}</div> --}}
                </div>
            </div>
         


            <ul class="list-unstyled components">
          
                <li class="active">
                    <a href="#"><i class="fas fa-chart-line"></i> Panel</a>
                </li>

                @if(Auth::user()->hasRole('Admin'))
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
                 @endif
               
                
                
                <li>
                    <a href="#filesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                            class="fas fa-file-upload"></i> Mis archivos</a>
                    <ul class="collapse list-unstyled" id="filesSubmenu">
                            @if(Auth::user()->hasRole('Admin'))
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
                            @endif 
                        <li>

                            <a href="{{ route('file.documents') }} ">Documentos</a>
                        </li>
                    </ul>
                </li>
                @if(Auth::user()->hasRole('Admin'))
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
                @endif 
                @if(Auth::user()->hasRole('Admin'))
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
                @endif 
                @if(Auth::user()->hasRole('Admin'))
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
                        <a href="{{ route('clients.index') }}"  ><i
                        class="fas fa-users"></i> Clientes</a>
                       
                    </li>
                @endif 

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

            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-top: 70px;">
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
                                <h2> @yield('page') </h2>
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

            // $('#sidebarCollapse').on('click', function () {
            //     $("#sidebar").toggleClass('active');
            //     $(this).toggleClass('active');
            // });

        });

    </script>
    {{-- <script src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script> --}}
        
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" defer></script>
    {{-- <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" defer></script> integracion al bootstrap--}}

    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    @yield('scripts')
</body>

</html>

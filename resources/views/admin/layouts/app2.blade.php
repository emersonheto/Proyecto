<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- @dd($list); --}}
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
                                    <style>
                                    .list-perf:hover{
                                        background-color: #eaeaea;
                                    }
                                    </style>
                            <div class="row">
                                <div class="col-md-4 ">
                                    <div class="list-perf card border-light mb-3" style="max-width: 18rem;">
                                        <a href="#" class="btn" title="Perfil">
                                            <img src="{{asset('img/user_perfil.svg')}}" class="card-img-top">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="list-perf card border-light mb-3" style="max-width: 18rem;">
                                        <a href="{{ route('file.documents') }}" class="btn" title="Documentos">
                                            <img src="{{asset('img/documents.svg')}}" class="card-img-top">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="list-perf card border-light mb-3" style="max-width: 18rem;">
                                        <a href="{{ route('role.index') }}" class="btn" title="Asignar Roles">
                                            <img src="{{asset('img/lock.svg')}}" class="card-img-top">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="list-perf card border-light mb-3" style="max-width: 18rem;">
                                        <a href="{{ route('permission.index') }}" class="btn" title="Asignar permisos">
                                            <img src="{{asset('img/fingerprint.svg')}}" class="card-img-top">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="list-perf card border-light mb-3" style="max-width: 18rem;">
                                        <a href="{{ route('user.index') }}" class="btn" title="Usuarios">
                                            <img src="{{asset('img/users.svg')}}" class="card-img-top">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="list-perf card border-light mb-3" style="max-width: 18rem;">
                                        <a href="{{ route('clients.index') }}" class="btn" title="Clientes">
                                            <img src="{{asset('img/client.svg')}}" class="card-img-top">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="list-perf card border-light mb-3" style="max-width: 18rem;">
                                        <a href="google.com" class="btn" title="Soporte">
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
    </header>
    <!-- AGREGAMOS EL SIDEBAR -->
    <div class="wrapper">

      


        <!-- Sidebar Holder -->
       <nav id="sidebar" style="background-color:#eaeaea;">
        <style>
            #sidebar ul li a {
                padding: 1px;
                font-size: 1rem;
                display: block;
            }
            .file-box {
            float: left;
            width: 220px;
            }
            .file-manager h5 {
            text-transform: uppercase;
            }
            .file-manager {
            list-style: none outside none;
            margin: 0;
            padding: 0;
            }
            .folder-list li a {
            color: #666666;
            display: block;
            padding: 5px 0;
            }
            .folder-list li {
            border-bottom: 1px solid #e7eaec;
            display: block;
            }
            .folder-list li i {
            margin-right: 8px;
            color: #3d4d5d;
            }
            .category-list li a {
            color: #666666;
            display: block;
            padding: 5px 0;
            }
            .category-list li {
            display: block;
            }
            .category-list li i {
            margin-right: 8px;
            color: #3d4d5d;
            }
            .category-list li a .text-navy {
            color: #1ab394;
            }
            .category-list li a .text-primary {
            color: #1c84c6;
            }
            .category-list li a .text-info {
            color: #23c6c8;
            }
            .category-list li a .text-danger {
            color: #EF5352;
            }
            .category-list li a .text-warning {
            color: #F8AC59;
            }
            .file-manager h5.tag-title {
            margin-top: 20px;
            }
            .tag-list li {
            float: left;
            }
            .tag-list li a {
            font-size: 10px;
            background-color: #f3f3f4;
            padding: 5px 12px;
            color: inherit;
            border-radius: 2px;
            border: 1px solid #e7eaec;
            margin-right: 5px;
            margin-top: 5px;
            display: block;
            font-weight: normal;
            }
            .file {
            border: 1px solid #e7eaec;
            padding: 0;
            background-color: #ffffff;
            position: relative;
            margin-bottom: 20px;
            margin-right: 20px;
            }
            .file-manager .hr-line-dashed {
            margin: 15px 0;
            }
            .file .icon,
            .file .image {
            height: 100px;
            overflow: hidden;
            }
            .file .icon {
            padding: 15px 10px;
            text-align: center;
            }
            .file-control {
            color: inherit;
            font-size: 11px;
            margin-right: 10px;
            }
            .file-control.active {
            text-decoration: underline;
            }
            .file .icon i {
            font-size: 70px;
            color: #dadada;
            }
            .file .file-name {
            padding: 10px;
            background-color: #f8f8f8;
            border-top: 1px solid #e7eaec;
            }
            .file-name small {
            color: #676a6c;
            }
            ul.tag-list li {
            list-style: none;
            }
            .corner {
            position: absolute;
            display: inline-block;
            width: 0;
            height: 0;
            line-height: 0;
            border: 0.6em solid transparent;
            border-right: 0.6em solid #f1f1f1;
            border-bottom: 0.6em solid #f1f1f1;
            right: 0em;
            bottom: 0em;
            }
            a.compose-mail {
            padding: 8px 10px;
            }
            .mail-search {
            max-width: 300px;
            }
            .ibox {
            clear: both;
            margin-bottom: 25px;
            margin-top: 0;
            padding: 0;
            }
            .ibox.collapsed .ibox-content {
            display: none;
            }
            .ibox.collapsed .fa.fa-chevron-up:before {
            content: "\f078";
            }
            .ibox.collapsed .fa.fa-chevron-down:before {
            content: "\f077";
            }
            .ibox:after,
            .ibox:before {
            display: table;
            }
            .ibox-title {
            -moz-border-bottom-colors: none;
            -moz-border-left-colors: none;
            -moz-border-right-colors: none;
            -moz-border-top-colors: none;
            background-color: #ffffff;
            border-color: #e7eaec;
            border-image: none;
            border-style: solid solid none;
            border-width: 3px 0 0;
            color: inherit;
            margin-bottom: 0;
            padding: 14px 15px 7px;
            min-height: 48px;
            }
            .ibox-content {
            background-color: #eaeaea;
            color: inherit;
            padding: 15px 20px 20px 20px;
            border-color: #e7eaec;
            border-image: none;
            border-style: solid solid none;
            border-width: 1px 0;
            margin-top: 90px;
            }
            .ibox-footer {
            color: inherit;
            border-top: 1px solid #e7eaec;
            font-size: 90%;
            background: #ffffff;
            padding: 10px 15px;
            }
            a:hover{
            text-decoration:none;    
            }
        </style>

            <div class="container">

                    
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                    
                      <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Dropdown button
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                          </div>
                                    <div class="file-manager font-weight-bold" style="color:#343a40;">
                                        <h5 class="font-weight-bold">Categorias:</h5>
                                        <a href="#" class="file-control active">Ale</a>
                                        <a href="#" class="file-control">Documents</a>
                                        <a href="#" class="file-control">Audio</a>
                                        <a href="#" class="file-control">Images</a>
                                        <div class="hr-line-dashed"></div>
                                        <button class="btn btn-primary btn-block">Subir Archivo</button>
                                        <div class="hr-line-dashed"></div>
                                        <h5>Folders</h5>
                                        <ul class="folder-list" style="padding: 0">
                                            <li><a href=""><i class="fa fa-folder"></i> Gestion Ambiental</a></li>
                                            <li><a href=""><i class="fa fa-folder"></i> Seguridad</a></li>
                                            <li><a href=""><i class="fa fa-folder"></i> Operatividad</a></li>
                                            <li><a href=""><i class="fa fa-folder"></i> Normativas</a></li>
                                            <li><a href=""><i class="fa fa-folder"></i> Otros</a></li>
                                        </ul>
                                        <h5 class="tag-title">Etiquetas</h5>
                                        <ul class="tag-list" style="padding: 0">
                                            <li><a href="">Family</a></li>
                                            <li><a href="">Work</a></li>
                                            <li><a href="">Home</a></li>
                                            <li><a href="">Children</a></li>
                                            <li><a href="">Holidays</a></li>
                                            <li><a href="">Music</a></li>
                                            <li><a href="">Photography</a></li>
                                            <li><a href="">Film</a></li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                
            {{--  <a class="navbar-brand ml-4 pt-4" href="#">
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
                        <a href="{{ route('clients.index') }}">
                            <i class="fas fa-users"></i> Clientes
                        </a>
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
            </ul>--}}
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

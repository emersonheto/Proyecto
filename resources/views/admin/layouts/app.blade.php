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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/admin.css')}}" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
        		<a class="navbar-brand ml-4" href="#">
               <img src=" {{ asset('img/logo-white.svg') }} " width="30" height="30" class="d-inline-block align-top" alt="">
            BuffaloSafe
            </a>

					<div class="container mt-4 mb-2">
						<div class="mb-2">
						<img src=" {{asset('img/users/user.jpg')}} " class="img-responsive" style="border-radius: 50%;" alt="" width="70">
					</div>
					<div class="profile-usertitle">
						<div class="profile-usertitle-name">Brayan Angarita</div>
						<div class="profile-usertitle-status">admin@admin.com</div>
					</div>
					</div>


            <ul class="list-unstyled components">
            	<li class="active">
                    <a href="#"><i class="fas fa-chart-line"></i> Panel</a>
                </li>

                <li>
                    <a href="#profileSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-user-circle"></i> Mi perfil</a>
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
                    <a href="#filesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-file-upload"></i> Mis archivos</a>
                    <ul class="collapse list-unstyled" id="filesSubmenu">
                        <li>
                            <a href="#">Imágenes</a>
                        </li>
                        <li>
                            <a href="#">Videos</a>
                        </li>
                        <li>
                            <a href="#">Documentos</a>
                        </li>
                        <li>
                            <a href="#">ZIP</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#rolesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-unlock-alt"></i> Roles</a>
                    <ul class="collapse list-unstyled" id="rolesSubmenu">
                        <li>
                            <a href="#">Ver todos</a>
                        </li>
                        <li>
                            <a href="#">Agregar rol</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#permissionSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-fingerprint"></i> Permisos</a>
                    <ul class="collapse list-unstyled" id="permissionSubmenu">
                        <li>
                            <a href="#">Ver todos</a>
                        </li>
                        <li>
                            <a href="#">Agregar permiso</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-users"></i> Usuarios</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Ver todos</a>
                        </li>
                        <li>
                            <a href="#">Agregar rol</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="far fa-question-circle"></i> Soporte</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="#" class="logout"><i class="fas fa-power-off"></i> Cerrar sesión</a>
                </li>
            </ul>
        </nav>

        
    </div>

    @yield('content')
<script type="text/javascript">
    $(document).ready(function(){
        $('#sidebarCollapse').on('click',function(){
            $("#sidebar").toggleClass('active');
            $(this).toggleClass('active');
        });
    });
</script>
    @yield('scripts')


 

</body>

</html>

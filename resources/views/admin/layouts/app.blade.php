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
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>

<body>
    
    <header>
<!-- NAVBAR SUPERIOR-->
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top alert-home">
        <a class="navbar-brand" href="{{ route('clients.index') }}">
            <img src="{{asset('img/solu.jpg')}}" width="30" height="30" class="d-inline-block align-top" alt="">
            <b class="text-primary">SOLUGRIFOS</b> <small><b> - Plan</b>  <b class="text-success">VERDE</b></small>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarBS" aria-controls="navbarBS"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarBS">
            <ul class="navbar-nav ml-auto">
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
                        </form>
                            <div class="dropdown-divider"></div>
                            
                            <div class="row">
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

        
        <nav id="sidebar" style="background-color:#e9ecef;">
            {{-- Estilos de arbolito menu --}}
            <style>
                #treeMenu .tree {
                padding: 5px 0;
                font-size: 13px;
                }

                #treeMenu .tree::after {
                content: '';
                display: block;
                clear: left;
                }

                #treeMenu .tree div {
                clear: left;
                }

                #treeMenu input[type="checkbox"] {
                position: absolute;
                left: -9999px;
                }

                #treeMenu label, #treeMenu a {
                display: block;
                float: left;
                clear: left;
                position: relative;
                margin-left: 25px;
                padding: 5px;
                border-radius: 5px;
                color: #5c5d5e;
                text-decoration: none;
                cursor: pointer;
                }

                #treeMenu>.tree>div>.sub>div>label, #treeMenu>.tree>div>.sub>div>input {
                    padding: 1px;
                }

                #treeMenu label::before, #treeMenu a::before {
                display: block;
                position: absolute;
                /* top: 6px; */
                left: -25px;
                font-family: 'FontAwesome';
                }

                #treeMenu label::before {
                    content:"\f114"; /* closed folder &#xf003; */
                }

                #treeMenu input:checked + label::before {
                    content:"\f115";
                    font-family: FontAwesome;
                    font-style: normal;
                    font-weight: normal;
                    text-decoration: inherit
                }

                #treeMenu a.sub::before {
                content: '\f068';
                }

                #treeMenu input:focus + label, #treeMenu a:focus {
                outline: none;
                background-color: #b9c3c9;
                }

                #treeMenu .sub {
                display: none;
                float: left;
                margin-left: 15px;
                }

                #treeMenu input:checked ~ .sub {
                display: block;
                }

                #treeMenu input[type="reset"] {
                display: block;
                width: 100%;
                padding: 10px;
                border: none;
                border-radius: 10px;
                color: #e8ebed;
                background-color: #6b7c87;
                font-family: inherit;
                font-size: .9em;
                cursor: pointer;
                -webkit-appearance: none;
                -moz-appearance: none;
                }

                #treeMenu input[type="reset"]:focus {
                outline: none;
                box-shadow: 0 0 0 4px #b9c3c9;
                }
            </style>
            {{-- //Estilos de arbolito menu --}}
                <div class="container" style="margin-top: 100px;">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="file-manager font-weight-bold" style="color:#343a40;">
                                <div class="hr-line-dashed"></div>
                                {{-- modal crear carpeta  --}}
                                <button class="btn btn-outline-primary btn-block" onclick="CrearCarpet();"><i class="fa fa-plus"></i> <b>Subir Archivo</b></button>
                                    <script>
                                        function CrearCarpet(){
                                            Swal.fire({
                                            title: 'Crear Carpeta',
                                            input: 'text',
                                            inputPlaceholder: 'Nombre de carpeta',
                                            confirmButtonColor: '#3085d6',
                                            showCancelButton: true,
                                            confirmButtonText: 'Crear'
                                            })
                                            
                                        }
                                    </script>
                                {{-- //modal crear carpeta  --}}

                                <div class="hr-line-dashed"></div>
                                <br>
                                <h5>Categorias</h5>
                                {{-- Arbolito --}}
                                <form id="treeMenu">
                                    <div class="tree">
                                      <div class="">
                                        <input id="n-0" type="checkbox">
                                        <label for="n-0">Gestión Ambiental</label>
                                        <div class="sub">
                                            <div class="">
                                                <input id="n-0-1" type="checkbox">
                                                <label for="n-0-1">Informe de Monitoreo</label>
                                                <div class="sub">
                                                    {{-- ARCHIVOS SI SE MUESTRAN --}}
                                                </div>
                                            </div>
                                            <div class="">
                                                <input id="n-0-2" type="checkbox">
                                                <label for="n-0-2">Informe Ambiental Anual</label>
                                                <div class="sub">
                                                    {{-- ARCHIVOS SI SE MUESTRAN --}}
                                                </div>
                                            </div>
                                            <div class="">
                                                <input id="n-0-3" type="checkbox">
                                                <label for="n-0-3">Declaración de RRSS</label>
                                                <div class="sub">
                                                    {{-- ARCHIVOS SI SE MUESTRAN --}}
                                                </div>
                                            </div>
                                            <div class="">
                                                <input id="n-0-4" type="checkbox">
                                                <label for="n-0-4">Manifiestos de manejo de RRSS</label>
                                                <div class="sub">
                                                    {{-- ARCHIVOS SI SE MUESTRAN --}}
                                                </div>
                                            </div>
                                            <div class="">
                                                <input id="n-0-5" type="checkbox">
                                                <label for="n-0-5">Registro de generación de RRSS</label>
                                                <div class="sub">
                                                    {{-- ARCHIVOS SI SE MUESTRAN --}}
                                                </div>
                                            </div>
                                            <div class="">
                                                <input id="n-0-6" type="checkbox">
                                                <label for="n-0-6">Registro de Incidentes de Fugas y Derrames</label>
                                                <div class="sub">
                                                    {{-- ARCHIVOS SI SE MUESTRAN --}}
                                                </div>
                                            </div>
                                            <div class="">
                                                <input id="n-0-7" type="checkbox">
                                                <label for="n-0-7">Instrumentos de Gestión Ambiental</label>
                                                <div class="sub">
                                                    {{-- ARCHIVOS SI SE MUESTRAN --}}
                                                </div>
                                            </div>
                                            <div class="">
                                                <input id="n-0-8" type="checkbox">
                                                <label for="n-0-8">Certificados de Capacitación</label>
                                                <div class="sub">
                                                    <div class="">
                                                        <input id="n-0-8-1" type="checkbox">
                                                        <label for="n-0-8-1">Tema A</label>
                                                        <div class="sub">
                                                            {{-- ARCHIVOS SI SE MUESTRAN --}}
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <input id="n-0-8-2" type="checkbox">
                                                        <label for="n-0-8-2">Tema B</label>
                                                        <div class="sub">
                                                            {{-- ARCHIVOS SI SE MUESTRAN --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                      <div>
                                        <input id="n-1" type="checkbox">
                                        <label for="n-1">Segur. Salud en el Trabajo</label>
                                        <div class="sub">
                                            <div>
                                                <input id="n-1-1" type="checkbox">
                                                <label for="n-1-1">Sistema de SST</label>
                                                <div class="sub">
                                                    <div class="">
                                                        <input id="n-0-1-1" type="checkbox">
                                                        <label for="n-0-1-1">Plan anual</label>
                                                        <div class="sub">
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <input id="n-0-1-2" type="checkbox">
                                                        <label for="n-0-1-2">Programa anual</label>
                                                        <div class="sub">
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <input id="n-0-1-3" type="checkbox">
                                                        <label for="n-0-1-3">Mapa de riesgos</label>
                                                        <div class="sub">
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <input id="n-0-1-4" type="checkbox">
                                                        <label for="n-0-1-4">IPER-C</label>
                                                        <div class="sub">
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <input id="n-0-1-5" type="checkbox">
                                                        <label for="n-0-1-5">Política</label>
                                                        <div class="sub">
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <input id="n-0-1-6" type="checkbox">
                                                        <label for="n-0-1-6">Objetivos y metas</label>
                                                        <div class="sub">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <input id="n-1-2" type="checkbox">
                                                <label for="n-1-2">Certificados de Capacitación</label>
                                                <div class="sub">
                                                </div>
                                            </div>
                                            <div>
                                                <input id="n-1-3" type="checkbox">
                                                <label for="n-1-3">Registros</label>
                                                <div class="sub">
                                                </div>
                                            </div>
                                            <div>
                                                <input id="n-1-4" type="checkbox">
                                                <label for="n-1-4">Formato de Charlas</label>
                                                <div class="sub">
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                      <div>
                                        <input id="n-2" type="checkbox">
                                        <label for="n-2">Operatividad</label>
                                        <div class="sub">
                                            <div>
                                                <input id="n-2-1" type="checkbox">
                                                <label for="n-2-1">Informe PDJ</label>
                                                <div class="sub">
                                                </div>
                                            </div>
                                            <div>
                                                <input id="n-2-2" type="checkbox">
                                                <label for="n-2-2">Instalaciones eléctricas</label>
                                                <div class="sub">
                                                </div>
                                            </div>
                                            <div>
                                                <input id="n-2-3" type="checkbox">
                                                <label for="n-2-3">Parada de emergencia</label>
                                                <div class="sub">
                                                </div>
                                            </div>
                                            <div>
                                                <input id="n-2-4" type="checkbox">
                                                <label for="n-2-4">Pozos a Tierra</label>
                                                <div class="sub">
                                                </div>
                                            </div>
                                            <div>
                                                <input id="n-2-5" type="checkbox">
                                                <label for="n-2-5">Detectores de Humo</label>
                                                <div class="sub">
                                                </div>
                                            </div>
                                            <div>
                                                <input id="n-2-6" type="checkbox">
                                                <label for="n-2-6">Luces de Emergencia</label>
                                                <div class="sub">
                                                </div>
                                                </div>
                                            <div>
                                                <input id="n-2-7" type="checkbox">
                                                <label for="n-2-7">Sensores de Fuga de GLP</label>
                                                <div class="sub">
                                                </div>
                                            </div>
                                            <div>
                                                <input id="n-2-8" type="checkbox">
                                                <label for="n-2-8">Protección Catódica</label>
                                                <div class="sub">
                                                </div>
                                                </div>
                                            <div>
                                                <input id="n-2-9" type="checkbox">
                                                <label for="n-2-9">Certificados de Entrenamiento</label>
                                                <div class="sub">
                                                </div>
                                                </div>
                                            <div>
                                                <input id="n-2-10" type="checkbox">
                                                <label for="n-2-10">Informe de levantamiento técnico</label>
                                                <div class="sub">
                                                </div>
                                            </div>
                                            <div>
                                                <input id="n-2-11" type="checkbox">
                                                <label for="n-2-11">Procedimiento de Limpieza y Mantenimiento de Tanques</label>
                                                <div class="sub">
                                                </div>
                                            </div>
                                            <div>
                                                <input id="n-2-12" type="checkbox">
                                                <label for="n-2-12">Constancia de Asesor de Prevención de Riesgos</label>
                                                <div class="sub">
                                                </div>
                                            </div>
                                        
                                        </div>
                                      </div>
                                      <div>
                                        <input id="n-3" type="checkbox">
                                        <label for="n-3">OTROS</label>
                                        <div class="sub">
                                          {{-- <a href="#link">Healing Salve</a>
                                          <a href="#link">Serra Angel</a> --}}
                                        </div>
                                      </div>
                                      <div>
                                        <input id="n-4" type="checkbox">
                                        <label for="n-4">Reporte Mensual</label>
                                        <div class="sub">
                                          <div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <input type="reset" value="Cerrar todo">
                                  </form>
                                {{-- //fin arbolito --}}

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav> 


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

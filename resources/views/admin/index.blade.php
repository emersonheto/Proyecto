@extends('admin.layouts.app')
@section('page','Panel Administrativo')
    
@section('content')
<!-- Page Content Holder  ESTO ESTA DENTRO DEL wrapper-->
<div class="panel panel-container container shadow-sm" style="padding: 0 20px 0 20px;">
        <div class="row">
            <div class="col-sm-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-widget border-right">
                    <div class="row no-padding"><i class="fas fa-eye"></i>
                        <div class="large">120</div>
                        <div class="dashboard-small"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 no-padding ">
                <div class="panel panel-widget border-right">
                    <div class="row no-padding"><i class="fas fa-file-upload"></i></em>
                        <div class="large">96</div>
                        <div class="dashboard-small">Archivos</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 no-padding">
                <div class="panel  panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
                        <div class="large">13</div>
                        <div class="dashboard-small">Usuarios</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 no-padding">
                <div class="panel  panel-widget ">
                    <div class="row no-padding"><em class="fa fa-xl fa-search color-red"></em>
                        <div class="large">25.2k</div>
                        <div class="dashboard-small">Páginas vistas</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div class="row justify-content-center mt-5">
    <div class="col-md-3">
        <div class="card mx-auto text-center panel-container" style="width:100%">
            <h1>Perfil</h1>
            <img class="card-img-top align-self-center" src="{{asset('img/user_perfil.svg')}}" style="width:40%;" alt="Card image">
            <div class="card-body">
                <a href="#" class="btn btn-primary">Ingresar</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mx-auto text-center panel-container" style="width:100%">
            <h1>Archivos</h1>
            <img class="card-img-top align-self-center" src="{{asset('img/documents.svg')}}" style="width:40%;" alt="Card image">
            <div class="card-body">
                <a href="{{ route('file.documents') }}" class="btn btn-primary">Ingresar</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mx-auto text-center panel-container" style="width:100%">
            <h1>Roles</h1>
            <img class="card-img-top align-self-center" src="{{asset('img/lock.svg')}}" style="width:40%;" alt="Card image">
            <div class="card-body">
                <a href="{{ route('role.index') }}" class="btn btn-primary">Ingresar</a>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center mt-5">
        <div class="col-md-3">
            <div class="card mx-auto text-center panel-container" style="width:100%">
                    <h1>Permisos</h1>
                <img class="card-img-top align-self-center" src="{{asset('img/fingerprint.svg')}}" style="width:40%;" alt="Card image">
                <div class="card-body">
                    <a href="{{ route('permission.index') }}" class="btn btn-primary">Ingresar</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mx-auto text-center panel-container" style="width:100%">
                    <h1>Usuarios</h1>
                <img class="card-img-top align-self-center" src="{{asset('img/users.svg')}}" style="width:40%;" alt="Card image">
                <div class="card-body">
                    <a href="{{ route('user.index') }}" class="btn btn-primary">Ingresar</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mx-auto text-center panel-container" style="width:100%">
                    <h1>Clientes</h1>
                <img class="card-img-top align-self-center" src="{{asset('img/client.svg')}}" style="width:40%;" alt="Card image">
                <div class="card-body">
                    <a href="{{ route('clients.index') }}" class="btn btn-primary">Ingresar</a>
                </div>
            </div>
        </div>
    </div>




    {{-- <div class="mt-5 row">
        <div class="col-md-6 mt-5">
            <canvas id="line-chart" width="100%" height="100%"></canvas>
        </div>
        <div class="col-md-6 mt-5">
            <canvas id="pie-chart" width="100%"></canvas>
        </div>
    </div> --}}
	<section id="footer">
            <div class="container">
                    <br><br>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center" alt="_blank">
                        <p style=" color: #000;"><a style="font-weight: bold;" href="http://mcontrolenergy.com/" title="Ir a la Web" data-toggle="tooltip" data-placement="top"><b>MControl Energy </b></a><br>
                             {{-- Dirección: Jr. Cuzco 440 - oficina 605 piso 6 Lima - Lima <br> --}}
                             Telf.:494-6542 / 960-194-596 - Correo: ventas@mcontrolenergy.com<br>
                             <u> ©Todos los derechos reservados.</u></p>
                       
                    </div>
                </div>	
            </div>
        </section>
        <!-- ./Footer -->
</div>

@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script type="text/javascript">
    new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
            labels: [1500, 1600, 1700, 1750, 1800, 1850, 1900, 1950, 1999, 2050],
            datasets: [{
                data: [86, 114, 106, 106, 107, 111, 133, 221, 783, 2478],
                label: "África",
                borderColor: "#3e95cd",
                fill: false
            }, {
                data: [282, 350, 411, 502, 635, 809, 947, 1402, 3700, 5267],
                label: "Asia",
                borderColor: "#8e5ea2",
                fill: false
            }, {
                data: [168, 170, 178, 190, 203, 276, 408, 547, 675, 734],
                label: "Europa",
                borderColor: "#3cba9f",
                fill: false
            }, {
                data: [40, 20, 10, 16, 24, 38, 74, 167, 508, 784],
                label: "Latino América",
                borderColor: "#e8c3b9",
                fill: false
            }, {
                data: [6, 3, 2, 2, 7, 26, 82, 172, 312, 433],
                label: "Norte América",
                borderColor: "#c45850",
                fill: false
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Tráfico obtenido en el sitio web'
            }
        }
    });

</script>

<script type="text/javascript">
    new Chart(document.getElementById("pie-chart"), {
        type: 'pie',
        data: {
            labels: ["Chrome", "Firefox", "Ópera", "Safari", "Otros"],
            datasets: [{
                label: "Navegadores utilizados por los usuarios",
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
                data: [3478, 2267, 1234, 1984, 433]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Navegadores utilizados por los usuarios'
            }
        }
    });

</script>
@endsection


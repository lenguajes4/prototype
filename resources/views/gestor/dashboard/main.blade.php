<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sistema de consulta de trámites</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-gestor.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatables.css') }}" rel="stylesheet">

    @yield('css')

</head>
<body>
    <header>
        <img src="{{ url('img/dnrpa-logo.png') }}">
        <img src="{{ url('img/justicia-logo.png') }}" class="justicia-logo">
    </header>
    <nav>
        Sistema de Consulta de Estado de Trámites
    </nav>
    <section>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button
                        type="button"
                        class="navbar-toggle collapsed"
                        data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1"
                        aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="{{ (Request::is('inicio'))? 'active' : '' }}">
                            <a href="{{ route('gestor.dashboard') }}">
                                Inicio
                            </a>
                        </li>
                        <li class="{{ (Request::is('tramites'))? 'active' : '' }}">
                            <a href="{{ route('gestor.tramites') }}">
                                Nuevos informes
                            </a>
                        </li>
                        <li class="{{ (Request::is('concluidos'))? 'active' : '' }}">
                            <a href="{{ route('gestor.concluidos') }}">
                                Trámites concluidos
                            </a>
                        </li>
                        <li class="{{ (Request::is('informe'))? 'active' : '' }}">
                            <a href="#">Consultas</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Mi perfil</a></li>
                        <li>
                            <a
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Cerrar sesión
                                <i class="fa fa-sign-out"></i>
                            </a>
                        </li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </nav>

        <div class="main-content">
            <div class="row" >
                <div class="col-md-12">
                    <br>
                    @include('layouts.partials.success')
                </div>
            </div>

            @yield('content')

        </div>
    </section>

    <footer>
        <p>
            Dirección Nacional de los Registros Nacionales de la Propiedad del Automotor y de Créditos Prendarios.
        </p>
    </footer>

    <!-- Modal para todas las vistas del gestor -->
    <div class="modal fade" id="modal-app" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modal-app-content"></div>
        </div>
    </div>

    <script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/viaAjaxLite.js') }}"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            $("#informe-table").DataTable()

            $('#modal-app').on('show.bs.modal', function (event) {
                $.viaAjaxLite.load({
                    target: '#modal-app-content',
                    url: $(event.relatedTarget).data('url')
                })
            })
        })
    </script>

    @yield('js')
    
</body>
</html>

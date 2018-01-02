<header class="main-header">
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">SIET</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">SIET</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">
                            {{ Auth::user()->registro->consultas_pendientes_count }}
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Nuevas consultas</li>
                        <li>
                            <ul class="menu">
                                <li>
                                    <a href="{{ route('consulta.showPendientes') }}">
                                        <i class="fa fa-envelope-o text-aqua"></i>
                                        {{ Auth::user()->registro->consultas_pendientes_count }}
                                        consultas esperando respuesta.
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="{{ route('consulta.index') }}">Ir a consultas</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">1</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Gestores agregados</li>
                        <li>
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i>&nbsp;
                                        5 nuevos gestores agregados al sistema
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="{{ route('gestor.index') }}">Ver listado de gestores</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">1</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Novedades del sistema</li>
                        <li>
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-check-square-o text-success"></i>&nbsp;
                                        Nueva jurisdicción agregada en el sistema de patentes.
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">Ver todas las novedades</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="/img/users/{{ Auth::user()->image_path }}" class="user-image" alt="{{ Auth::user()->nickname }}">
                        <span class="hidden-xs">{{ Auth::user()->nombre_completo }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="/img/users/{{ Auth::user()->image_path }}" class="img-circle" alt="{{ Auth::user()->nickname }}">
                            <p>
                                {{ Auth::user()->nombre_completo }}
                                <small>
                                    {{ Auth::user()->registro->codigo.' - '.Auth::user()->registro->nombre }}
                                </small>
                            </p>
                        </li>
                        {{-- <li class="user-body">
                            //
                        </li> --}}
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Perfil</a>
                            </div>
                            <div class="pull-right">
                                <a
                                    href="{{ route('logout') }}"
                                    class="btn btn-default btn-flat"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"
                                    >
                                    Cerrar sesión
                                </a>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                @if (Auth::user()->hasRole('boss'))
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>
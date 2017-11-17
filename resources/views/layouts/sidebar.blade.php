<section class="sidebar">
    <div class="user-panel">
        <div class="pull-left image">
            <img src="/{{ Auth::user()->image_path }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{ Auth::user()->nickname }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> {{ Auth::user()->rol->nombre }}</a>
        </div>
    </div>
    <ul class="sidebar-menu">
        <li class="header">MENU</li>
        <li class="{{ (Request::is('/'))? 'active' : '' }}">
            <a href="/">
                <i class="fa fa-home"></i>
                <span>Inicio</span>
            </a>
        </li>
        <li class="treeview {{ (Request::is('informe/*'))? 'active' : '' }}">
            <a href="#"><i class="fa fa-file-text-o"></i> <span>Informes</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ (Request::is('informe/create'))? 'active' : '' }}">
                    <a href="{{ route('informe.create') }}">
                        <i class="fa fa-circle-o"></i> Nuevo
                    </a>
                </li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Borrador</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Publicados</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Concluidos</a></li>
            </ul>
        </li>
        <li><a href="#"><i class="fa fa-user-circle-o"></i> <span>Gestores</span></a></li>
        <li><a href="#"><i class="fa fa-envelope-o"></i> <span>Consultas</span></a></li>
    </ul>
</section>

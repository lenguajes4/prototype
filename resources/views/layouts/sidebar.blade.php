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
                <i class="fa fa-home"></i> <span>Inicio</span>
            </a>
        </li>
        <li class="{{ (Request::is('informe'))? 'active' : '' }}">
            <a href="{{ route('informe.index') }}">
                <i class="fa fa-file-text-o"></i> <span>Informes</span>
            </a>
        </li>
        <li class="{{ (Request::is('gestor'))? 'active' : '' }}">
            <a href="{{ route('gestor.index') }}">
                <i class="fa fa-user-circle-o"></i> <span>Gestores</span>
            </a>
        </li>
        <li class="{{ (Request::is('consultas'))? 'active' : '' }}">
            <a href="{{ route('consultas.index') }}">
                <i class="fa fa-envelope-o"></i> <span>Consultas</span>
            </a>
        </li>
    </ul>
</section>

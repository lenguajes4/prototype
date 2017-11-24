@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="pull-right">
    <a
        href="{{ route('logout') }}"
        class="btn btn-default btn-flat"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Cerrar sesión
    </a>
</div>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
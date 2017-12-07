<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sistema de consulta de trámites</title>
</head>
<body>
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
</body>
</html>

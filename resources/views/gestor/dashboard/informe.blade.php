@extends('gestor.dashboard.main')
@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ route('gestor.dashboard') }}">Inicio</a></li>
        <li class="active">Trámite N°{{ $informe->numero_tramite }}</li>
    </ol>
    <div class="row">
        <div class="col-md-8">
            <h4 class="text-center">Informe de estado de trámite</h4>
            <ul class="list-group">
                <li class="list-group-item">
                    <ul class="list-unstyled">
                        <li>
                            N° de trámite: {{ number_format($informe->numero_tramite, 0, ',', '.') }}
                        </li>
                        <li>
                            Dominio: {{ $informe->vehiculo->dominio }}
                        </li>
                        <li>
                            Registro seccional: {{ $informe->registro->codigo.' - '.$informe->registro->nombre }}
                        </li>
                    </ul>
                </li>
                <li class="list-group-item">
                    <h4 class="list-group-item-heading">Observaciones</h4>
                    <p class="list-group-item-text">
                        {{ $informe->observaciones or 'Sin observaciones registrales.' }}
                    </p>
                </li>
                <li class="list-group-item">
                    <h4 class="list-group-item-heading">Conceptos adeudados</h4>
                    <p class="list-group-item-text">
                        @forelse ($conceptos as $concepto)
                            <b>
                                ${{ number_format($concepto->monto, 0, ',', '.') }}
                            </b> por {{ $concepto->nombre }}
                            <br>
                        @empty
                            No presenta deudas
                        @endforelse
                    </p>
                </li>
                <li class="list-group-item">
                    <h4 class="list-group-item-heading">Multas</h4>
                    <p class="list-group-item-text">
                        @if (!empty($multas->toArray()))
                            <div class="table-responsive">
                                @include('multas.detail')
                            </div>
                        @else
                            No presenta.
                        @endif
                    </p>
                </li>
                <li class="list-group-item">
                    <h4 class="list-group-item-heading">Deudas de patentes</h4>
                    <p class="list-group-item-text">
                        @if (!empty($patentes->toArray()))
                            <div class="table-responsive">
                                @include('patentes.detail')
                            </div>
                        @else
                            No presenta.
                        @endif
                    </p>
                </li>
            </ul>
        </div>
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">Datos del registro seccional</div>
                <div class="panel-body">
                    <ul class="list-unstyled">
                        <li>
                            Registro seccional: {{ $informe->registro->codigo.' - '.$informe->registro->nombre }}
                        </li>
                        <li>
                            Domicilio: {{ $informe->registro->domicilio }}
                        </li>
                        <li>
                            Teléfono: {{ $informe->registro->telefono }}
                        </li>
                        <li>
                            Fax: {{ $informe->registro->fax or '-' }}
                        </li>
                    </ul>
                </div>
                <ul class="list-group text-center">
                    <li class="list-group-item">
                        <a href="{{ route('consulta.create', $informe->id) }}">
                            Consultar sobre este trámite
                            <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @forelse ($informe->consultas as $consulta)
        <div class="media">
            @if ($consulta->path)
                <div class="media-left">
                    <a
                        href="#">
                        <img class="media-object" src="/img/consultas/{{ $consulta->path }}" width="64" height="64">
                    </a>
                </div>
            @endif
            <div class="media-body">
                <h4 class="media-heading">Consulta #{{ $consulta->id }}</h4>
                {{ $consulta->consulta }}
            </div>
        </div>
    @empty
        No se realizaron consultas.
    @endforelse
        
@endsection
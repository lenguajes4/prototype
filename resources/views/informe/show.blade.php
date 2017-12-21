@extends('layouts.main')

@section('content-header')
    <section class="content-header">
        <h1>
            Informes
            <small>Informe del trámite {{ $informe->numero_tramite }}</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('informe.index') }}">
                    <i class="fa fa-file-text-o"></i> Informes
                </a>
            </li>
            <li class="active">Trámite N° {{ $informe->numero_tramite }}</li>
        </ol>
    </section>
@endsection

@section('content')
<div class="row">
        <div class="col-md-4">
            <div class="box box-widget widget-user-2">
                <div class="widget-user-header bg-primary">
                    <div class="widget-user-image">
                        <img class="img-circle" src="{{ asset('img/bandera.png') }}">
                    </div>
                    <h3 class="widget-user-username">{{ $informe->vehiculo->dominio }}</h3>
                    <h5 class="widget-user-desc">{{ $informe->tramite->nombre }}</h5>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <li>
                            <a href="#">
                                N° de trámite: <b>{{ number_format($informe->numero_tramite, 0, ',', '.') }}</b>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Gestor: <b>{{ $informe->gestor->nombre_completo }}</b>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Estado: <b>{{ $informe->estado->nombre }}</b>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="box-footer no-padding">
                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
                        <a
                            href="{{ route('informe.edit', $informe->id) }}"
                            class="btn btn-success">
                            <i class="fa fa-pencil-square-o"></i> Editar
                        </a>
                        <a
                            href="#modal-app"
                            class="btn btn-danger"
                            data-toggle="modal"
                            data-url="{{ route('informe.showDeleteForm', $informe->id) }}">
                            <i class="fa fa-trash"></i> Eliminar
                        </a>
                        <a
                            href="#"
                            class="btn btn-primary">
                            <i class="fa fa-arrow-right"></i> Publicar
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-8">
            <div class="box box-widget">
                <div class="box-header with-border">
                    <div class="user-block">
                        <img class="img-circle" src="{{ asset('img/file.png') }}">
                        <span class="username text-light-blue">Observaciones</span>
                        <span class="description">
                            @if ($informe->observaciones)
                                Presenta las siguientes observaciones registrales.
                            @endif
                        </span>
                    </div>
                </div>
                <div class="box-body">
                    <p>
                        {{ $informe->observaciones or 'Sin observaciones.' }}
                    </p>
                </div>
                @if (!empty($conceptos->toArray()))
                    @include('conceptos.detail')
                @endif
            </div>
            @if ($informe->tipo_tramite_id != 1)
                <div class="box box-widget">
                    <div class="box-header with-border">
                        <div class="user-block">
                            <img class="img-circle" src="{{ asset('img/info.png') }}">
                            <span class="username text-light-blue">Multas</span>
                            <span class="description">
                                Datos obtenidos del sistema de multas.
                            </span>
                        </div>
                    </div>
                    <div class="box-body">
                        @if (!empty($multas->toArray()))
                            @include('multas.detail')
                        @else
                            No se registraron infracciones en el sistema de multas.
                        @endif
                    </div>
                </div>
                <div class="box box-widget">
                    <div class="box-header with-border">
                        <div class="user-block">
                            <img class="img-circle" src="{{ asset('img/car.png') }}">
                            <span class="username text-light-blue">Patentes</span>
                            <span class="description">
                                Datos obtenidos del sistema de patentes.
                            </span>
                        </div>
                    </div>
                    <div class="box-body">
                        @if (!empty($patentes->toArray()))
                            @include('patentes.detail')
                        @else
                            Sin periodos adeudados en el sistema de patentes.
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
    
@endsection

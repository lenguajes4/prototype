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
    <div class="col-md-2">
        <div class="box box-solid">
            <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                    <li>
                        <a href="{{ route('informe.edit', $informe->id) }}" class="text-light-blue">
                            <i class="fa fa-pencil-square-o"></i> Editar
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-red">
                            <i class="fa fa-trash"></i> Eliminar
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-10">
        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-file-text-o"></i>
                <h3 class="box-title">Informe de estado de trámite</h3>
            </div>
            <div class="box-body">
                <p>
                    <b>Dominio:</b> {{ $informe->dominio }}<br>
                    <b>Trámite:</b> {{ $informe->tipo_tramite }}<br>
                    <b>Gestor:</b> {{ $informe->gestor }}<br>
                </p>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Conceptos</h3>
                        <span class="label label-primary pull-right">
                            <i class="fa fa-info"></i>
                        </span>
                    </div>
                    <div class="box-body">
                        @if (!empty($conceptos->toArray()))
                            @include('conceptos.detail')
                        @else
                            No se registraron conceptos adeudados.
                        @endif
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Multas</h3>
                        <span class="label label-primary pull-right">
                            <i class="fa fa-info"></i>
                        </span>
                    </div>
                    <div class="box-body">
                        @if (!empty($multas->toArray()))
                            @include('multas.detail')
                        @else
                            No se registraron infracciones.
                        @endif
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Patentes</h3>
                        <span class="label label-primary pull-right">
                            <i class="fa fa-info"></i>
                        </span>
                    </div>
                    <div class="box-body">
                        @if (!empty($patentes->toArray()))
                            @include('patentes.detail')
                        @else
                            No se registraron patentes.
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

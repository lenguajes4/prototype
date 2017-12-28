@extends('layouts.main')

@section('content-header')
    <section class="content-header">
        <h1>
            Bienvenido al SIET
            <small>Sistema de Informes de Estado de Trámite</small>
        </h1>
    </section>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="box box-widget widget-user-2">
            <div class="widget-user-header bg-aqua-active">
                <div class="widget-user-image">
                    <img class="img-circle" src="/img/users/{{ $user->image_path }}" alt="User Avatar">
                </div>
                <h3 class="widget-user-username">{{ $user->nombre_completo }}</h3>
                <h5 class="widget-user-desc">{{ $user->role->first()->display_name }}</h5>
            </div>
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                    <li>
                        <a href="#">
                            Registro seccional {{ $registro->codigo.' - '.$registro->nombre }}
                        </a>
                    </li>
                    <li>
                        <a href="#">{{ $registro->domicilio }}</a>
                    </li>
                    <li>
                        <a href="#">Tel: {{ $registro->telefono }}</a>
                    </li>
                    <li>
                        <a href="#">Fax: {{ $registro->fax or '-no posee-' }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="box box-solid">
            <div class="box-header">
                <h3 class="box-title">Últimos trámites con movimiento</h3>
            </div>
            <div class="box-body">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>N° de trámite</th>
                            <th>Dominio</th>
                            <th>Trámite</th>
                            <th>Estado</th>
                            <th>Gestor</th>
                            <th>Ultima actualización</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($informes as $informe)
                        <tr>
                            <td>
                                <a href="{{ route('informe.show', $informe->id) }}">
                                    {{ $informe->numero_tramite }}
                                </a>
                            </td>
                            <td>{{ $informe->vehiculo->dominio }}</td>
                            <td>{{ $informe->tramite->nombre }}</td>
                            <td>{{ $informe->estado->nombre }}</td>
                            <td>{{ $informe->gestor->nombre_completo }}</td>
                            <td>{{ $informe->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-8">
        <div class="box box-solid">
            <div class="box-header">
                <h3 class="box-title">Últimas consultas</h3>
            </div>
            <div class="box-body">
                <table class="table table-hover">
                    <thead>
                        <th></th>
                        <th>Gestor</th>
                        <th>Asunto</th>
                        <th></th>
                        <th>Estado del trámite</th>
                        <th>Última actualización</th>
                    </thead>
                    <tbody>
                    @foreach ($consultas as $consulta)
                        <tr>
                            <td>
                                <a
                                    href="{{ route('consulta.show', $consulta->id) }}"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{ $consulta->respuesta?'Respondida':'Pendiente' }}">
                                    @if ($consulta->respuesta)
                                        <i class="fa fa-check text-success"></i>
                                    @else
                                        <i class="fa fa-exclamation text-warning"></i>
                                    @endif
                                </a>
                            </td>
                            <td class="mailbox-name">
                                {{ $consulta->informe->gestor->nombre_completo }}
                            </td>
                            <td class="mailbox-subject">
                                <a href="{{ route('consulta.show', $consulta->id) }}">
                                    <b>{{ $consulta->informe->vehiculo->dominio }}</b> - 
                                    {{ $consulta->informe->tramite->nombre }}
                                </a>
                            </td>
                            <td class="mailbox-attachment">
                                @if ($consulta->path)
                                    <i class="fa fa-paperclip"></i>
                                @endif
                            </td>
                            <td>
                                {{ $consulta->informe->estado->nombre }}
                            </td>
                            <td class="mailbox-date">
                                {{ $consulta->created_at->diffForHumans() }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

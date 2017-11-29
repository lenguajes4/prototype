@extends('layouts.main')

@section('css')
    <link href="{{ asset('css/datatables.css') }}" rel="stylesheet">
@endsection

@section('content-header')
    <section class="content-header">
        <h1>
            Informes
            <small>Listado de informes</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('informe.index') }}">
                    <i class="fa fa-file-text-o"></i> Informes
                </a>
            </li>
            <li class="active">Listado</li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <a href="{{ route('informe.create') }}" class="btn btn-primary btn-flat">
                <i class="fa fa-external-link" aria-hidden="true"></i> Nuevo
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Informes de trámites</h3>
                </div>
                <div class="box-body">
                    <table id="informe-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>N° de trámite</th>
                                <th>Dominio</th>
                                <th>Trámite</th>
                                <th>Estado</th>
                                <th>Gestor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($informes as $informe)
                                <tr>
                                    <td>
                                        <a
                                            href="{{ route('informe.show', $informe->id) }}"
                                            title="Ver">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('informe.show', $informe->id) }}">
                                            {{ $informe->numero_tramite }}
                                        </a>
                                    </td>
                                    <td>{{ $informe->dominio }}</td>
                                    <td>{{ $informe->tipo_tramite }}</td>
                                    <td>{{ $informe->estado }}</td>
                                    <td>{{ $informe->gestor }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('js/datatables.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#informe-table").DataTable()
        })
    </script>
@endsection

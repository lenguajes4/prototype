@extends('layouts.main')

@section('css')
    <link href="{{ asset('css/datatables.css') }}" rel="stylesheet">
@endsection

@section('content-header')
    <section class="content-header">
        <h1>
            Gestores
            <small>Listado de gestores registrados en el sistema</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('gestor.index') }}">
                    <i class="fa fa-user-circle-o"></i> Gestores
                </a>
            </li>
            <li class="active">Listado</li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <a href="{{ route('gestor.create') }}" class="btn btn-primary btn-flat">
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
                    <table id="gestores-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Apellido y Nombre</th>
                                <th>N° de trámites</th>
                                <th>Teléfono</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gestores as $gestor)
                                <tr>
                                    <td>{{ $gestor->apellido.', '.$gestor->nombre }}</td>
                                    <td></td>
                                    <td></td>
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
            $("#gestores-table").DataTable()
        })
    </script>
@endsection

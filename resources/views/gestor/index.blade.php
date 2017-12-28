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
    @if ($errors->any())
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-xs-12">
            <a
                class="btn btn-primary btn-flat"
                data-toggle="modal"
                data-url="{{ route('gestor.create') }}"
                href="#modal-app">
                <i class="fa fa-external-link" aria-hidden="true"></i> Nuevo
            </a>
        </div>
    </div>
    <br>
    <table id="gestores-table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th style="width: 7px;"></th>
                <th style="width: 7px;"></th>
                <th>Apellido y Nombre</th>
                <th>N° de trámites en este registro</th>
                <th>Teléfono</th>
                <th>Fecha de alta</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gestores as $gestor)
                <tr>
                    <td>
                        <a
                            data-toggle="modal"
                            data-url="{{ route('gestor.show', $gestor->id) }}"
                            title="Ver gestor"
                            href="#modal-app">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>
                    <td>
                        <a
                            data-toggle="modal"
                            data-url="{{ route('gestor.edit', $gestor->id) }}"
                            title="Click para editar"
                            href="#modal-app">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <a
                            data-toggle="modal"
                            data-url="{{ route('gestor.show', $gestor->id) }}"
                            title="Ver gestor"
                            href="#modal-app">
                            {{ $gestor->nombre_completo }}
                        </a>
                    </td>
                    <td>{{ $gestor->informes_count }}</td>
                    <td>{{ $gestor->telefono }}</td>
                    <td>{{ $gestor->created_at->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script src="{{ asset('js/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('js/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#gestores-table').DataTable({
                "language": {
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Siguiente"
                    }
                }
            })
        })
    </script>
@endsection

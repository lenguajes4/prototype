@extends('layouts.main')

@section('css')
    <link href="{{ asset('css/datatables.css') }}" rel="stylesheet">
@endsection

@section('content-header')
    <section class="content-header">
        <h1>
            Consultas
            <small>Proventientes de los gestores</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('consulta.index') }}">
                    <i class="fa fa-envelope-o"></i> Consultas
                </a>
            </li>
            <li class="active">
                @yield('title', 'Consultas')
            </li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Carpetas</h3>
                    <div class="box-tools">
                        <button
                            type="button"
                            class="btn btn-box-tool"
                            data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="{{ (Request::is('consulta'))? 'active' : '' }}">
                            <a href="{{ route('consulta.index') }}">
                                <i class="fa fa-inbox"></i> Todas
                                <span class="label label-primary pull-right">
                                    {{ Auth::user()->registro->consultas->count() }}
                                </span>
                            </a>
                        </li>
                        <li class="{{ (Request::is('consultas/pendientes'))? 'active' : '' }}">
                            <a href="{{ route('consulta.showPendientes') }}">
                                <i class="fa fa-envelope-o"></i> Pendientes
                                <span class="label label-danger pull-right">
                                    {{ Auth::user()->registro->consultas_pendientes_count }}
                                </span>
                            </a>
                        </li>
                        <li class="{{ (Request::is('consultas/respondidas'))? 'active' : '' }}">
                            <a href="{{ route('consulta.showRespondidas') }}">
                                <i class="fa fa-paper-plane-o"></i> Respondidas
                                <span class="label label-success pull-right">
                                    {{ Auth::user()->registro->consultas_respondidas_count }}
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
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
            <div class="box box-primary">
                @yield('mailbox')
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/datatables.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#consultas-table').DataTable({
                "paging":   true,
                "bLengthChange": false,
                "ordering": false,
                "info":     false,
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

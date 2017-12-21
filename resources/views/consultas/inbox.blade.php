@extends('consultas.main')

@section('title', 'Bandeja de entrada')

@section('mailbox')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">
                Bandeja de entrada -
                <small>Todas las consultas a este registro seccional.</small>
            </h3>
            <div class="box-tools pull-right">
                <div class="has-feedback">
                    <input type="text" class="form-control input-sm" placeholder="Buscar">
                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
            </div>
        </div>
        <div class="consultas">
            @include('consultas.load')
        </div>
    </div>
@endsection

@extends('consultas.main')

@section('title', 'Respondidas')

@section('mailbox')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">
                Respondidas -
                <small>Respuestas enviadas a la consulta de los gestores.</small>
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

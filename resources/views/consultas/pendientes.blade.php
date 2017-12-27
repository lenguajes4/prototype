@extends('consultas.main')

@section('title', 'Pendientes')

@section('mailbox')
    <div class="box-header with-border">
        <h3 class="box-title">
            Pendientes -
            <small>Nuevas consultas en espera de una respuesta.</small>
        </h3>
    </div>
    <div class="box-body">
        @include('consultas.load')
    </div>
@endsection

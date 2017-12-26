@extends('consultas.main')

@section('title', 'Pendientes')

@section('mailbox')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">
                Pendientes -
                <small>Nuevas consultas en espera de una respuesta.</small>
            </h3>
        </div>
    </div>
    <div class="box-body no-padding">
        @include('consultas.load')
    </div>
@endsection

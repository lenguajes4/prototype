@extends('consultas.main')

@section('title', 'Bandeja de entrada')

@section('mailbox')
    <div class="box-header with-border">
        <h3 class="box-title">
            Bandeja de entrada -
            <small>Todas las consultas a este registro seccional.</small>
        </h3>
    </div>
    <div class="box-body">
        @include('consultas.load')
    </div>
@endsection

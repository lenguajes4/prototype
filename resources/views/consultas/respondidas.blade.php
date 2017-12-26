@extends('consultas.main')

@section('title', 'Respondidas')

@section('mailbox')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">
                Respondidas -
                <small>Respuestas enviadas a la consulta de los gestores.</small>
            </h3>
        </div>
    </div>
    <div class="box-body no-padding">
        @include('consultas.load')
    </div>
@endsection

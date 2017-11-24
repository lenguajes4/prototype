@extends('multas.form')

@section('open-form')
    {{
        Form::open(
            [
                'route' => ['multa.store'],
                'method' => 'post'
            ]
        )
    }}
@stop

@section('style', 'bg-info')

@section('title')
    <h4 class="modal-title text-info">Agregar multa</h4>
@stop

@section('hidden')
    {{ Form::hidden('vehiculo_id', $vehiculo_id) }}
@stop

@section('submit-form')
    {{ Form::button('Agregar', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
@stop

@section('close-form')
    {{ Form::close() }}
@stop

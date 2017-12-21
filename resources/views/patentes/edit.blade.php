@extends('patentes.form')

@section('open-form')
    {{
        Form::open(
            [
                'route' => ['patente.update', $patente->id],
                'method' => 'put'
            ]
        )
    }}
@stop

@section('style', 'bg-warning')

@section('title')
    <h4 class="modal-title text-warning">Modificar periodos de patente</h4>
@stop

@section('submit-form')
    {{ Form::button('Actualizar', ['type'=>'submit', 'class'=>'btn btn-warning']) }}
@stop

@section('close-form')
    {{ Form::close() }}
@stop
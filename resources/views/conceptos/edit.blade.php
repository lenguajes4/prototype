@extends('conceptos.form')

@section('open-form')
    {{
        Form::open(
            [
                'route' => ['concepto.update', $concepto->id],
                'method' => 'put'
            ]
        )
    }}
@stop

@section('style', 'bg-warning')

@section('title')
    <h4 class="modal-title text-warning">Modificar concepto</h4>
@stop

@section('submit-form')
    {{ Form::button('Actualizar', ['type'=>'submit', 'class'=>'btn btn-warning']) }}
@stop

@section('close-form')
    {{ Form::close() }}
@stop
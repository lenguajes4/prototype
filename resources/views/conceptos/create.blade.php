@extends('conceptos.form')

@section('open-form')
    {{
        Form::open(
            [
                'route' => ['concepto.store'],
                'method' => 'post'
            ]
        )
    }}
@stop

@section('style', 'bg-info')

@section('title')
    <h4 class="modal-title text-info">Agregar concepto</h4>
@stop

@section('hidden')
    {{ Form::hidden('informe_id', $informe_id) }}
@stop

@section('submit-form')
    {{ Form::button('Agregar', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
@stop

@section('close-form')
    {{ Form::close() }}
@stop
@extends('gestor.form')

@section('open-form')
    {{
        Form::open(
            [
                'route' => ['gestor.store'],
                'method' => 'post',
                'class' => 'form-horizontal'
            ]
        )
    }}
@stop

@section('style', 'bg-info')

@section('title')
    <h4 class="modal-title text-info">Alta de nuevo gestor</h4>
@stop

@section('submit-form')
    {{ Form::button('Agregar', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
@stop

@section('close-form')
    {{ Form::close() }}
@stop
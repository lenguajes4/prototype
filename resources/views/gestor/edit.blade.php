@extends('gestor.form')

@section('open-form')
    {{
        Form::model(
            $gestor,
            [
                'route' => ['gestor.update', $gestor->id],
                'method' => 'put',
                'class' => 'form-horizontal'
            ]
        )
    }}
@stop

@section('style', 'bg-warning')

@section('title')
    <h4 class="modal-title text-warning">Modificar gestor</h4>
@stop

@section('submit-form')
    {{ Form::button('Actualizar', ['type'=>'submit', 'class'=>'btn btn-warning']) }}
@stop

@section('close-form')
    {{ Form::close() }}
@stop
@extends('layouts.main')

@section('content-header')
    <section class="content-header">
        <h1>
            Nuevo informe
            <small>Confección de informe de estado de trámite</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Informes</a></li>
            <li class="active">Nuevo</li>
        </ol>
    </section>
@endsection

@section('content')
    {{
        Form::open(
            [
                'route' => ['informe.store'],
                'method' => 'post',
                'class' => 'form-horizontal' 
            ]
        )
    }}

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Datos del trámite</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('dominio', 'Dominio:', ['class' => 'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::text('dominio', null, ['class' => 'form-control', 'placeholder' => 'Número de dominio']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('numero', 'N° de trámite:', ['class' => 'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::text('numero', null, ['class' => 'form-control', 'placeholder' => 'Número de trámite']) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('dominio', 'Dominio:', ['class' => 'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::text('dominio', null, ['class' => 'form-control', 'placeholder' => 'Número de dominio']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('numero', 'Número de trámite:', ['class' => 'col-sm-4 control-label']) }}
                            <div class="col-sm-8">
                                {{ Form::text('numero', null, ['class' => 'form-control', 'placeholder' => 'Número de trámite']) }}
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="box-footer">
                {{ Form::submit('Guardar', ['class' => 'btn btn-primary pull-right']) }}
            </div>   
        </div>
            
    {{ Form::close() }}
@endsection

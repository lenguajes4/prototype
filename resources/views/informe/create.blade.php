@extends('layouts.main')

@section('css')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content-header')
    <section class="content-header">
        <h1>
            Nuevo informe
            <small>Confección de informe de estado de trámite</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('informe.index') }}">
                    <i class="fa fa-file-text-o"></i> Informes
                </a>
            </li>
            <li class="active">Nuevo</li>
        </ol>
    </section>
@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-warning">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{
        Form::open(
            [
                'route' => ['informe.store'],
                'method' => 'post',
                'class' => 'form-horizontal' 
            ]
        )
    }}
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Datos del trámite</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('dominio', 'Dominio:', ['class' => 'col-sm-4 control-label']) }}
                        <div class="col-sm-8">
                            {{
                                Form::text(
                                    'dominio',
                                    null,
                                    [
                                        'class' => 'form-control',
                                        'style' => 'text-transform:uppercase;',
                                        'required'
                                    ]
                                )
                            }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('numero_tramite', 'N° de trámite:', ['class' => 'col-sm-4 control-label']) }}
                        <div class="col-sm-8">
                            {{
                                Form::text(
                                    'numero_tramite',
                                    null,
                                    [
                                        'class' => 'form-control',
                                        'required'
                                    ]
                                )
                            }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('tipo', 'Tipo de trámite:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-sm-8">
                            {{
                                Form::select(
                                    'tipo_tramite_id',
                                    ['' => 'Seleccionar tipo de trámite...'] + $tipos,
                                    null,
                                    [
                                        'class' => 'form-control select2',
                                        'required'
                                    ]
                                )
                            }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('gestor', 'Gestor:', ['class' => 'col-sm-4 control-label']) }}
                        <div class="col-sm-8">
                            {{
                                Form::select(
                                    'usuario_id',
                                    ['' => 'Seleccionar gestor...'] + $gestores,
                                    null,
                                    [
                                        'class' => 'form-control select2',
                                        'required'
                                    ]
                                )
                            }}
                        </div>
                    </div>       
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-4">
                            <button type="submit" class="btn btn-primary btn-flat btn-block">
                                Continuar&nbsp;
                                <i class="fa fa-arrow-circle-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@endsection

@section('js')
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".select2").select2()
        })
    </script>
@endsection

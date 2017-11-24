@extends('layouts.main')

@section('content-header')
    <section class="content-header">
        <h1>
            Editar informe
            <small>Confección de informe de estado de trámite</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('informe.index') }}">
                    <i class="fa fa-file-text-o"></i> Informes
                </a>
            </li>
            <li class="active"> Informe N° {{ $informe->numero_tramite }}</li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="row" >
        <div class="col-md-12">
            <br>
            @include('layouts.partials.success')
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-file-text-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">N° de Trámite</span>
                    <span class="info-box-number">{{ $informe->numero_tramite }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-car"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Dominio</span>
                    <span class="info-box-number">{{ $informe->dominio }}</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-tag"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Tipo de Trámite</span>
                    <span class="info-box-number">{{ $informe->tipo_tramite }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-user"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Gestor</span>
                    <span class="info-box-number">{{ $informe->gestor }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            {{
                Form::model(
                    $informe,
                    [
                        'route' => ['informe.update', $informe->id],
                        'method' => 'put'
                    ]
                )
            }}
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Observaciones</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            {{
                                Form::textarea(
                                    'observaciones',
                                    null,
                                    [
                                        'class' => 'form-control',
                                        'rows' => 3,
                                        'placeholder' => 'Redactar observaciones...'
                                    ]
                                )
                            }}
                        </div>
                    </div>
                    <div class="box-footer">
                        {{ Form::submit('Guardar', ['class' => 'btn btn-primary pull-right']) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
        <div class="col-md-6">
            @include('conceptos.show')
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            @include('multas.show')
        </div>
        <div class="col-md-6">
            @include('patentes.show')
        </div>
    </div>

    <!-- Modal para conceptos | multas | patentes-->
    <div class="modal fade" id="modal-app" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modal-app-content"></div>
        </div>
    </div>
    
@endsection

@section('js')
    <script src="{{ asset('js/viaAjaxLite.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#modal-app').on('show.bs.modal', function (event) {
                $.viaAjaxLite.load({
                    target: '#modal-app-content',
                    url: $(event.relatedTarget).data('url')
                })
            })
        })
    </script>
@endsection

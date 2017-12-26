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
    <div class="row">
        <div class="col-md-4">
            <div class="box box-widget widget-user-2">
                <div class="widget-user-header bg-primary">
                    <div class="widget-user-image">
                        <img class="img-circle" src="{{ asset('img/bandera.png') }}">
                    </div>
                    <h3 class="widget-user-username">{{ $informe->vehiculo->dominio }}</h3>
                    <h5 class="widget-user-desc">{{ $informe->tramite->nombre }}</h5>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <li>
                            <a href="#">
                                N° de trámite: <b>{{ number_format($informe->numero_tramite, 0, ',', '.') }}</b>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Gestor: <b>{{ $informe->gestor->nombre_completo }}</b>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Estado: <b>{{ $informe->estado->nombre }}</b>
                            </a>
                        </li>
                    </ul>
                </div>
                @if ($informe->estado_tramite_id == 1)
                    <div class="box-footer no-padding">
                        <div class="btn-group btn-group-justified" role="group" aria-label="...">
                            <a
                                href="#modal-app"
                                class="btn btn-danger"
                                data-toggle="modal"
                                data-url="{{ route('informe.showDeleteForm', $informe->id) }}">
                                <i class="fa fa-trash"></i> Eliminar
                            </a>
                            <a
                                href="{{ route('informe.publicar', $informe->id) }}"
                                class="btn btn-primary">
                                <i class="fa fa-arrow-right"></i> Publicar
                            </a>
                        </div>
                    </div>
                @endif
            </div>
            @include('conceptos.show')
            
            @if ($informe->tipo_tramite_id != 1)
                @include('baja.show')
            @endif
            
        </div>
        <div class="col-md-8">
            <div class="box box-widget">
                <div class="box-header with-border">
                    <div class="user-block">
                        <img class="img-circle" src="{{ asset('img/file.png') }}">
                        <span class="username text-light-blue">Observaciones</span>
                        <span class="description">
                            Completar en caso de presentar observaciones registrales.
                        </span>
                    </div>
                </div>
                <div class="box-body">
                    @include('informe.observaciones-form')
                </div>
            </div>

            @if ($informe->tipo_tramite_id != 1)
                @include('multas.show')
                @include('patentes.show')
            @endif

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
    <script src="{{ asset('js/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('js/jquery.inputmask.date.extensions.js') }}"></script>
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

@extends('consultas.main')
@section('mailbox')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Consulta</h3>
            <div class="box-tools pull-right">
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Anterior">
                    <i class="fa fa-chevron-left"></i>
                </a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Siguiente">
                    <i class="fa fa-chevron-right"></i>
                </a>
            </div>
        </div>
        <div class="box-body no-padding">
            <div class="mailbox-read-info">
                <h3>Trámite: {{ $consulta->informe->tramite->nombre }}</h3>
                <h3>
                    N° de trámite:
                    <a
                        href="{{ route('informe.show', $consulta->informe->id) }}"
                        title="Click para ver el informe de trámite">
                        {{ $consulta->informe->numero_tramite }}
                    </a>
                </h3>
                <h5>
                    De:
                    <a
                        data-toggle="modal"
                        data-url="{{ route('gestor.show', $consulta->informe->gestor->id) }}"
                        title="Ver gestor"
                        href="#modal-app">
                        {{ $consulta->informe->gestor->nombre_completo }}
                    </a>
                    <span class="mailbox-read-time pull-right">
                        {{ ucfirst($consulta->created_at->format('l, j \\d\\e F \\d\\e Y - G:i')) }}
                    </span>
                </h5>
            </div>
            <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                    <button
                        type="button"
                        class="btn btn-default btn-sm"
                        data-toggle="tooltip"
                        data-container="body"
                        title="Eliminar">
                        <i class="fa fa-trash-o"></i>
                    </button>
                    @if (!$consulta->respuesta && $consulta->informe->estado_tramite_id != 3)
                        <button
                            
                            type="button"
                            class="btn btn-default btn-sm responder"
                            data-toggle="tooltip"
                            data-container="body"
                            title="Responder">
                            <i class="fa fa-reply"></i>
                        </button>
                    @endif
                    <button
                        type="button"
                        class="btn btn-default btn-sm"
                        data-toggle="tooltip"
                        title="Imprimir">
                        <i class="fa fa-print"></i>
                    </button>
                </div>
            </div>
            <div class="mailbox-read-message">
                <div class="media">
                    @if ($consulta->path)
                        <div class="media-left">
                            <a
                                href="#modal-image"
                                data-toggle="modal">
                                <img class="media-object" src="/storage/{{ $consulta->path }}" width="64" height="64">
                            </a>
                        </div>
                    @endif
                    <div class="media-body">
                        <p class="well">
                            {{ $consulta->consulta }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @if ($consulta->respuesta)
            <div class="box-footer">
                <dl class="dl-horizontal">
                    <dt>Respuesta:</dt>
                    <dd>{{ $consulta->respuesta }}</dd>

                    <dt>Respondido por:</dt>
                    <dd>{{ $consulta->asistente->nombre_completo }}</dd>

                    <dt>Fecha de respuesta:</dt>
                    <dd>{{ ucfirst($consulta->updated_at->format('l, j \\d\\e F \\d\\e Y - G:i')) }}</dd>
                </dl>
            </div>
        @else
            <div class="box-footer response-form">
                @include('consultas.response-form')
            </div>
        @endif
        <div class="box-footer">
            <button
                type="button"
                class="btn btn-default">
                <i class="fa fa-trash-o"></i> Eliminar
            </button>
            <button
                type="button"
                class="btn btn-default">
                <i class="fa fa-print"></i> Imprimir
            </button>
            @if (!$consulta->respuesta && $consulta->informe->estado_tramite_id != 3)
                <div class="pull-right">
                    <button
                        type="button"
                        class="btn btn-default responder">
                        <i class="fa fa-reply"></i> Responder
                    </button>
                </div>
            @endif
        </div>
    </div>

    @if ($consulta->path)
        <!-- Modal para mostrar imagen maximizada -->
        <div class="modal fade" id="modal-image" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Archivo adjunto de la consulta</h4>
                    </div>
                    <div class="modal-body text-center">
                        <img src="/storage/{{ $consulta->path }}" alt="att" style="max-width: 500px;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('.response-form').hide()
            $(document).on('click', '.responder', function(e){
                $('.response-form').show()
            })
        })
    </script>
@endsection

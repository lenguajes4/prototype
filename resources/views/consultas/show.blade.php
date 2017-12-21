@extends('consultas.main')
@section('mailbox')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Consulta</h3>
            <div class="box-tools pull-right">
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous">
                    <i class="fa fa-chevron-left"></i>
                </a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next">
                    <i class="fa fa-chevron-right"></i>
                </a>
            </div>
        </div>
        <div class="box-body no-padding">
            <div class="mailbox-read-info">
                <h3>Trámite: {{ $consulta->informe->tramite->nombre }}</h3>
                <h3>N°: {{ $consulta->informe->numero_tramite }}</h3>
                <h5>
                    De: {{ $consulta->informe->gestor->nombre_completo }}
                    <span class="mailbox-read-time pull-right">
                        {{ ucfirst($consulta->created_at->format('l j \\d\\e F \\d\\e Y h:i:s A')) }}
                    </span>
                </h5>
                {{-- @TODO ponerle un link para cargar modal y ver el gestor--}}
            </div>
            <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                        <i class="fa fa-trash-o"></i></button>
                    <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
                        <i class="fa fa-reply"></i></button>
                    <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
                        <i class="fa fa-share"></i></button>
                </div>
                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                    <i class="fa fa-print"></i>
                </button>
            </div>
            <div class="mailbox-read-message">
                <p>
                    {{ $consulta->consulta }}
                </p>
            </div>
        </div>
        <div class="box-footer">
            <ul class="mailbox-attachments clearfix">
                <li>
                    <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                    <div class="mailbox-attachment-info">
                        <a href="#" class="mailbox-attachment-name">
                            <i class="fa fa-paperclip"></i> Sep2014-report.pdf
                        </a>
                        <span class="mailbox-attachment-size">
                            1,245 KB
                            <a href="#" class="btn btn-default btn-xs pull-right">
                                <i class="fa fa-cloud-download"></i>
                            </a>
                        </span>
                    </div>
                </li>
            </ul>
        </div>
        <div class="box-footer">
            <div class="pull-right">
                <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Responder</button>
                <button type="button" class="btn btn-default"><i class="fa fa-share"></i> Sig</button>
            </div>
            <button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Eliminar</button>
            <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</button>
        </div>
    </div>
@endsection

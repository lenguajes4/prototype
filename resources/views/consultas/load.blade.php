<div class="box-body no-padding">
    <div class="mailbox-controls">
        <button type="button" class="btn btn-default btn-sm checkbox-toggle">
            <i class="fa fa-square-o"></i>
        </button>
        <div class="btn-group">
            <button type="button" class="btn btn-default btn-sm">
                <i class="fa fa-trash-o"></i>
            </button>
            <button type="button" class="btn btn-default btn-sm">
                <i class="fa fa-reply"></i>
            </button>
            <button type="button" class="btn btn-default btn-sm">
                <i class="fa fa-share"></i>
            </button>
        </div>
        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
        <div class="pull-right">
            <div class="btn-group custom-pagination">
                @if ($consultas->previousPageUrl())
                    <a href="{{ $consultas->url(1) }}" class="btn btn-default btn-sm">
                        Primera
                    </a>
                    <a href="{{ $consultas->previousPageUrl() }}" class="btn btn-default btn-sm">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                @endif
                <button type="button" class="btn btn-default btn-sm" style="cursor: default;" disabled>
                    <b>{{ $consultas->firstItem() }}</b> a <b>{{ $consultas->lastItem() }}</b>
                    de <b>{{ $consultas->total() }}</b>
                </button>
                @if ($consultas->hasMorePages())
                    <a href="{{ $consultas->nextPageUrl() }}" class="btn btn-default btn-sm">
                        <i class="fa fa-chevron-right"></i>
                    </a>
                    <a href="{{ $consultas->url($consultas->lastPage()) }}" class="btn btn-default btn-sm">
                        Última
                    </a>
                @endif
            </div>
        </div>
    </div>
    <div class="table-responsive mailbox-messages">
        <table id="consultas-table" class="table table-hover table-striped">
            <tbody>
                @forelse ($consultas as $consulta)
                    <tr>
                        <td>
                            <input type="checkbox">
                        </td>
                        <td class="mailbox-name">
                            {{ $consulta->informe->gestor->nombre_completo }}
                        </td>
                        <td class="mailbox-subject">
                            <a href="{{ route('consulta.show', $consulta->id) }}">
                                <b>{{ $consulta->informe->vehiculo->dominio }}</b> - 
                                {{ $consulta->informe->tramite->nombre }}
                            </a>
                        </td>
                        <td class="mailbox-attachment">
                            @if ($consulta->path)
                                <i class="fa fa-paperclip"></i>
                            @endif
                        </td>
                        <td>
                            {{ $consulta->estado }}
                        </td>
                        <td class="mailbox-date">
                            {{ $consulta->created_at->diffForHumans() }}
                        </td>
                    </tr>
                @empty
                    sin consultas
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="box-footer no-padding">
    <div class="mailbox-controls">
        <button type="button" class="btn btn-default btn-sm checkbox-toggle">
            <i class="fa fa-square-o"></i>
        </button>
        <div class="btn-group">
            <button type="button" class="btn btn-default btn-sm">
                <i class="fa fa-trash-o"></i>
            </button>
            <button type="button" class="btn btn-default btn-sm">
                <i class="fa fa-reply"></i>
            </button>
            <button type="button" class="btn btn-default btn-sm">
                <i class="fa fa-share"></i>
            </button>
        </div>
        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
        <div class="pull-right">
            <div class="btn-group custom-pagination">
                @if ($consultas->previousPageUrl())
                    <a href="{{ $consultas->url(1) }}" class="btn btn-default btn-sm">
                        Primera
                    </a>
                    <a href="{{ $consultas->previousPageUrl() }}" class="btn btn-default btn-sm">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                @endif
                <button type="button" class="btn btn-default btn-sm" style="cursor: default;" disabled>
                    <b>{{ $consultas->firstItem() }}</b> a <b>{{ $consultas->lastItem() }}</b>
                    de <b>{{ $consultas->total() }}</b>
                </button>
                @if ($consultas->hasMorePages())
                    <a href="{{ $consultas->nextPageUrl() }}" class="btn btn-default btn-sm">
                        <i class="fa fa-chevron-right"></i>
                    </a>
                    <a href="{{ $consultas->url($consultas->lastPage()) }}" class="btn btn-default btn-sm">
                        Última
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>

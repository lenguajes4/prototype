<table id="consultas-table" class="table table-hover table-striped">
    <thead>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($consultas as $consulta)
            <tr>
                <td>
                    <a
                        href="{{ route('consulta.show', $consulta->id) }}"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="{{ $consulta->respuesta?'Pendiente':'Respondida' }}">
                        <i class="fa fa-circle text-{{ $consulta->respuesta?'success':'warning' }}"></i>
                    </a>
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
                    {{ $consulta->informe->estado->nombre }}
                </td>
                <td class="mailbox-date">
                    {{ $consulta->created_at->diffForHumans() }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

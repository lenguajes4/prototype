<div class="box box-widget">
    <div class="box-header with-border">
        <div class="user-block">
            <img class="img-circle" src="{{ asset('img/info.png') }}">
            <span class="username text-light-blue">Multas</span>
            <span class="description">
                Datos obtenidos del sistema de multas.
            </span>
        </div>
        <div class="box-tools">
            <button
                type="button"
                class="btn btn-default pull-right btn-xs"
                data-toggle="modal"
                data-url="{{ route('multa.create', $informe->id) }}"
                data-target="#modal-app">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar
            </button>
        </div>
    </div>
    <div class="box-body">
        <table class="table table-hover">
            <thead>
                @if (!empty($multas->toArray()))
                    <tr>
                        <th style="width: 7px"></th>
                        <th style="width: 7px"></th>
                        <th>N° de Acta</th>
                        <th>Jurisdicción</th>
                        <th>Monto</th>
                    </tr>
                @endif
            </thead>
            <tbody>
                @forelse ($multas as $multa)
                    <tr>
                        <td><a
                            href="#modal-app"
                            title="Click para editar"
                            data-toggle="modal"
                            data-url="{{ route('multa.{informe_id}.edit', [$informe->id, $multa->id]) }}">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td><a
                            href="#modal-app"
                            title="Click para eliminar"
                            data-toggle="modal"
                            data-url="{{ route('multa.{informe_id}.show', [$informe->id, $multa->id]) }}">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td>{{ $multa->acta }}</td>
                        <td>{{ $multa->jurisdiccion }}</td>
                        <td>${{ number_format($multa->monto, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">
                            Sin infracciones registradas en el sistema de multas.
                        </td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                @if (!empty($multas->toArray()))
                    <tr class="text-center">
                        <td colspan="4"><b><i>TOTAL</i></b></td>
                        <td>${{ number_format($informe->vehiculo->total_multas, 0, ',', '.') }}</td>
                    </tr>
                @endif
            </tfoot>
        </table>
    </div>
</div>

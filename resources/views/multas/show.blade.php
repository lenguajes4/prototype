<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Multas</h3>
        <button
            type="button"
            class="btn btn-default pull-right btn-sm"
            data-toggle="modal"
            data-url="{{ route('multa.create', $informe->id) }}"
            data-target="#modal-app">
            <i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar
        </button>
    </div>
    <div class="box-body">
        <table class="table">
            <thead>
                @if (!empty($multas->toArray()))
                    <tr>
                        <th></th>
                        <th></th>
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
                        <td>{{ $multa->monto }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">
                            Sin infracciones registradas en el sistema SUGIT.
                        </td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                @if (!empty($multas->toArray()))
                    <tr>
                        <td colspan="4">Total</td>
                        <td>${{ $informe->vehiculo->total_multas }}</td>
                    </tr>
                @endif
            </tfoot>
        </table>
    </div>
</div>

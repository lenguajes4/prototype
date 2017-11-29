<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Conceptos</h3>
        <button
            type="button"
            class="btn btn-default pull-right btn-sm"
            data-toggle="modal"
            data-url="{{ route('conceptos.create', $informe->id) }}"
            data-target="#modal-app">
            <i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar
        </button>
    </div>
    <div class="box-body">
        <table class="table">
            <thead>
                @if (!empty($conceptos->toArray()))
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Concepto</th>
                        <th>Monto</th>
                    </tr>
                @endif
            </thead>
            <tbody>
                @forelse ($conceptos as $concepto)
                    <tr>
                        <td><a
                            href="#modal-app"
                            title="Click para editar"
                            data-toggle="modal"
                            data-url="{{ route('conceptos.edit', $concepto->id) }}">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td><a
                            href="#modal-app"
                            title="Click para eliminar"
                            data-toggle="modal"
                            data-url="{{ route('conceptos.show', $concepto->id) }}">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td>{{ $concepto->nombre }}</td>
                        <td>${{ number_format($concepto->monto, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            Sin conceptos adeudados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                @if (!empty($conceptos->toArray()))
                    <tr>
                        <td colspan="3">Total</td>
                        <td>${{ number_format($informe->total_conceptos, 0, ',', '.') }}</td>
                    </tr>
                @endif
            </tfoot>
        </table>
    </div>
</div>

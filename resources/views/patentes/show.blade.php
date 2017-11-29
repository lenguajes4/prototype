<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Patentes</h3>
        <button
            type="button"
            class="btn btn-default pull-right btn-sm"
            data-toggle="modal"
            data-url="{{ route('patente.create', $informe->id) }}"
            data-target="#modal-app">
            <i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar
        </button>
    </div>
    <div class="box-body">
        <table class="table">
            <thead>
                @if (!empty($patentes->toArray()))
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Jurisdicción</th>
                        <th>Año</th>
                        <th>Periodos</th>
                        <th>$ aprox. c/u</th>
                        <th>Subtotal</th>
                    </tr>
                @endif
            </thead>
            <tbody>
                @forelse ($patentes as $patente)
                    <tr>
                        <td><a
                            href="#modal-app"
                            title="Click para editar"
                            data-toggle="modal"
                            data-url="{{ route('patente.{informe_id}.edit', [$informe->id, $patente->id]) }}">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td><a
                            href="#modal-app"
                            title="Click para eliminar"
                            data-toggle="modal"
                            data-url="{{ route('patente.{informe_id}.show', [$informe->id, $patente->id]) }}">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td>{{ $patente->jurisdiccion }}</td>
                        <td>{{ $patente->year }}</td>
                        <td>
                            {{ collect(json_decode($patente->periodos))->implode(' - ') }}
                        </td>
                        <td>${{ number_format($patente->monto_unitario, 0, ',', '.') }}</td>
                        <td>
                            $
                            {{
                                number_format((count(json_decode($patente->periodos)) * $patente->monto_unitario), 0, ',', '.')
                            }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            Sin periodos adeudados en el sistema de patentes.
                        </td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                @if (!empty($patentes->toArray()))
                    <tr>
                        <td colspan="6">Total</td>
                        <td>${{ number_format($informe->vehiculo->total_patentes, 0, ',', '.') }}</td>
                    </tr>
                @endif
            </tfoot>
        </table>
    </div>
</div>

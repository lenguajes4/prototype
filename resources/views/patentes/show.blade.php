<div class="box box-widget">
    <div class="box-header with-border">
        <div class="user-block">
            <img class="img-circle" src="{{ asset('img/car.png') }}">
            <span class="username text-light-blue">Patentes</span>
            <span class="description">
                Datos obtenidos del sistema de patentes.
            </span>
        </div>
        <div class="box-tools">
            <button
                type="button"
                class="btn btn-default pull-right btn-xs"
                data-toggle="modal"
                data-url="{{ route('patente.create', $informe->id) }}"
                data-target="#modal-app">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar
            </button>
        </div>
    </div>
    <div class="box-body">
        <table class="table table-hover">
            <thead>
                @if (!empty($patentes->toArray()))
                    <tr>
                        <th style="width: 7px"></th>
                        <th style="width: 7px"></th>
                        <th>Jurisdicción</th>
                        <th>Año</th>
                        <th>Periodos</th>
                        <th style="width: 90px">$ aprox. c/u</th>
                        <th style="width: 45px">Subtotal</th>
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
                        <td class="text-center">
                            ${{ number_format($patente->monto_unitario, 0, ',', '.') }}
                        </td>
                        <td class="text-center">
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
                    <tr class="text-center">
                        <td colspan="6"><b><i>TOTAL</i></b></td>
                        <td>${{ number_format($informe->vehiculo->total_patentes, 0, ',', '.') }}</td>
                    </tr>
                @endif
            </tfoot>
        </table>
    </div>
</div>

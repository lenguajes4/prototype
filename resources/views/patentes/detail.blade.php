<table class="table table-hover">
    <thead>
        <th>Jurisdicción</th>
        <th style="width: 30px">Año</th>
        <th>Periodos</th>
        <th style="width: 90px">$ aprox. c/u</th>
        <th style="width: 45px">Subtotal</th>
    </thead>
    <tbody>
        @foreach ($patentes as $patente)
        <tr>
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
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4"><b>Total</b></td>
            <td>${{ number_format($informe->vehiculo->total_patentes, 0, ',', '.') }}</td>
        </tr>
    </tfoot>
</table>
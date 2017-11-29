<table class="table">
    <thead>
        <th>Jurisdicción</th>
        <th>Año</th>
        <th>Periodos</th>
        <th>$ aprox. c/u</th>
        <th>Subtotal</th>
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
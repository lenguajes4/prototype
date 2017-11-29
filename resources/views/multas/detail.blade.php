<table class="table">
    <thead>
        <th>N° de Acta</th>
        <th>Jurisdicción</th>
        <th>Monto</th>
    </thead>
    <tbody>
        @foreach ($multas as $multa)
            <tr>
                <td>{{ $multa->acta }}</td>
                <td>{{ $multa->jurisdiccion }}</td>
                <td>${{ number_format($multa->monto, 0, ',', '.') }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2"><b>Total</b></td>
            <td>${{ number_format($informe->vehiculo->total_multas, 0, ',', '.') }}</td>
        </tr>
    </tfoot>
</table>

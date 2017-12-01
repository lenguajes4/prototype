<table class="table">
    <thead>
        <tr>
            <th>Concepto</th>
            <th>Monto</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($conceptos as $concepto)
            <tr>
                <td>{{ $concepto->nombre }}</td>
                <td>${{ number_format($concepto->monto, 0, ',', '.') }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td>Total</td>
            <td>${{ number_format($informe->total_conceptos, 0, ',', '.') }}</td>
        </tr>
    </tfoot>
</table>
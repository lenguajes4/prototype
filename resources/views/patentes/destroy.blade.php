{{
    Form::open(
        [
            'route' => ['patente.destroy', $patente->id],
            'method' => 'delete'
        ]
    )
}}

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title text-danger"><i class="fa fa-question-circle"></i> Eliminar periodos</h4>
    </div>

    <div class="modal-body">
        
        {{ Form::hidden('informe_id', $informe_id) }}
        
        <p>Se van a eliminar los siguientes periodos de patentes del informe:</p>
        <p>
            <b>Jurisdiccion: </b>{{ $patente->jurisdiccion }}<br>
            <b>Periodos: </b>
            @foreach (json_decode($patente->periodos) as $periodo)
                <span class="label label-danger">{{ $periodo }}</span>
            @endforeach
            <br>
            <b>Monto aprox. por periodo: </b>{{ number_format($patente->monto_unitario, 0, ',', '.') }}<br>
            <b>Subtotal: </b>{{ number_format((count(json_decode($patente->periodos)) * $patente->monto_unitario), 0, ',', '.') }}
        </p>
    </div>

    <div class="modal-footer">
        {{ Form::button('Eliminar', ['type'=>'submit', 'class'=>'btn btn-danger']) }}
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    </div>
    
{{ Form::close() }}

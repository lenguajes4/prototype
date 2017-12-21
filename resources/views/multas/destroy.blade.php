{{
    Form::open(
        [
            'route' => ['multa.destroy', $multa->id],
            'method' => 'delete'
        ]
    )
}}

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title text-danger"><i class="fa fa-question-circle"></i> Eliminar acta</h4>
    </div>

    <div class="modal-body">
        
        {{ Form::hidden('informe_id', $informe_id) }}
        
        <p>Se va a eliminar la siguiente multa del informe:</p>
        <p>
            <b>Jurisdiccion: </b>{{ $multa->jurisdiccion }}<br>
            <b>Acta: </b>{{ $multa->acta }}<br>
            <b>Monto: </b> {{ number_format($multa->monto, 0, ',', '.') }}
        </p>
    </div>

    <div class="modal-footer">
        {{ Form::button('Eliminar', ['type'=>'submit', 'class'=>'btn btn-danger']) }}
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    </div>
    
{{ Form::close() }}

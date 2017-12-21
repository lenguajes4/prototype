{{
    Form::open(
        [
            'route' => ['concepto.destroy', $concepto->id],
            'method' => 'delete'
        ]
    )
}}

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title text-danger"><i class="fa fa-question-circle"></i> Eliminar concepto</h4>
    </div>

    <div class="modal-body">
        <p>Se va a eliminar el siguiente concepto:</p>
        <p>
            <b>Nombre: </b>{{ $concepto->nombre }}<br>
            <b>Monto: </b>${{ number_format($concepto->monto, 0, ',', '.') }}
        </p>
    </div>

    <div class="modal-footer">
        {{ Form::button('Eliminar', ['type'=>'submit', 'class'=>'btn btn-danger']) }}
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    </div>
    
{{ Form::close() }}

{{
    Form::open(
        [
            'route' => ['baja.destroy'],
            'method' => 'post'
        ]
    )
}}

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title text-danger">
            <i class="fa fa-question-circle"></i> Eliminar solicitud de baja
        </h4>
    </div>
    {{ Form::hidden('informe_id', $informe->id) }}

    <div class="modal-body">
        <p>
            Se va a eliminar la solicitud de baja del municipio <b>{{ $informe->vehiculo->municipio_baja }}</b>
            de la provincia de <b>{{ $informe->vehiculo->provincia_baja }}</b>
        </p>
    </div>

    <div class="modal-footer">
        {{ Form::button('Eliminar', ['type'=>'submit', 'class'=>'btn btn-danger']) }}
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    </div>
    
{{ Form::close() }}

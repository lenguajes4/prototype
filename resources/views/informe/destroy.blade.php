{{
    Form::open(
        [
            'route' => ['informe.destroy', $informe->id],
            'method' => 'delete'
        ]
    )
}}

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title text-danger"><i class="fa fa-question-circle"></i> Eliminar Informe</h4>
    </div>

    <div class="modal-body">
        Se va a eliminar el informe correspondiente al trámite N°<b>{{ $informe->numero_tramite }}</b>
    </div>

    <div class="modal-footer">
        {{ Form::button('Eliminar', ['type'=>'submit', 'class'=>'btn btn-danger']) }}
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    </div>
    
{{ Form::close() }}
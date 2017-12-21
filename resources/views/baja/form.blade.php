{{
    Form::model(
        $informe->vehiculo,
        [
            'route' => ['baja.update'],
            'method' => 'post'
        ]
    )
}}
    <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title text-info">Solicitud de baja</h4>
    </div>
    <div class="modal-body">
        {{ Form::hidden('informe_id', $informe->id) }}

        <div class="form-group">
            {{ Form::label('provincia', 'Provincia:') }}
            {{
                Form::select(
                    'provincia_baja_id',
                    ['' => 'Seleccionar provincia...'] + $provincias,
                    null,
                    [
                        'class' => 'form-control',
                        'required'
                    ]
                )
            }}
        </div>

        <div class="form-group">
            {{ Form::label('municipio_baja', 'Municipio:') }}
            {{
                Form::text(
                    'municipio_baja',
                    null,
                    [
                        'class' => 'form-control',
                        'placeholder' => 'Municipio o jurisdicción de baja.',
                        'required'
                    ]
                )
            }}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_baja', 'Fecha de la baja:') }}
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                {{
                    Form::text(
                        'fecha_baja',
                        $informe->vehiculo->fecha_baja?date('d/m/Y', strtotime($informe->vehiculo->fecha_baja)):null,
                        [
                            'class' => 'form-control',
                            'id' => 'datemask',
                            'data-inputmask' => '"alias": "dd/mm/yyy"',
                            'data-mask',
                            'required'
                        ]
                    )
                }}
            </div>
        </div>

        {{ Form::hidden('baja_requerida', 0) }}
        <div class="checkbox">
            <label>
                {{ Form::checkbox('baja_requerida') }}&nbsp;Necesaria para retirar documentación.
            </label>
        </div>
    </div>
    <div class="modal-footer">
        {{ Form::button('Aceptar', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    </div>

{{ Form::close() }}

<script>
    $(document).ready(function() {
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"})
    })
</script>

{{
    Form::open(
        [
            'route' => ['informe.conclude', $informe->id],
            'method' => 'post'
        ]
    )
}}

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title text-success">
            <i class="fa fa-check"></i> Registrar retiro de documentación
        </h4>
    </div>

    <div class="modal-body">
        <p>Se va a registrar la fecha en la que el gestor retiró la documentación:</p>

        <div class="form-group">
            {{ Form::label('fecha_retiro', 'Fecha de retiro de documentación:') }}
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                {{
                    Form::text(
                        'fecha_retiro',
                        null,
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

        <div class="form-group">
            {{ Form::label('nota_retiro', 'Notas adicionales:') }}
            {{
                Form::textarea(
                    'nota_retiro',
                    null,
                    [
                        'class' => 'form-control',
                        'rows' => 4,
                        'placeholder' => 'Puede agregar notas...',
                        'style' => 'resize: none;'
                    ]
                )
            }}
        </div>
    </div>

    <div class="modal-footer">
        {{ Form::submit('Confirmar', ['class'=>'btn btn-success']) }}
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    </div>
    
{{ Form::close() }}

<script>
    $(document).ready(function() {
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"})
    })
</script>

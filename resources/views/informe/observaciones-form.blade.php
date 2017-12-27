{{ Form::model($informe, ['route' => ['informe.update', $informe->id], 'method' => 'put']) }}
    <div class="form-group">
        {{
            Form::textarea(
                'observaciones',
                null,
                [
                    'class' => 'form-control',
                    'rows' => 4,
                    'placeholder' => 'Redactar observaciones...',
                    'style' => 'resize: none;'
                ]
            )
        }}
    </div>
    <button
        type="submit"
        class="btn btn-default btn-xs pull-right">
        <i class="fa fa-floppy-o"></i> Guardar
    </button>
{{ Form::close() }}
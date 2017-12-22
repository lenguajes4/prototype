{{ Form::open(['route' => ['consulta.update', $consulta->id], 'method' => 'put']) }}

    <div class="form-group">
        {{ Form::label('respuesta', 'Respuesta a la consulta planteada') }}
        {{
            Form::textarea(
                'respuesta',
                null,
                [
                    'class' => 'form-control',
                    'rows' => 3,
                    'placeholder' => 'Escriba aquí su respuesta...',
                    'required',
                    'style' => 'resize: vertical;'
                ]
            )
        }}
    </div>

    {{ Form::submit('Enviar respuesta', ['class' => 'btn btn-primary']) }}
    
{{ Form::close() }}
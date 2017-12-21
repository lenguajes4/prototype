@yield('open-form')
<div class="modal-header @yield('style')">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    @yield('title')
</div>
<div class="modal-body">

    @yield('hidden')
    {{ Form::hidden('informe_id', $informe_id) }}

    <div class="form-group">
        {{ Form::label('year', 'Año:') }}
        {{
            Form::text(
                'year',
                isset($patente) ? $patente->year : null,
                [
                    'class' => 'form-control',
                    'placeholder' => 'Año',
                    'required'
                ]
            )
        }}
    </div>
    <div class="form-group">
        {{ Form::label('jurisdiccion', 'Jurisdicción:') }}
        {{
            Form::select(
                'jurisdiccion_id',
                ['' => 'Seleccionar jurisdiccion...'] + $jurisdicciones,
                isset($patente) ? $patente->jurisdiccion_id : 19,
                [
                    'class' => 'form-control',
                    'required'
                ]
            )
        }}
    </div>
    <div class="form-group">
        {{ Form::label('periodos', 'Periodos:') }}
        <div class="patentes-check btn-group" data-toggle="buttons">
            @for ($i = 1; $i < 13 ; $i++)
                <label
                    class="btn btn-default btn-sm {{ isset($patente) && in_array($i, json_decode($patente->periodos))?'active':'' }}">
                    {{
                        Form::checkbox(
                            'periodos[]',
                            $i,
                            isset($patente) && in_array($i, json_decode($patente->periodos))?true:false,
                            ['autocomplete' => 'off']
                        )
                    }}
                    {{ $i }}
                    <span class="glyphicon glyphicon-ok"></span>
                </label>
            @endfor
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('monto_unitario', 'Monto x periodo:') }}
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-usd" aria-hidden="true"></i>
            </span>
            {{
                Form::text(
                    'monto_unitario',
                    isset($patente) ? $patente->monto_unitario : null,
                    [
                        'class' => 'form-control',
                        'placeholder' => 'Monto aproximado por un periodo',
                        'required'
                    ]
                )
            }}
            <span class="input-group-addon">.00</span>
        </div>
    </div>
    
</div>
<div class="modal-footer">
    @yield('submit-form')
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
</div>
@yield('close-form')

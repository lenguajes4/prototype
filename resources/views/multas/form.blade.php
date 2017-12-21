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
        {{ Form::label('jurisdiccion', 'Jurisdicción:') }}
        {{
            Form::select(
                'jurisdiccion_id',
                ['' => 'Seleccionar jurisdiccion...'] + $jurisdicciones,
                isset($multa) ? $multa->jurisdiccion_id : 19,
                [
                    'class' => 'form-control',
                    'required'
                ]
            )
        }}
    </div>

    <div class="form-group">
        {{ Form::label('acta', 'N° de Acta:') }}
        {{
            Form::text(
                'acta',
                isset($multa) ? $multa->acta : null,
                [
                    'class' => 'form-control',
                    'placeholder' => 'N° de acta',
                    'required'
                ]
            )
        }}
    </div>

    <div class="form-group">
        {{ Form::label('monto', 'Monto:') }}
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-usd" aria-hidden="true"></i>
            </span>
            {{
                Form::text(
                    'monto',
                    isset($multa) ? $multa->monto : null,
                    [
                        'class' => 'form-control',
                        'placeholder' => 'Monto de la infracción',
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

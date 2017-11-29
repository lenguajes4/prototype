@yield('open-form')
<div class="modal-header @yield('style')">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    @yield('title')
</div>
<div class="modal-body">

    @yield('hidden')

    <div class="form-group">
        {{ Form::label('nombre', 'Nombre:') }}
        {{
            Form::text(
                'nombre',
                isset($concepto) ? $concepto->nombre : null,
                [
                    'class' => 'form-control',
                    'placeholder' => 'Título del concepto',
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
                    isset($concepto) ? $concepto->monto : null,
                    [
                        'class' => 'form-control',
                        'placeholder' => 'Monto del concepto',
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
    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancelar</button>
</div>
@yield('close-form')

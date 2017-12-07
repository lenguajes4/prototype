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
        {{ Form::label('nombre', 'Nombres:', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-8">
            {{
                Form::text(
                    'nombre',
                    isset($gestor) ? $gestor->nombre : null,
                    [
                        'class' => 'form-control',
                        'placeholder' => 'Ingresar nombre del gestor',
                        'required'
                    ]
                )
            }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('apellido', 'Apellido:', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-8">
            {{
                Form::text(
                    'apellido',
                    isset($gestor) ? $gestor->apellido : null,
                    [
                        'class' => 'form-control',
                        'placeholder' => 'Ingresar apellido',
                        'required'
                    ]
                )
            }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('telefono', 'Teléfono:', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-8">
            {{
                Form::text(
                    'telefono',
                    isset($gestor) ? $gestor->telefono : null,
                    [
                        'class' => 'form-control',
                        'placeholder' => 'Ingresar teléfono sin 0 ni 15',
                        'required',
                        'id' => 'phonemask',
                        'data-inputmask' => '"mask": "(999) 9-999999"',
                        'data-mask'
                    ]
                )
            }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('email', 'E-mail:', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-8">
            {{
                Form::text(
                    'email',
                    isset($gestor) ? $gestor->email : null,
                    [
                        'class' => 'form-control',
                        'placeholder' => 'Ingresar correo electrónico',
                        'required'
                    ]
                )
            }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('dni', 'DNI:', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-8">
            {{
                Form::text(
                    'dni',
                    isset($gestor) ? $gestor->dni : null,
                    [
                        'class' => 'form-control',
                        'placeholder' => 'Ingresar N° de documento',
                        'required'
                    ]
                )
            }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('matricula', 'Matrícula:', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-8">
            {{
                Form::text(
                    'matricula',
                    isset($gestor) ? $gestor->matricula : null,
                    [
                        'class' => 'form-control',
                        'placeholder' => 'Ingresar N° de matrícula',
                        'required'
                    ]
                )
            }}
        </div>
    </div>
</div>
<div class="modal-footer">
    @yield('submit-form')
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
</div>
@yield('close-form')

<script>
    $(document).ready(function() {
        $("#phonemask").inputmask()
    })
</script>
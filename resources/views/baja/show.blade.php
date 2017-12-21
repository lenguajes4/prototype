<div class="box box-solid">
    <div class="box-header with-border">
        <i class="fa fa-bookmark"></i>
        <h3 class="box-title">Requerimiento de baja</h3>
        @if ($informe->vehiculo->municipio_baja)
            <span class="pull-right-container">
                <span class="pull-right">
                    <a
                        href="#modal-app"
                        title="Click para editar"
                        data-toggle="modal"
                        data-url="{{ route('baja.edit', $informe->id) }}">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                    &nbsp;
                    <a
                        href="#modal-app"
                        title="Click para eliminar"
                        data-toggle="modal"
                        data-url="{{ route('baja.show', $informe->id) }}">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </span>
            </span>
        @else
            <button
                type="button"
                class="btn btn-default pull-right btn-sm"
                data-toggle="modal"
                data-url="{{ route('baja.edit', $informe->id) }}"
                data-target="#modal-app">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Solicitar baja
            </button>
        @endif
    </div>
    <div class="box-body">
        @if ($informe->vehiculo->municipio_baja)
            <blockquote>
                <p>
                    Deberá presentar comprobante de BAJA del municipio <b>{{ $informe->vehiculo->municipio_baja }}</b>
                    de la provincia de <b>{{ $informe->vehiculo->provincia_baja }}</b>
                    con fecha <b>{{ date('d/m/Y', strtotime($informe->vehiculo->fecha_baja)) }}</b> o posterior.
                </p>
                <small>
                    Esta documentación
                    @if ($informe->vehiculo->baja_requerida)
                        será requerida
                    @else
                        no es excluyente
                    @endif
                    para retirar la documentación.
                </small>
            </blockquote>
        @else
            <p>
                No se registró ningun requerimiento de baja desde otro municipio.
            </p>
        @endif
    </div>
</div>

<div class="box box-solid">
    <div class="box-header with-border">
        <i class="fa fa-bookmark"></i>
        <h3 class="box-title">Requerimiento de baja</h3>
    </div>
    <div class="box-body">
        @if ($informe->vehiculo->municipio_baja)
            <a
                href="#modal-app"
                title="Click para editar"
                data-toggle="modal"
                data-url="{{ route('baja.edit', $informe->id) }}">
                <i class="fa fa-pencil" aria-hidden="true"></i>
            </a>
            <a
                href="#modal-app"
                title="Click para eliminar"
                data-toggle="modal"
                data-url="{{ route('baja.show', $informe->id) }}">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
            Deberá presentar comprobante de BAJA del municipio <b>{{ $informe->vehiculo->municipio_baja }}</b>
            de la provincia de <b>{{ $informe->vehiculo->provincia_baja }}</b>
            con fecha {{ date('d/m/Y', strtotime($informe->vehiculo->fecha_baja)) }} o posterior.

        @else
            <p>
                No se registró ningun requerimiento de baja desde otro municipio.
            </p>
            <button
                type="button"
                class="btn btn-default pull-right btn-sm"
                data-toggle="modal"
                data-url="{{ route('baja.edit', $informe->id) }}"
                data-target="#modal-app">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Solicitar baja
            </button>
        @endif
    </div>
</div>

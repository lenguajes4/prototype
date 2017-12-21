<div class="box-footer box-comments">
    <div class="box-comment">
        <img class="img-circle img-sm" src="{{ asset('img/dollar.png') }}">
        <div class="comment-text">
            <span class="username">
                Conceptos adeudados
                <span class="text-muted pull-right">
                    <a
                        href="#modal-app"
                        class="pull-right text-muted"
                        data-toggle="modal"
                        data-url="{{ route('concepto.create', $informe->id) }}">
                        + Agregar
                    </a>
                </span>
            </span>
            <p>
                @forelse ($conceptos as $concepto)
                    <a
                        href="#modal-app"
                        title="Click para editar"
                        data-toggle="modal"
                        data-url="{{ route('concepto.edit', $concepto->id) }}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                    &nbsp;
                    <a
                        href="#modal-app"
                        title="Click para eliminar"
                        data-toggle="modal"
                        data-url="{{ route('concepto.show', $concepto->id) }}">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                    &nbsp;
                    <b>
                        ${{ number_format($concepto->monto, 0, ',', '.') }}
                    </b> por {{ $concepto->nombre }}
                    <br>
                @empty
                    No se adeudan conceptos registrales.
                @endforelse
            </p>
        </div>
    </div>
</div>

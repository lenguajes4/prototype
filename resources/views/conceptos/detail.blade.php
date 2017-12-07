<div class="box-footer box-comments">
    <div class="box-comment">
        <img class="img-circle img-sm" src="{{ asset('img/dollar.png') }}">
        <div class="comment-text">
            <span class="username">
                Conceptos adeudados
            </span>
            <p>
                @foreach ($conceptos as $concepto)
                    <b>
                        ${{ number_format($concepto->monto, 0, ',', '.') }}
                    </b> por {{ $concepto->nombre }}
                    <br>
                @endforeach
            </p>
        </div>
    </div>
</div>

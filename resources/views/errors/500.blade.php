@extends('errors.main')
@section('content')
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-red"> 500</h2>
            <div class="error-content">
                <h3><i class="fa fa-warning text-red"></i> Oops! Ocurrió un error.</h3>
                <p>
                    Sucedió algo inesperado.
                    Puede <a href="/">regresar al inicio</a>.
                </p>
            </div>
        </div>
    </section>
@endsection

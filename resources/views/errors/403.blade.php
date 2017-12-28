@extends('errors.main')
@section('content')
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-yellow"> 403</h2>
            <div class="error-content">
                <h3><i class="fa fa-warning text-yellow"></i> Sitio no encontrado.</h3>
                <p>
                    El recurso no puede mostrarse. Probablemente el rol no le permite operar en esta sección.
                    Puede <a href="/">regresar al inicio</a>.
                </p>
            </div>
        </div>
    </section>
@endsection

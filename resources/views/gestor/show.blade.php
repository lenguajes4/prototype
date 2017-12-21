<div class="box box-widget widget-user">
    <div class="widget-user-header bg-aqua-active">
        <h3 class="widget-user-username">{{ $gestor->nombre_completo }}</h3>
        <h5 class="widget-user-desc">Matrícula: {{ $gestor->matricula }}</h5>
    </div>
    <div class="widget-user-image">
        <img class="img-circle" src="/img/users/{{ $gestor->image_path }}" alt="User Avatar">
    </div>
    <div class="box-footer">
        <div class="row">
            <div class="col-sm-4 border-right">
                <div class="description-block">
                    <h5 class="description-header">{{ $gestor->telefono }}</h5>
                    <span class="description-text">TELEFONO</span>
                </div>
            </div>
            <div class="col-sm-4 border-right">
                <div class="description-block">
                    <h5 class="description-header">{{ $gestor->email }}</h5>
                    <span class="description-text">EMAIL</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="description-block">
                    <h5 class="description-header">{{ number_format($gestor->dni, 0, ',', '.') }}</h5>
                    <span class="description-text">DNI</span>
                </div>
            </div>
        </div>
    </div>
</div>
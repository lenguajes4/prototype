@extends('gestor.dashboard.main')
@section('content')
{{
    Form::open(
        [
            'route' => 'consulta.store',
            'method' => 'post',
            'enctype'=>'multipart/form-data'
        ]
    )
}}
    <div class="panel panel-default">
        <div class="panel-body">
            Si tiene alguna consulta sobre el trámite
            N°<b>{{ number_format($informe->numero_tramite, 0, ',', '.') }}</b>
            ({{ $informe->tramite->nombre }})
            puede enviar su consulta e incluir un archivo de ser necesario.
            Por este medio obtendrá la respuesta del personal del registro correspondiente.

            {{ Form::hidden('informe_id', $informe->id) }}

            <div class="form-group">
                {{ Form::label('consulta', 'Consulta') }}
                {{
                    Form::textarea(
                        'consulta',
                        null,
                        [
                            'class' => 'form-control',
                            'rows' => 5,
                            'placeholder' => 'Escriba aquí su consulta...',
                            'required',
                            'style' => 'resize: vertical;'
                        ]
                    )
                }}
            </div>

            {{ Form::file('path', ['id' => 'path']) }}
            <p class="help-block">
                <button class="btn btn-default btn-xs" type="button" id="clear">Limpiar archivo</button>
            </p>
            
            {{ Form::submit('Enviar', ['class' => 'btn btn-primary pull-right']) }}
        </div>
    </div>
    {{ Form::close() }}
@endsection

@section('js')
    <script>
    $(document).ready(function(){
        $('#clear').on("click", function(){
            let path = $('#path')
            path.replaceWith(path.val('').clone( true ))
        })
    })
    </script>
@endsection

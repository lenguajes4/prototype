@extends('layouts.main')

@section('content-header')
    <section class="content-header">
        <h1>
            Informes
            <small>Informe del trámite {{ $informe->numero_tramite }}</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('informe.index') }}">
                    <i class="fa fa-file-text-o"></i> Informes
                </a>
            </li>
            <li class="active">Trámite N° {{ $informe->numero_tramite }}</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-2">
            <div class="box box-solid">
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li>
                            <a href="{{ route('informe.edit', $informe->id) }}" class="text-light-blue">
                                <i class="fa fa-pencil-square-o"></i> Editar
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-red">
                                <i class="fa fa-trash"></i> Eliminar
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-file-text-o"></i>
                    <h3 class="box-title">Informe de estado de trámite</h3>
                </div>
                <div class="box-body">
                </div>
            </div>
        </div>
    </div>
    
@endsection

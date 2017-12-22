@extends('gestor.dashboard.main')

@section('content')
    <h3><small>Trámites presentados.</small></h3>
    
    <div class="table-responsive table-informes">
        <table id="informe-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 50px;">N°</th>
                    <th>Dominio</th>
                    <th>Trámite</th>
                    <th>Estado</th>
                    <th>Registro</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($informes as $informe)
                    <tr>
                        <td>
                            <span class="sr-only">
                                {{ $informe->status ? 1 : 0 }}
                            </span>
                            <i class="fa fa-circle text-{{ $informe->status ? 'success' : 'danger' }}"></i>
                            <a
                                href="{{ route('gestor.showInforme', $informe->id) }}"
                                title="Ver informe">
                                {{ $informe->numero_tramite }}
                            </a>
                        </td>
                        <td>
                            <a
                                href="{{ route('gestor.showInforme', $informe->id) }}"
                                title="Ver informe">
                                {{ $informe->vehiculo->dominio }}
                            </a>
                        </td>
                        <td>
                            <a
                                href="{{ route('gestor.showInforme', $informe->id) }}"
                                title="Ver informe">
                                {{ $informe->tramite->nombre }}
                            </a>
                        </td>
                        <td>
                            @if ($informe->status)
                                Listo para retirar
                            @else
                                Con observaciones
                            @endif
                        </td>
                        <td>
                            {{ $informe->registro->nombre }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
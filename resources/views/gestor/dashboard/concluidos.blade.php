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
                    <th>Registro</th>
                    <th>Fecha de retiro</th>
                    <th>Notas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($informes as $informe)
                    <tr>
                        <td>
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
                            {{ $informe->registro->nombre }}
                        </td>
                        <td>
                            {{ $informe->fecha_retiro }}
                        </td>
                        <td>
                            {{ $informe->nota_retiro }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
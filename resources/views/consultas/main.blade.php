@extends('layouts.main')

@section('css')
    <link href="{{ asset('css/icheck.css') }}" rel="stylesheet">
@endsection

@section('content-header')
    <section class="content-header">
        <h1>
            Consultas
            <small>Proventientes de los gestores</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('consulta.index') }}">
                    <i class="fa fa-envelope-o"></i> Consultas
                </a>
            </li>
            <li class="active">
                @yield('title', 'Consultas')
            </li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Carpetas</h3>
                    <div class="box-tools">
                        <button
                            type="button"
                            class="btn btn-box-tool"
                            data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="{{ (Request::is('consulta'))? 'active' : '' }}">
                            <a href="{{ route('consulta.index') }}">
                                <i class="fa fa-inbox"></i> Todas
                                <span class="label label-primary pull-right">
                                    {{ \Auth::user()->registro->consultas->count() }}
                                </span>
                            </a>
                        </li>
                        <li class="{{ (Request::is('consultas-pendientes'))? 'active' : '' }}">
                            <a href="{{ route('consulta.showPendientes') }}">
                                <i class="fa fa-envelope-o"></i> Pendientes
                                <span class="label label-danger pull-right">
                                    {{ \Auth::user()->registro->consultas_pendientes_count }}
                                </span>
                            </a>
                        </li>
                        <li class="{{ (Request::is('consultas-respondidas'))? 'active' : '' }}">
                            <a href="{{ route('consulta.showRespondidas') }}">
                                <i class="fa fa-paper-plane-o"></i> Respondidas
                                <span class="label label-success pull-right">
                                    {{ \Auth::user()->registro->consultas_respondidas_count }}
                                </span>
                            </a>
                        </li>
                        <li class="{{ (Request::is('consultas-borrador'))? 'active' : '' }}">
                            <a href="{{ route('consulta.showBorrador') }}">
                                <i class="fa fa-file-text-o"></i> Borradores
                                <span class="label label-warning pull-right">
                                    {{ \Auth::user()->registro->consultas_borrador_count }}
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @yield('mailbox')
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/icheck.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            initializeICheck()
            selectAllCheckbox()

            $(document).on('click', '.custom-pagination a', function (e) { 
                e.preventDefault()
                $.ajax({
                    url: '/consulta',
                    data:
                        {
                            page: $(this).attr('href').split('page=')[1]
                        }, 
                    type: 'GET',
                    dataType: 'json',
                    success: function (rta) {
                        $('.consultas').html(rta)
                        initializeICheck()
                        selectAllCheckbox()
                    }
                })
            })

            function initializeICheck() {
                $('.mailbox-messages input[type="checkbox"]').iCheck({
                    checkboxClass: 'icheckbox_flat-blue',
                    radioClass: 'iradio_flat-blue'
                })
            }

            function selectAllCheckbox() {
                $(".checkbox-toggle").click(function () {
                    let clicks = $(this).data('clicks')
                    if (clicks) {
                        //Uncheck all checkboxes
                        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck")
                        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o')
                    } else {
                        //Check all checkboxes
                        $(".mailbox-messages input[type='checkbox']").iCheck("check")
                        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o')
                    }
                  $(this).data("clicks", !clicks)
                })
            }
        })
    </script>
@endsection

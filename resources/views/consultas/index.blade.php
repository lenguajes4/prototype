@extends('layouts.main')

@section('content-header')
    <section class="content-header">
        <h1>
            Consultas
            <small>Proventientes de los gestores</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('consultas.index') }}">
                    <i class="fa fa-envelope-o"></i> Consultas
                </a>
            </li>
            <li class="active">Bandeja de entrada</li>
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
                        <li class="active">
                            <a href="#">
                                <i class="fa fa-inbox"></i> Entrantes
                                <span class="label label-primary pull-right">12</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-envelope-o"></i> Respondidas</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-file-text-o"></i> Borradores</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Bandeja de entrada</h3>
                    <div class="box-tools pull-right">
                        <div class="has-feedback">
                            <input type="text" class="form-control input-sm" placeholder="Buscar">
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <div class="mailbox-controls">
                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                        </div>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                        <div class="pull-right">
                            1-50/200
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td class="mailbox-star">
                                        <a href="#"><i class="fa fa-star text-yellow"></i></a>
                                    </td>
                                    <td class="mailbox-name">
                                        <a href="read-mail.html">Alexander Pierce</a>
                                    </td>
                                    <td class="mailbox-subject">
                                        <b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
                                    </td>
                                    <td class="mailbox-attachment">
                                        <i class="fa fa-paperclip"></i>
                                    </td>
                                    <td class="mailbox-date">
                                        5 mins ago
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-footer no-padding">
                    <div class="mailbox-controls">
                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                        </div>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                        <div class="pull-right">
                            1-50/200
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
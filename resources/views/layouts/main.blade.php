<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/_all-skins.min.css') }}" rel="stylesheet">

    @yield('css')

</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('layouts.header')

        <aside class="main-sidebar">
            @include('layouts.sidebar')
        </aside>

        <div class="content-wrapper">
            @yield('content-header')
            
            <section class="content">
                <div class="row" >
                    <div class="col-md-12">
                        <br>
                        @include('layouts.partials.success')
                        @include('layouts.partials.errors')
                    </div>
                </div>

                @yield('content')
                
            </section>
        </div>

        @include('layouts.footer')
    </div>

    <!-- Modal para todas las acciones en el modulo de empleado | encargado -->
    <div class="modal fade" id="modal-app" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modal-app-content"></div>
        </div>
    </div>
    
    <script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="{{ asset('js/viaAjaxLite.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#modal-app').on('show.bs.modal', function (event) {
                $.viaAjaxLite.load({
                    target: '#modal-app-content',
                    url: $(event.relatedTarget).data('url')
                })
            })
        })
    </script>
    
    @yield('js')
    
</body>
</html>

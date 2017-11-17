@extends('layouts.main')
@section('content')
    <div class="wrapper">

        @include('dashboard.header')

        <aside class="main-sidebar">
            @include('dashboard.sidebar')
        </aside>

        <div class="content-wrapper">
            @yield('content-header')
            
            <section class="content">

                @yield('main-content')
                
            </section>
        </div>

        @include('dashboard.footer')

        <!-- Control Sidebar -->
            {{-- toggled aside view here --}}
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
@endsection

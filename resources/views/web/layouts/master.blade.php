<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}{{--../../plugins/fontawesome-free/css/all.min.css--}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.css') }}{{--../../dist/css/adminlte.min.css--}}">
    @livewireStyles
    @yield('css')
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

    <!-- Navbar -->
    @include('web.layouts.navbar')
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
            @include('web.layouts.content-header')
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container">
               @yield('content')
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    {{--<!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>--}}
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    @include('web.layouts.footer')

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
    @livewireScripts
    <x-livewire-alert::scripts />
<!-- jQuery -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}{{--../../plugins/jquery/jquery.min.js--}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}{{--../../plugins/bootstrap/js/bootstrap.bundle.min.js--}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}{{--../../dist/js/adminlte.min.js--}}"></script>
<script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('vendor/bs-custom-file-input/bs-custom-file-input.min.js') }}{{--../../plugins/bs-custom-file-input/bs-custom-file-input.min.js--}}"></script>
<!-- AdminLTE for demo purposes -->
{{--<script src="../../dist/js/demo.js"></script>--}}
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>
@yield('js')
</body>
</html>

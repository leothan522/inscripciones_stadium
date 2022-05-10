@extends('adminlte::page')

@section('plugins.Sweetalert2', true)
@section('plugins.Pace', true)
@section('plugins.tempusdominusBootstrap4', true)
@section('title', 'Dashboard')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Eventos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{--<li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                    <li class="breadcrumb-item active">Eventos Registrados</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@stop

@section('content')
    @livewire('eventos-component')
@endsection

@section('footer')
    @include('dashboard.footer')
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css">--}}
    {{--<script src="{{ asset('vendor/moment/moment.min.js') }}"></script>--}}
@endsection

@section('js')
   <script>
       //Date picker
       $(function () {
           $('#datetimepicker1').datetimepicker({
               format: 'L',
               locale: 'es'
           });
           $('#datetimepicker3').datetimepicker({
               format: 'LT'
           });
       });

       console.log('Hi!');
   </script>
@endsection



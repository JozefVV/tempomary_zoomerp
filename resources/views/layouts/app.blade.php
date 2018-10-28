<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--SASS--}}
    <link rel="stylesheet" href="{{  asset('css/app.css') }}">

</head>
<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <!-- Navbar -->
        @include('partials.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            @include('partials.logo')
            <!-- /. Brand Logo End -->

            <!-- Sidebar -->
            @include('partials.sidebar')
            <!-- /.sidebar -->
         </aside>

        @yield('content', 'Default Content ...')

        <!-- Footer -->
        @include('partials.footer')
        <!-- /. Footer End -->

        <!-- Control Sidebar -->
        @include('partials.control_sidebar')
        <!-- /.control-sidebar End -->

    </div>
    <!-- ./wrapper -->

    {{--SASS--}}
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>

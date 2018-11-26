@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.page_header')
        <!-- /. Content Header (Page header) End-->

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            @include('partials.dashboard_box',['title' =>'Users'])
            @include('partials.dashboard_box', ['title' =>'Orders'])
            <!-- /.card Default box End-->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    {{-- {{ Debugbar::info('Rola prihlaseneho usera: ' . Auth::user()->role->name ) }} --}}
    {{ Debugbar::debug( Auth::user()->toarray() ) }}
    {{--{{ Debugbar::debug( Auth::user()->hasRole('superadmin') ) }}--}}
    {{--{{ Debugbar::debug( Auth::user()->hasRole('user') ) }}--}}
@endsection

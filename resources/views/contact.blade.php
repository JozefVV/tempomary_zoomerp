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
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kontaktný formulár</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    Tu bude kontaktný formulár.
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    {{ Debugbar::info('Rola prihlaseneho usera: ' . Auth::user()->role->name ) }}
    {{ Debugbar::debug( Auth::user()->toarray() ) }}
    {{--{{ Debugbar::debug( Auth::user()->hasRole('superadmin') ) }}--}}
    {{--{{ Debugbar::debug( Auth::user()->hasRole('user') ) }}--}}
@endsection

@extends('layouts.dashboardBaseLayout')
@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset( 'assets/DataTables/datatables.min.css' )}}" />

<div class="content-margin">
    {{--
    <div class="row">
        <div class="col-md-2">
            <button class="btn btn-success">Uložiť</button>
        </div>
    </div> --}}

    <div data-collapsed="0" class="panel">
        <div class="panel-heading">
            <div class="panel-title">
                <div class="panel-actions">
                    <button id="submit_create_form" class="btn btn-success">Uložiť</button>
                    <a href="" class="btn btn-success">Späť</a>
                </div>
                <h2 class="panel-title">Nová kategória</h2>
            </div>
        </div>

        <div class="panel-body">

            <div class="row">
                <form id="create_category_form" method="POST" action="{{route('category.store')}}">
                    {{csrf_field()}}
                    <div class="col-md-6">

                        <div data-collapsed="0" class="panel">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h2 class="panel-title">Kategória</h2>
                                </div>
                            </div>

                            <div class="panel-body">

                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="inputDefault">Názov</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="category_name" value="">
                                        </div>
                                    </div>

                                    {{--
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="inputDefault">Nadradená kategória</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="email" value="">
                                        </div>
                                    </div> --}}

                                </div>
                            </div>
                        </div>
                    </div>



                </form>

            </div>

        </div>
    </div>


    <script>
        $(document).ready( function () {
            $('#submit_create_form').on('click', function(){
                $('#create_category_form').submit();
            });

        });
    </script>
@endsection

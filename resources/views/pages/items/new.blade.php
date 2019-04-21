@extends('layouts.dashboardBaseLayout')
@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset( 'assets/DataTables/datatables.min.css' )}}" />
<link rel="stylesheet" type="text/css" href="{{ asset( 'octopusTemplateAssets/vendor/select2/select2.css' )}}" />
{{-- <link rel="stylesheet" type="text/css" href="{{ asset( 'octopusTemplateAssets/vendor/bootstrap-multiselect/bootstrap-multiselect.css' )}}" /> --}}


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
                </div>
                <h2 class="panel-title">Nový produkt</h2>
            </div>
        </div>

        <div class="panel-body">

            <div class="row">
                <form id="create_shop_form" method="POST" action="{{route('item.store')}}">
                    {{csrf_field()}}

                    <div class="col-md-6">
                        <div data-collapsed="0" class="panel">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h2 class="panel-title">Produkt</h2>
                                </div>
                            </div>

                            <div class="panel-body">

                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="inputDefault">Názov</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="name" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div data-collapsed="0" class="panel">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <div class="panel-actions">
                                        <button id="create_new_category" class="btn btn-success">Pridať</button>
                                    </div>
                                    <h2 class="panel-title">Kategórie</h2>
                                </div>
                            </div>

                            <div class="panel-body">

                                <div class="row">
                                        <div class="form-group">
												<label class="col-md-3 control-label">Kategorie produktu</label>
												<div class="col-md-6">
													<select id="multiselect_categories" multiple class="form-control" name="categories[]">
                                                        @forelse ($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @empty
                                                            <option value="0">žiadne možnosti</option>
                                                        @endforelse
													</select>
												</div>
											</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div data-collapsed="0" class="panel">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <div class="panel-actions">
                                        <button id="create_new_attribute" class="btn btn-success">Pridať</button>
                                    </div>
                                    <h2 class="panel-title">Atribúty</h2>
                                </div>
                            </div>

                            <div class="panel-body">

                                <div class="row">
                                        <div class="form-group">
                                                <label class="col-md-3 control-label">Atribúty produktu</label>
                                                <div class="col-md-6">
                                                    <select id="multiselect_attributes" multiple class="form-control" name="attributes[]">
                                                        @forelse ($attributes as $attribute)
                                                            <option value="{{$attribute->id}}">{{$attribute->name}}</option>
                                                        @empty
                                                            <option value="0">žiadne možnosti</option>
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div data-collapsed="0" class="panel">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h2 class="panel-title">Galéria</h2>
                                </div>
                            </div>

                            <div class="panel-body">

                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="inputDefault">Názov</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="name" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </form>

            </div>

        </div>
    </div>

    {{-- <script src="{{ asset( 'octopusTemplateAssets/vendor/bootstrap-multiselect/bootstrap-multiselect.js' )}}"></script> --}}
    <script src="{{ asset( 'octopusTemplateAssets/vendor/select2/select2.js' )}}"></script>

    <script>
        $(document).ready( function () {

            //create_new_category

            $('#multiselect_categories ').select2({
                language: "sk"
            });;
            $('#multiselect_attributes ').select2({
                language: "sk"
            });;

            $('#create_new_attribute').on('click', function(){
                // todo: handle new attribute creation
            });

            $('#create_new_category').on('click', function(){
                // todo: handle new category creation
            });

            $('#submit_create_form').on('click', function(){
                $('#create_shop_form').submit();
            });

        });
    </script>
@endsection

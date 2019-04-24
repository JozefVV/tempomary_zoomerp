@extends('layouts.dashboardBaseLayout')
@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset( 'assets/DataTables/datatables.min.css' )}}" />
<link rel="stylesheet" type="text/css" href="{{ asset( 'octopusTemplateAssets/vendor/select2/select2.css' )}}" /> {{--
<link rel="stylesheet" type="text/css" href="{{ asset( 'octopusTemplateAssets/vendor/bootstrap-multiselect/bootstrap-multiselect.css' )}}"
/> --}}


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
                    <button type="button" id="submit_create_form" class="btn btn-success">Uložiť</button>
                </div>
                <h2 class="panel-title">Nový produkt</h2>
            </div>
        </div>

        <div class="panel-body">

            <div class="row">
                <form id="create_item_form" method="POST" action="{{route('item.store')}}">
                    {{csrf_field()}}
                    <input id="redirect_state" name="redirect[active]" type="number" value="0" style="display:none">
                    <input id="redirect_where" name="redirect[to]" type="text" value="" style="display:none">

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
                                        <label class="col-md-3 control-label" for="name">Názov</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="name" value="{{$oldValues['name'] ?? 'no text'}}">
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
                                        <button type="button" id="create_new_category" class="btn btn-success">Pridať novú</button>
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
                                                    @if (in_array($category->id, ( $oldValues['categories']) ?? [] ))
                                                        <option selected value="{{$category->id}}">{{$category->name}}</option>
                                                    @else
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endif
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

                    <div class="col-md-12">
                        <div data-collapsed="0" class="panel">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <div class="panel-actions">
                                        <button type="button" id="create_new_attribute" class="btn btn-success">Pridať nový</button>
                                    </div>
                                    <h2 class="panel-title">Atribúty</h2>
                                </div>
                            </div>

                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Atribút</label>
                                            <div class="col-md-6">
                                                <select id="select_attributes" class="form-control" name="attribute_selected">
                                                    <option value="0" selected disabled hidden>Vyberte existujúci atribút</option>
                                                    @forelse ($attributes as $attribute)
                                                        <option value="{{$attribute->id}}">{{$attribute->name}}</option>
                                                    @empty
                                                        <option value="0">žiadne možnosti</option>
                                                    @endforelse
                                            </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Podľa šablóny</label>
                                            <div class="col-md-6">
                                                <select id="select_attributes_template" class="form-control" name="attribute_template">
                                                    @forelse ($attribute_templates as $attribute_template)
                                                        <option value="{{$attribute_template->id}}">{{$attribute_template->name}}</option>
                                                    @empty
                                                        <option value="0">žiadne možnosti</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">


                                    <div class="panel-body" style="display: block;">
                                        <div class="table-responsive">
                                            <table class="table mb-none" id="attributes_list">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Atribút</th>
                                                        <th>Hodnota</th>
                                                        <th>Akcie</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($oldValues['attributeValue']['id'] ?? [] as $attribute_id)
                                                    <tr>
                                                        <td class="att_col_index">{{ $loop->iteration }}</td>
                                                        <td class="att_col_name">{{ $oldValues['attributeValue']['name'][$loop->index] }}</td>
                                                        <td class="att_col_value">
                                                            <input class="form-control" value="{{ $oldValues['attributeValue']['id'][$loop->index] }}" type="number" name="attributeValue[id][]"
                                                                style="display:none">
                                                            <input class="form-control" value="{{ $oldValues['attributeValue']['name'][$loop->index] }}" type="text" name="attributeValue[name][]"
                                                                style="display:none">
                                                            <input class="form-control" value="{{ $oldValues['attributeValue']['value'][$loop->index] }}" name="attributeValue[value][]"
                                                                type="text">
                                                        </td>
                                                        <td class="att_col_actions actions">
                                                            {{-- <a href="#"><i class="fa fa-pencil"></i></a> --}}
                                                            <a href="#" class="delete-row"><i class="fa fa-trash-o"></i></a>

                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    <tr id="attribute_row_template" style="display:none">
                                                        <td class="att_col_index"></td>
                                                        <td class="att_col_name"></td>
                                                        <td class="att_col_value">
                                                            <input class="form-control" type="number" name="attributeValue[id][]" style="display:none" disabled>
                                                            <input class="form-control" type="text" name="attributeValue[name][]" style="display:none" disabled>
                                                            <input class="form-control" name="attributeValue[value][]" type="text" disabled>
                                                        </td>
                                                        <td class="att_col_actions actions">
                                                            {{-- <a href="#"><i class="fa fa-pencil"></i></a> --}}
                                                            <a href="#" class="delete-row"><i class="fa fa-trash-o"></i></a>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>

                    {{--
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
                                            <input type="text" class="form-control" name="gallery[name]" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </form>

            </div>

        </div>
    </div>

    <script src="{{ asset( 'octopusTemplateAssets/vendor/select2/select2.js' )}}"></script>

    <script>
        $(document).ready( function () {

            $('#multiselect_categories').select2({
                language: "sk"
            });

            $('#select_attributes').on('change', function (e) {
                var selected_id = $("#select_attributes :selected").val();
                var selected_name = $("#select_attributes :selected").text();

                addAttriuteToTable(selected_id, selected_name);
                $(this).val(0); //reset dropdown selection
            });

            //delete attribute row
            $('.delete-row').on('click',function(e) {
                e.preventDefault();
                deleteAttributeRow(this);
            })

            $('#create_new_attribute').on('click', function(){
                redirectToCreateRelated('attribute.create');
            });

            $('#create_new_category').on('click', function(){
                redirectToCreateRelated('category.create');
            });

            $('#submit_create_form').on('click', function(){
                $('#create_item_form').submit();
            });



        });
        function deleteAttributeRow(source)
        {
            $(source).parents('tr')[0].remove();
        }

        function addAttriuteToTable(attribute_id,attribute_name)
        {
            var row = createRow();
            var numOfRows = $('#attributes_list tbody tr').length - 1;
            fillRow(row, numOfRows, attribute_id,attribute_name);
        }

        function fillRow(row, index,attribute_id, attribute_name)
        {
            $(row).find('.att_col_index').html(index);
            $(row).find('.att_col_name').html(attribute_name);

            var formCell = $(row).find('.att_col_value');
            $(formCell).find("input[name='attributeValue[id][]']").val(attribute_id);
            $(formCell).find("input[name='attributeValue[name][]']").val(attribute_name);
        }

        function createRow()
        {
            var newRow = $('#attribute_row_template').clone(true)
                            .appendTo( $('#attribute_row_template').parent() )
                            .removeAttr('id')
                            .removeAttr('style');
            $(newRow).find('input').each( function(){
                $(this).removeAttr('disabled');
            });
            return newRow;
        }

        function redirectToCreateRelated(where)
        {
            $('#create_item_form').find('#redirect_state').val(1);
            $('#create_item_form').find('#redirect_where').val(where);
            $('#create_item_form').submit();
        }
    </script>
@endsection

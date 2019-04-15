@extends('layouts.dashboardBaseLayout')
@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset( 'assets/DataTables/datatables.min.css' )}}" />

<div class="content-margin">
    <div class="row">
        <div class="col-md-6">

            @component('partials.components.showFormPanel') @slot('title') O pobočke @endslot

            <form method="POST" action="{{ route('warehouse.update',['warehouse' => $warehouse->id]) }}">
                {{method_field('PATCH')}} {{csrf_field()}}
                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputDefault">Názov</label>
                    <div class="col-md-9">
                        <p>{{$warehouse->name}}</p>
                        <input type="text" class="form-control" name="name" value="{{$warehouse->name}}" style="display:none">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputDefault">Pobočka</label>
                    <div class="col-md-9">
                        @if (is_null($warehouse->shop)) Nie je @else
                        <a href="#">{{$warehouse->shop->name}}</a> @endif
                    </div>
                </div>
            </form>
            @endcomponent

        </div>


        <div class="col-md-6">

            @component('partials.components.showFormPanel') @slot('title') Adresa @endslot
            <form method="POST" action="{{ route('address.update',['address' => $warehouse->address->id]) }}">
                {{method_field('PATCH')}} {{csrf_field()}}
                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputDefault">Ulica</label>
                    <div class="col-md-9">
                        <p>{{$warehouse->address->street_name}}</p>
                        <input type="text" class="form-control" name="street_name" value="{{$warehouse->address->street_name}}" style="display:none">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputDefault">č. ulice</label>
                    <div class="col-md-9">
                        <p>{{$warehouse->address->street_number}}</p>
                        <input type="text" class="form-control" name="street_number" value="{{$warehouse->address->street_number}}" style="display:none">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputDefault">PSČ</label>
                    <div class="col-md-9">
                        <p>{{$warehouse->address->post_code}}</p>
                        <input type="text" class="form-control" name="post_code" value="{{$warehouse->address->post_code}}" style="display:none">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputDefault">Mesto</label>
                    <div class="col-md-9">
                        <p>{{$warehouse->address->city}}</p>
                        <input type="text" class="form-control" name="city" value="{{$warehouse->address->city}}" style="display:none">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputDefault">Štát</label>
                    <div class="col-md-9">
                        <p>{{$warehouse->address->country}}</p>
                        <input type="text" class="form-control" name="country" value="{{$warehouse->address->country}}" style="display:none">
                    </div>
                </div>
            </form>

            @endcomponent


        </div>
    </div>
</div>


<script>
    $(document).ready( function () {

                $('.edit_form_btn').on('click',function(e) {
                    switchToEdit(this);
                })
                $('.cancel_form_btn').on('click',function(e) {
                    cancelEdit(this);
                })
                $('.save_form_btn').on('click',function(e) {
                    $(this).parents('.panel').find('form').submit();
                })
        });

        function switchToEdit(btn){
            let panelRoot = $(btn).parents('.panel');
            console.log($(panelRoot))
            console.log($(panelRoot).find('h2').html())
            panelRoot.find('.cancel_form_btn').show();
            panelRoot.find('.save_form_btn').show();
            panelRoot.find('.edit_form_btn').hide();
            console.log($(panelRoot));
            panelRoot.find('.form-group').each(function (){
                $(this).find('input').show();
                $(this).find('p').hide();
            });
        }
        function cancelEdit(btn){
            let panelRoot = $(btn).parents('.panel');

            panelRoot.find('.cancel_form_btn').hide();
            panelRoot.find('.save_form_btn').hide();
            panelRoot.find('.edit_form_btn').show();

            panelRoot.find('.form-group').each(function (){
                $(this).find('input').hide();
                $(this).find('p').show();
            });
        }

</script>
@endsection

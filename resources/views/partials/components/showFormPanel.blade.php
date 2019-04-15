<div data-collapsed="0" class="panel">
    <div class="panel-heading">
        <div class="panel-title">
            <div class="panel-actions">
                {{-- <a href="#" class="fa fa-caret-down"></a> --}}
                <a href="#" class="fa fa-edit edit_form_btn"></a>
                <a href="#" class="fa fa-undo cancel_form_btn" style="display:none"></a>
                <a href="#" class="fa fa-save save_form_btn" style="display:none"></a>
                <a href="#" class="fa fa-times"></a>
            </div>
            <h2 class="panel-title">{{$title}}</h2>
        </div>
    </div>

    <div class="panel-body">

        <div class="row">
            {{$slot}}
        </div>

    </div>

</div>

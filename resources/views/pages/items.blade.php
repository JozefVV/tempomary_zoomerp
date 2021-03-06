@extends('layouts.dashboardBaseLayout')
@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset( 'assets/DataTables/datatables.min.css' )}}" />


<section class="panel">
    <header class="panel-heading">
        <a class="btn btn-primary pull-right" href="{{ route('userAdministration.register') }}">Add <i class="fa fa-plus"></i></a>
        <h2 class="panel-title">Produkty</h2>
    </header>
    <div class="panel-body" style="display: block;">
        <div class="table-responsive">
            <table class="table mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Meno</th>
                        {{--
                        <th>Kontakt</th> --}} {{--
                        <th>Adresa</th> --}} {{--
                        <th>Stav</th> --}}
                        <th>Akcie</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        {{--
                        <td>{{$item->name}}</td>
                        <td>{{$item->contact}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->state}}</td> --}}
                        <td class="actions">
                            {{-- <a href="{{ route('profile',['user' => $shop->id]) }}"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="delete-row"><i class="fa fa-trash-o"></i></a>
                            <form action="{{ route('userAdministration.delete',['user' => $shop->id]) }}" method="POST">
                                {{method_field('DELETE')}} {{csrf_field()}}
                            </form> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

{{--
<form id="toggleUserValidity_form" action="{{ route('userAdministration.toggleAccess',['user'=> 0]) }}" method="POST" enctype="multipart/form-data"
    class="hidden">
    @csrf
    <input name="id" value="0" type="number" />
</form> --}}

<script type="text/javascript" src="{{ asset( '/assets/DataTables/datatables.min.js')}}"></script>
<script>
    $(document).ready( function () {
            $('#datatable-default').DataTable();

            $('.delete-row').on('click',function(e) {
                e.preventDefault();
                sureDelete(this);
            })
        } );

        function sureDelete(sourceObject)
        {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $(sourceObject).siblings('form').submit();
                }
            });
        }

</script>
@endsection

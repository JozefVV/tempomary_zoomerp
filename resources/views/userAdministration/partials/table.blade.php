<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>Používatelia
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                            style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                        style="width: 140px;">Email</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending"
                                        style="width: 200px;">Meno</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending"
                                        style="width: 114px;">Nick</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending"
                                        style="width: 70px;">Rola</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending"
                                        style="width: 52px;">Naposledy prihlásený</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending"
                                        style="width: 222px;">Registrovaný</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending"
                                        style="width: 40px;">Aktívny</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">Email</th>
                                    <th rowspan="1" colspan="1">Meno</th>
                                    <th rowspan="1" colspan="1">Nick</th>
                                    <th rowspan="1" colspan="1">Rola</th>
                                    <th rowspan="1" colspan="1">Naposledy prihlásený</th>
                                    <th rowspan="1" colspan="1">Registrovaný</th>
                                    <th rowspan="1" colspan="1">Aktívny</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $user->email }}</td>
                                        <td>{{ $user->firstname}} {{$user->lastname }}</td>
                                        <td>{{ $user->nickname }}</td>
                                        <td>{{ $user->getRoleNames()->implode(',') }}</td>
                                        <td>{{ $user->lastLogget_at }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->enabled }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        {{-- <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div> --}}
                    </div>
                    <div class="col-sm-12 col-md-7">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> --}}
</div>

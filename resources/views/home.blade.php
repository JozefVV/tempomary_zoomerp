@extends('layouts.app_old')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{__('dashboard.You are logged in!')}}
                </div>
            </div>
        </div>
    </div>
</div>
    {{ Debugbar::info('Rola prihlaseneho usera: ' . Auth::user()->role->name ) }}
    {{ Debugbar::debug( Auth::user()->toarray() ) }}
    {{--{{ Debugbar::debug( Auth::user()->hasRole('superadmin') ) }}--}}
    {{--{{ Debugbar::debug( Auth::user()->hasRole('user') ) }}--}}
@endsection

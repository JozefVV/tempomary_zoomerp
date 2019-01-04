@extends('layouts.dashboardBaseLayout')
@section('content')

<section class="panel">
    <header class="panel-heading">

        <h2 class="panel-title">Profil používateľa</h2>
    </header>
    <div class="panel-body">
        <h4 class="mb-xlg">Personal information</h4>
        <form class="form-horizontal form-bordered" action="{{ route('userAdministration.edit',['user' => $user->id]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="col-md-3 control-label" for="inputDefault">First name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="firstname" value="{{$user->firstname}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="inputDefault">Last name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="lastname" value="{{$user->lastname}}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="inputDefault">Nickname</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="nickname" value="{{$user->nickname}}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Email</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="email" value="{{$user->email}}">
                </div>
            </div>
            @hasanyrole('superadmin|admin')
            <div class="form-group">
                <label class="col-md-3 control-label">Role</label>
                <div class="col-md-6">
                    <select class="form-control" name="role">
                        <option>user</option>
                        <option>manager</option>
                        <option>admin</option>
                    </select>
                </div>
                @if ($errors->has('role'))
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('role') }}</strong>
                    </span> @endif
            </div>
            @endhasanyrole
            <div class="form-group">
                <input type="submit" class="col-md-2 col-md-push-7 mb-xs mt-xs mr-xs btn btn-primary" value="Save changes" />
            </div>
        </form>
        <hr class="dotted tall">
        <h4 class="mb-xlg">Change Password</h4>
        <form class="form-horizontal form-bordered" action="{{ route('userAdministration.changePassword',['user' => $user->id]) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            <input type="number" name="id" value="{{ $user->id }}" class="hidden" /> @hasanyrole('superadmin|admin') @else
            <div class="form-group">
                <label class="col-md-3 control-label">Old Password</label>
                <div class="col-md-8">
                    <input type="password" name="password_old" class="form-control">
                </div>
            </div>
            @endhasanyrole
            <div class="form-group">
                <label class="col-md-3 control-label">New Password</label>
                <div class="col-md-8">
                    <input type="password" name="password" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Repeat New Password</label>
                <div class="col-md-8">
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="col-md-2 col-md-push-7 mb-xs mt-xs mr-xs btn btn-primary" value="Change password" />
            </div>
        </form>
    </div>
</section>
@endsection

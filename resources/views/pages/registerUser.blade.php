@extends('layouts.dashboardBaseLayout')
@section('content')

<section class="body-sign">
    <div class="panel panel-sign">
        <div class="panel-title-sign mt-xl text-right">
            <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign Up</h2>
        </div>
        <div class="panel-body">
            <form action="{{ route('userAdministration.create')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-none">
                    <div class="row">
                        <div class="col-sm-6 mb-lg">
                            <label>First name</label>
                            <input name="firstname" type="text" class="form-control input-lg" /> @if ($errors->has('firstname'))
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('firstname') }}</strong>
                                        </span> @endif
                        </div>
                        <div class="col-sm-6 mb-lg">
                            <label>Last name</label>
                            <input name="lastname" type="text" class="form-control input-lg" /> @if ($errors->has('lastname'))
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span> @endif
                        </div>
                    </div>
                </div>

                <div class="form-group mb-lg">
                    <label>E-mail Address</label>
                    <input name="email" type="email" class="form-control input-lg" /> @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span> @endif
                </div>

                <div class="form-group mb-none">
                    <div class="row">
                        <div class="col-sm-6 mb-lg">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control input-lg" />
                        </div>
                        <div class="col-sm-6 mb-lg">
                            <label>Password Confirmation</label>
                            <input name="password_confirmation" type="password" class="form-control input-lg" />
                        </div>
                    </div>
                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span> @endif
                </div>

                <div class="form-group mb-lg">
                    <label>Role</label>
                    <select class="form-control" name="role">
                                    @foreach ($roles as $role)
                                    <option value="" selected disabled hidden>Vyber rolu</option>
                                    <option value="{{$role->name}}">{{$role->name_SK}}</option>
                                    @endforeach
                                </select> @if ($errors->has('role'))
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('role') }}</strong>
                            </span> @endif
                </div>

                <div class="row">
                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Registruj</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2018. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
</section>
@endsection

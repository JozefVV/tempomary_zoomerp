<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | {{__('dashboard.Login')}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--SASS--}}
    <link rel="stylesheet" href="{{  asset('css/app.css') }}">

</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/') }}"><b>{{ config('app.name') }}</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">{{__('dashboard.Sign in to start your session')}}</p>

            <form action="{{ route('login') }}" method="post">
                @csrf

                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                    <span class="fa fa-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <span class="fa fa-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox">{{__('dashboard.Remember Me')}}
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{__('dashboard.Sign In')}}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <!-- Social-auth-links -->
            {{--<div class="social-auth-links text-center mb-3">--}}
                {{--<p>- OR -</p>--}}
                {{--<a href="#" class="btn btn-block btn-primary">--}}
                    {{--<i class="fa fa-facebook mr-2"></i> Sign in using Facebook--}}
                {{--</a>--}}
                {{--<a href="#" class="btn btn-block btn-danger">--}}
                    {{--<i class="fa fa-google-plus mr-2"></i> Sign in using Google+--}}
                {{--</a>--}}
            {{--</div>--}}
            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="{{ route('password.request') }}">{{__('dashboard.I forgot my password')}}</a>
            </p>
            {{--<p class="mb-0">--}}
                {{--<a href="register.html" class="text-center">Register a new membership</a>--}}
            {{--</p>--}}
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass   : 'iradio_square-blue',
            increaseArea : '20%' // optional
        })
    })
</script>
</body>
</html>

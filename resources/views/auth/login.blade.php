<!doctype html>
<html class="fixed">

<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset( 'octopusTemplateAssets/vendor/bootstrap/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{ asset( 'octopusTemplateAssets/vendor/font-awesome/css/font-awesome.css')}}" />
    <link rel="stylesheet" href="{{ asset( 'octopusTemplateAssets/vendor/magnific-popup/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{ asset( 'octopusTemplateAssets/vendor/bootstrap-datepicker/css/datepicker3.css')}}" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset( 'octopusTemplateAssets/stylesheets/theme.css')}}" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ asset( 'octopusTemplateAssets/stylesheets/skins/default.css')}}" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset( 'octopusTemplateAssets/stylesheets/theme-custom.css')}}">

    <!-- Head Libs -->
    <script src="{{ asset( 'octopusTemplateAssets/vendor/modernizr/modernizr.js')}}"></script>

</head>

<body>
    <!-- start: page -->
    <section class="body-sign">
        <div class="center-sign">
            <a href="/" class="logo pull-left">
					<img src="{{ asset( 'octopusTemplateAssets/images/logo.png')}}" height="54" alt="Porto Admin" />
				</a>

            <div class="panel panel-sign">
                <div class="panel-title-sign mt-xl text-right">
                    <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
                </div>
                <div class="panel-body">
                    <form id="loginForm" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group mb-lg">
                            <label>E-mail</label>
                            <div class="input-group input-group-icon">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                                    required autofocus>
                                <span class="input-group-addon">
                                            <span class="icon icon-lg">
                                                <i class="fa fa-user"></i>
                                            </span>
                                </span>
                            </div>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span> @endif
                        </div>

                        <div class="form-group mb-lg">
                            <div class="clearfix">
                                <label class="pull-left">Password</label>
                                <a href="pages-recover-password.html" class="pull-right">Lost Password?</a>
                            </div>
                            <div class="input-group input-group-icon">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                    required>
                                <span class="input-group-addon">
                                            <span class="icon icon-lg">
                                                <i class="fa fa-lock"></i>
                                            </span>
                                </span>
                            </div>
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span> @endif
                        </div>

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="checkbox-custom checkbox-default">
                                    <input id="RememberMe" name="rememberme" type="checkbox" />
                                    <label for="RememberMe">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-sm-4 text-right">
                                <button type="submit" class="btn btn-primary hidden-xs">Sign In</button>
                                <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>
                            </div>
                        </div>

                        <span class="mt-lg mb-lg line-thru text-center text-uppercase">
								<span>or</span>
                        </span>

                        {{--
                        <div class="mb-xs text-center">
                            <a class="btn btn-facebook mb-md ml-xs mr-xs">Connect with <i class="fa fa-facebook"></i></a>
                            <a class="btn btn-twitter mb-md ml-xs mr-xs">Connect with <i class="fa fa-twitter"></i></a>
                        </div> --}} @if ( (config('app.debug') == true) && (config('app.env') != "production") )
                        <div class="mb-xs text-center">
                            <a id="dev_logAsSuperadmin" class="btn btn-warning mb-md ml-xs mr-xs">Login as superadmin</a>
                            <a id="dev_logAsUser" class="btn btn-warning mb-md ml-xs mr-xs">Login as user</a>
                        </div>
                        @endif

                        <p class="text-center">Don't have an account yet? <a href="pages-signup.html">Sign Up!</a>

                    </form>
                </div>
            </div>

            <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2018. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
        </div>
    </section>
    <!-- end: page -->

    <!-- Vendor -->
    <script src="{{ asset( 'octopusTemplateAssets/vendor/jquery/jquery.js')}}"></script>
    <script src="{{ asset( 'octopusTemplateAssets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
    <script src="{{ asset( 'octopusTemplateAssets/vendor/bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{ asset( 'octopusTemplateAssets/vendor/nanoscroller/nanoscroller.js')}}"></script>
    <script src="{{ asset( 'octopusTemplateAssets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{ asset( 'octopusTemplateAssets/vendor/magnific-popup/magnific-popup.js')}}"></script>
    <script src="{{ asset( 'octopusTemplateAssets/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="{{ asset( 'octopusTemplateAssets/javascripts/theme.js')}}"></script>

    <!-- Theme Custom -->
    <script src="{{ asset( 'octopusTemplateAssets/javascripts/theme.custom.js')}}"></script>

    <!-- Theme Initialization Files -->
    <script src="{{ asset( 'octopusTemplateAssets/javascripts/theme.init.js')}}"></script>
    @if ( (config('app.debug') == true) && (config('app.env') != "production") )
    <script>
        $('document').ready(function(){
            $('#dev_logAsSuperadmin').on('click',function(e){
                e.preventDefault();
                let email = "{{ env("DEV_LOGIN_SUPERADMIN_EMAIL", "superadmin@example.org") }}";
                let password = "{{ env("DEV_LOGIN_SUPERADMIN_PASSWORD", "12345678") }}";
                dev_logUser(email,password);
            });
            $('#dev_logAsUser').on('click',function(){
                let email = "{{ env("DEV_LOGIN_USER_EMAIL", "tester@example.org") }}";
                let password = "{{ env("DEV_LOGIN_USER_PASSWORD", "12345678") }}";
                dev_logUser(email,password);
            });

        });
        function dev_logUser(email,password){
            $('#email').val(email);
            $('#password').val(password);
            $('#loginForm').submit();
        }
    </script>
    @endif
</body>

</html>

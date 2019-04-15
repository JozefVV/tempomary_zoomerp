<!doctype html>
<html class="fixed" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Zoom ERP') }}</title>

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset( 'octopusTemplateAssets/vendor/bootstrap/css/bootstrap.css' )}}" />
    <link rel="stylesheet" href="{{ asset( 'octopusTemplateAssets/vendor/font-awesome/css/font-awesome.css' )}}" />
    <link rel="stylesheet" href="{{ asset( 'octopusTemplateAssets/vendor/magnific-popup/magnific-popup.css' )}}" />
    <link rel="stylesheet" href="{{ asset( 'octopusTemplateAssets/vendor/bootstrap-datepicker/css/datepicker3.css' )}}" />
    <link rel="stylesheet" href="{{ asset( 'assets/SweetAlert2/sweetalert2.min.css' )}}" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{ asset( 'octopusTemplateAssets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css' )}}"
    />
    <link rel="stylesheet" href="{{ asset( 'octopusTemplateAssets/vendor/bootstrap-multiselect/bootstrap-multiselect.css' )}}"
    />
    <link rel="stylesheet" href="{{ asset( 'octopusTemplateAssets/vendor/morris/morris.css' )}}" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset( 'octopusTemplateAssets/stylesheets/theme.css' )}}" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ asset( 'octopusTemplateAssets/stylesheets/skins/default.css' )}}" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset( 'octopusTemplateAssets/stylesheets/theme-custom.css' )}}">

    <!-- Head Libs -->
    <script src="{{ asset( 'octopusTemplateAssets/vendor/modernizr/modernizr.js' )}}"></script>
    <script src="{{ asset( 'octopusTemplateAssets/vendor/jquery/jquery.js' )}}"></script>
    <script src="{{ asset( 'octopusTemplateAssets/vendor/jquery-browser-mobile/jquery.browser.mobile.js' )}}"></script>
    <script src="{{ asset( 'octopusTemplateAssets/vendor/bootstrap/js/bootstrap.js' )}}"></script>
    <script src="{{ asset( 'assets/SweetAlert2/sweetalert2.min.js' )}}"></script>
</head>

<body>
    <section class="body">
    @include('partials.header')

        <div class="inner-wrapper">
    @include('partials.navSidebar') {{-- start page body --}}
            <section role="main" class="content-body panel-fill">
    @include('partials.pageHeader') {{-- start content --}} @yield('content') {{-- end content --}}
            </section>
            {{-- end page body --}}

        </div>
    @include('partials.rightMenuBar')

    </section>

</body>

</html>

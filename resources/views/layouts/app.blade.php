<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link href="{{ asset('css/icomoon.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ mix('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ mix('css/core.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ mix('css/components.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ mix('css/colors.css') }}" rel="stylesheet" type="text/css">
</head>
<body class="navbar-top">
<div id="app" style="display: none">

    @include('layouts.partials.navbar')

    <div class="page-container">
        <div class="page-content">
            @include('layouts.partials.sidebar')
            <div class="content-wrapper">
                <div class="page-header page-header-default">
                    @yield('page-header')

                    @yield('breadcrumb')
                </div>
                <div class="content">
                @yield('content')
                <!-- Footer -->
                    <div class="footer text-primary text-bold">
                        @include('layouts.partials.footer')
                    </div>
                    <!-- /footer -->


                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ mix('js/bundle.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/layout.js') }}"></script>
</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;1,200;1,300;1,400;1,600&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ mix('assets/css/master.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/awesome/css/all.min.css') }}" rel="stylesheet">

    @yield('styles')
</head>
<body>
<div id="evico-app">
    @include('frontend.layouts.master.evismart.nav')
    <div id="app-content" class="bg-white">
        <div class="container">

        </div>
    </div>
    @yield('content')
    @include('frontend.layouts.master.evismart.footer')
</div>

@yield('script-before')
<!-- Scripts -->
<script src="{{ mix('assets/js/app.js') }}"></script>

@yield('script-after')

</body>
</html>

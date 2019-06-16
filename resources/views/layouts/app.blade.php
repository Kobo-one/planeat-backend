<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="194x194" href="/favicon-194x194.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#afd656">
    <meta name="apple-mobile-web-app-title" content="Plan Eat">
    <meta name="application-name" content="Plan Eat">
    <meta name="msapplication-TileColor" content="#baeb4a">
    <meta name="theme-color" content="#afd656">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO -->
    <title>{{ config('app.name', 'Plan Eat') }}</title>
    <meta name="description" content="With the new app ‘Planeat’ we put an end to all these problems. We ensure that an evening meal is a moment of rest where everyone in the family is satisfied. A happy occasion for both young and old.">
    <meta property="og:title" content="{{ config('app.name', 'Plan Eat') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:locale " content="{{ str_replace('_', '-', app()->getLocale()) }}" />
    <meta property="og:url" content="{{url()}}" />
    <meta property="og:image:secure_url" content="{{url()}}" />
    <meta property="og:image" content="{{asset('img/og-image.png')}}"/>
    <meta property=" og:image:alt" content="The logo of Plan Eat"/>
    <meta property="og:image:url" content="{{asset('img/og-image.png')}}"/>
    <meta property="og:image:width" content="1200"/>
    <meta property="og:image:height" content="1200"/>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @yield('member-layout')
            @yield('content')
    </div>

    @stack('script')


</body>
</html>

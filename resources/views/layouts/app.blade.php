<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="{{ asset('public/img/favicon.png') }}" rel="shortcut icon">
        <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    </head>

    <body>
        <div id="app">
            <a href="/packages">Packages</a>
            <a href="/packages/create">Packages/create</a>
            <a href="/contributors">Contributors</a>

            <hr>

            @yield('content')
        </div>
    </body>

    <script src="{{ asset('public/js/app.js') }}"></script>
</html>

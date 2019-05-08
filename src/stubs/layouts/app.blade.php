<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title'){{ config('app.name', 'Vpsoft Components') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('vendor/ionicons-2.0.1/css/ionicons.min.css') }}">

    @yield('before-styles')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @yield('after-styles')
</head>

<body>

    <div id="app">
        @yield('content')
    </div>

    @yield('before-scripts')
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('after-scripts')

</body>

</html>
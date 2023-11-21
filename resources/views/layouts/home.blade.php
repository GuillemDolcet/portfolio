<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>

    <title>@yield('title', config('app.name'))</title>

    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('dns-prefetch')

    <link rel="icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>

    @stack('top-stylesheets')

    @vite(['resources/assets/stylesheets/home/style.scss'], 'assets')

    @stack('top-scripts')
</head>
<body class="@yield('body-classlist', '')">

    @include('shared.home._loader')

    @include('shared.home._header')

    @stack('top-content')

    @yield('main-content')

    @stack('bottom-content')

    @stack('bottom-scripts')

    @include('shared.home._footer')

</body>
</html>
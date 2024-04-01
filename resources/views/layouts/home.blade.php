<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="This is Guillem Dolcet Portfolio">
    <meta name="format-detection" content="telephone=no">


    <title>@yield('title', config('app.name'))</title>

    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('dns-prefetch')

    <link rel="icon" href="{{ image_url('logo.svg') }}" type="image/x-icon"/>
    <link rel="shortcut icon" href="{{ image_url('logo.svg') }}" type="image/x-icon"/>

    @stack('top-stylesheets')

    @vite(['resources/assets/stylesheets/home/style.scss', 'resources/assets/javascripts/home.js'], 'assets')

    @stack('top-scripts')
</head>
<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70" class="text-black">

    <div class="preloader">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    @include('shared.home._header')

    @yield('main-content')

    @stack('bottom-content')

    @stack('bottom-scripts')

    @include('shared.home._footer')

</body>
</html>

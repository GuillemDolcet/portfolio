<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Callum is responsive bootstrap 5 one page personal portfolio html template.">
    <meta name="author" content="harnishdesign.net">

    <!-- Web Fonts -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

    <title>@yield('title', config('app.name'))</title>

    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('dns-prefetch')

    <link rel="icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>

    @stack('top-stylesheets')

    @vite(['resources/assets/stylesheets/home/style.scss', 'resources/assets/javascripts/home.js'], 'assets')

    @stack('top-scripts')
</head>
<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">

    @yield('main-content')

    @stack('bottom-content')

    @stack('bottom-scripts')

    @include('shared.home._footer')

</body>
</html>

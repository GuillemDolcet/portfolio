@extends('layouts.application')

@section('main-content')
    @section('header')
    @show

    <div class="page page-center border-top-wide border-primary">
        @section('page-body')
            <div class="container py-4">
                @yield('content')
            </div>
        @show
    </div>

    @section('footer')
    @show
@endsection

@extends('layouts.application')

@section('body-classlist', 'theme-light layout-fluid')

@section('main-content')
<div class="page">
    @section('header')
        @include('shared._header')
    @show

    <div class="page-wrapper">
        @section('page-header')
        @show

        @section('page-body')
            <div class="page-body">
                <div class="container-xl">
                    @yield('content')
                </div>
            </div>
        @show

        @section('footer')
            @include('shared._footer')
        @show
    </div>
</div>
@endsection

@push('bottom-content')
    @include('shared._toaster')
@endpush

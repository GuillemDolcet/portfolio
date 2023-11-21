@extends('layouts.home')

@section('main-content')

    @include('home.sections._home')

    @include('home.sections._about')

    @include('home.sections._services')

    @include('home.sections._resume')

    @include('home.sections._skills')

    @include('home.sections._portfolio')

    @include('home.sections._testimonial')

    @include('home.sections._blog')

    @include('home.sections._contact')

@endsection

@push('bottom-scripts')
    @vite(['resources/assets/javascripts/home.js'], 'assets')
@endpush

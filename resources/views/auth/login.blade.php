@extends('layouts.single')

@section('content')
    <div class="text-center mb-4">
        <a href="{{ route('home') }}" class="navbar-brand navbar-brand-autodark">
            <img src="{{ image_url('logo.svg') }}" height="36" alt="{{ config('app.name') }}">
            <span class="h1 m-0 ms-2 text-black">
            {{ config('app.name') }}
        </span>
        </a>
    </div>

    <div class="container-tight">
        <div class="card card-md">
            <div class="card-body">
                <x-status-message class="fs-5"/>
                <h2 class="h2 text-center mb-4">@lang('admin.login-title')</h2>
                <form action="{{route('auth.login')}}" method="post" autocomplete="off">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" name="email" class="form-control" placeholder="@lang('admin.placeholders.email')" required>
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label">@lang('admin.password')</label>
                        <div class="input-group input-group-flat">
                            <input id="password" type="password" name="password" class="form-control" placeholder="@lang('admin.placeholders.password')" required>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">@lang('admin.sign-in')</button>
                    </div>
                </form>
            </div>
            <div class="hr-text">@lang('admin.or')</div>
            <div class="card-body">
                <div class="row">
                    <div class="col"><a href="{{ route('auth.google') }}" class="btn w-100"><img class="me-2" src="{{image_url('google.png')}}" alt="google" /> @lang('admin.login') @lang('admin.with') Google</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection

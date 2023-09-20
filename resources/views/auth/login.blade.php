@extends('layouts.single')

@section('content')
<div class="text-center mb-4">
    <a href="{{ route('home') }}" class="navbar-brand navbar-brand-autodark">
        <img src="{{ image_url('logo-small.svg') }}" height="36" alt="{{ config('app.name') }}">
        <span class="h1 m-0 ms-2 text-black">
            {{ config('app.name') }}
        </span>
    </a>
</div>

<div class="container-tight">
    <div class="card card-md">
        <div class="card-body">
            <x-status-message class="fs-5" />
            <h2 class="h2 text-center mb-4">Login to your account</h2>
            <form action="{{route('auth.login')}}" method="post" autocomplete="off">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input id="email" type="email" name="email" class="form-control" placeholder="your@email.com" required>
                </div>
                <div class="mb-2">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group input-group-flat">
                        <input id="password" type="password" name="password" class="form-control"  placeholder="Your password" required>
                        <span class="input-group-text"><x-icon icon="eye" class="cursor-pointer"/></span>
                    </div>
                </div>
                <div class="mb-2">
                    <label class="form-check">
                        <input type="checkbox" class="form-check-input"/>
                        <span class="form-check-label">Remember me on this device</span>
                    </label>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Sign in</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<header class="navbar navbar-expand-lg navbar-light d-print-none">
    <div class="container-xl">
        <div class="d-flex">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#nav-sidebar">
                <x-icon icon="layout-sidebar-left-expand" />
            </button>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                <x-icon icon="menu-2" />
            </button>
        </div>

        <!-- Logo -->
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal">
            <a href="{{ route('home') }}" title="{{ config('app.name') }}">
                <img src="{{ image_url('logo-small.svg') }}" width="32" height="32" alt="{{ config('app.name') }}" class="navbar-brand-image">
            </a>
        </h1>

        <div class="navbar-nav flex-row order-lg-last">
            @if(current_user()->hasRole('admin'))
                <li class="nav-item {{ request()->is('*users*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.users') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><x-icon icon="users" /></span>
                        <span class="nav-link-title">Users</span>
                    </a>
                </li>
            @endif
        </div>

        <div class="collapse navbar-collapse" id="navbar-menu">
            @include('shared/_navbar_menu')
        </div>
    </div>
</header>

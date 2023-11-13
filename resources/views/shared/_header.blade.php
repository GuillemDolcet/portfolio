<header class="navbar navbar-expand-lg navbar-light d-print-none">
    <div class="container-xl">
        <div class="d-flex">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#nav-sidebar">
                <x-icon icon="layout-sidebar-left-expand"/>
            </button>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                <x-icon icon="menu-2"/>
            </button>
        </div>

        <!-- Logo -->
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal">
            <a href="{{ route('home') }}" title="{{ config('app.name') }}">
                <img src="{{ image_url('logo-small.svg') }}" width="32" height="32" alt="{{ config('app.name') }}"
                     class="navbar-brand-image">
            </a>
        </h1>

        <div class="navbar-nav flex-row order-lg-last">

            @can('manage', \App\Models\User::class)
                <div class="nav-item {{ request()->is('*users*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.users.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><x-icon icon="users"/></span>
                        <span class="nav-link-title">@lang('admin.users')</span>
                    </a>
                </div>
            @endcan

            <div class="nav-item dropdown ms-3">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                   aria-label="Open user menu">
                    <span class="avatar avatar-sm"
                          style="background-image: url('data:image/jpg;base64,{{ current_user()->avatar }}')"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ ucfirst(current_user()->name) }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow text-end">
                    <div class="p-2 d-flex justify-content-around">
                        @foreach(\App\Models\Language::all() as $language)
                            <div class="cursor-pointer">
                                <form method="post" action="{{ route('change-language',$language) }}" data-controller="form">
                                    @csrf
                                    <a href="#" data-action="form#submit">
                                        <img src="{{image_url($language->image)}}" alt="{{$language->name}}" data-action="form#submit">
                                    </a>
                                </form>
                            </div>
                        @endforeach
                    </div>
                    <div class="p-2">
                        <form method="post" action="{{ route('auth.logout') }}" data-controller="form">
                            @csrf
                            @method('delete')
                            <a href="#" class="text-danger" title="@lang('admin.delete')" data-action="form#submit">
                                <x-icon icon="logout"/> @lang('admin.logout')
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            @include('shared/_navbar_menu')
        </div>
    </div>
</header>

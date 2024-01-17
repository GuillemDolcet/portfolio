<div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
    <ul class="navbar-nav">
        <li class="nav-item {{ request()->is('admin.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.index') }}">
                <span class="nav-link-icon d-md-none d-lg-inline-block"><x-icon icon="home" /></span>
                <span class="nav-link-title">@lang('admin.home')</span>
            </a>
        </li>
    </ul>
</div>

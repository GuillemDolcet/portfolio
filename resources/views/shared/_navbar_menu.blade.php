<div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
    <ul class="navbar-nav">
        <li class="nav-item {{ request()->is('users*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.users') }}">
                <span class="nav-link-icon d-md-none d-lg-inline-block"><x-icon icon="users" /></span>
                <span class="nav-link-title">Cosas</span>
            </a>
        </li>
    </ul>
</div>

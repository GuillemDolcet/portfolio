<div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
    <ul class="navbar-nav">
        <li class="nav-item {{ request()->is('*skills*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.skills.index') }}">
                <span class="nav-link-icon d-md-none d-lg-inline-block"><x-icon icon="skill" /></span>
                <span class="nav-link-title">@lang('admin.skills')</span>
            </a>
        </li>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item {{ request()->is('*experiences*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.experiences.index') }}">
                <span class="nav-link-icon d-md-none d-lg-inline-block"><x-icon icon="bag" /></span>
                <span class="nav-link-title">@lang('admin.experiences')</span>
            </a>
        </li>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item {{ request()->is('*projects*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.projects.index') }}">
                <span class="nav-link-icon d-md-none d-lg-inline-block"><x-icon icon="laptop" /></span>
                <span class="nav-link-title">@lang('admin.projects')</span>
            </a>
        </li>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item {{ request()->is('*education*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.education.index') }}">
                <span class="nav-link-icon d-md-none d-lg-inline-block"><x-icon icon="education" /></span>
                <span class="nav-link-title">@lang('admin.education')</span>
            </a>
        </li>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item {{ request()->is('*hobbies*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.hobbies.index') }}">
                <span class="nav-link-icon d-md-none d-lg-inline-block"><x-icon icon="hobby" /></span>
                <span class="nav-link-title">@lang('admin.hobbies')</span>
            </a>
        </li>
    </ul>
</div>

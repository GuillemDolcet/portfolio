@extends('layouts.main')

@section('content')

    @include('admin.overview.users.index')

    <div class="container-lg">
        <div class="d-flex flex-column">

            @include('admin.overview.sections.index')

            @include('admin.overview.services.index')

            @include('admin.overview.education.index')

            @include('admin.overview.experiences.index')

            @include('admin.overview.projects.index')

            @include('admin.overview.skills.index')

        </div>
    </div>
@endsection

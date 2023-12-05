@extends('layouts.main')

@section('content')

    @include('admin.overview.users.index')

    <div class="container-lg mt-4">
        <div class="d-flex flex-column">
            @include('admin.overview.skills.index')
            @include('admin.overview.experiences.index')
            @include('admin.overview.projects.index')
        </div>
    </div>
@endsection

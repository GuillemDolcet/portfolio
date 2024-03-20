@extends('layouts.main')

@section('content')

    <div class="container-lg">
        <div class="d-flex flex-column">

            @include('admin.overview.personalInfo.index')

            @include('admin.overview.sections.index')

            @include('admin.overview.services.index')

            @include('admin.overview.education.index')

            @include('admin.overview.experiences.index')

            @include('admin.overview.skills.index')

            @include('admin.overview.projects.index')

            @include('admin.overview.testimonials.index')

            @include('admin.overview.faqs.index')

        </div>
    </div>
@endsection

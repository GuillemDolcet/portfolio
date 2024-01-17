@extends('layouts.main')

@section('page-header')
    <div class="page-header">
        <div class="container-lg">
            <div class="row align-items-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="page-title">
                            <x-icon icon="bag" class="me-2"/>
                            @lang('admin.experiences')
                        </h2>
                    </div>
                    <div class="btn-list">
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block"
                           data-controller="remote-modal"
                           data-action="remote-modal#toggle"
                           data-remote-modal-url-value="{{ route('admin.experiences.create') }}"
                           data-remote-modal-target-value="#experience-form-modal">
                            <x-icon icon="plus"/>
                            @lang('admin.add') @lang('admin.experience')
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-lg">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    @include('admin.experiences._pagination')
                    <table class="table table-vcenter card-table">
                        <thead>
                        <tr>
                            <th>@lang('admin.position')</th>
                            <th>@lang('admin.company')</th>
                            <th>@lang('admin.location')</th>
                            <th>@lang('admin.start_date')</th>
                            <th>@lang('admin.finish_date')</th>
                            <th>@lang('admin.skills')</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @each('admin.experiences._experience', $experiences, 'experience', 'admin.experiences._empty')
                        </tbody>
                    </table>
                    @include('admin.experiences._pagination')
                </div>
            </div>
        </div>
    </div>
@endsection

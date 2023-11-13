@extends('layouts.main')

@section('page-header')
    <div class="page-header">
        <div class="container-lg">
            <div class="row align-items-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="page-title">
                            <x-icon icon="skill" class="me-2"/>
                            @lang('admin.skills')
                        </h2>
                    </div>
                    <div class="btn-list">
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block"
                           data-controller="remote-modal"
                           data-action="remote-modal#toggle"
                           data-remote-modal-url-value="{{ route('admin.skills.create') }}"
                           data-remote-modal-target-value="#skill-form-modal">
                            <x-icon icon="plus"/>
                            @lang('admin.add') @lang('admin.skill')
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
                    @include('admin.skills._pagination')
                    <table class="table table-vcenter card-table">
                        <thead>
                        <tr>
                            <th>@lang('admin.name')</th>
                            <th>@lang('admin.level')</th>
                            <th>@lang('admin.order')</th>
                            <th>@lang('admin.created_at')</th>
                            <th>@lang('admin.updated_at')</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @each('admin.skills._skill', $skills, 'skill', 'admin.skills._empty')
                        </tbody>
                    </table>
                    @include('admin.skills._pagination')
                </div>
            </div>
        </div>
    </div>
@endsection

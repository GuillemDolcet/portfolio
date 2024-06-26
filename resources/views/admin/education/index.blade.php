@extends('layouts.main')

@section('page-header')
    <div class="page-header">
        <div class="container-lg">
            <div class="row align-items-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="page-title">
                            <x-icon icon="education" class="me-2"/>
                            @lang('admin.education')
                        </h2>
                    </div>
                    @can('create', \App\Models\Education::class)
                        <div class="btn-list">
                            <a href="#" class="btn btn-primary d-none d-sm-inline-block"
                               data-controller="remote-modal"
                               data-action="remote-modal#toggle"
                               data-remote-modal-url-value="{{ route('admin.education.create') }}"
                               data-remote-modal-target-value="#education-form-modal">
                                <x-icon icon="plus"/>
                                @lang('admin.add') @lang('admin.education')
                            </a>
                        </div>
                    @endcan
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
                    @include('admin.education._pagination')
                    <table class="table table-vcenter card-table">
                        <thead>
                        <tr>
                            <th>@lang('admin.school')</th>
                            <th>@lang('admin.degree')</th>
                            <th>@lang('admin.discipline')</th>
                            <th>@lang('admin.start_date')</th>
                            <th>@lang('admin.finish_date')</th>
                            <th>@lang('admin.skills')</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @each('admin.education._education', $education, 'educationModel', 'admin.education._empty')
                        </tbody>
                    </table>
                    @include('admin.education._pagination')
                </div>
            </div>
        </div>
    </div>
@endsection

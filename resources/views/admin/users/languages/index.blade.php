@extends('layouts.main')

@section('page-header')
    <div class="page-header">
        <div class="container-lg">
            <div class="row align-items-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="page-title">
                            <x-icon icon="users" class="me-2"/>
                            @lang('admin.language')
                        </h2>
                    </div>
                    <div class="btn-list">
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block"
                           data-controller="remote-modal"
                           data-action="remote-modal#toggle"
                           data-remote-modal-url-value="{{ route('admin.users.languages.create') }}"
                           data-remote-modal-target-value="#language-form-modal">
                            <x-icon icon="user-plus"/>
                            @lang('admin.add') @lang('admin.language')
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
                    @include('admin.users.languages._pagination')
                    <table class="table table-vcenter card-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>@lang('admin.name')</th>
                            <th>Email</th>
                            <th>@lang('admin.role')</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @each('admin.users.languages._language', $userLanguages, 'userLanguage', 'admin.users.languages._empty')
                        </tbody>
                    </table>
                    @include('admin.users.languages._pagination')
                </div>
            </div>
        </div>
    </div>
@endsection

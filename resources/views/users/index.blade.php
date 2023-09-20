@extends('layouts.main')

@section('page-header')
    <div class="page-header">
        <div class="container-xl">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Users
                    </h2>
                </div>
                <div class="col-auto ms-auto">
                    <div class="btn-list">
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block"
                           data-controller="remote-modal"
                           data-action="remote-modal#toggle"
                           data-remote-modal-url-value="{{ route('users.create') }}"
                           data-remote-modal-target-value="#users-form-modal">
                            <x-icon icon="plus" />
                            Example
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                @include('users._pagination')
                <table class="table table-vcenter card-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    @each('users._user', $users, 'user', 'users._empty')
                    </tbody>
                </table>
                @include('users._pagination')
            </div>
        </div>
    </div>
@endsection

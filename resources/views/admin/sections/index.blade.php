@extends('layouts.main')

@section('page-header')
    <div class="page-header">
        <div class="container-lg">
            <div class="row align-items-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="page-title">
                            <x-icon icon="section" class="me-2"/>
                            @lang('admin.sections')
                        </h2>
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
                    @include('admin.sections._pagination')
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>@lang('admin.name')</th>
                                <th>@lang('admin.tag')</th>
                                <th>@lang('admin.title')</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @each('admin.sections._section', $sections, 'section', 'admin.sections._empty')
                        </tbody>
                    </table>
                    @include('admin.sections._pagination')
                </div>
            </div>
        </div>
    </div>
@endsection

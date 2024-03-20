@extends('layouts.main')

@section('page-header')
    <div class="page-header">
        <div class="container-lg">
            <div class="row align-items-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="page-title">
                            <x-icon icon="testimonial" class="me-2"/>
                            @lang('admin.testimonials')
                        </h2>
                    </div>
                    @can('create', \App\Models\Testimonial::class)
                        <div class="btn-list">
                            <a href="#" class="btn btn-primary d-none d-sm-inline-block"
                               data-controller="remote-modal"
                               data-action="remote-modal#toggle"
                               data-remote-modal-url-value="{{ route('admin.testimonials.create') }}"
                               data-remote-modal-target-value="#testimonial-form-modal">
                                <x-icon icon="plus"/>
                                @lang('admin.add') @lang('admin.testimonial')
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
                    @include('admin.testimonials._pagination')
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>@lang('admin.name')</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @each('admin.testimonials._testimonial', $testimonials, 'testimonial', 'admin.testimonials._empty')
                        </tbody>
                    </table>
                    @include('admin.testimonials._pagination')
                </div>
            </div>
        </div>
    </div>
@endsection

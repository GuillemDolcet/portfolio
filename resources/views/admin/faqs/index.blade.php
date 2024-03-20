@extends('layouts.main')

@section('page-header')
    <div class="page-header">
        <div class="container-lg">
            <div class="row align-items-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="page-title">
                            <x-icon icon="faq" class="me-2"/>
                            @lang('admin.faqs')
                        </h2>
                    </div>
                    @can('create', \App\Models\Faq::class)
                        <div class="btn-list">
                            <a href="#" class="btn btn-primary d-none d-sm-inline-block"
                               data-controller="remote-modal"
                               data-action="remote-modal#toggle"
                               data-remote-modal-url-value="{{ route('admin.faqs.create') }}"
                               data-remote-modal-target-value="#faq-form-modal">
                                <x-icon icon="plus"/>
                                @lang('admin.add') @lang('admin.faq')
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
                    @include('admin.faqs._pagination')
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>@lang('admin.question')</th>
                                <th>@lang('admin.answer')</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @each('admin.faqs._faq', $faqs, 'faq', 'admin.faqs._empty')
                        </tbody>
                    </table>
                    @include('admin.faqs._pagination')
                </div>
            </div>
        </div>
    </div>
@endsection

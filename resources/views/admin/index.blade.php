@extends('layouts.main')

@section('content')

    @include('admin.overview.users.index')

    <div class="container-lg mt-4">
        <div class="row d-flex">
            <div class="col me-2">@include('admin.overview.skills.index')</div>
            <div class="col ms-2">@include('admin.overview.skills.index')</div>
        </div>
    </div>
@endsection

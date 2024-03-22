@extends('layouts.home')

@section('main-content')

    <div id="main-wrapper">

        <div id="content" role="main">

            @foreach($sections as $section)
                @include("home.sections.{$section->name}.index")
            @endforeach

        </div>

    </div>

    <a id="back-to-top" class="rounded-circle" data-bs-toggle="tooltip" title="Back to Top" href="javascript:void(0)"><i class="fa-solid fa-arrow-up"></i></a>

@endsection

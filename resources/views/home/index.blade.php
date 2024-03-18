@extends('layouts.home')

@section('main-content')

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />

    <div id="main-wrapper">

        <div id="content" role="main">

            <section id="home" class="bg-primary d-flex fullscreen position-relative py-5">
                <div class="container my-auto py-4">
                    <div class="row">
                        <div class="col-lg-7 text-center text-lg-start align-self-center order-1 order-lg-0 wow fadeIn">
                            <h1 class="text-12 fw-300 mb-0 text-uppercase">Hi, I'm a Freelancer</h1>
                            <div class="typed-strings">
                                <p>Designer</p>
                                <p>Developer</p>
                                <p>Callum</p>
                            </div>
                            <h2 class="text-21 fw-600 text-uppercase mb-0 ms-n1"><span class="typed"></span></h2>
                            <p class="text-5">based in Los Angeles, USA.</p>
                            <a href="#portfolio" class="btn btn-dark rounded-0 smooth-scroll mt-3">View My Works</a><a href="#contact" class="btn btn-link text-dark smooth-scroll mt-3">Contact Me<span class="text-4 ms-2"><i class="far fa-arrow-alt-circle-down"></i></span></a>
                        </div>
                        <div class="col-lg-5 text-center align-self-center mb-4 mb-lg-0 order-0 order-lg-1">
                            <div class="bg-light rounded-pill d-inline-block p-3 shadow-lg wow zoomIn"> <img class="img-fluid rounded-pill d-block" src="images/web-developer.jpg" title="I'm Callum" alt=""></div>
                        </div>
                    </div>
                </div>
                <a href="#about" class="scroll-down-arrow text-dark smooth-scroll"><span class="animated"><i class="fas fa-arrow-down"></i></span></a>
            </section>

            @foreach($sections as $section)
                @include("home.sections.{$section->name}.index")
            @endforeach

        </div>

    </div>

    <a id="back-to-top" class="rounded-circle" data-bs-toggle="tooltip" title="Back to Top" href="javascript:void(0)"><i class="fa-solid fa-arrow-up"></i></a>

@endsection

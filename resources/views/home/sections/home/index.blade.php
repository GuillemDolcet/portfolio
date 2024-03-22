<section id="{{ $section->name }}" class="bg-primary d-flex fullscreen position-relative py-5">
    <div class="container my-auto py-4">
        <div class="row">
            <div class="col-lg-7 text-center text-lg-start align-self-center order-1 order-lg-0 wow fadeIn">
                <h1 class="text-12 fw-300 mb-0 text-uppercase">{{ $section->title }}</h1>
                {!! $section->description !!}
                <p class="text-5">@lang('admin.based-in') {{ $personalInfo->location }}</p>
                <a href="#portfolio" class="btn btn-dark rounded-0 smooth-scroll mt-3">@lang('admin.view-works')</a>
                <a href="#contact" class="btn btn-link text-dark smooth-scroll mt-3">@lang('admin.contact.me')<span class="text-4 ms-2"><i class="far fa-arrow-alt-circle-down"></i></span></a>
            </div>
            <div class="col-lg-5 text-center align-self-center mb-4 mb-lg-0 order-0 order-lg-1">
                <div class="bg-light rounded-pill d-inline-block p-3 shadow-lg wow zoomIn">
                    <img class="img-fluid rounded-pill d-block" src="{{ Storage::url($personalInfo->image) }}" title="{{ $personalInfo->firstName }}" alt="{{ $personalInfo->firstName }}">
                </div>
            </div>
        </div>
    </div>
    <a href="#about" class="scroll-down-arrow text-dark smooth-scroll"><span class="animated"><i class="fas fa-arrow-down"></i></span></a>
</section>

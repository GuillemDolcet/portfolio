<section id="about" class="section">
    <div class="container">
        <!-- Heading -->
        <p class="text-center mb-2 wow fadeInUp"><span class="bg-primary text-dark px-2">{{ $section->tag }}</span></p>
        <h2 class="text-10 fw-600 text-center mb-5 wow fadeInUp">{{ $section->title }}</h2>
        <!-- Heading end-->

        <div class="row">
            <div class="col-lg-8 text-center text-lg-start wow fadeInUp">
                {!! $section->description !!}
            </div>
            <div class="col-lg-4 mt-4 mt-lg-0 wow fadeInUp" data-wow-delay="0.2s">
                <div class="featured-box style-4">
                    <div class="featured-box-icon text-25 fw-500 bg-primary rounded-circle"><span class="wow heartBeat" data-wow-delay="1.3s">22</span></div>
                    <h3 class="text-7 wow rubberBand" data-wow-delay="2s">Years of <span class="fw-700">Experiance</span></h3>
                </div>
            </div>
        </div>
        <div class="row gy-3 mt-4">
            <div class="col-6 wow fadeInUp" data-wow-delay="0.2s">
                <p class="text-muted fw-500 mb-0">@lang('admin.email')</p>
                <p class="text-4 fw-600 mb-0"><a class="link-dark" href="">{{ $personalInfo->email }}</a></p>
            </div>
            <div class="col-6 wow fadeInUp" data-wow-delay="0.4s">
                <p class="text-muted fw-500 mb-0">@lang('admin.location')</p>
                <p class="text-4 text-dark fw-600 mb-0">{{ $personalInfo->location }}</p>
            </div>
        </div>
    </div>
</section>

<section id="{{ $section->name }}" class="section bg-secondary">
    <div class="container">
        <!-- Heading -->
        <p class=" text-center mb-2 wow" data-animation="fadeIn" data-delay="0,3"><span class="bg-primary text-black px-2">{{ $section->tag }}</span></p>
        <h2 class="text-10 fw-600 text-white text-center mb-5 wow" data-animation="fadeIn" data-delay="0,3">{{ $section->title }}</h2>
        <!-- Heading end-->
        <div class="row">
            <div class="col-lg-9 mx-auto wow" data-animation="fadeInUp" data-delay="0,3">
                <div class="owl-carousel owl-theme owl-light" data-autoplay="true" data-loop="true" data-nav="true" data-margin="30" data-slideby="1" data-stagepadding="5"  data-items-xs="1" data-items-sm="1" data-items-md="1" data-items-lg="1">
                    @foreach($testimonials as $testimonial)
                        <div class="item text-center px-5">
                            <span class="text-9 text-primary"><i class="fa fa-quote-start"></i></span>
                            <p class="text-5 text-white">{{ $testimonial->comment }}</p>
                            @if(!is_null($testimonial->image))
                                <img class="img-fluid d-inline-block w-auto rounded-circle shadow" src="{{ Storage::url($testimonial->image) }}" alt="{{ $testimonial->name }}">
                            @endif
                            <strong class="d-block text-3 fw-600 text-white">{{ $testimonial->name }}</strong> <span class="text-light">{{ $testimonial->job }}</span> </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

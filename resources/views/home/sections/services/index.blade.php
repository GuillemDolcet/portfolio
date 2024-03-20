<section id="services" class="section bg-light">
    <div class="container">
        <!-- Heading -->
        <p class=" text-center mb-2 wow fadeInUp"><span class="bg-primary text-dark px-2">{{ $section->tag }}</span></p>
        <h2 class="text-10 fw-600 text-center mb-5 wow fadeInUp">{{ $section->title }}</h2>
        <!-- Heading end-->

        <div class="row gy-5 mt-5">
            @foreach($services as $service)
                <div class="col-sm-6 col-lg-4 wow fadeInUp">
                    <div class="featured-box text-center px-md-4">
                        <div class="featured-box-icon text-primary text-13">
                            <img src="{{\Storage::url($service->image)}}" width="50" alt="{{ $service->title}} ">
                        </div>
                        <h3 class="text-6 fw-600 mb-3">{{ $service->title }}</h3>
                        <p class="text-muted mb-0">{{ $service->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

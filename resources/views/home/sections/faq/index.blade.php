<section id="{{ $section->name }}" class="section bg-light">
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-8 order-1 order-lg-0 wow" data-animation="fadeInUp" data-delay="0,3">
                <!-- Heading -->
                <p class="text-center text-lg-start mb-2"><span class="bg-primary text-black px-2">{{ $section->tag }}</span></p>
                <h2 class="text-10 fw-600 text-center text-lg-start mb-5 text-justify">{{ $section->title }}</h2>
                <!-- Heading end-->
                <div class="accordion accordion-flush" id="faqTopics">
                    @foreach($faqs as $key => $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-heading-{{ $key }}">
                                <button class="accordion-button collapsed text-justify" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-{{ $key }}" aria-expanded="false" aria-controls="flush-collapse-{{ $key }}">{{ $faq->question }}</button>
                            </h2>
                            <div id="flush-collapse-{{ $key }}" class="accordion-collapse collapse text-justify" aria-labelledby="flush-heading-{{ $key }}" data-bs-parent="#faqTopics">
                                <div class="accordion-body">{{ $faq->answer }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 d-flex align-items-center justify-content-center order-0 order-lg-1 wow" data-animation="fadeIn" data-delay="0,3"> <img class="img-fluid" src="{{ image_url('home/faq.png') }}" title="FAQ" alt="faq"> </div>
        </div>
    </div>
</section>

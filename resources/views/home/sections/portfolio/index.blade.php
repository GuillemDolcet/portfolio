<section id="{{ $section->name }}" class="section bg-light">
    <div class="container">
        <p class="text-center mb-2 wow fadeInUp"><span class="bg-primary text-black px-2">{{ $section->tag }}</span></p>
        <h2 class="text-10 fw-600 text-center mb-5 wow fadeInUp">{{ $section->title }}</h2>
        <div class="portfolio wow fadeInUp">
            <div class="row g-4 mt-3 portfolio-filter detailed">
                @foreach($projects as $project)
                    <div class="col-sm-6 col-lg-4 detailed">
                        <div class="item-box portfolio-box rounded shadow bg-white overflow-hidden">
                            <div class="portfolio-box-img position-relative overflow-hidden">
                                <img class="item-container img-fluid" src="{{\Storage::url($project->image)}}" alt="1">
                                <div class="overlay-work">
                                    <div class="work-content text-center">
                                        <a href="{{ $project->url }}" target="_blank" class="lightbox text-light work-icon bg-dark d-inline-block rounded-pill">
                                            <x-icon icon="eye"/>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4 text-center portfolio-text">
                                <h5><a href="{{ $project->url }}" target="_blank" class="title text-black">{{ $project->name }}</a></h5>
                                <div class="text-justify">{{ $project->description }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

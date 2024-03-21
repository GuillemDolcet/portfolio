<section id="{{ $section->name }}" class="section bg-light">
    <div class="container">

        <p class="text-center mb-2 wow fadeInUp"><span class="bg-primary text-black px-2">{{ $section->tag }}</span></p>
        <h2 class="text-10 fw-600 text-center mb-5 wow fadeInUp">{{ $section->title }}</h2>

        <div class="portfolio wow fadeInUp">
            <div class="row g-4 mt-3 portfolio-filter">
                @foreach($projects as $project)
                    <div class="col-sm-6 col-lg-4">
                        <div class="portfolio-box">
                            <div class="portfolio-img">
                                <a href="{{ $project->url }}" target="_blank">
                                    <img class="img-fluid d-block" src="{{\Storage::url($project->image)}}" alt="{{ $project->name }}">
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

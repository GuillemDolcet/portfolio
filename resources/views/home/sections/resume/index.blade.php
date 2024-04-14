<section id="{{ $section->name }}" class="section">
    <div class="container">
        <!-- Heading -->
        <p class=" text-center mb-2 wow fadeInUp"><span class="bg-primary text-black px-2">{{ $section->tag }}</span></p>
        <h2 class="text-10 fw-600 text-center mb-5 wow fadeInUp">{{ $section->title }}</h2>
        <!-- Heading end-->

        <div class="row g-5 mt-5">
            <!-- My Education -->
            <div class="col-lg-6 wow fadeInUp">
                <h2 class="text-7 fw-600 mb-4 pb-2">@lang('admin.my-education')</h2>
                <div class="border-start border-2 border-primary ps-3">
                    @each('home.sections.resume._education', $education, 'educationModel')
                </div>
            </div>
            <!-- My Experience -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                <h2 class="text-7 fw-600 mb-4 pb-2">@lang('admin.my-experience')</h2>
                <div class="border-start border-2 border-primary ps-3">
                    @each('home.sections.resume._experience', $experiences, 'experience')
                </div>
            </div>
        </div>

        <!-- My Skills -->
        <h2 class="text-7 fw-600 mb-4 pb-2 mt-5 wow fadeInUp">@lang('admin.my-skills')</h2>
        <div class="row gx-5">
            @foreach($skills->chunk($skills->count() / 2) as $skills)
                <div class="col-md-6 wow fadeInUp">
                    @each('home.sections.resume._skill', $skills, 'skill')
                </div>
            @endforeach
        </div>
        <p class="text-center mt-5 wow fadeInUp">
            <a href="{{ route('personalInfo.showCv', ['personalInfo' => $personalInfo, 'locale' => app()->getLocale()]) }}" target="_blank" class="btn btn-outline-dark shadow-none rounded-0">@lang('admin.show_cv')</a>
        </p>
    </div>
</section>

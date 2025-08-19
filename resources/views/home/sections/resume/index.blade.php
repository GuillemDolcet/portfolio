<section id="{{ $section->name }}" class="section">
    <div class="container">
        <!-- Heading -->
        <p class=" text-center mb-2 wow" data-animation="fadeInUp" data-delay="0,3"><span class="bg-primary text-black px-2">{{ $section->tag }}</span></p>
        <h2 class="text-10 fw-600 text-center mb-5 wow" data-animation="fadeInUp" data-delay="0,3">{{ $section->title }}</h2>
        <!-- Heading end-->

        <div class="row g-5 mt-5">
            <!-- My Education -->
            <div class="col-lg-6 wow" data-animation="fadeInUp" data-delay="0,3">
                <h2 class="text-7 fw-600 mb-4 pb-2">@lang('admin.my-education')</h2>
                <div class="border-start border-2 border-primary ps-3">
                    @each('home.sections.resume._education', $education, 'educationModel')
                </div>
            </div>
            <!-- My Experience -->
            <div class="col-lg-6 wow" data-animation="fadeInUp" data-delay="0,3" data-wow-delay="0.2s">
                <h2 class="text-7 fw-600 mb-4 pb-2">@lang('admin.my-experience')</h2>
                <div class="border-start border-2 border-primary ps-3">
                    @each('home.sections.resume._experience', $experiences, 'experience')
                </div>
            </div>
        </div>

        <!-- My Skills -->
        <h2 class="text-7 fw-600 mb-4 pb-2 mt-5 wow" data-animation="fadeInUp" data-delay="0,3">@lang('admin.my-skills')</h2>
        @php
            $skillsLeft = $skills->nth(2, 0);
            $skillsRight = $skills->nth(2, 1);
        @endphp
        <div class="row gx-5">
            <div class="col-md-6 wow" data-animation="fadeInUp" data-delay="0,3">
                @each('home.sections.resume._skill', $skillsLeft, 'skill')
            </div>
            <div class="col-md-6 wow" data-animation="fadeInUp" data-delay="0,3">
                @each('home.sections.resume._skill', $skillsRight, 'skill')
            </div>
        </div>
        <p class="text-center mt-5 wow" data-animation="fadeInUp" data-delay="0,3">
            <a href="{{ route('personalInfo.showCv', ['personalInfo' => $personalInfo, 'locale' => app()->getLocale()]) }}" target="_blank" class="btn btn-outline-dark shadow-none rounded-0">@lang('admin.show_cv')</a>
        </p>
    </div>
</section>

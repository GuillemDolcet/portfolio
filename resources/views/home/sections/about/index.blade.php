<section id="{{ $section->name }}" class="section">
    <div class="container">
        <!-- Heading -->
        <p class="text-center mb-2 wow fadeInUp"><span class="bg-primary text-black px-2">{{ $section->tag }}</span></p>
        <h2 class="text-10 fw-600 text-center mb-5 wow fadeInUp">{{ $section->title }}</h2>
        <!-- Heading end-->

        <div class="row">
            <div class="col-lg-8 text-center text-lg-start wow fadeInUp">
                {!! $section->description !!}
            </div>
            @if(count($experiences) > 0)
                <div class="col-lg-4 mt-4 mt-lg-0 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="featured-box style-4">
                        <div class="text-25 fw-500 text-black">
                            <span class="wow heartBeat" data-wow-delay="1.3s">
                                {{ round(\Carbon\Carbon::now()->diffInMonths($experiences->sortBy('start_date')->first()->start_date) / 12) }}
                            </span>
                        </div>
                        <h3>@lang('admin.years-of') <span class="fw-700">@lang('admin.experience')</span></h3>
                    </div>
            </div>
            @endif
        </div>
        <div class="row gy-3 mt-4">
            <div class="col-12 col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.2s">
                <p class="text-muted fw-500 mb-0">@lang('admin.email')</p>
                <p class="text-4 fw-600 mb-0"><a class="link-dark" href="mailto:{{ $personalInfo->email }}">{{ $personalInfo->email }}</a></p>
            </div>
            <div class="col-12 col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.2s">
                <p class="text-muted fw-500 mb-0">@lang('admin.phone')</p>
                <p class="text-4 fw-600 mb-0">{{ $personalInfo->phone }}</p>
            </div>
            <div class="col-12 col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.2s">
                <p class="text-muted fw-500 mb-0">@lang('admin.age')</p>
                <p class="text-4 fw-600 mb-0">{{ $personalInfo->date_of_birth->age }} @lang('admin.years-old')</p>
            </div>
            <div class="col-12 col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                <p class="text-muted fw-500 mb-0">@lang('admin.location')</p>
                <p class="text-4 text-dark fw-600 mb-0">{{ $personalInfo->location }}</p>
            </div>
        </div>
    </div>
</section>

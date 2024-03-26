<header id="header" class="sticky-top-slide">
    <nav class="primary-menu navbar navbar-expand-lg overlay navbar-overlay-dark bg-transparent nav-bar-text-uppercase navbar-line-under-text border-bottom-0 text-black fw-600">
        <div class="container position-relative">
            <div class="col-auto col-lg-1 d-inline-flex ps-lg-0">
                <a class="logo" title="{{ config('app.name') }}">
                    <img src="{{ image_url('logo.svg') }}" alt="{{ config('app.name') }}" width="32" height="32"/>
                </a>
            </div>
            <div class="col col-lg-9 navbar-accordion px-0">
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#header-nav"><span></span><span></span><span></span></button>
                <div id="header-nav" class="collapse navbar-collapse justify-content-center">
                    <div class="d-flex flex-column h-100 align-items-center justify-content-center">
                        <ul class="navbar-nav">
                            @foreach($sections as $key => $section)
                                @if($section->show_header)
                                    <li class="nav-item"><a class="nav-link smooth-scroll {{ $key == 0 ? 'active' : '' }}" href="#{{ $section->name }}">{{ $section->tag }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-auto col-lg-1 d-flex justify-content-end ps-0">
                <ul class="social-icons">
                    @if(isset($personalInfo->linkedin))
                        <li class="social-icons-linkedin">
                            <a data-bs-toggle="tooltip" href="https://linkedin.com/in/{{ $personalInfo->linkedin }}"
                               target="_blank" title="" data-bs-original-title="Linkedin">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </li>
                    @endif
                    @if(isset($personalInfo->github))
                        <li class="social-icons-github">
                            <a data-bs-toggle="tooltip" href="https://www.github.com/{{ $personalInfo->github }}"
                               target="_blank" title="" data-bs-original-title="Github">
                                <i class="fab fa-github"></i>
                            </a>
                        </li>
                    @endif
                    @if(isset($personalInfo->x))
                        <li class="social-icons-twitter">
                            <a data-bs-toggle="tooltip" href="https://twitter.com/{{ $personalInfo->x }}" target="_blank"
                               title="" data-bs-original-title="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="col-auto col-lg-1 d-flex justify-content-end ps-0">
                <div class="accordion accordion-flush" id="languagesTopics">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-languages-header">
                            <button class="accordion-button collapsed text-justify" type="button" data-bs-toggle="collapse" data-bs-target="#flush-languages" aria-expanded="false" aria-controls="flush-languages"><x-icon icon="settings"/></button>
                        </h2>
                        <div id="flush-languages" class="accordion-collapse collapse text-justify align-items-center" aria-labelledby="flush-languages-header" data-bs-parent="#languagesTopics">
                            @foreach($languages as $language)
                                <form method="post" class="mt-2" action="{{ route('change-language', $language) }}" data-turbo="false" data-controller="form">
                                    @csrf
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="language" value="{{$language->name}}" class="form-selectgroup-input" {{app()->getLocale() == $language->name ? 'checked' : ''}}/>
                                        <button type="submit" class="form-selectgroup-label {{app()->getLocale() == $language->name ? 'active' : ''}}"><img src="{{image_url($language->image)}}" alt="{{$language->name}}" width="24" height="24"/></button>
                                    </label>
                                </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

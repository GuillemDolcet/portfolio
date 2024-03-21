<header id="header" class="sticky-top-slide">
    <nav class="primary-menu navbar navbar-expand-lg overlay navbar-overlay-dark nav-bar-text-uppercase navbar-line-under-text fw-600">
        <div class="container position-relative">
            <div class="col-auto col-lg-1 d-inline-flex ps-lg-0">
                <a class="logo" title="{{ config('app.name') }}">
                    <img src="{{ image_url('logo.svg') }}" alt="{{ config('app.name') }}" width="32" height="32"/>
                </a>
            </div>
            <div class="col col-lg-10 navbar-accordion px-0">
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
                            <a data-bs-toggle="tooltip" href="https://linkedin.com//{{ $personalInfo->linkedin }}"
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
        </div>
    </nav>
</header>

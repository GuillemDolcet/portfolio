<header id="header" class="sticky-top">
    <!-- Navbar -->
    <nav
        class="primary-menu navbar navbar-expand-none navbar-overlay navbar-overlay-dark bg-transparent border-bottom-0 text-5 fw-600">
        <div class="container">
            <!-- Logo -->
            <a class="logo" title="{{ config('app.name') }}">
                <img src="{{ image_url('logo.svg') }}" alt="{{ config('app.name') }}" width="32" height="32"/>
            </a>
            <!-- Logo End -->
            <div class="text-3 ms-auto me-2"><span class="text-4 me-2"><i
                        class="fas fa-phone"></i></span>{{ $personalInfo->phone }}</div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#header-nav">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div id="header-nav" class="collapse navbar-collapse">
                <div class="d-flex flex-column h-100 align-items-center justify-content-center">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link smooth-scroll active" href="#home">Home</a></li>
                        <li class="nav-item"><a class="nav-link smooth-scroll" href="#about">About Me</a></li>
                        <li class="nav-item"><a class="nav-link smooth-scroll" href="#services">What I Do</a></li>
                        <li class="nav-item"><a class="nav-link smooth-scroll" href="#resume">Resume</a></li>
                        <li class="nav-item"><a class="nav-link smooth-scroll" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link smooth-scroll" href="#faq">FAQ</a></li>
                        <li class="nav-item"><a class="nav-link smooth-scroll" href="#testimonial">Client Speak</a></li>
                        <li class="nav-item"><a class="nav-link smooth-scroll" href="#contact">Contact Me</a></li>
                    </ul>
                    <ul class="social-icons social-icons-light social-icons-lg social-icons-light d-inline-flex mt-4">
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
                        @if(isset($personalInfo->instagram))
                            <li class="social-icons-instagram">
                                <a data-bs-toggle="tooltip" href="https://www.instagram.com/{{ $personalInfo->instagram }}"
                                   target="_blank" title="" data-bs-original-title="Instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
</header>

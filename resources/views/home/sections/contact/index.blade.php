<section id="{{ $section->name }}" class="section bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 text-center text-lg-start wow fadeInUp">
                <h2 class="text-10 fw-600 mb-5 text-justify">{{ $section->title }}</h2>
                <p class="text-5 mb-5 text-justify">{{ $section->description }}</p>
                <h3 class="text-5 fw-600">@lang('admin.phone'):</h3>
                <p class="text-4">{{ $personalInfo->phone }}</p>
                <h3 class="text-5 fw-600">@lang('admin.email'):</h3>
                <p class="text-4"><a class="text-black" href="mailto:{{ $personalInfo->email }}">{{ $personalInfo->email }}</a></p>
                <ul class="social-icons social-icons-lg justify-content-center justify-content-lg-start mt-5">
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
            <div class="col-lg-6 ms-auto mt-5 mt-lg-0 wow fadeInUp" data-wow-delay="0.3s">
                <form id="contact-form" class="form-border" action="{{ route('contact', $personalInfo) }}" method="post">
                    @csrf
                    <div class="row g-4">
                        <div class="col-12">
                            <label class="form-label" for="name">@lang('admin.contact.name') *</label>
                            <input id="name" name="name" type="text" class="form-control py-1" maxlength="255" placeholder="{{ $personalInfo->firstName }} {{ $personalInfo->lastName }}" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="email">@lang('admin.contact.email') *</label>
                            <input id="email" name="email" type="email" class="form-control py-1" placeholder="{{ $personalInfo->email }}" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="phone">@lang('admin.contact.phone') (@lang('admin.include.prefix'))</label>
                            <input id="phone" name="phone" type="text" class="form-control py-1" placeholder="{{ $personalInfo->phone }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="text">@lang('admin.contact.help') *</label>
                            <textarea id="text" name="text" class="form-control py-1" rows="4" required></textarea>
                        </div>
                        <div class="col-12 text-white d-none" id="response-box"></div>
                        <div class="col-12 text-center text-lg-start">
                            <button id="submit-btn" data-sending="@lang('admin.sending')" class="btn btn-dark rounded-0" type="submit">@lang('admin.send') <span class="ms-3"><i class="fas fa-arrow-right"></i></span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

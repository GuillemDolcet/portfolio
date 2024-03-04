<section id="contact" class="section bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 text-center text-lg-start wow fadeInUp">
                <h2 class="text-10 fw-600 mb-5">Let's get in touch</h2>
                <p class="text-5 mb-5">I enjoy discussing new projects and design challenges. Please share as much info, as possible so we can get the most out of our first catch-up.</p>
                <h3 class="text-5 fw-600">Living In:</h3>
                <address class="text-4">
                    30 Shacham street,
                    Los Angeles, USA.
                </address>
                <h3 class="text-5 fw-600">Call:</h3>
                <p class="text-4">{{ $user->phone }}</p>
                <ul class="social-icons social-icons-lg justify-content-center justify-content-lg-start mt-5">
                    @if(isset($user->linkedin))
                        <li class="social-icons-linkedin">
                            <a data-bs-toggle="tooltip" href="http://www.linkedin.com/{{ $user->linkedin }}" target="_blank" title="" data-bs-original-title="Twitter">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </li>
                    @endif
                    @if(isset($user->x))
                        <li class="social-icons-twitter">
                            <a data-bs-toggle="tooltip" href="https://twitter.com/{{ $user->x }}" target="_blank" title="" data-bs-original-title="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                    @endif
                    @if(isset($user->instagram))
                        <li class="social-icons-instagram">
                            <a data-bs-toggle="tooltip" href="http://www.instagram.com/{{ $user->instagram }}" target="_blank" title="" data-bs-original-title="Twitter">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="col-lg-6 ms-auto mt-5 mt-lg-0 wow fadeInUp" data-wow-delay="0.3s">
                <h2 class="text-10 fw-600 text-center text-lg-start mb-5">Estimate your Project?</h2>
                <!-- Contact Form -->
                <form id="contact-form" class="form-border" action="php/mail.php" method="post">
                    <div class="row g-4">
                        <div class="col-12">
                            <label class="form-label" for="name">What is Your Name:</label>
                            <input id="name" name="name" type="text" class="form-control py-1" required >
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="email">Your Email Address:</label>
                            <input id="email" name="email" type="email" class="form-control py-1" required >
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="form-message">How can I Help you?:</label>
                            <textarea id="form-message" name="form-message" class="form-control py-1" rows="4" required ></textarea>
                        </div>
                        <div class="col-12 text-center text-lg-start">
                            <button id="submit-btn" class="btn btn-dark rounded-0" type="submit">Send <span class="ms-3"><i class="fas fa-arrow-right"></i></span></button>
                        </div>
                    </div>
                </form>
                <!-- Contact Form end -->
            </div>
        </div>
    </div>
</section>

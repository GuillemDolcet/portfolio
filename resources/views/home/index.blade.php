@extends('layouts.home')

@section('main-content')

    <!-- Preloader -->
    <div class="preloader">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Document Wrapper
    =============================== -->
    <div id="main-wrapper">

        <!-- Header -->
        <header id="header" class="sticky-top">
            <!-- Navbar -->
            <nav class="primary-menu navbar navbar-expand-none navbar-overlay navbar-overlay-dark bg-transparent border-bottom-0 text-5 fw-600">
                <div class="container">
                    <!-- Logo -->
                    <a class="logo" href="index.html" title="Callum"> <img src="images/logo.png" alt="Callum"/> </a>
                    <!-- Logo End -->
                    <div class="text-3 ms-auto me-2"><span class="text-4 me-2"><i class="fas fa-phone"></i></span>(060) 444 434 444</div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#header-nav"><span></span><span></span><span></span></button>
                    <div id="header-nav" class="collapse navbar-collapse">
                        <div class="d-flex flex-column h-100 align-items-center justify-content-center">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a class="nav-link smooth-scroll active" href="#home">Home</a></li>
                                <li class="nav-item"><a class="nav-link smooth-scroll" 	href="#about">About Me</a></li>
                                <li class="nav-item"><a class="nav-link smooth-scroll" href="#services">What I Do</a></li>
                                <li class="nav-item"><a class="nav-link smooth-scroll" href="#resume">Resume</a></li>
                                <li class="nav-item"><a class="nav-link smooth-scroll" href="#portfolio">Portfolio</a></li>
                                <li class="nav-item"><a class="nav-link smooth-scroll" href="#faq">FAQ</a></li>
                                <li class="nav-item"><a class="nav-link smooth-scroll" href="#testimonial">Client Speak</a></li>
                                <li class="nav-item"><a class="nav-link smooth-scroll" href="#contact">Contact Me</a></li>
                            </ul>
                            <ul class="social-icons social-icons-light social-icons-lg social-icons-light d-inline-flex mt-4">
                                <li class="social-icons-twitter"><a data-bs-toggle="tooltip" href="https://twitter.com/harnishdesign/" target="_blank" title="" data-bs-original-title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                <li class="social-icons-facebook"><a data-bs-toggle="tooltip" href="http://www.facebook.com/harnishdesign/" target="_blank" title="" data-bs-original-title="Facebook"><i class="fab fa-facebook"></i></a></li>
                                <li class="social-icons-instagram"><a data-bs-toggle="tooltip" href="http://www.instagram.com/" target="_blank" title="" data-bs-original-title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                <li class="social-icons-linkedin"><a data-bs-toggle="tooltip" href="http://www.linkedin.com/" target="_blank" title="" data-bs-original-title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                                <li class="social-icons-dribbble"><a data-bs-toggle="tooltip" href="http://www.dribbble.com/harnishdesign/" target="_blank" title="" data-bs-original-title="Dribbble"><i class="fab fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
        </header>
        <!-- Header End -->

        <!-- Content
        ============================================= -->
        <div id="content" role="main">

            <!-- Intro
            ============================================= -->
            <section id="home" class="bg-primary d-flex fullscreen position-relative py-5">
                <div class="container my-auto py-4">
                    <div class="row">
                        <div class="col-lg-7 text-center text-lg-start align-self-center order-1 order-lg-0 wow fadeIn">
                            <h1 class="text-12 fw-300 mb-0 text-uppercase">Hi, I'm a Freelancer</h1>
                            <div class="typed-strings">
                                <p>Designer</p>
                                <p>Developer</p>
                                <p>Callum</p>
                            </div>
                            <h2 class="text-21 fw-600 text-uppercase mb-0 ms-n1"><span class="typed"></span></h2>
                            <p class="text-5">based in Los Angeles, USA.</p>
                            <a href="#portfolio" class="btn btn-dark rounded-0 smooth-scroll mt-3">View My Works</a><a href="#contact" class="btn btn-link text-dark smooth-scroll mt-3">Contact Me<span class="text-4 ms-2"><i class="far fa-arrow-alt-circle-down"></i></span></a>
                        </div>
                        <div class="col-lg-5 text-center align-self-center mb-4 mb-lg-0 order-0 order-lg-1">
                            <div class="bg-light rounded-pill d-inline-block p-3 shadow-lg wow zoomIn"> <img class="img-fluid rounded-pill d-block" src="images/web-developer.jpg" title="I'm Callum" alt=""></div>
                        </div>
                    </div>
                </div>
                <a href="#about" class="scroll-down-arrow text-dark smooth-scroll"><span class="animated"><i class="fas fa-arrow-down"></i></span></a> </section>
            <!-- Intro end -->

            <!-- About
            ============================================= -->
            <section id="about" class="section">
                <div class="container">
                    <!-- Heading -->
                    <p class="text-center mb-2 wow fadeInUp"><span class="bg-primary text-dark px-2">About Me</span></p>
                    <h2 class="text-10 fw-600 text-center mb-5 wow fadeInUp">Know Me More</h2>
                    <!-- Heading end-->

                    <div class="row">
                        <div class="col-lg-8 text-center text-lg-start wow fadeInUp">
                            <h2 class="text-8 fw-400 mb-3">Hi, I'm <span class="fw-700 border-bottom border-3 border-primary">Callum Smith</span></h2>
                            <p class="text-5">I'm a designer & developer with a passion for web design. I enjoy developing simple, clean and slick websites that provide real value to the end user. Thousands of clients have procured exceptional results while working with me. Delivering work within time and budget which meets client’s requirements is our moto.</p>
                        </div>
                        <div class="col-lg-4 mt-4 mt-lg-0 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="featured-box style-4">
                                <div class="featured-box-icon text-25 fw-500 bg-primary rounded-circle"><span class="wow heartBeat" data-wow-delay="1.3s">22</span></div>
                                <h3 class="text-7 wow rubberBand" data-wow-delay="2s">Years of <span class="fw-700">Experiance</span></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row gy-3 mt-4">
                        <div class="col-6 col-lg-3 wow fadeInUp">
                            <p class="text-muted fw-500 mb-0">Name:</p>
                            <p class="text-4 text-dark fw-600 mb-0">Callum Smith</p>
                        </div>
                        <div class="col-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                            <p class="text-muted fw-500 mb-0">Email:</p>
                            <p class="text-4 fw-600 mb-0"><a class="link-dark" href="">chat@callum.com</a></p>
                        </div>
                        <div class="col-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                            <p class="text-muted fw-500 mb-0">Date of birth:</p>
                            <p class="text-4 text-dark fw-600 mb-0">11 November, 1987</p>
                        </div>
                        <div class="col-6 col-lg-3 wow fadeInUp" data-wow-delay="0.4s">
                            <p class="text-muted fw-500 mb-0">From:</p>
                            <p class="text-4 text-dark fw-600 mb-0">Los Angeles, USA.</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- About end -->

            <!-- Services
            ============================================= -->
            <section id="services" class="section bg-light">
                <div class="container">
                    <!-- Heading -->
                    <p class=" text-center mb-2 wow fadeInUp"><span class="bg-primary text-dark px-2">What I Do?</span></p>
                    <h2 class="text-10 fw-600 text-center mb-5 wow fadeInUp">How I can help your next project</h2>
                    <!-- Heading end-->

                    <div class="row gy-5 mt-5">
                        <div class="col-sm-6 col-lg-4 wow fadeInUp">
                            <div class="featured-box text-center px-md-4">
                                <div class="featured-box-icon text-primary text-13"> <i class="fas fa-palette"></i> </div>
                                <h3 class="text-6 fw-600 mb-3">Graphic Design</h3>
                                <p class="text-muted mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text. </p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 wow fadeInUp">
                            <div class="featured-box text-center px-md-4">
                                <div class="featured-box-icon text-primary text-13"> <i class="fas fa-desktop"></i></div>
                                <h3 class="text-6 fw-600 mb-3">Web Design</h3>
                                <p class="text-muted mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text. </p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 wow fadeInUp">
                            <div class="featured-box text-center px-md-4">
                                <div class="featured-box-icon text-primary text-13"> <i class="fas fa-pencil-ruler"></i> </div>
                                <h3 class="text-6 fw-600 mb-3">Web Development</h3>
                                <p class="text-muted mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text. </p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 wow fadeInUp">
                            <div class="featured-box text-center px-md-4">
                                <div class="featured-box-icon text-primary text-13"> <i class="fas fa-paint-brush"></i> </div>
                                <h3 class="text-6 fw-600 mb-3">Brand Identity</h3>
                                <p class="text-muted mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text. </p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 wow fadeInUp">
                            <div class="featured-box text-center px-md-4">
                                <div class="featured-box-icon text-primary text-13"> <i class="fas fa-chart-area"></i> </div>
                                <h3 class="text-6 fw-600 mb-3">Business Analysis</h3>
                                <p class="text-muted mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text. </p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 wow fadeInUp">
                            <div class="featured-box text-center px-md-4">
                                <div class="featured-box-icon text-primary text-13"> <i class="fas fa-bullhorn"></i> </div>
                                <h3 class="text-6 fw-600 mb-3">Digital Marketing</h3>
                                <p class="text-muted mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Services end -->

            <!-- Resume
            ============================================= -->
            <section id="resume" class="section">
                <div class="container">
                    <!-- Heading -->
                    <p class=" text-center mb-2 wow fadeInUp"><span class="bg-primary text-dark px-2">Resume</span></p>
                    <h2 class="text-10 fw-600 text-center mb-5 wow fadeInUp">A summary of My Resume</h2>
                    <!-- Heading end-->

                    <div class="row g-5 mt-5">
                        <!-- My Education -->
                        <div class="col-lg-6 wow fadeInUp">
                            <h2 class="text-7 fw-600 mb-4 pb-2">My Education</h2>
                            <div class="border-start border-2 border-primary ps-3">
                                <h3 class="text-5">Master in Computer Engineering</h3>
                                <p class="mb-2">Harvard University / 2015 - 2017</p>
                                <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the dummy text.</p>
                                <hr class="my-4">
                                <h3 class="text-5">Bachelor in Computer Engineering</h3>
                                <p class="mb-2">University of California / 2014 - 2015</p>
                                <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the dummy text.</p>
                                <hr class="my-4">
                                <h3 class="text-5">Computer Science</h3>
                                <p class="mb-2">International University / 2013 - 2014</p>
                                <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the dummy text.</p>
                            </div>
                        </div>
                        <!-- My Experience -->
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                            <h2 class="text-7 fw-600 mb-4 pb-2">My Experience</h2>
                            <div class="border-start border-2 border-primary ps-3">
                                <h3 class="text-5">Sr. Font End Developer</h3>
                                <p class="mb-2">Apple Inc / 2020 - Current</p>
                                <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the dummy text.</p>
                                <hr class="my-4">
                                <h3 class="text-5">Jr. Font End Developer</h3>
                                <p class="mb-2">Dribbble Inc / 2018 - 2020</p>
                                <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the dummy text.</p>
                                <hr class="my-4">
                                <h3 class="text-5">HTML Developer</h3>
                                <p class="mb-2">Adobe Inc / 2017 - 2018</p>
                                <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the dummy text.</p>
                            </div>
                        </div>
                    </div>

                    <!-- My Skills -->
                    <h2 class="text-7 fw-600 mb-4 pb-2 mt-5 wow fadeInUp">My Skills</h2>
                    <div class="row gx-5">
                        <div class="col-md-6 wow fadeInUp">
                            <p class="fw-500 text-start mb-2">Web Design <span class="float-end">65%</span></p>
                            <div class="progress progress-sm mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="fw-500 text-start mb-2">HTML/CSS <span class="float-end">95%</span></p>
                            <div class="progress progress-sm mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="fw-500 text-start mb-2">JavaScript <span class="float-end">80%</span></p>
                            <div class="progress progress-sm mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                            <p class="fw-500 text-start mb-2">React JS <span class="float-end">70%</span></p>
                            <div class="progress progress-sm mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="fw-500 text-start mb-2">Angular Js <span class="float-end">60%</span></p>
                            <div class="progress progress-sm mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="fw-500 text-start mb-2">Bootstrap <span class="float-end">99%</span></p>
                            <div class="progress progress-sm mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 99%" aria-valuenow="99" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <p class="text-center mt-5 wow fadeInUp"><a href="#" class="btn btn-outline-dark shadow-none rounded-0">Download CV</a></p>
                </div>
            </section>
            <!-- Resume end -->

            <!-- Portfolio
            ============================================= -->
            <section id="portfolio" class="section bg-light">
                <div class="container">
                    <!-- Heading -->
                    <p class=" text-center mb-2 wow fadeInUp"><span class="bg-primary text-dark px-2">Portfolio</span></p>
                    <h2 class="text-10 fw-600 text-center mb-5 wow fadeInUp">Some of my most recent projects</h2>
                    <!-- Heading end-->

                    <!-- Filter Menu -->
                    <ul class="portfolio-menu nav nav-tabs fw-600 justify-content-start justify-content-md-center border-bottom-0 mb-4 wow fadeInUp">
                        <li class="nav-item"> <a data-filter="*" class="nav-link rounded-0 active" href="">All</a></li>
                        <li class="nav-item"> <a data-filter=".detailed" href="" class="nav-link rounded-0">Detailed</a></li>
                        <li class="nav-item"> <a data-filter=".mockups" href="" class="nav-link rounded-0">Mockups</a></li>
                        <li class="nav-item"> <a data-filter=".youtube" href="" class="nav-link rounded-0">YouTube Videos</a></li>
                        <li class="nav-item"> <a data-filter=".vimeo" href="" class="nav-link rounded-0">Vimeo Videos</a></li>
                    </ul>
                    <!-- Filter Menu end -->
                    <div class="portfolio wow fadeInUp">
                        <div class="row g-4 mt-3 portfolio-filter">
                            <div class="col-sm-6 col-lg-4 detailed">
                                <div class="portfolio-box">
                                    <div class="portfolio-img"> <img class="img-fluid d-block" src="images/projects/project-1.jpg" alt="">
                                        <div class="portfolio-overlay"> <a class="popup-ajax stretched-link" href="ajax/portfolio-ajax-project-1.html"></a>
                                            <div class="portfolio-overlay-details">
                                                <p class="text-primary text-8"><i class="fas fa-file-alt"></i></p>
                                                <h5 class="text-white text-5">Detailed Project 1</h5>
                                                <span class="text-light">Category</span> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 mockups" data-wow-delay="0.2s">
                                <div class="portfolio-box">
                                    <div class="portfolio-img"> <img class="img-fluid d-block" src="images/projects/project-2.jpg" alt="">
                                        <div class="portfolio-overlay"> <a class="popup-img stretched-link" href="images/projects/project-2.jpg"></a>
                                            <div class="portfolio-overlay-details">
                                                <p class="text-primary text-8"><i class="fas fa-image"></i></p>
                                                <h5 class="text-white text-5">Mockups Design 1</h5>
                                                <span class="text-light">Category</span> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 youtube" data-wow-delay="0.3s">
                                <div class="portfolio-box">
                                    <div class="portfolio-img"> <img class="img-fluid d-block" src="images/projects/project-3.jpg" alt="">
                                        <div class="portfolio-overlay"> <a class="popup-youtube stretched-link" href="https://www.youtube.com/watch?v=PMNnEEEacCg"></a>
                                            <div class="portfolio-overlay-details">
                                                <p class="text-primary text-8"><i class="fas fa-video"></i></p>
                                                <h5 class="text-white text-5">YouTube Video</h5>
                                                <span class="text-light">Category</span> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 vimeo">
                                <div class="portfolio-box">
                                    <div class="portfolio-img"> <img class="img-fluid d-block" src="images/projects/project-4.jpg" alt="">
                                        <div class="portfolio-overlay"> <a class="popup-vimeo stretched-link" href="https://vimeo.com/259411563"></a>
                                            <div class="portfolio-overlay-details">
                                                <p class="text-primary text-8"><i class="fas fa-video"></i></p>
                                                <h5 class="text-white text-5">Vimeo Video</h5>
                                                <span class="text-light">Category</span> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 detailed" data-wow-delay="0.2s">
                                <div class="portfolio-box">
                                    <div class="portfolio-img"> <img class="img-fluid d-block" src="images/projects/project-5.jpg" alt="">
                                        <div class="portfolio-overlay"> <a class="popup-ajax stretched-link" href="ajax/portfolio-ajax-project-2.html"></a>
                                            <div class="portfolio-overlay-details">
                                                <p class="text-primary text-8"><i class="fas fa-file-alt"></i></p>
                                                <h5 class="text-white text-5">Detailed Project 2</h5>
                                                <span class="text-light">Category</span> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 mockups" data-wow-delay="0.3s">
                                <div class="portfolio-box">
                                    <div class="portfolio-img"> <img class="img-fluid d-block" src="images/projects/project-6.jpg" alt="">
                                        <div class="portfolio-overlay"> <a class="popup-img stretched-link" href="images/projects/project-6.jpg"></a>
                                            <div class="portfolio-overlay-details">
                                                <p class="text-primary text-8"><i class="fas fa-image"></i></p>
                                                <h5 class="text-white text-5">Mockups Design 2</h5>
                                                <span class="text-light">Category</span> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Portfolio end -->

            <!-- Call to Action
            ============================================= -->
            <section>
                <div class="hero-wrap">
                    <div class="hero-mask opacity-8 bg-dark"></div>
                    <div class="hero-bg parallax" style="background-image:url('images/intro-bg-2.jpg');"></div>
                    <div class="hero-content section">
                        <div class="container text-center py-5 wow fadeInUp">
                            <h2 class="text-10 fw-600 text-white mb-5">Interested in working with me?</h2>
                            <a href="#contact" class="btn btn-primary rounded-0 smooth-scroll wow rubberBand" data-wow-delay="1s">Hire Me!</a> </div>
                    </div>
                </div>
            </section>
            <!-- Call to Action end -->

            <!-- FAQ
            ============================================= -->
            <section id="faq" class="section bg-light">
                <div class="container">
                    <div class="row gy-5">
                        <div class="col-lg-6 order-1 order-lg-0 wow fadeInUp">
                            <!-- Heading -->
                            <p class="text-center text-lg-start mb-2"><span class="bg-primary text-dark px-2">FAQ</span></p>
                            <h2 class="text-10 fw-600 text-center text-lg-start mb-5">Have any questions?</h2>
                            <!-- Heading end-->
                            <div class="accordion accordion-flush" id="faqTopics">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne"> What is Callum? </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#faqTopics">
                                        <div class="accordion-body"> Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Mutat tacimates id sit. Ridens mediocritatem ius an, eu nec magna imperdiet. </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo"> How Can I Help You? </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#faqTopics">
                                        <div class="accordion-body">
                                            <p>Iisque Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
                                            <p class="mb-0">Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree"> Simple process of workflow? </button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#faqTopics">
                                        <div class="accordion-body"> Iisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Mutat tacimates id sit. Ridens mediocritatem ius an, eu nec magna imperdiet. </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseThree"> Is Callum a Multi-purpose template? </button>
                                    </h2>
                                    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#faqTopics">
                                        <div class="accordion-body"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingFive">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseThree"> Why responsive one page template? </button>
                                    </h2>
                                    <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#faqTopics">
                                        <div class="accordion-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center justify-content-center order-0 order-lg-1 wow fadeIn" data-wow-delay="1s"> <img class="img-fluid" src="images/faq.png" title="FAQ" alt="faq"> </div>
                    </div>
                </div>
            </section>
            <!-- FAQ end -->

            <!-- Testimonial
            ============================================= -->
            <section id="testimonial" class="section bg-secondary">
                <div class="container">
                    <!-- Heading -->
                    <p class=" text-center mb-2 wow fadeIn"><span class="bg-primary text-dark px-2">Client Speak</span></p>
                    <h2 class="text-10 fw-600 text-white text-center mb-5 wow fadeIn">What Some of my Clients Say</h2>
                    <!-- Heading end-->
                    <div class="row">
                        <div class="col-lg-9 mx-auto wow fadeInUp">
                            <div class="owl-carousel owl-theme owl-light" data-autoplay="true" data-loop="true" data-nav="true" data-margin="30" data-slideby="1" data-stagepadding="5"  data-items-xs="1" data-items-sm="1" data-items-md="1" data-items-lg="1">
                                <div class="item text-center px-5"> <span class="text-9 text-primary"><i class="fa fa-quote-start"></i></span>
                                    <p class="text-5 text-white">Easy to use, reasonably priced simply dummy text of the printing and typesetting industry. Quidam lisque persius interesset his et, in quot quidam possim iriure. simply dummy text of the printing and typesetting industry.”</p>
                                    <img class="img-fluid d-inline-block w-auto rounded-circle shadow" src="images/testimonial/client-sm-1.jpg" alt=""> <strong class="d-block text-3 fw-600 text-white">Jay Shah</strong> <span class="text-light">Founder at Icomatic Pvt Ltd</span> </div>
                                <div class="item text-center px-5"> <span class="text-9 text-primary"><i class="fa fa-quote-start"></i></span>
                                    <p class="text-5 text-white">“I am happy Working with printing and typesetting industry. Quidam lisque persius interesset his et, in quot quidam persequeris essent possim iriure. simply dummy text of the printing and typesetting industry.”</p>
                                    <img class="img-fluid d-inline-block w-auto rounded-circle shadow" src="images/testimonial/client-sm-2.jpg" alt=""> <strong class="d-block text-3 fw-500 text-white">Patrick Cary</strong> <span class="text-light">Freelancer from USA</span> </div>
                                <div class="item text-center px-5"> <span class="text-9 text-primary"><i class="fa fa-quote-start"></i></span>
                                    <p class="text-5 text-white">“Only trying it out since a few days. But up to now excellent. Seems to work flawlessly. priced simply dummy text of the printing and typesetting industry.”</p>
                                    <img class="img-fluid d-inline-block w-auto rounded-circle shadow" src="images/testimonial/client-sm-3.jpg" alt=""> <strong class="d-block text-3 fw-500 text-white">Dennis Jacques</strong> <span class="text-light">Noon Inc</span> </div>
                                <div class="item text-center px-5"> <span class="text-9 text-primary"><i class="fa fa-quote-start"></i></span>
                                    <p class="text-5 text-white">“I have used them twice now. Good rates, very efficient service and priced simply dummy text of the printing and typesetting industry quidam interesset his et. simply dummy text of the printing and typesetting industry. Excellent.”</p>
                                    <img class="img-fluid d-inline-block w-auto rounded-circle shadow" src="images/testimonial/client-sm-4.jpg" alt=""> <strong class="d-block text-3 fw-500 text-white">Chris Tom</strong> <span class="text-light">Company CEO from UK</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Testimonial end -->

            <!-- Contact Me
            ============================================= -->
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
                            <p class="text-4">(+060) 444 434 444</p>
                            <ul class="social-icons social-icons-lg justify-content-center justify-content-lg-start mt-5">
                                <li class="social-icons-twitter"><a data-bs-toggle="tooltip" href="https://twitter.com/harnishdesign/" target="_blank" title="" data-bs-original-title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                <li class="social-icons-facebook"><a data-bs-toggle="tooltip" href="http://www.facebook.com/harnishdesign/" target="_blank" title="" data-bs-original-title="Facebook"><i class="fab fa-facebook"></i></a></li>
                                <li class="social-icons-instagram"><a data-bs-toggle="tooltip" href="http://www.instagram.com/" target="_blank" title="" data-bs-original-title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                <li class="social-icons-github"><a data-bs-toggle="tooltip" href="http://www.github.com/" target="_blank" title="" data-bs-original-title="GitHub"><i class="fab fa-github"></i></a></li>
                                <li class="social-icons-dribbble"><a data-bs-toggle="tooltip" href="http://www.dribbble.com/harnishdesign/" target="_blank" title="" data-bs-original-title="Dribbble"><i class="fab fa-dribbble"></i></a></li>
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
            <!-- Contact Me end -->

        </div>
        <!-- Content end -->

        <!-- Footer
        ============================================= -->
        <footer id="footer" class="section bg-dark text-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-center text-lg-start wow fadeInUp">
                        <p class="mb-2 mb-lg-0">Copyright © 2021 <a class="fw-600" href="#">Callum</a>. All Rights Reserved.</p>
                    </div>
                    <div class="col-lg-6 wow fadeInUp">
                        <p class="mb-0 text-center text-lg-end">Designed by <a class="fw-600" href="http://www.harnishdesign.net/">Harnish Design</a></p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer end -->

    </div>
    <!-- Document Wrapper end -->

    <!-- Back to Top
    ============================================= -->
    <a id="back-to-top" class="rounded-circle" data-bs-toggle="tooltip" title="Back to Top" href="javascript:void(0)"><i class="fas fa-arrow-up"></i></a>

@endsection

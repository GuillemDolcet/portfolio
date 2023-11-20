
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cristino - Personal Portfolio Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Premium Bootstrap 5 Landing Page Template">
    <meta name="keywords" content="Bootstrap 5, premium, marketing, multipurpose">
    <meta content="Shreethemes" name="author">
    @vite(['resources/assets/css/bootstrap.min.css','resources/assets/css/default.css',
'resources/assets/css/materialdesignicons.min.css','resources/assets/css/style.min.css','resources/assets/css/tobii.min.css'], 'assets')

</head>

<body>
<!-- Loader -->
<div id="preloader">
    <div id="status">
        <div class="logo">
            <img src="{{ image_url('logo-small.svg') }}" height="20" class="d-block mx-auto" alt="">
        </div>
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
</div>
<!-- Loader -->

<!-- Navbar Start -->
<nav id="navbar" class="navbar navbar-expand-lg fixed-top navbar-custom navbar-light sticky">
    <div class="container">
        <a class="navbar-brand" href="">
            <img src="{{ image_url('home/logo.png') }}" class="logo-light-mode" alt="">
            <img src="{{ image_url('home/logo-light.png') }}" class="logo-dark-mode" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span data-feather="menu" class="fea icon-md"></span>
        </button><!--end button-->

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul id="navbar-navlist" class="navbar-nav navbar-nav-link mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li><!--end nav item-->
                <li class="nav-item">
                    <a class="nav-link" href="#services">Services</a>
                </li><!--end nav item-->
                <li class="nav-item">
                    <a class="nav-link" href="#resume">Resume</a>
                </li><!--end nav item-->
                <li class="nav-item">
                    <a class="nav-link" href="#projects">Projects</a>
                </li><!--end nav item-->
                <li class="nav-item">
                    <a class="nav-link" href="#news">Blog</a>
                </li><!--end nav item-->
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li><!--end nav item-->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages
                    </a>
                    <div class="dropdown-menu rounded m-0" aria-labelledby="navbarDropdown">
                        <div class="container mx-0 mx-md-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="dropdown-item" href="page-blog.html">Blog</a>
                                    <a class="dropdown-item" href="page-blog-detail.html">Blog Detail</a>
                                    <a class="dropdown-item" href="page-portfolio.html">Portfolio</a>
                                    <a class="dropdown-item" href="page-portfolio-detail.html">Portfolio Detail</a>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end container-->
                    </div>
                </li><!--end nav item-->
            </ul>

            <ul class="list-unstyled mb-0 mt-2 mt-sm-0 social-icon">
                <li class="list-inline-item"><a href="javascript:void(0)"><i class="mdi mdi-facebook"></i></a></li>
                <li class="list-inline-item"><a href="javascript:void(0)"><i class="mdi mdi-twitter"></i></a></li>
                <li class="list-inline-item"><a href="javascript:void(0)"><i class="mdi mdi-instagram"></i></a></li>
            </ul>
        </div>
    </div><!--end container-->
</nav><!--end navbar-->
<!-- Navbar End -->

<!-- HOME START-->
<section class="bg-home bg-light d-table w-100" style="background-image:url('{{ image_url('home/home/01.jpg') }}')" id="home">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="title-heading mt-5">
                    <h6 class="sub-title">Looking for a Designer !</h6>
                    <h1 class="heading text-primary mb-3">I'm Cristino Murphy</h1>
                    <p class="para-desc text-muted">Obviously I'm a Web Designer. Web Developer with over 3 years of experience. Experienced with all stages of the development cycle for dynamic web projects.</p>
                    <div class="mt-4 pt-2">
                        <a href="javascript:void(0)" class="btn btn-primary rounded mb-2 me-2">Hire me</a>
                        <a href="javascript:void(0)" class="btn btn-outline-primary rounded mb-2">Download CV <i data-feather="download" class="fea icon-sm"></i></a>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
    <a href="#about" data-scroll-nav="1" class="mouse-icon rounded-pill bg-transparent mouse-down">
        <span class="wheel position-relative d-block mover"></span>
    </a>
</section><!--end section-->
<!-- HOME END-->

<!-- About Start -->
<section class="section pb-3" id="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-5">
                <div class="about-hero">
                    <img src="{{ image_url('home/hero.png') }}" class="img-fluid mx-auto d-block about-tween position-relative" alt="">
                </div>
            </div><!--end col-->

            <div class="col-lg-7 col-md-7 mt-4 pt-2 mt-sm-0 pt-sm-0">
                <div class="section-title mb-0 ms-lg-5 ms-md-3">
                    <h4 class="title text-primary mb-3">Cristino Murphy</h4>
                    <h6 class="designation mb-3">I'm a Passionate <span class="text-primary">Web Designer</span></h6>
                    <p class="text-muted">Obviously I'm a Web Designer. Web Developer with over 3 years of experience. Experienced with all stages of the development cycle for dynamic web projects. The as opposed to using 'Content here, content here', making it look like readable English.</p>
                    <p class="text-muted">The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                    <img src="{{ image_url('home/sign.png') }}" height="22" alt="">
                    <div class="mt-4">
                        <a href="#projects" class="btn btn-primary mouse-down">View Portfolio</a>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <div class="container mt-100 mt-60">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title">
                    <div class="position-relative">
                        <h4 class="title text-uppercase mb-4">Hobbies & Interests</h4>

                        <div>
                            <div class="title-box"></div>
                            <div class="title-line"></div>
                        </div>
                    </div>
                    <p class="text-muted mx-auto para-desc mt-5 mb-0">Obviously I'm a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                <div class="interests-desc bg-light position-relative px-2 py-3 rounded">
                    <div class="hobbies d-flex align-items-center">
                        <div class="text-center rounded-pill me-4">
                            <i data-feather="monitor" class="icon fea icon-md-sm"></i>
                        </div>
                        <div class="content">
                            <h6 class="title mb-0">Developing</h6>
                        </div>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                <div class="interests-desc bg-light position-relative px-2 py-3 rounded">
                    <div class="hobbies d-flex align-items-center">
                        <div class="text-center rounded-pill me-4">
                            <i data-feather="stop-circle" class="icon fea icon-md-sm"></i>
                        </div>
                        <div class="content">
                            <h6 class="title mb-0">Mac OS</h6>
                        </div>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                <div class="interests-desc bg-light position-relative px-2 py-3 rounded">
                    <div class="hobbies d-flex align-items-center">
                        <div class="text-center rounded-pill me-4">
                            <i data-feather="video" class="icon fea icon-md-sm"></i>
                        </div>
                        <div class="content">
                            <h6 class="title mb-0">Cinema</h6>
                        </div>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                <div class="interests-desc bg-light position-relative px-2 py-3 rounded">
                    <div class="hobbies d-flex align-items-center">
                        <div class="text-center rounded-pill me-4">
                            <i data-feather="coffee" class="icon fea icon-md-sm"></i>
                        </div>
                        <div class="content">
                            <h6 class="title mb-0">Coffee</h6>
                        </div>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                <div class="interests-desc bg-light position-relative px-2 py-3 rounded">
                    <div class="hobbies d-flex align-items-center">
                        <div class="text-center rounded-pill me-4">
                            <i data-feather="music" class="icon fea icon-md-sm"></i>
                        </div>
                        <div class="content">
                            <h6 class="title mb-0">Music</h6>
                        </div>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                <div class="interests-desc bg-light position-relative px-2 py-3 rounded">
                    <div class="hobbies d-flex align-items-center">
                        <div class="text-center rounded-pill me-4">
                            <i data-feather="watch" class="icon fea icon-md-sm"></i>
                        </div>
                        <div class="content">
                            <h6 class="title mb-0">Games</h6>
                        </div>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                <div class="interests-desc bg-light position-relative px-2 py-3 rounded">
                    <div class="hobbies d-flex align-items-center">
                        <div class="text-center rounded-pill me-4">
                            <i data-feather="box" class="icon fea icon-md-sm"></i>
                        </div>
                        <div class="content">
                            <h6 class="title mb-0">Designing</h6>
                        </div>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                <div class="interests-desc bg-light position-relative px-2 py-3 rounded">
                    <div class="hobbies d-flex align-items-center">
                        <div class="text-center rounded-pill me-4">
                            <i data-feather="target" class="icon fea icon-md-sm"></i>
                        </div>
                        <div class="content">
                            <h6 class="title mb-0">Sports</h6>
                        </div>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                <div class="interests-desc bg-light position-relative px-2 py-3 rounded">
                    <div class="hobbies d-flex align-items-center">
                        <div class="text-center rounded-pill me-4">
                            <i data-feather="pen-tool" class="icon fea icon-md-sm"></i>
                        </div>
                        <div class="content">
                            <h6 class="title mb-0">Painting</h6>
                        </div>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                <div class="interests-desc bg-light position-relative px-2 py-3 rounded">
                    <div class="hobbies d-flex align-items-center">
                        <div class="text-center rounded-pill me-4">
                            <i data-feather="book" class="icon fea icon-md-sm"></i>
                        </div>
                        <div class="content">
                            <h6 class="title mb-0">Reading</h6>
                        </div>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                <div class="interests-desc bg-light position-relative px-2 py-3 rounded">
                    <div class="hobbies d-flex align-items-center">
                        <div class="text-center rounded-pill me-4">
                            <i data-feather="smartphone" class="icon fea icon-md-sm"></i>
                        </div>
                        <div class="content">
                            <h6 class="title mb-0">Android</h6>
                        </div>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                <div class="interests-desc bg-light position-relative px-2 py-3 rounded">
                    <div class="hobbies d-flex align-items-center">
                        <div class="text-center rounded-pill me-4">
                            <i data-feather="activity" class="icon fea icon-md-sm"></i>
                        </div>
                        <div class="content">
                            <h6 class="title mb-0">Other Activity</h6>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div>
    </div><!--end container-->

    <div class="container-fluid mt-100 mt-60">
        <div class="rounded py-md-5 py-4" style="background: url('{{ image_url('home/bg-counter.jpg') }}') center center;">
            <div class="container">
                <div class="row" id="counter">
                    <div class="col-lg-3 col-6">
                        <div class="counter-box rounded py-3 text-center">
                            <div class="counter-icon">
                                <i data-feather="smile" class="fea icon-md text-primary"></i>
                            </div>
                            <h3 class="counter-value mt-3 text-white title-dark" data-target="1251">95</h3>
                            <h6 class="counter-head font-weight-normal mb-0 text-white title-dark">Happy Client</h6>
                        </div><!--end counter box-->
                    </div><!--end col-->

                    <div class="col-lg-3 col-6">
                        <div class="counter-box rounded py-3 text-center">
                            <div class="counter-icon">
                                <i data-feather="award" class="fea icon-md text-primary"></i>
                            </div>
                            <h3 class="counter-value mt-3 text-white title-dark" data-target="15">1</h3>
                            <h6 class="counter-head font-weight-normal mb-0 text-white title-dark">Award Won</h6>
                        </div><!--end counter box-->
                    </div><!--end col-->

                    <div class="col-lg-3 col-6">
                        <div class="counter-box rounded py-3 text-center">
                            <div class="counter-icon">
                                <i data-feather="coffee" class="fea icon-md text-primary"></i>
                            </div>
                            <h3 class="counter-value mt-3 text-white title-dark" data-target="3261">30</h3>
                            <h6 class="counter-head font-weight-normal mb-0 text-white title-dark">Cup of Coffee</h6>
                        </div><!--end counter box-->
                    </div><!--end col-->

                    <div class="col-lg-3 col-6">
                        <div class="counter-box rounded py-3 text-center">
                            <div class="counter-icon">
                                <i data-feather="thumbs-up" class="fea icon-md text-primary"></i>
                            </div>
                            <h3 class="counter-value mt-3 text-white title-dark" data-target="36">3</h3>
                            <h6 class="counter-head font-weight-normal mb-0 text-white title-dark">Project Complete</h6>
                        </div><!--end counter box-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </div><!--end div-->
    </div><!--end container fluid-->
</section>
<!-- About end -->

<!-- Services Start -->
<section class="section bg-light" id="services">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title">
                    <div class="position-relative">
                        <h4 class="title text-uppercase mb-4">What Do I Offer ?</h4>
                        <div>
                            <div class="title-box"></div>
                            <div class="title-line"></div>
                        </div>
                    </div>
                    <p class="text-muted mx-auto para-desc mt-5 mb-0">Obviously I'm a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="service-wrapper rounded position-relative text-center border border-footer p-4 pt-5 pb-5">
                    <div class="icon text-primary">
                        <i data-feather="airplay" class="fea icon-md"></i>
                    </div>
                    <div class="content mt-4">
                        <h5 class="title">UX / UI Design</h5>
                        <p class="text-muted mt-3 mb-0">It is a long established fact that a reader will be distracted by the when looking at its layout.</p>
                    </div>
                    <div class="big-icon">
                        <i data-feather="airplay" class="fea icons"></i>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="service-wrapper rounded position-relative text-center border border-footer p-4 pt-5 pb-5">
                    <div class="icon text-primary">
                        <i data-feather="aperture" class="fea icon-md"></i>
                    </div>
                    <div class="content mt-4">
                        <h5 class="title">Ios App Designer</h5>
                        <p class="text-muted mt-3 mb-0">It is a long established fact that a reader will be distracted by the when looking at its layout.</p>
                    </div>
                    <div class="big-icon">
                        <i data-feather="aperture" class="fea icons"></i>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="service-wrapper rounded position-relative text-center border border-footer p-4 pt-5 pb-5">
                    <div class="icon text-primary">
                        <i data-feather="camera" class="fea icon-md"></i>
                    </div>
                    <div class="content mt-4">
                        <h5 class="title">Photography</h5>
                        <p class="text-muted mt-3 mb-0">It is a long established fact that a reader will be distracted by the when looking at its layout.</p>
                    </div>
                    <div class="big-icon">
                        <i data-feather="camera" class="fea icons"></i>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="service-wrapper rounded position-relative text-center border border-footer p-4 pt-5 pb-5">
                    <div class="icon text-primary">
                        <i data-feather="compass" class="fea icon-md"></i>
                    </div>
                    <div class="content mt-4">
                        <h5 class="title">Graphic Designer</h5>
                        <p class="text-muted mt-3 mb-0">It is a long established fact that a reader will be distracted by the when looking at its layout.</p>
                    </div>
                    <div class="big-icon">
                        <i data-feather="compass" class="fea icons"></i>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="service-wrapper rounded position-relative text-center border border-footer p-4 pt-5 pb-5">
                    <div class="icon text-primary">
                        <i data-feather="settings" class="fea icon-md"></i>
                    </div>
                    <div class="content mt-4">
                        <h5 class="title">Web Security</h5>
                        <p class="text-muted mt-3 mb-0">It is a long established fact that a reader will be distracted by the when looking at its layout.</p>
                    </div>
                    <div class="big-icon">
                        <i data-feather="settings" class="fea icons"></i>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="service-wrapper rounded position-relative text-center border border-footer p-4 pt-5 pb-5">
                    <div class="icon text-primary">
                        <i data-feather="watch" class="fea icon-md"></i>
                    </div>
                    <div class="content mt-4">
                        <h5 class="title">24 / 7</h5>
                        <p class="text-muted mt-3 mb-0">It is a long established fact that a reader will be distracted by the when looking at its layout.</p>
                    </div>
                    <div class="big-icon">
                        <i data-feather="watch" class="fea icons"></i>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>
<!-- Services End -->

<!-- Resume Start -->
<section class="section" id="resume">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title">
                    <div class="position-relative">
                        <h4 class="title text-uppercase mb-4">Work Participation</h4>
                        <div>
                            <div class="title-box"></div>
                            <div class="title-line"></div>
                        </div>
                    </div>
                    <p class="text-muted mx-auto para-desc mt-5 mb-0">Obviously I'm a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-12">
                <div class="main-icon rounded-pill text-center mt-4 pt-2">
                    <i data-feather="star" class="fea icon-md-sm"></i>
                </div>
                <div class="timeline-page pt-2 position-relative">
                    <div class="timeline-item mt-4">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="duration date-label-left border rounded p-2 ps-4 pe-4 position-relative shadow text-start">2015 - 2018</div>
                            </div><!--end col-->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="event event-description-right rounded p-4 border float-left text-start">
                                    <h5 class="title mb-0 text-capitalize">UX Designer</h5>
                                    <small class="company">Vivo - Senior Designer</small>
                                    <p class="timeline-subtitle mt-3 mb-0 text-muted">The generated injected humour, or non-characteristic words etc. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,</p>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end timeline item-->

                    <div class="timeline-item mt-4">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 order-sm-1 order-2">
                                <div class="event event-description-left rounded p-4 border float-left text-end">
                                    <h5 class="title mb-0 text-capitalize">Web Developer</h5>
                                    <small class="company">Oppo - HR Manager</small>
                                    <p class="timeline-subtitle mt-3 mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus. Donec auctor et urnaLorem ipsum dolor sit amet.</p>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-6 col-md-6 col-sm-6 order-sm-2 order-1">
                                <div class="duration duration-right rounded border p-2 ps-4 pe-4 position-relative shadow text-start">2012 - 2015</div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end timeline item-->

                    <div class="timeline-item mt-4">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="duration date-label-left border rounded p-2 ps-4 pe-4 position-relative shadow text-start"> 2012 - 2010</div>
                            </div><!--end col-->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="event event-description-right rounded p-4 border float-left text-start">
                                    <h5 class="title mb-0 text-capitalize">Graphic Designer</h5>
                                    <small class="company">Apple - Testor</small>
                                    <p class="timeline-subtitle mt-3 mb-0 text-muted">Therefore always free from repetition, injected humour, or non-characteristic words etc. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, </p>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end timeline item-->
                </div><!--end timeline page-->
                <!-- TIMELINE END -->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- Skill End -->

<!-- Skill & CTA START -->
<section class="cta-full border-top">
    <div class="container-fluid">
        <div class="row position-relative">
            <div class="col-lg-4 padding-less img" style="background-image:url('{{ image_url('home/skills.jpg') }}')" ></div><!-- end col -->
            <div class="col-lg-8 offset-lg-4">
                <div class="cta-full-img-box">
                    <div class="row justify-content-center">
                        <div class="col-12 text-center">
                            <div class="section-title">
                                <div class="position-relative">
                                    <h4 class="title text-uppercase mb-4">Work Expertise</h4>
                                    <div>
                                        <div class="title-box"></div>
                                        <div class="title-line"></div>
                                    </div>
                                </div>
                                <p class="text-muted mx-auto para-desc mt-5 mb-0">Obviously I'm a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.</p>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4 col-12">
                            <ul class="nav nav-pills flex-column px-0" id="pills-tab" role="tablist">
                                <li class="nav-item mt-4 pt-2">
                                    <a class="nav-link rounded active" id="pills-cloud-tab" data-bs-toggle="pill" href="#pills-cloud" role="tab" aria-controls="pills-cloud" aria-selected="false">
                                        <div class="skill-container text-center pt-1 pb-1">
                                            <h6 class="title mb-0">UX Design</h6>
                                        </div>
                                    </a><!--end nav link-->
                                </li><!--end nav item-->

                                <li class="nav-item mt-4 pt-2">
                                    <a class="nav-link rounded" id="pills-smart-tab" data-bs-toggle="pill" href="#pills-smart" role="tab" aria-controls="pills-smart" aria-selected="false">
                                        <div class="skill-container text-center pt-1 pb-1">
                                            <h6 class="title mb-0">Language Skill</h6>
                                        </div>
                                    </a><!--end nav link-->
                                </li><!--end nav item-->

                                <li class="nav-item mt-4 pt-2">
                                    <a class="nav-link rounded" id="pills-apps-tab" data-bs-toggle="pill" href="#pills-apps" role="tab" aria-controls="pills-apps" aria-selected="false">
                                        <div class="skill-container text-center pt-1 pb-1">
                                            <h6 class="title mb-0">Web development</h6>
                                        </div>
                                    </a><!--end nav link-->
                                </li><!--end nav item-->
                            </ul><!--end nav pills-->
                        </div><!--end col-->

                        <div class="col-lg-9 col-md-8 col-12">
                            <div class="tab-content ps-lg-4" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-cloud" role="tabpanel" aria-labelledby="pills-cloud-tab">
                                    <div class="progress-box mt-4 pt-2">
                                        <h6 class="font-weight-normal">HTML</h6>
                                        <div class="progress">
                                            <div class="progress-bar position-relative bg-primary" style="width:84%;">
                                                <div class="progress-value d-block text-dark h6">84%</div>
                                            </div>
                                        </div>
                                    </div><!--end process box-->
                                    <div class="progress-box mt-4 pt-2">
                                        <h6 class="font-weight-normal">CSS</h6>
                                        <div class="progress">
                                            <div class="progress-bar position-relative bg-primary" style="width:75%;">
                                                <div class="progress-value d-block text-dark h6">75%</div>
                                            </div>
                                        </div>
                                    </div><!--end process box-->
                                    <div class="progress-box mt-4 pt-2">
                                        <h6 class="font-weight-normal">JQuery</h6>
                                        <div class="progress">
                                            <div class="progress-bar position-relative bg-primary" style="width:79%;">
                                                <div class="progress-value d-block text-dark h6">79%</div>
                                            </div>
                                        </div>
                                    </div><!--end process box-->
                                </div><!--end teb pane-->

                                <div class="tab-pane fade" id="pills-smart" role="tabpanel" aria-labelledby="pills-smart-tab">
                                    <div class="progress-box mt-4 pt-2">
                                        <h6 class="font-weight-normal">English</h6>
                                        <div class="progress">
                                            <div class="progress-bar position-relative bg-primary" style="width:84%;">
                                                <div class="progress-value d-block text-dark h6">84%</div>
                                            </div>
                                        </div>
                                    </div><!--end process box-->
                                    <div class="progress-box mt-4 pt-2">
                                        <h6 class="font-weight-normal">Spanish</h6>
                                        <div class="progress">
                                            <div class="progress-bar position-relative bg-primary" style="width:75%;">
                                                <div class="progress-value d-block text-dark h6">75%</div>
                                            </div>
                                        </div>
                                    </div><!--end process box-->
                                    <div class="progress-box mt-4 pt-2">
                                        <h6 class="font-weight-normal">German</h6>
                                        <div class="progress">
                                            <div class="progress-bar position-relative bg-primary" style="width:79%;">
                                                <div class="progress-value d-block text-dark h6">79%</div>
                                            </div>
                                        </div>
                                    </div><!--end process box-->
                                </div><!--end teb pane-->

                                <div class="tab-pane fade" id="pills-apps" role="tabpanel" aria-labelledby="pills-apps-tab">
                                    <div class="progress-box mt-4 pt-2">
                                        <h6 class="font-weight-normal">Photoshop</h6>
                                        <div class="progress">
                                            <div class="progress-bar position-relative bg-primary" style="width:84%;">
                                                <div class="progress-value d-block text-dark h6">84%</div>
                                            </div>
                                        </div>
                                    </div><!--end process box-->
                                    <div class="progress-box mt-4 pt-2">
                                        <h6 class="font-weight-normal">Sketch</h6>
                                        <div class="progress">
                                            <div class="progress-bar position-relative bg-primary" style="width:75%;">
                                                <div class="progress-value d-block text-dark h6">75%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end teb pane-->
                            </div><!--end tab content-->
                        </div><!--end col-->
                    </div> <!-- end row -->
                </div> <!-- end about detail -->
            </div> <!-- end col -->
        </div><!--end row-->
    </div><!--end container fluid-->
</section><!--end section-->
<!-- Skill & CTA End -->

<!-- Projects End -->
<section class="section bg-light" id="projects">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title">
                    <div class="position-relative">
                        <h4 class="title text-uppercase mb-4">My Portfolio</h4>
                        <div>
                            <div class="title-box"></div>
                            <div class="title-line"></div>
                        </div>
                    </div>
                    <p class="text-muted mx-auto para-desc mt-5 mb-0">Obviously I'm a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div>

    <div class="container">
        <div class="row mt-4 justify-content-center">
            <div class="col-12 filters-group-wrap">
                <div class="filters-group">
                    <ul class="portfolioFilter list-inline mb-0 filter-options text-center">
                        <li class="list-inline-item categories-name border text-dark px-3 rounded active" data-group="all">All</li>
                        <li class="list-inline-item categories-name border text-dark px-3 rounded" data-group="branding">Branding</li>
                        <li class="list-inline-item categories-name border text-dark px-3 rounded" data-group="designing">Designing</li>
                        <li class="list-inline-item categories-name border text-dark px-3 rounded" data-group="photography">Photography</li>
                        <li class="list-inline-item categories-name border text-dark px-3 rounded" data-group="development">Development</li>
                    </ul>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <!-- Gallary -->
        <div id="grid" class="row">
            <div class="col-lg-4 col-md-6 mt-4 pt-2 picture-item" data-groups='["branding", "designing"]'>
                <div class="item-box portfolio-box rounded shadow bg-white overflow-hidden">
                    <div class="portfolio-box-img position-relative overflow-hidden">
                        <img class="item-container img-fluid mx-auto" src="{{ image_url('home/portfolio/1.jpg') }}" alt="1">
                        <div class="overlay-work">
                            <div class="work-content text-center">
                                <a href="{{ image_url('home/portfolio/1.jpg') }}" class="lightbox text-light work-icon bg-dark d-inline-block rounded-pill "><i data-feather="camera" class="fea icon-sm image-icon"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="gallary-title py-4 text-center">
                        <h5><a href="page-portfolio-detail.html" class="title text-dark">Working Keyboard</a></h5>
                        <span>Branding</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4 pt-2 picture-item" data-groups='["branding", "development"]'>
                <div class="item-box portfolio-box rounded shadow bg-white overflow-hidden">
                    <div class="portfolio-box-img position-relative overflow-hidden">
                        <img class="item-container img-fluid mx-auto" src="{{ image_url('home/portfolio/2.jpg') }}" alt="1">
                        <div class="overlay-work">
                            <div class="work-content text-center">
                                <a href="{{ image_url('home/portfolio/2.jpg') }}" class="lightbox text-light work-icon bg-dark d-inline-block rounded-pill "><i data-feather="camera" class="fea icon-sm image-icon"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="gallary-title py-4 text-center">
                        <h5><a href="page-portfolio-detail.html" class="title text-dark">The Micro Headphones</a></h5>
                        <span>Development</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4 pt-2 picture-item" data-groups='["designing", "development"]'>
                <div class="item-box portfolio-box rounded shadow bg-white overflow-hidden">
                    <div class="portfolio-box-img position-relative overflow-hidden">
                        <img class="item-container img-fluid mx-auto" src="{{ image_url('home/portfolio/3.jpg') }}" alt="1">
                        <div class="overlay-work">
                            <div class="work-content text-center">
                                <a href="{{ image_url('home/portfolio/3.jpg') }}" class="lightbox text-light work-icon bg-dark d-inline-block rounded-pill "><i data-feather="camera" class="fea icon-sm image-icon"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="gallary-title py-4 text-center">
                        <h5><a href="page-portfolio-detail.html" class="title text-dark">The Coffee Cup</a></h5>
                        <span>Designing</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4 pt-2 picture-item" data-groups='["photography"]'>
                <div class="item-box portfolio-box rounded shadow bg-white overflow-hidden">
                    <div class="portfolio-box-img position-relative overflow-hidden">
                        <img class="item-container img-fluid mx-auto" src="{{ image_url('home/portfolio/4.jpg') }}" alt="1">
                        <div class="overlay-work">
                            <div class="work-content text-center">
                                <a href="{{ image_url('home/portfolio/4.jpg') }}" class="lightbox text-light work-icon bg-dark d-inline-block rounded-pill "><i data-feather="camera" class="fea icon-sm image-icon"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="gallary-title py-4 text-center">
                        <h5><a href="page-portfolio-detail.html" class="title text-dark">The Wooden Desk</a></h5>
                        <span>Photography</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4 pt-2 picture-item" data-groups='["photography"]'>
                <div class="item-box portfolio-box rounded shadow bg-white overflow-hidden">
                    <div class="portfolio-box-img position-relative overflow-hidden">
                        <img class="item-container img-fluid mx-auto" src="{{ image_url('home/portfolio/5.jpg') }}" alt="1">
                        <div class="overlay-work">
                            <div class="work-content text-center">
                                <a href="{{ image_url('home/portfolio/5.jpg') }}" class="lightbox text-light work-icon bg-dark d-inline-block rounded-pill "><i data-feather="camera" class="fea icon-sm image-icon"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="gallary-title py-4 text-center">
                        <h5><a href="page-portfolio-detail.html" class="title text-dark">Camera</a></h5>
                        <span>Illustrations</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4 pt-2 picture-item" data-groups='["photography"]'>
                <div class="item-box portfolio-box rounded shadow bg-white overflow-hidden">
                    <div class="portfolio-box-img position-relative overflow-hidden">
                        <img class="item-container img-fluid mx-auto" src="{{ image_url('home/portfolio/6.jpg') }}" alt="1">
                        <div class="overlay-work">
                            <div class="work-content text-center">
                                <a href="{{ image_url('home/portfolio/6.jpg') }}" class="lightbox text-light work-icon bg-dark d-inline-block rounded-pill "><i data-feather="camera" class="fea icon-sm image-icon"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="gallary-title py-4 text-center">
                        <h5><a href="page-portfolio-detail.html" class="title text-dark">Branded Laptop</a></h5>
                        <span>Photoshop</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mt-4 pt-2">
                <div class="text-center">
                    <a href="page-portfolio.html" class="btn btn-outline-primary">More works <i data-feather="refresh-cw" class="fea icon-sm"></i></a>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- Projects End -->

<!-- Testimonial Start -->
<section class="cta-full">
    <div class="container-fluid">
        <div class="row position-relative">
            <div class="col-lg-8 order-2">
                <div class="cta-full-img-box">
                    <div class="row justify-content-center">
                        <div class="col-12 text-center">
                            <div class="section-title">
                                <div class="position-relative">
                                    <h4 class="title text-uppercase mb-4">Clients say</h4>
                                    <div>
                                        <div class="title-box"></div>
                                        <div class="title-line"></div>
                                    </div>
                                </div>
                                <p class="text-muted mx-auto para-desc mt-5 mb-0">Obviously I'm a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.</p>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="row">
                        <div class="col-12">
                            <div class="client-review-slider">
                                <div class="tiny-slide">
                                    <div class="client-review rounded shadow m-2">
                                        <div class="review-star">
                                            <ul class="list-unstyled float-right mb-0">
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                            </ul>

                                            <div class="review-base">
                                                <h6 class="title">" Design Quality "</h6>
                                            </div>
                                        </div><!--end review star-->

                                        <p class="text-muted review-para font-italic mt-3 mb-3">There are many variations of passages of Lorem Ipsum available, by injected humour, or randomised words which don't look even slightly believable. </p>
                                        <div class="reviewer d-flex align-items-center">
                                            <img src="{{ image_url('home/client/01.jpg') }}" class="img-fluid rounded-circle avatar avatar-small me-3" alt="">
                                            <div class="content">
                                                <h5 class="name mb-0">Erich Bissonette</h5>
                                                <small class="designation text-muted">Oppo</small>
                                            </div>
                                        </div><!--end reviewer-->
                                    </div><!--end client review-->
                                </div>
                                <!--End Client-->

                                <!--Start Client-->
                                <div class="tiny-slide">
                                    <div class="client-review rounded shadow m-2">
                                        <div class="review-star">
                                            <ul class="list-unstyled float-right mb-0">
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star-half"></i></li>
                                            </ul>

                                            <div class="review-base">
                                                <h6 class="title">" Code Quality "</h6>
                                            </div>
                                        </div><!--end review star-->

                                        <p class="text-muted review-para font-italic mt-3 mb-3">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                                        <div class="reviewer d-flex align-items-center">
                                            <img src="{{ image_url('home/client/02.jpg') }}" class="img-fluid rounded-circle avatar avatar-small me-3" alt="">
                                            <div class="content">
                                                <h5 class="name mb-0">Tina Meyer</h5>
                                                <small class="designation text-muted">Vivo</small>
                                            </div>
                                        </div><!--end reviewer-->
                                    </div><!--end client review-->
                                </div>
                                <!--End Client-->

                                <!--Start Client-->
                                <div class="tiny-slide">
                                    <div class="client-review rounded shadow m-2">
                                        <div class="review-star">
                                            <ul class="list-unstyled float-right mb-0">
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                            </ul>

                                            <div class="review-base">
                                                <h6 class="title">" Feature Availability "</h6>
                                            </div>
                                        </div><!--end review star-->

                                        <p class="text-muted review-para font-italic mt-3 mb-3">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                                        <div class="reviewer d-flex align-items-center">
                                            <img src="{{ image_url('home/client/03.jpg') }}" class="img-fluid rounded-circle avatar avatar-small me-3" alt="">
                                            <div class="content">
                                                <h5 class="name mb-0">Sharon Murdock</h5>
                                                <small class="designation text-muted">Apple</small>
                                            </div>
                                        </div><!--end reviewer-->
                                    </div><!--end client review-->
                                </div>
                                <!--End Client-->

                                <!--Start Client-->
                                <div class="tiny-slide">
                                    <div class="client-review rounded shadow m-2">
                                        <div class="review-star">
                                            <ul class="list-unstyled float-right mb-0">
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                            </ul>

                                            <div class="review-base">
                                                <h6 class="title">" Customizability "</h6>
                                            </div>
                                        </div><!--end review star-->

                                        <p class="text-muted review-para font-italic mt-3 mb-3">All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
                                        <div class="reviewer d-flex align-items-center">
                                            <img src="{{ image_url('home/client/04.jpg') }}" class="img-fluid rounded-circle avatar avatar-small me-3" alt="">
                                            <div class="content">
                                                <h5 class="name mb-0">Jesse Hunt</h5>
                                                <small class="designation text-muted">Samsung</small>
                                            </div>
                                        </div><!--end reviewer-->
                                    </div><!--end client review-->
                                </div>
                                <!--End Client-->

                                <!--Start Client-->
                                <div class="tiny-slide">
                                    <div class="client-review rounded shadow m-2">
                                        <div class="review-star">
                                            <ul class="list-unstyled float-right mb-0">
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star-half"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star-outline"></i></li>
                                            </ul>

                                            <div class="review-base">
                                                <h6 class="title">" Flexibility "</h6>
                                            </div>
                                        </div><!--end review star-->

                                        <p class="text-muted review-para font-italic mt-3 mb-3">There are many variations of passages of Lorem Ipsum available, by injected humour, or randomised words which don't look even slightly believable. </p>
                                        <div class="reviewer d-flex align-items-center">
                                            <img src="{{ image_url('home/client/05.jpg') }}" class="img-fluid rounded-circle avatar avatar-small me-3" alt="">
                                            <div class="content">
                                                <h5 class="name mb-0">Andrea Toy</h5>
                                                <small class="designation text-muted">Nokia</small>
                                            </div>
                                        </div><!--end reviewer-->
                                    </div><!--end client review-->
                                </div>
                                <!--End Client-->

                                <!--Start Client-->
                                <div class="tiny-slide">
                                    <div class="client-review rounded shadow m-2">
                                        <div class="review-star">
                                            <ul class="list-unstyled float-right mb-0">
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                            </ul>

                                            <div class="review-base">
                                                <h6 class="title">" Development "</h6>
                                            </div>
                                        </div><!--end review star-->

                                        <p class="text-muted review-para font-italic mt-3 mb-3"> It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
                                        <div class="reviewer d-flex align-items-center">
                                            <img src="{{ image_url('home/client/06.jpg') }}" class="img-fluid rounded-circle avatar avatar-small me-3" alt="">
                                            <div class="content">
                                                <h5 class="name mb-0">Jay Allums</h5>
                                                <small class="designation text-muted">RedMI</small>
                                            </div>
                                        </div><!--end reviewer-->
                                    </div><!--end client review-->
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div> <!-- end about detail -->
            </div> <!-- end col -->

            <div class="col-lg-4 offset-lg-8 padding-less img order-1" style="background-image:url('{{ image_url('home/testi.jpg') }}')" ></div><!-- end col -->
        </div><!--end row-->
    </div><!--end container fluid-->
</section><!--end section-->
<!-- Testimonial End -->

<!-- Blog Start -->
<section class="section bg-light pb-3" id="news">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title">
                    <div class="position-relative">
                        <h4 class="title text-uppercase mb-4">Latest News & Blog</h4>
                        <div>
                            <div class="title-box"></div>
                            <div class="title-line"></div>
                        </div>
                    </div>
                    <p class="text-muted mx-auto para-desc mt-5 mb-0">Obviously I'm a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="blog-post rounded shadow">
                    <img src="{{ image_url('home/blog/01.jpg') }}" class="img-fluid rounded-top" alt="">
                    <div class="content pt-4 pb-4 p-3">
                        <ul class="list-unstyled d-flex justify-content-between post-meta">
                            <li><i data-feather="user" class="fea icon-sm me-1"></i><a href="javascript:void(0)" class="text-dark">Cristino</a></li>
                            <li><i data-feather="tag" class="fea icon-sm me-1"></i><a href="javascript:void(0)" class="text-dark">Branding</a></li>
                        </ul>
                        <h5 class="mb-3"><a href="page-blog-detail.html" class="title text-dark">Our Home Entertainment has Evolved Significantly</a></h5>
                        <ul class="list-unstyled mb-0 pt-3 border-top d-flex justify-content-between">
                            <li><a href="javascript:void(0)" class="text-dark">Read More <i data-feather="chevron-right" class="fea icon-sm"></i></a></li>
                            <li><i class="mdi mdi-calendar-edit me-1"></i>10th April, 2020</li>
                        </ul>
                    </div><!--end content-->
                </div><!--end blog post-->
            </div><!--end col-->

            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="blog-post rounded shadow">
                    <img src="{{ image_url('home/blog/02.jpg') }}" class="img-fluid rounded-top" alt="">
                    <div class="content pt-4 pb-4 p-3">
                        <ul class="list-unstyled d-flex justify-content-between post-meta">
                            <li><i data-feather="user" class="fea icon-sm me-1"></i><a href="javascript:void(0)" class="text-dark">Cristino</a></li>
                            <li><i data-feather="tag" class="fea icon-sm me-1"></i><a href="javascript:void(0)" class="text-dark">Branding</a></li>
                        </ul>
                        <h5 class="mb-3"><a href="page-blog-detail.html" class="title text-dark">These Are The Voyages of The Starship Enterprise</a></h5>
                        <ul class="list-unstyled mb-0 pt-3 border-top d-flex justify-content-between">
                            <li><a href="javascript:void(0)" class="text-dark">Read More <i data-feather="chevron-right" class="fea icon-sm"></i></a></li>
                            <li><i class="mdi mdi-calendar-edit me-1"></i>10th April, 2020</li>
                        </ul>
                    </div><!--end content-->
                </div><!--end blog post-->
            </div><!--end col-->

            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="blog-post rounded shadow">
                    <img src="{{ image_url('home/blog/03.jpg') }}" class="img-fluid rounded-top" alt="">
                    <div class="content pt-4 pb-4 p-3">
                        <ul class="list-unstyled d-flex justify-content-between post-meta">
                            <li><i data-feather="user" class="fea icon-sm me-1"></i><a href="javascript:void(0)" class="text-dark">Cristino</a></li>
                            <li><i data-feather="tag" class="fea icon-sm me-1"></i><a href="javascript:void(0)" class="text-dark">Branding</a></li>
                        </ul>
                        <h5 class="mb-3"><a href="page-blog-detail.html" class="title text-dark">Three Reasons Visibility Matters in Supply Chain</a></h5>
                        <ul class="list-unstyled mb-0 pt-3 border-top d-flex justify-content-between">
                            <li><a href="javascript:void(0)" class="text-dark">Read More <i data-feather="chevron-right" class="fea icon-sm"></i></a></li>
                            <li><i class="mdi mdi-calendar-edit me-1"></i>10th April, 2020</li>
                        </ul>
                    </div><!--end content-->
                </div><!--end blog post-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <div class="container-fluid mt-100 mt-60">
        <div class="rounded-pill py-5" style="background: url('{{ image_url('home/hireme.jpg') }}') center center;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <h4 class="text-light title-dark">I Am Available For Freelancer Projects.</h4>
                        <p class="text-white-50 mx-auto mt-4 para-desc">Obviously I'm a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.</p>
                        <div class="mt-4">
                            <a href="#contact" class="btn btn-primary mouse-down">Hire me <i data-feather="chevron-down" class="fea icon-sm"></i></a>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </div><!--end div-->
    </div><!--end container fluid-->
</section><!--end section-->
<!-- Blog Start -->

<!-- Contact Start -->
<section class="section pb-0" id="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title">
                    <div class="position-relative">
                        <h4 class="title text-uppercase mb-4">Contact Me</h4>
                        <div>
                            <div class="title-box"></div>
                            <div class="title-line"></div>
                        </div>
                    </div>
                    <p class="text-muted mx-auto para-desc mt-5 mb-0">Obviously I'm a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-md-4 mt-4 pt-2">
                <div class="contact-detail text-center">
                    <div class="icon">
                        <i data-feather="phone" class="fea icon-md"></i>
                    </div>
                    <div class="content mt-4">
                        <h5 class="title text-uppercase">Phone</h5>
                        <p class="text-muted">Promising development turmoil inclusive education transformative community</p>
                        <a href="tel:+152534-468-854" class="text-primary">+152 534-468-854</a>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-md-4 mt-4 pt-2">
                <div class="contact-detail text-center">
                    <div class="icon">
                        <i data-feather="mail" class="fea icon-md"></i>
                    </div>
                    <div class="content mt-4">
                        <h5 class="title text-uppercase">Email</h5>
                        <p class="text-muted">Promising development turmoil inclusive education transformative community</p>
                        <a href="mailto:contact@example.com" class="text-primary">contact@example.com</a>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-md-4 mt-4 pt-2">
                <div class="contact-detail text-center">
                    <div class="icon">
                        <i data-feather="map-pin" class="fea icon-md"></i>
                    </div>
                    <div class="content mt-4">
                        <h5 class="title text-uppercase">Location</h5>
                        <p class="text-muted">C/54 Northwest Freeway, Suite 558, <br>Houston, USA 485</p>
                        <a href="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d6030.418742494061!2d-111.34563870463673!3d26.01036670629853!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1471908546569" class="video-play-icon text-primary">View on Google map</a>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->

<section class="section pt-5 mt-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="custom-form mb-sm-30">
                    <form method="post" name="myForm" onsubmit="return validateForm()">
                        <p id="error-msg"></p>
                        <div id="simple-msg"></div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <input name="name" id="name" type="text" class="form-control border rounded" placeholder="First Name :">
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <input name="email" id="email" type="email" class="form-control border rounded" placeholder="Your email :">
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input name="subject" id="subject" class="form-control border rounded" placeholder="Your subject :">
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end col-->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <textarea name="comments" id="comments" rows="4" class="form-control border rounded" placeholder="Your Message :"></textarea>
                                </div>
                            </div><!--end col-->

                            <div class="col-sm-12 text-end">
                                <button type="submit" id="submit" name="send" class="btn btn-primary">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div><!--end custom-form-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- Contact End -->

<!-- Footer Start -->
<footer class="footer bg-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <a href="#"><img src="{{ image_url('home/logo-light.png') }}" alt=""></a>
                <p class="para-desc mx-auto mt-5">Obviously I'm a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.</p>
                <ul class="list-unstyled mb-0 mt-4 social-icon">
                    <li class="list-inline-item"><a href="javascript:void(0)"><i class="mdi mdi-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><i class="mdi mdi-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><i class="mdi mdi-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><i class="mdi mdi-vimeo"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><i class="mdi mdi-google-plus"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><i class="mdi mdi-linkedin"></i></a></li>
                </ul>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</footer><!--end footer-->
<footer class="footer footer-bar bg-dark">
    <div class="container text-foot text-center">
        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Cristino. Design with <i class="mdi mdi-heart text-danger"></i> by <a href="http://shreethemes.in/" target="_blank" class="text-reset">Shreethemes</a>.</p>
    </div><!--end container-->
</footer><!--end footer-->
<!-- Footer End -->

<!-- Back to top -->
<a href="#" onclick="topFunction()" class="back-to-top rounded text-center" id="back-to-top">
    <i class="mdi mdi-chevron-up d-block"> </i>
</a>
<!-- Back to top -->

<!-- Style switcher -->
<div id="style-switcher" class="bg-light border p-3 pt-2 pb-2" onclick="toggleSwitcher()">
    <div>
        <h6 class="title text-center">Select Your Color</h6>
        <ul class="pattern">
            <li class="list-inline-item">
                <a class="color1" href="javascript: void(0);" onclick="setColor('default')"></a>
            </li>
            <li class="list-inline-item">
                <a class="color2" href="javascript: void(0);" onclick="setColor('blue')"></a>
            </li>
            <li class="list-inline-item">
                <a class="color3" href="javascript: void(0);" onclick="setColor('light-green')"></a>
            </li>
            <li class="list-inline-item">
                <a class="color4" href="javascript: void(0);" onclick="setColor('yellow')"></a>
            </li>
            <li class="list-inline-item">
                <a class="color5" href="javascript: void(0);" onclick="setColor('light-yellow')"></a>
            </li>
            <li class="list-inline-item">
                <a class="color6" href="javascript: void(0);" onclick="setColor('purple')"></a>
            </li>
        </ul>

        <h6 class="title text-center pt-3 mb-0 border-top">Theme Option</h6>
        <ul class="text-center list-unstyled mb-0">
            <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-primary rtl-version t-rtl-light mt-2" onclick="setTheme('style-rtl')">RTL</a></li>
            <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-primary ltr-version t-ltr-light mt-2" onclick="setTheme('style')">LTR</a></li>
            <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-primary dark-rtl-version t-rtl-dark mt-2" onclick="setTheme('style-dark-rtl')">RTL</a></li>
            <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-primary dark-ltr-version t-ltr-dark mt-2" onclick="setTheme('style-dark')">LTR</a></li>
            <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-dark dark-version t-dark mt-2" onclick="setTheme('style-dark')">Dark</a></li>
            <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-dark light-version t-light mt-2" onclick="setTheme('style')">Light</a></li>
        </ul>

        <h6 class="title text-center pt-3 mb-0 border-top">Download</h6>
        <ul class="text-center list-unstyled mb-0">
            <li><a href="https://1.envato.market/cristino" target="_blank" class="btn btn-sm btn-block btn-warning mt-2 w-100">Download</a></li>
        </ul>
    </div>
    <div class="bottom p-0">
        <a href="javascript: void(0);" class="settings bg-white shadow d-block"><i class="mdi mdi-cog ms-1 mdi-24px position-absolute mdi-spin text-primary"></i></a>
    </div>
</div>
<!-- end Style switcher -->
@vite(['resources/assets/javascripts/home.js'], 'assets')
</body>

</html>

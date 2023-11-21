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
            </div>
        </div>

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
                    </div>
                </div>
            </div>

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
                    </div>
                </div>
            </div>

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
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <input name="email" id="email" type="email" class="form-control border rounded" placeholder="Your email :">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input name="subject" id="subject" class="form-control border rounded" placeholder="Your subject :">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <textarea name="comments" id="comments" rows="4" class="form-control border rounded" placeholder="Your Message :"></textarea>
                                </div>
                            </div>

                            <div class="col-sm-12 text-end">
                                <button type="submit" id="submit" name="send" class="btn btn-primary">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

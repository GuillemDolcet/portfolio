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
            </div>
        </div>
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
            </div>
        </div>

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
            </div>
        </div>
    </div>
</section>

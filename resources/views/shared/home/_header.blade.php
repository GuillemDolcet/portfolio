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

<!--====== HEADER PART START ======-->
<header id="header-part">
    <div class="header-top pt-20 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6 d-none d-sm-block">
                    <div class="header-top-left">
                        <ul>
                            <li><i class="fa fa-envelope-o"></i> info@skylinksolutions.co.tz</li>
                        </ul>
                    </div> <!-- header top left -->
                </div>
                <div class="col-lg-4 col-sm-6 d-none d-sm-block">
                    <div class="header-top-left">
                        <ul>
                            <li><i class="fa fa-phone"></i> +255 (0) 762 725 725</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="header-top-right d-flex justify-content-center justify-content-lg-end">
                        <ul>
                            <li><a href="https://www.facebook.com/skylinksolutions" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div> <!-- header top right -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- header top -->

    <div class="navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <!-- Logo -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('images/assets/logo/logo-01.png') }}" alt="SkyLink Solutions" style="height: 50px;">
                        </a>

                        <!-- Mobile toggle -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <!-- Nav links -->
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarCollapse">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="nav-item {{ request()->is('about') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('/about') }}">About</a>
                                </li>

                                <!-- Services Dropdown -->
                                <li class="nav-item dropdown {{ request()->is('biometry','cctv-camera','electric-fencing','graphics','ict-cleaning','ict-maintenance','networking','pushsms','remote','setups','software-development') ? 'active' : '' }}">
                                    <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Services
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="servicesDropdown">
                                        <a class="dropdown-item" href="{{ url('/software-development') }}">Software Development</a>
                                        <a class="dropdown-item" href="{{ url('/networking') }}">Networking</a>
                                        <a class="dropdown-item" href="{{ url('/cctv-camera') }}">CCTV Camera</a>
                                        <a class="dropdown-item" href="{{ url('/electric-fencing') }}">Electric Fencing</a>
                                        <a class="dropdown-item" href="{{ url('/biometry') }}">Biometry / Access Control</a>
                                        <a class="dropdown-item" href="{{ url('/ict-cleaning') }}">ICT Cleaning</a>
                                        <a class="dropdown-item" href="{{ url('/ict-maintenance') }}">ICT Maintenance</a>
                                        <a class="dropdown-item" href="{{ url('/graphics') }}">Graphic Design</a>
                                        <a class="dropdown-item" href="{{ url('/pushsms') }}">Push SMS</a>
                                        <a class="dropdown-item" href="{{ url('/remote') }}">Remote Support</a>
                                        <a class="dropdown-item" href="{{ url('/setups') }}">Setups</a>
                                    </div>
                                </li>

                                <li class="nav-item {{ request()->is('project') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('/project') }}">Projects</a>
                                </li>
                                <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                                </li>
                            </ul>
                        </div><!-- navbar collapse -->
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- navigation -->
</header>
<!--====== HEADER PART END ======-->

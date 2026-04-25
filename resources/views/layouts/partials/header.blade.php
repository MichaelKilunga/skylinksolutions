<!--====== HEADER PART START ======-->
<header id="header-part">
    <div class="header-top pt-20 pb-20">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9 col-md-12 d-none d-lg-block text-center">
                    <div class="header-contact">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item mr-4"><i class="fa fa-envelope-o text-white"></i> <span
                                    class="text-white">
                                    {{ $company_setting->email ?? 'info@skylinksolutions.co.tz' }}</span></li>
                            <li class="list-inline-item mr-4"><i class="fa fa-phone text-white"></i><span
                                    class="text-white"> {{ $company_setting->phone ?? '+255 (0) 762 725 725' }}</span>
                            </li>
                            <li class="list-inline-item"><i class="fa fa-clock-o text-white"></i><span
                                    class="text-white fw-b fs-8"> Opening Hours :
                                    {{ $company_setting->working_hours ?? 'Monday to Saturday - 8:30 Am to 5:00 Pm' }}</span>
                            </li>
                        </ul>
                    </div> <!-- header top left -->
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="header-social d-flex justify-content-center justify-content-lg-end">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><a href="{{ $company_setting->facebook_url ?? '#' }}"
                                    target="_blank"><i class="fa fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="{{ $company_setting->twitter_url ?? '#' }}"><i
                                        class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="{{ $company_setting->linkedin_url ?? '#' }}"><i
                                        class="fa fa-linkedin"></i></a></li>
                            <li class="list-inline-item"><a href="{{ $company_setting->youtube_url ?? '#' }}"><i
                                        class="fa fa-youtube"></i></a></li>
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
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <!-- Logo -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('images/assets/logo/logo-01.png') }}" alt="SkyLink Solutions"
                                style="height: 65px;">
                        </a>

                        <!-- Mobile toggle -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
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
                                <li
                                    class="nav-item dropdown {{ request()->is('biometry', 'cctv-camera', 'electric-fencing', 'graphics', 'ict-cleaning', 'ict-maintenance', 'networking', 'remote', 'setups', 'software-development') ? 'active' : '' }}">
                                    <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown"
                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Services
                                    </a>
                                    <div class="dropdown-menu premium-dropdown" aria-labelledby="servicesDropdown">
                                        <a class="dropdown-item" href="{{ url('/software-development') }}">Software
                                            Development</a>
                                        <a class="dropdown-item" href="{{ url('/networking') }}">Computer
                                            Networking</a>
                                        <a class="dropdown-item" href="{{ url('/cctv-camera') }}">CCTV Camera</a>
                                        <a class="dropdown-item" href="{{ url('/electric-fencing') }}">Electric
                                            Fencing</a>
                                        <a class="dropdown-item" href="{{ url('/biometry') }}">Biometric &
                                            Access Control</a>
                                    </div>
                                </li>

                                <li class="nav-item dropdown {{ request()->is('project') ? 'active' : '' }}">
                                    <a class="nav-link dropdown-toggle" href="{{ url('/project') }}"
                                        id="projectDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Projects
                                    </a>
                                    <div class="dropdown-menu premium-dropdown" aria-labelledby="projectDropdown">
                                        @foreach ($project_links as $project)
                                            <a class="dropdown-item" href="{{ $project->url }}"
                                                target="_blank">{{ $project->name }}</a>
                                        @endforeach
                                    </div>
                                </li>
                                <li class="nav-item {{ request()->is('news') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('/news') }}">News</a>
                                </li>
                                <li class="nav-item {{ request()->is('volunteer') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('/volunteer') }}">Community</a>
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

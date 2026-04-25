@extends('layouts.app')

@section('content')
    <section id="page-banner" class="bg_cover" data-overlay="9"
        style="background-image: url({{ asset('images/bannerbg/banner-bg.png') }}); height: auto; padding: 20px 0;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-banner-cont" style="position: relative; z-index: 5;">
                        <h3 class="text-white font-weight-bold mb-1"
                            style="text-shadow: 2px 2px 6px rgba(0,0,0,0.8); font-size: 24px;">
                            CCTV Camera Installation</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent p-0 mb-0" style="font-size: 14px;">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white"
                                        style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">Home</a></li>
                                <li class="breadcrumb-item active text-white-50" aria-current="page"
                                    style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">CCTV Camera</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="service-details" class="pt-80 pb-80 gray-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="service-image-slider">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-image-1" role="tabpanel">
                                <img src="{{ asset('images/assets/cc3.PNG') }}" alt="CCTV Installation"
                                    class="img-fluid rounded shadow-lg w-100">
                            </div>
                            <div class="tab-pane fade" id="pills-image-2" role="tabpanel">
                                <img src="{{ asset('images/assets/cc1.PNG') }}" alt="CCTV Installation"
                                    class="img-fluid rounded shadow-lg w-100">
                            </div>
                            <div class="tab-pane fade" id="pills-image-3" role="tabpanel">
                                <img src="{{ asset('images/assets/cc1.PNG') }}" alt="CCTV Installation"
                                    class="img-fluid rounded shadow-lg w-100">
                            </div>
                            <div class="tab-pane fade" id="pills-image-4" role="tabpanel">
                                <img src="{{ asset('images/assets/cc1.PNG') }}" alt="CCTV Installation"
                                    class="img-fluid rounded shadow-lg w-100">
                            </div>
                        </div>
                        <ul class="nav nav-pills mt-30 justify-content-center" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active p-1" id="pills-image-1-tab" data-toggle="pill"
                                    href="#pills-image-1">
                                    <img src="{{ asset('images/assets/cc1.PNG') }}" width="80"
                                        class="rounded shadow-sm border">
                                </a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link p-1" id="pills-image-2-tab" data-toggle="pill" href="#pills-image-2">
                                    <img src="{{ asset('images/assets/cc1.PNG') }}" width="80"
                                        class="rounded shadow-sm border">
                                </a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link p-1" id="pills-image-3-tab" data-toggle="pill" href="#pills-image-3">
                                    <img src="{{ asset('images/assets/cc1.PNG') }}" width="80"
                                        class="rounded shadow-sm border">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-1" id="pills-image-4-tab" data-toggle="pill" href="#pills-image-4">
                                    <img src="{{ asset('images/assets/cc1.PNG') }}" width="80"
                                        class="rounded shadow-sm border">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="service-description-cont pl-40">
                        <span class="sub-title text-danger font-weight-bold">Surveillance Systems</span>
                        <h2 class="mt-2 mb-4">CCTV Camera Installation</h2>
                        <p class="text-justify">
                            We cover physical security of homes, office, warehousing, farm storeroom and other institutes
                            through CCTV installation. Also, we do farm (crop plantation and livestock keeping) close
                            monitoring from crop planting to harvesting through Solar with CCTV camera installation for the
                            best yield.
                        </p>
                        <p class="mt-3 text-justify">
                            We provide Surveillance Service which involves the deployment of CCTV Cameras, Censors, Digital
                            Videos and other Access control devices. Therefore these surveillance systems have the ability
                            and capability to instantly capture the events & incidents, trigger alerts & alarms,
                            trap-track-&-prevent before something happens.
                        </p>
                        <p class="mt-3 text-justify">
                            The main areas we undertake our on-site services are all over the country. We have worked with,
                            and continue to work with, clients in the law firms, charities and other third sector
                            organizations, faith sector organizations, construction companies, schools, council departments,
                            political parties, estate agents, retail outlets and property management firms.
                        </p>
                        <div class="mt-4">
                            <a href="{{ url('/contact') }}" class="main-btn">Get a Quote</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5 pt-4">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="glass-service-card text-center p-5 rounded-lg shadow-sm bg-white h-100 transition-all">
                        <div class="icon mb-4 text-primary fs-1">
                            <i class="fa fa-video"></i>
                        </div>
                        <h4 class="mb-3">Analog & Digital CCTV</h4>
                        <p class="small text-muted">High-quality video surveillance solutions tailored for both traditional
                            setups and modern IP-based digital environments.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="glass-service-card text-center p-5 rounded-lg shadow-sm bg-white h-100 transition-all">
                        <div class="icon mb-4 text-primary fs-1">
                            <i class="fa fa-solar-panel"></i>
                        </div>
                        <h4 class="mb-3">Solar Powered Systems</h4>
                        <p class="small text-muted">Remote monitoring for farms and plantations equipped with off-grid
                            solar-powered CCTV cameras.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="glass-service-card text-center p-5 rounded-lg shadow-sm bg-white h-100 transition-all">
                        <div class="icon mb-4 text-primary fs-1">
                            <i class="fa fa-bell"></i>
                        </div>
                        <h4 class="mb-3">Smart Alert Tracking</h4>
                        <p class="small text-muted">Advanced motion detection and sensor integration to trigger instant
                            alerts and alarms upon capturing unusual events.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="portfolio-section" class="pt-40 pb-40">
        <div class="container">
            <div class="section-title text-center mb-4">
                <h5>Our Success Stories</h5>
                <h2>CCTV Camera Projects</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="portfolio-card overflow-hidden rounded shadow-sm h-100 bg-white">
                        <div class="portfolio-img position-relative overflow-hidden">
                            <img src="{{ asset('images/assets/cc2.PNG') }}" class="img-fluid transition-all w-100 h-100"
                                style="object-fit: cover; min-height: 200px;">
                            <div
                                class="portfolio-overlay position-absolute w-100 h-100 d-flex align-items-center justify-content-center">
                                <a href="#" class="main-btn btn-sm disabled">View Details</a>
                            </div>
                        </div>
                        <div class="p-4 text-center">
                            <h5>Msamvu</h5>
                            <p class="small text-danger">Morogoro</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="portfolio-card overflow-hidden rounded shadow-sm h-100 bg-white">
                        <div class="portfolio-img position-relative overflow-hidden">
                            <img src="{{ asset('images/assets/cc1.PNG') }}" class="img-fluid transition-all w-100 h-100"
                                style="object-fit: cover; min-height: 200px;">
                            <div
                                class="portfolio-overlay position-absolute w-100 h-100 d-flex align-items-center justify-content-center">
                                <a href="#" class="main-btn btn-sm disabled">View Details</a>
                            </div>
                        </div>
                        <div class="p-4 text-center">
                            <h5>Muheza</h5>
                            <p class="small text-danger">Tanga</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="portfolio-card overflow-hidden rounded shadow-sm h-100 bg-white">
                        <div class="portfolio-img position-relative overflow-hidden">
                            <img src="{{ asset('images/assets/ele2.PNG') }}" class="img-fluid transition-all w-100 h-100"
                                style="object-fit: cover; min-height: 200px;">
                            <div
                                class="portfolio-overlay position-absolute w-100 h-100 d-flex align-items-center justify-content-center">
                                <a href="#" class="main-btn btn-sm disabled">View Details</a>
                            </div>
                        </div>
                        <div class="p-4 text-center">
                            <h5>Chamwino</h5>
                            <p class="small text-danger">Dodoma</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="portfolio-card overflow-hidden rounded shadow-sm h-100 bg-white">
                        <div class="portfolio-img position-relative overflow-hidden">
                            <img src="{{ asset('images/assets/cc5.PNG') }}" class="img-fluid transition-all w-100 h-100"
                                style="object-fit: cover; min-height: 200px;">
                            <div
                                class="portfolio-overlay position-absolute w-100 h-100 d-flex align-items-center justify-content-center">
                                <a href="#" class="main-btn btn-sm disabled">View Details</a>
                            </div>
                        </div>
                        <div class="p-4 text-center">
                            <h5>Msamvu</h5>
                            <p class="small text-danger">Morogoro</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .pl-40 {
            padding-left: 40px;
        }

        .pt-80 {
            padding-top: 80px;
        }

        .pb-80 {
            padding-bottom: 80px;
        }

        .pt-100 {
            padding-top: 100px;
        }

        .pb-100 {
            padding-bottom: 100px;
        }

        .glass-service-card {
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .glass-service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
            border-color: #ff0000;
        }

        .portfolio-img img {
            transition: all 0.5s ease;
        }

        .portfolio-card:hover .portfolio-img img {
            transform: scale(1.1);
        }

        .portfolio-overlay {
            background: rgba(7, 41, 77, 0.8);
            top: 0;
            left: 0;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .portfolio-card:hover .portfolio-overlay {
            opacity: 1;
        }

        .nav-pills .nav-link.active {
            background: transparent;
            border-color: #ff0000 !important;
        }

        @media (max-width: 991px) {
            .pl-40 {
                padding-left: 0;
                margin-top: 40px;
            }
        }
    </style>
@endsection

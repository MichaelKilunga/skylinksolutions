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
                            Computer Networking</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent p-0 mb-0" style="font-size: 14px;">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white"
                                        style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">Home</a></li>
                                <li class="breadcrumb-item active text-white-50" aria-current="page"
                                    style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">Networking</li>
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
                                <img src="{{ asset('images/assets/networking/net14.PNG') }}" alt="Networking Platforms"
                                    class="img-fluid rounded shadow-lg w-100">
                            </div>
                            <div class="tab-pane fade" id="pills-image-2" role="tabpanel">
                                <img src="{{ asset('images/assets/networking/net15.PNG') }}" alt="Networking Platforms"
                                    class="img-fluid rounded shadow-lg w-100">
                            </div>
                            <div class="tab-pane fade" id="pills-image-3" role="tabpanel">
                                <img src="{{ asset('images/assets/networking/net16.PNG') }}" alt="Networking Platforms"
                                    class="img-fluid rounded shadow-lg w-100">
                            </div>
                            <div class="tab-pane fade" id="pills-image-4" role="tabpanel">
                                <img src="{{ asset('images/assets/networking/net4.jpg') }}" alt="Networking Platforms"
                                    class="img-fluid rounded shadow-lg w-100">
                            </div>
                        </div>
                        <ul class="nav nav-pills mt-30 justify-content-center" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active p-1" id="pills-image-1-tab" data-toggle="pill"
                                    href="#pills-image-1">
                                    <img src="{{ asset('images/assets/networking/net14.PNG') }}" width="80"
                                        class="rounded shadow-sm border">
                                </a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link p-1" id="pills-image-2-tab" data-toggle="pill" href="#pills-image-2">
                                    <img src="{{ asset('images/assets/networking/net14.PNG') }}" width="80"
                                        class="rounded shadow-sm border">
                                </a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link p-1" id="pills-image-3-tab" data-toggle="pill" href="#pills-image-3">
                                    <img src="{{ asset('images/assets/networking/net14.PNG') }}" width="80"
                                        class="rounded shadow-sm border">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-1" id="pills-image-4-tab" data-toggle="pill" href="#pills-image-4">
                                    <img src="{{ asset('images/assets/networking/net14.PNG') }}" width="80"
                                        class="rounded shadow-sm border">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="service-description-cont pl-40">
                        <span class="sub-title text-danger font-weight-bold">LAN & Network Access</span>
                        <h2 class="mt-2 mb-4">Networking Platforms</h2>
                        <p class="text-justify">
                            Every business needs a computer network; be it a simple local area network (LAN) or a complex
                            wide area network (WAN), Remark network is a fast and reliable way of sharing information and
                            resources within a business.
                        </p>
                        <p class="mt-3 text-justify">
                            Mostly organization operates their activities in benefits for business always are larger by
                            providing storage capacity, effective communication, flexibility, and saving money on the costs
                            of software.
                        </p>
                        <p class="mt-3 text-justify">
                            The main areas we undertake our on-site services are all over the country. We are available for
                            larger projects, Networking platforms, and remote ICT support. We continue to work with clients
                            in the law firms, charities, construction companies, schools, council departments, and property
                            management firms.
                        </p>
                        <div class="mt-4">
                            <a href="{{ url('/contact') }}" class="main-btn">Request Service</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5 pt-4">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="glass-service-card text-center p-5 rounded-lg shadow-sm bg-white h-100 transition-all">
                        <div class="icon mb-4 text-primary fs-1">
                            <i class="fa fa-network-wired"></i>
                        </div>
                        <h4 class="mb-3">LAN & WAN</h4>
                        <p class="small text-muted">Design and implementation of Local and Wide Area Networks for seamless
                            and high-speed data transmission.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="glass-service-card text-center p-5 rounded-lg shadow-sm bg-white h-100 transition-all">
                        <div class="icon mb-4 text-primary fs-1">
                            <i class="fa fa-server"></i>
                        </div>
                        <h4 class="mb-3">Server Management</h4>
                        <p class="small text-muted">Providing centralized storage capacity, effective communication setups,
                            and reliable server infrastructure.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="glass-service-card text-center p-5 rounded-lg shadow-sm bg-white h-100 transition-all">
                        <div class="icon mb-4 text-primary fs-1">
                            <i class="fa fa-wifi"></i>
                        </div>
                        <h4 class="mb-3">Wireless Access</h4>
                        <p class="small text-muted">Deploying robust, scalable, and secure wireless networks for enterprise
                            and institutional clients.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="portfolio-section" class="pt-40 pb-40">
        <div class="container">
            <div class="section-title text-center mb-4">
                <h5>Our Success Stories</h5>
                <h2>Computer Networking Projects</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="portfolio-card overflow-hidden rounded shadow-sm h-100 bg-white">
                        <div class="portfolio-img position-relative overflow-hidden">
                            <img src="{{ asset('images/assets/networking/net9.jpg') }}"
                                class="img-fluid transition-all w-100 h-100"
                                style="object-fit: cover; min-height: 200px;">
                            <div
                                class="portfolio-overlay position-absolute w-100 h-100 d-flex align-items-center justify-content-center">
                                <a href="#" class="main-btn btn-sm disabled">View Details</a>
                            </div>
                        </div>
                        <div class="p-4 text-center">
                            <h5>Mwatex</h5>
                            <p class="small text-danger">Mwanza</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="portfolio-card overflow-hidden rounded shadow-sm h-100 bg-white">
                        <div class="portfolio-img position-relative overflow-hidden">
                            <img src="{{ asset('images/assets/networking/net12.jpg') }}"
                                class="img-fluid transition-all w-100 h-100"
                                style="object-fit: cover; min-height: 200px;">
                            <div
                                class="portfolio-overlay position-absolute w-100 h-100 d-flex align-items-center justify-content-center">
                                <a href="#" class="main-btn btn-sm disabled">View Details</a>
                            </div>
                        </div>
                        <div class="p-4 text-center">
                            <h5>Mzumbe</h5>
                            <p class="small text-danger">Morogoro</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="portfolio-card overflow-hidden rounded shadow-sm h-100 bg-white">
                        <div class="portfolio-img position-relative overflow-hidden">
                            <img src="{{ asset('images/assets/networking/net1.jpg') }}"
                                class="img-fluid transition-all w-100 h-100"
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
                            <img src="{{ asset('images/assets/networking/net5.jpg') }}"
                                class="img-fluid transition-all w-100 h-100"
                                style="object-fit: cover; min-height: 200px;">
                            <div
                                class="portfolio-overlay position-absolute w-100 h-100 d-flex align-items-center justify-content-center">
                                <a href="#" class="main-btn btn-sm disabled">View Details</a>
                            </div>
                        </div>
                        <div class="p-4 text-center">
                            <h5>21 <sup>st</sup> Century</h5>
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

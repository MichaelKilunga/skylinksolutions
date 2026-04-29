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
                            {{ $service->title }}</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent p-0 mb-0" style="font-size: 14px;">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white"
                                        style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">Home</a></li>
                                <li class="breadcrumb-item active text-white-50" aria-current="page"
                                    style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">{{ $service->title }}</li>
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
                            {{-- <div class="tab-pane fade show active" id="pills-image-1" role="tabpanel">
                                <img src="{{ asset('images/assets/web1.jpg') }}" alt="Web Development"
                                    class="img-fluid rounded shadow-lg">
                            </div>
                            <div class="tab-pane fade" id="pills-image-2" role="tabpanel">
                                <img src="{{ asset('images/assets/web2.jpg') }}" alt="Mobile Development"
                                    class="img-fluid rounded shadow-lg">
                            </div>
                            <div class="tab-pane fade" id="pills-image-3" role="tabpanel">
                                <img src="{{ asset('images/assets/pro2.jpg') }}" alt="SaaS Solutions"
                                    class="img-fluid rounded shadow-lg">
                            </div>
                            <div class="tab-pane fade" id="pills-image-4" role="tabpanel">
                                <img src="{{ asset('images/assets/web5.PNG') }}" alt="Enterprise Systems"
                                    class="img-fluid rounded shadow-lg">
                            </div> --}}
                            @foreach ($service->images as $key => $image)
                                <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}"
                                    id="image-{{ $image->id }}">
                                    <img src="{{ asset('storage/' . $image->image) }}" class="img-fluid rounded">
                                </div>
                            @endforeach
                        </div>
                        {{-- <ul class="nav nav-pills mt-30 justify-content-center" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active p-1" id="pills-image-1-tab" data-toggle="pill"
                                    href="#pills-image-1">
                                    <img src="{{ asset('images/assets/web1.jpg') }}" width="80"
                                        class="rounded shadow-sm border">
                                </a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link p-1" id="pills-image-2-tab" data-toggle="pill" href="#pills-image-2">
                                    <img src="{{ asset('images/assets/web2.jpg') }}" width="80"
                                        class="rounded shadow-sm border">
                                </a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link p-1" id="pills-image-3-tab" data-toggle="pill" href="#pills-image-3">
                                    <img src="{{ asset('images/assets/pro2.jpg') }}" width="80"
                                        class="rounded shadow-sm border">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-1" id="pills-image-4-tab" data-toggle="pill" href="#pills-image-4">
                                    <img src="{{ asset('images/assets/web5.PNG') }}" width="80"
                                        class="rounded shadow-sm border">
                                </a>
                            </li>
                        </ul> --}}
                        <ul class="nav nav-pills mt-3 justify-content-center">
                            @foreach ($service->images as $key => $image)
                                <li class="nav-item mx-2">
                                    <a class="nav-link {{ $key == 0 ? 'active' : '' }}" data-toggle="pill"
                                        href="#image-{{ $image->id }}">

                                        <img src="{{ asset('storage/' . $image->image) }}" width="80"
                                            class="rounded shadow-sm border">
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="service-description-cont pl-40">
                        {{-- <span class="sub-title text-danger font-weight-bold">Custom Digital
                            Solutions</span> --}}
                        {{-- <div class="service-description-cont pl-40"> --}}

                        <span class="sub-title text-danger">
                            {{ $service->short_description }}
                        </span>

                        <h2 class="mt-2 mb-4">
                            {{ $service->title }}
                        </h2>

                        <p class="text-justify">
                            {!! $service->description !!}
                        </p>

                        <div class="mt-4">
                            <a href="{{ url('/contact') }}" class="main-btn mt-3">
                                Start Your Project
                            </a>
                        </div>
                        {{-- </div> --}}

                        {{-- <h2 class="mt-2 mb-4">Transforming Your Vision into Reality</h2>
                        <p class="text-justify">
                            At SkyLink Solutions, we understand that every business is unique.
                            Our expert developers craft
                            tailor-made web and mobile applications that not only solve complex
                            problems but also provide a
                            seamless user experience. We combine cutting-edge technology with
                            intuitive design to help you
                            stand out in the digital landscape.
                        </p> --}}
                        {{-- <p class="mt-3 text-justify">
                            From initial concept to final deployment, we follow a rigorous
                            development process to ensure
                            high performance, security, and scalability. Whether you need a
                            robust management system, a
                            high-converting e-commerce platform, or a groundbreaking mobile app,
                            we are here to deliver.
                        </p> --}}
                        {{-- <div class="mt-4">
                            <a href="{{ url('/contact') }}" class="main-btn">Start Your
                                Project</a>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                @foreach ($service->features as $feature)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="glass-service-card text-center p-5">
                            <div class="icon mb-4">
                                <i class="{{ $feature->icon }}"></i>
                            </div>
                            <h4>{{ $feature->title }}</h4>
                            <p>{{ $feature->description }}</p>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-lg-4 col-md-6 mb-4">
                    <div class="glass-service-card text-center p-5 rounded-lg shadow-sm bg-white h-100 transition-all">
                        <div class="icon mb-4 text-primary fs-1">
                            <i class="fa fa-desktop"></i>
                        </div>
                        <h4 class="mb-3">Management Systems</h4>
                        <p class="small text-muted">Bespoke ERP, CRM, and internal management tools
                            for schools, hospitals,
                            and corporate entities.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="glass-service-card text-center p-5 rounded-lg shadow-sm bg-white h-100 transition-all">
                        <div class="icon mb-4 text-primary fs-1">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <h4 class="mb-3">POS & Inventory</h4>
                        <p class="small text-muted">Advanced Point of Sale systems with real-time
                            inventory tracking and
                            comprehensive reporting.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="glass-service-card text-center p-5 rounded-lg shadow-sm bg-white h-100 transition-all">
                        <div class="icon mb-4 text-primary fs-1">
                            <i class="fa fa-mobile"></i>
                        </div>
                        <h4 class="mb-3">Mobile Applications</h4>
                        <p class="small text-muted">Native and cross-platform mobile apps for
                            Android and iOS that engage
                            users and drive results.</p>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    {{-- <section id="portfolio-section" class="pt-40 pb-40">
        <div class="container">
            <div class="section-title text-center mb-4">
                <h5>Our Success Stories</h5>
                <h2>Recent Projects</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="portfolio-card overflow-hidden rounded shadow-sm h-100 bg-white">
                        <div class="portfolio-img position-relative overflow-hidden">
                            <img src="{{ asset('images/assets/soft/soft14.PNG') }}" class="img-fluid transition-all">
                            <div
                                class="portfolio-overlay position-absolute w-100 h-100 d-flex align-items-center justify-content-center">
                                <a href="https://soko-kuu-chief-kingalu.skylinksolutions.co.tz/" target="_blank"
                                    class="main-btn btn-sm">View Live</a>
                            </div>
                        </div>
                        <div class="p-4 text-center">
                            <h5>Tsokoni</h5>
                            <p class="small text-danger">E-commerce Marketplace</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="portfolio-card overflow-hidden rounded shadow-sm h-100 bg-white">
                        <div class="portfolio-img position-relative overflow-hidden">
                            <img src="{{ asset('images/assets/soft/soft1.PNG') }}" class="img-fluid transition-all">
                            <div
                                class="portfolio-overlay position-absolute w-100 h-100 d-flex align-items-center justify-content-center">
                                <a href="https://messinaprimierhotel.co.tz/" target="_blank" class="main-btn btn-sm">View
                                    Live</a>
                            </div>
                        </div>
                        <div class="p-4 text-center">
                            <h5>Messina Hotel</h5>
                            <p class="small text-danger">Booking Management</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="portfolio-card overflow-hidden rounded shadow-sm h-100 bg-white">
                        <div class="portfolio-img position-relative overflow-hidden">
                            <img src="{{ asset('images/assets/soft/soft4.PNG') }}" class="img-fluid transition-all">
                            <div
                                class="portfolio-overlay position-absolute w-100 h-100 d-flex align-items-center justify-content-center">
                                <a href="#" class="main-btn btn-sm disabled">Case
                                    Study</a>
                            </div>
                        </div>
                        <div class="p-4 text-center">
                            <h5>N.G.Os Sector</h5>
                            <p class="small text-danger">Information Portal</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="portfolio-card overflow-hidden rounded shadow-sm h-100 bg-white">
                        <div class="portfolio-img position-relative overflow-hidden">
                            <img src="{{ asset('images/assets/soft/soft3.PNG') }}" class="img-fluid transition-all">
                            <div
                                class="portfolio-overlay position-absolute w-100 h-100 d-flex align-items-center justify-content-center">
                                <a href="#" class="main-btn btn-sm">View Demo</a>
                            </div>
                        </div>
                        <div class="p-4 text-center">
                            <h5>Makazi Mtandaoni</h5>
                            <p class="small text-danger">Real Estate Platform</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <section id="portfolio-section" class="pt-40 pb-40">

        <div class="container">
            <div class="section-title text-center mb-4">
                <h5>Our Success Stories</h5>
                <h2>Recent Projects</h2>
            </div>

            <div class="row">

                @foreach ($service->projects as $project)
                    <div class="col-lg-3 col-md-6 mb-4">

                        <div class="portfolio-card bg-white rounded shadow-sm h-100">

                            <div class="portfolio-img position-relative">
                                <img src="{{ asset('storage/' . $project->image) }}" class="img-fluid">

                                <div class="portfolio-overlay d-flex align-items-center justify-content-center">

                                    @if ($project->link)
                                        <a href="{{ $project->link }}" target="_blank" class="main-btn btn-sm">
                                            View Live
                                        </a>
                                    @else
                                        <span class="main-btn btn-sm disabled">
                                            No Link
                                        </span>
                                    @endif

                                </div>
                            </div>

                            <div class="p-4 text-center">
                                <h5>{{ $project->title }}</h5>
                                <p class="small text-danger">
                                    {{ $project->category }}
                                </p>
                            </div>

                        </div>

                    </div>
                @endforeach

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

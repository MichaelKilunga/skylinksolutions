@extends('layouts.app')

@section('content')
    <section id="slider-part" class="slider-active">
        @foreach ($sliders as $slider)
            <div class="single-slider bg_cover d-flex align-items-center"
                style="background-image: url({{ asset($slider->image) }})" data-overlay="7">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-11">
                            <div class="slider-cont hero-glass-card text-center" data-animation="fadeIn" data-delay="0.5s">
                                <h1 data-animation="bounceInLeft" data-delay="1s">{{ $slider->title }}</h1>
                                <p data-animation="fadeInUp" data-delay="1.3s">
                                    {{ $slider->description }}
                                </p>
                                <div class="slider-btn mt-30" data-animation="fadeInUp" data-delay="1.5s">
                                    @if ($slider->btn1_text && $slider->btn1_url)
                                        @php
                                            $btn1Url = trim($slider->btn1_url);
                                            $btn1IsExternal =
                                                !str_starts_with($btn1Url, '/') &&
                                                (preg_match('/^https?:\/\//i', $btn1Url) ||
                                                    preg_match('/^[a-z0-9\-]+\.[a-z]{2,}/i', $btn1Url));
                                            $btn1Href = $btn1IsExternal
                                                ? (preg_match('/^https?:\/\//i', $btn1Url)
                                                    ? $btn1Url
                                                    : 'https://' . $btn1Url)
                                                : url($btn1Url);
                                        @endphp
                                        <a href="{{ $btn1Href }}" class="main-btn"
                                            @if ($btn1IsExternal) target="_blank" rel="noopener noreferrer" @endif>{{ $slider->btn1_text }}</a>
                                    @endif
                                    @if ($slider->btn2_text && $slider->btn2_url)
                                        @php
                                            $btn2Url = trim($slider->btn2_url);
                                            $btn2IsExternal =
                                                !str_starts_with($btn2Url, '/') &&
                                                (preg_match('/^https?:\/\//i', $btn2Url) ||
                                                    preg_match('/^[a-z0-9\-]+\.[a-z]{2,}/i', $btn2Url));
                                            $btn2Href = $btn2IsExternal
                                                ? (preg_match('/^https?:\/\//i', $btn2Url)
                                                    ? $btn2Url
                                                    : 'https://' . $btn2Url)
                                                : url($btn2Url);
                                        @endphp
                                        <a href="{{ $btn2Href }}" class="main-btn main-btn-2 ml-15"
                                            @if ($btn2IsExternal) target="_blank" rel="noopener noreferrer" @endif>{{ $slider->btn2_text }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </div> <!-- single slider -->
        @endforeach
    </section>

    <!--====== CORE VALUES START ======-->
    <section id="core-values" class="pt-60 pb-60 core-values-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 mt-4 mb-4">
                    <div class="section-title text-center pb-30">
                        <h5 class="text-white">Our Foundation</h5>
                        <h2 class="text-white">Core Values</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-2">
                @foreach ($coreValues as $value)
                    <div class="col-lg col-md-6 mb-4">
                        <div class="value-card mt-30" data-animation="fadeInUp" data-delay="0.2s">
                            <div class="value-icon">
                                <i class="fa {{ $value->icon }}"></i>
                            </div>
                            <h3>{{ $value->title }}</h3>
                            <p>{{ $value->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--====== CORE VALUES END ======-->

    <!--====== OUR SERVICES START ======-->
    <section id="services-part" class="pt-60 pb-60 gray-bg">
        <div class="container mb-4">
            <div class="row justify-content-center">
                <div class="col-lg-8 mt-4">
                    <div class="modern-section-title text-center">
                        <span class="sub-title bg-danger text-white display-block mb-3 py-3"
                            style="border-radius: 25px; border: 2px solid #ffffff;">
                            Solutions for the Digital World: From Cloud To Customer
                        </span>
                        <h2>Our Valued Services</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                @forelse ($services as $service)
                    <div class="col-lg-3 col-md-6 mt-4">
                        <div class="service-card mt-15">
                            <div class="icon-box">
                                <i class="fa {{ $service->icon ?? 'fa-cogs' }}"></i>
                            </div>
                            <h3>{{ $service->title }}</h3>
                            <p>{{ Str::limit($service->description, 120) }}</p>
                            {{-- <a href="{{ url($service->slug ?? '#') }}" class="premium-link">Explore <i
                                    class="fa fa-arrow-right"></i></a> --}}
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">No services currently available.</p>
                    </div>
                @endforelse
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    <!--====== OUR SERVICES END ======-->

    <section id="about-part" class="pt-60 pb-60">
        <div class="container">
            <div class="row align-items-center mt-4">
                <div class="col-lg-6">
                    <div class="about-image-wrapper">
                        <img src="{{ $settings->about_image ? asset('storage/' . $settings->about_image) : asset('images/slider/new/about.jpg') }}"
                            alt="About SkyLink" class="img-fluid rounded shadow-lg">
                        <div class="experience-badge">
                            <span>{{ $settings->experience_years ?? '5+' }}</span>
                            <p>{{ $settings->experience_text ?? 'Years of Excellence' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 px-4">
                    <div class="about-cont-2 pl-40">
                        <div class="section-title">
                            <h5>{{ $settings->about_subtitle ?? 'Always here for you' }}</h5>
                            <h2>{{ $settings->about_title ?? 'Welcome to SkyLink Solutions' }}</h2>
                        </div>
                        <p class="mt-25">{{ $settings->about_description_1 }}</p>
                        <p class="mt-15">{{ $settings->about_description_2 }}</p>

                        <div class="about-features mt-30">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="feature-item">
                                        <i class="fa fa-rocket text-primary"></i>
                                        <span>{{ $settings->about_feature_1 ?? 'Digital Innovation' }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="feature-item">
                                        <i class="fa fa-users text-primary"></i>
                                        <span>{{ $settings->about_feature_2 ?? 'Expert Team' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="{{ url('/about') }}" class="main-btn mt-40">Learn More About Us</a>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    <section id="who-we-serve" class="pt-60 pb-40 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center pb-30">
                        <h5 class="mt-4">Empowering Every Sector</h5>
                        <h2>Who We Serve</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="serve-main-card mt-30">
                        <div class="serve-img">
                            <img src="{{ asset($settings->nationwide_image ?? 'images/all-icon/w.jpg') }}"
                                alt="Wide Coverage" class="img-fluid rounded shadow">
                        </div>
                        <div class="serve-content mt-30">
                            <h3>{{ $settings->nationwide_title ?? 'Nationwide Digital Connectivity' }}</h3>
                            <p>{{ $settings->nationwide_description }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="serve-list">
                        @foreach ($nationwideItems as $item)
                            <div class="single-serve-item mt-30 p-4 bg-white rounded shadow-sm border-left border-primary">
                                <div class="row align-items-center">
                                    <div class="col-sm-4">
                                        <div class="serve-thumb">
                                            <img src="{{ asset($item->image) }}" alt="{{ $item->title }}"
                                                class="img-fluid rounded">
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="serve-info">
                                            <h4 class="h5 mb-2">{{ $item->title }}</h4>
                                            <p class="small text-muted">{{ $item->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    <br>

    <style>
        /* --- Global & Theme Variables --- */
        :root {
            --primary-color: #07294d;
            --accent-color: #ff0000;
            --text-dark: #1d2025;
            --text-light: #505050;
            --white: #ffffff;
            --gray-bg: #f8f9fa;
            --glass-bg: rgba(0, 0, 0, 0.6);
            --glass-border: rgba(255, 255, 255, 0.15);
            --shadow-premium: 0 15px 35px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease-in-out;
        }

        /* --- Section Titles --- */
        .modern-section-title {
            margin-bottom: 40px;
        }

        .modern-section-title .sub-title {
            color: var(--accent-color);
            text-transform: uppercase;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 3px;
            display: block;
            margin-bottom: 12px;
            animation: fadeInDown 0.8s ease-out;
        }

        .modern-section-title h2 {
            color: var(--primary-color);
            font-size: 34px;
            font-weight: 800;
            position: relative;
            display: inline-block;
            padding-bottom: 15px;
            animation: fadeInUp 0.8s ease-out;
        }

        .modern-section-title h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, var(--accent-color), #ff4d4d);
            border-radius: 10px;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* --- Slider Overlays & Readability --- */
        .single-slider[data-overlay]::before {
            background: linear-gradient(to right, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.4) 100%) !important;
        }

        .hero-glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            padding: 60px 50px;
            border-radius: 30px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
            margin-top: 50px;
            /* Increased margin top */
            width: 100%;
        }

        .slider-cont h1 {
            font-size: 52px !important;
            text-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            color: var(--white);
        }

        .slider-cont p {
            font-size: 18px !important;
            line-height: 1.6;
            margin-bottom: 0;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            max-width: 800px;
            margin: 0 auto;
        }

        .value-list {
            list-style: none;
            padding: 0;
            margin-top: 20px;
            display: inline-block;
            text-align: left;
        }

        .value-list li {
            color: var(--white);
            font-size: 18px;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
        }

        .value-list li i {
            margin-right: 15px;
            color: var(--accent-color);
        }

        /* --- Core Values Section --- */
        .core-values-bg {
            background: linear-gradient(135deg, #07294d 0%, #38bdf8 100%);
            position: relative;
            overflow: hidden;
        }

        .value-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 30px 20px;
            border-radius: 20px;
            text-align: center;
            transition: var(--transition);
            height: 100%;
            margin-bottom: 30px;
        }

        .value-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.4);
        }

        .value-card .value-icon {
            width: 60px;
            height: 60px;
            background: var(--white);
            color: var(--primary-color);
            font-size: 24px;
            line-height: 60px;
            border-radius: 15px;
            margin: 0 auto 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: var(--transition);
        }

        .value-card:hover .value-icon {
            transform: scale(1.1) rotate(10deg);
            background: var(--accent-color);
            color: var(--white);
        }

        .value-card h3 {
            color: var(--white);
            font-size: 18px;
            margin-bottom: 10px;
        }

        .value-card p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            line-height: 1.6;
        }

        .main-btn-2 {
            background-color: transparent !important;
            border: 2px solid var(--white) !important;
            color: var(--white) !important;
            box-shadow: none !important;
        }

        .main-btn-2:hover {
            background-color: var(--white) !important;
            color: var(--primary-color) !important;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 255, 255, 0.2) !important;
        }

        .main-btn-2:active {
            transform: translateY(-1px) scale(0.95);
        }

        /* --- Service Cards --- */
        .gray-bg {
            background-color: var(--gray-bg);
        }

        .service-card {
            background: var(--white);
            padding: 30px 25px;
            border-radius: 15px;
            text-align: center;
            box-shadow: var(--shadow-premium);
            transition: var(--transition);
            height: 100%;
            margin-bottom: 20px;
            border: 1px solid rgba(0, 0, 0, 0.03);
            border-bottom: 3px solid transparent;
        }

        .service-card:hover {
            transform: translateY(-10px);
            border-bottom-color: var(--accent-color);
        }

        .service-card .icon-box {
            width: 65px;
            height: 65px;
            background: rgba(7, 41, 77, 0.05);
            color: var(--primary-color);
            font-size: 28px;
            line-height: 65px;
            border-radius: 50%;
            margin: 0 auto 20px;
            transition: var(--transition);
        }

        .service-card:hover .icon-box {
            background: var(--primary-color);
            color: var(--white);
            transform: rotateY(180deg);
        }

        .service-card h3 {
            font-size: 19px;
            margin-bottom: 12px;
            color: var(--primary-color);
            font-weight: 700;
        }

        .service-card p {
            font-size: 14px;
            margin-bottom: 15px;
            color: var(--text-light);
            line-height: 1.5;
        }

        .service-card a {
            font-weight: 700;
            color: var(--primary-color);
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.5px;
        }

        .service-card a i {
            margin-left: 5px;
            transition: var(--transition);
        }

        .service-card a:hover i {
            transform: translateX(5px);
        }

        /* --- About Section --- */
        .about-image-wrapper {
            position: relative;
        }

        .experience-badge {
            position: absolute;
            bottom: -30px;
            right: -30px;
            background: var(--primary-color);
            color: var(--white);
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            box-shadow: var(--shadow-premium);
        }

        .experience-badge span {
            display: block;
            font-size: 36px;
            font-weight: 800;
            line-height: 1;
        }

        .experience-badge p {
            color: var(--white);
            margin: 0;
            font-size: 14px;
            font-weight: 600;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .feature-item i {
            font-size: 20px;
            margin-right: 15px;
        }

        .feature-item span {
            font-weight: 600;
            color: var(--primary-color);
        }

        .about-quote {
            border-left: 4px solid var(--accent-color);
            padding-left: 20px;
            background: rgba(255, 0, 0, 0.05);
            padding-top: 15px;
            padding-bottom: 15px;
        }

        /* --- Who We Serve --- */
        .serve-main-card {
            background: var(--white);
            padding: 30px;
            border-radius: 20px;
            box-shadow: var(--shadow-premium);
        }

        .serve-content h3 {
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .single-serve-item {
            transition: var(--transition);
            margin-bottom: 30px;
        }

        .single-serve-item:hover {
            transform: translateX(10px);
        }

        .border-primary {
            border-color: var(--primary-color) !important;
        }

        /* --- Responsive Adjustments --- */
        @media (max-width: 991px) {
            .hero-glass-card {
                padding: 30px;
            }

            .slider-cont h1 {
                font-size: 36px !important;
            }

            .pl-40 {
                padding-left: 0;
                margin-top: 50px;
            }

            .experience-badge {
                right: 0;
                bottom: 0;
            }
        }

        @media (max-width: 767px) {
            .slider-cont h1 {
                font-size: 28px !important;
            }

            .slider-cont p {
                font-size: 15px !important;
            }

            .slider-btn .main-btn {
                display: block;
                width: 100%;
                margin-left: 0 !important;
                margin-bottom: 15px;
            }

            .slider-cont {
                text-align: center;
            }

            .value-list li {
                justify-content: center;
            }
        }
    </style>
@endsection

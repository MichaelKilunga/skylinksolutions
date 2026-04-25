@extends('layouts.app')

@section('content')
    <section id="slider-part" class="slider-active">
        <div class="single-slider bg_cover d-flex align-items-center"
            style="background-image: url({{ asset('images/assets/hygiene/h3.PNG') }})" data-overlay="7">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-11">
                        <div class="slider-cont hero-glass-card text-center" data-animation="fadeIn" data-delay="0.5s">
                            <h1 data-animation="bounceInLeft" data-delay="1s">ICT Cleaning and Hygiene</h1>
                            <p data-animation="fadeInUp" data-delay="1.3s">
                                Specialized in professional cleaning of ICT equipment: laptops, photocopiers, servers, and
                                data racks. We ensure your critical infrastructure remains spotless and cable-aligned.
                            </p>
                            <div class="slider-btn mt-30" data-animation="fadeInUp" data-delay="1.5s">
                                <a href="{{ url('/ict-cleaning') }}" class="main-btn">Learn More</a>
                                <a href="{{ url('/contact') }}" class="main-btn main-btn-2 ml-15">Get a Quote</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->

        <div class="single-slider bg_cover d-flex align-items-center"
            style="background-image: url({{ asset('images/slider/new/about.jpg') }})" data-overlay="7">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-11">
                        <div class="slider-cont hero-glass-card text-center" data-animation="fadeIn" data-delay="0.5s">
                            <h1 data-animation="bounceInLeft" data-delay="1s">Web Design & Development</h1>
                            <p data-animation="fadeInUp" data-delay="1.3s">
                                Crafting unique digital identities that make your business stand out. From interactive
                                websites to powerful mobile applications, we build solutions that fulfill your vision.
                            </p>
                            <div class="slider-btn mt-30" data-animation="fadeInUp" data-delay="1.5s">
                                <a href="{{ url('/software-development') }}" class="main-btn">Our Solutions</a>
                                <a href="{{ url('/contact') }}" class="main-btn main-btn-2 ml-15">Start a Project</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->

        <!-- single slider -->

        <div class="single-slider bg_cover d-flex align-items-center"
            style="background-image: url({{ asset('images/slider/team1.jpg') }})" data-overlay="7">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-11">
                        <div class="slider-cont hero-glass-card text-center" data-animation="fadeIn" data-delay="0.5s">
                            <h1 data-animation="bounceInLeft" data-delay="1s">Meet Our Experts</h1>
                            <p data-animation="fadeInUp" data-delay="1.3s">
                                A team of experienced specialists in ICT hygiene, server systems, and digital innovation. We
                                combine years of expertise to deliver the most elaborate systems imaginable.
                            </p>
                            <div class="slider-btn mt-30" data-animation="fadeInUp" data-delay="1.5s">
                                <a href="{{ url('/contact') }}" class="main-btn">Work With Us</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->
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
                <div class="col-lg col-md-6 mb-4">
                    <div class="value-card mt-30" data-animation="fadeInUp" data-delay="0.2s">
                        <div class="value-icon">
                            <i class="fa fa-heart"></i>
                        </div>
                        <h3>Customer Obsession</h3>
                        <p>We start with the customer and work backwards, ensuring every solution adds real value.</p>
                    </div>
                </div>
                <div class="col-lg col-md-6 mb-4">
                    <div class="value-card mt-30" data-animation="fadeInUp" data-delay="0.4s">
                        <div class="value-icon">
                            <i class="fa fa-bullseye"></i>
                        </div>
                        <h3>Results Oriented</h3>
                        <p>We focus on delivering measurable impact and high-quality outcomes for our clients.</p>
                    </div>
                </div>
                <div class="col-lg col-md-6 mb-4">
                    <div class="value-card mt-30" data-animation="fadeInUp" data-delay="0.6s">
                        <div class="value-icon">
                            <i class="fa fa-rocket"></i>
                        </div>
                        <h3>Digital Innovation</h3>
                        <p>We embrace cutting-edge technology to create forward-thinking solutions.</p>
                    </div>
                </div>
                <div class="col-lg col-md-6 mb-4">
                    <div class="value-card mt-30" data-animation="fadeInUp" data-delay="0.8s">
                        <div class="value-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <h3>Team Working & Diversity</h3>
                        <p>We believe in the power of collaboration and diverse perspectives.</p>
                    </div>
                </div>
                <div class="col-lg col-md-6 mb-4">
                    <div class="value-card mt-30" data-animation="fadeInUp" data-delay="1.0s">
                        <div class="value-icon">
                            <i class="fa fa-magic"></i>
                        </div>
                        <h3>Simplicity at its Best</h3>
                        <p>We strip away complexity to deliver intuitive and elegant systems.</p>
                    </div>
                </div>
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
            <div class="row">
                <div class="col-lg-3 col-md-6 mt-4">
                    <div class="service-card mt-15">
                        <div class="icon-box">
                            <i class="fa fa-code"></i>
                        </div>
                        <h3>Software Development</h3>
                        <p>Web-based systems, mobile applications, and custom automation solutions tailored for your
                            business needs.</p>
                        <a href="{{ url('/software-development') }}" class="premium-link">Explore <i
                                class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-4">
                    <div class="service-card mt-15">
                        <div class="icon-box">
                            <i class="fa fa-shield"></i>
                        </div>
                        <h3>Security & Surveillance</h3>
                        <p>Advanced CCTV installation, electric fencing, and physical security systems for homes and
                            offices.</p>
                        <a href="{{ url('/cctv-camera') }}" class="premium-link">Explore <i
                                class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-4">
                    <div class="service-card mt-15">
                        <div class="icon-box">
                            <i class="fa fa-wifi"></i>
                        </div>
                        <h3>Computer Networking</h3>
                        <p>Reliable LAN setups, intercom systems, and enterprise-grade networking infrastructure.</p>
                        <a href="{{ url('/networking') }}" class="premium-link">Explore <i
                                class="fa fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-4">
                    <div class="service-card mt-15">
                        <div class="icon-box">
                            <i class="fa fa-lock"></i>
                        </div>
                        <h3>Access Control Systems</h3>
                        <p>Biometric locks, time attendance systems, and secure entry management for organizations.</p>
                        <a href="{{ url('/biometry') }}" class="premium-link">Explore <i
                                class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    <!--====== OUR SERVICES END ======-->

    <section id="about-part" class="pt-60 pb-60">
        <div class="container">
            <div class="row align-items-center mt-4">
                <div class="col-lg-6">
                    <div class="about-image-wrapper">
                        <img src="{{ asset('images/slider/new/about.jpg') }}" alt="About SkyLink"
                            class="img-fluid rounded shadow-lg">
                        <div class="experience-badge">
                            <span>5+</span>
                            <p>Years of Excellence</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-cont-2 pl-40">
                        <div class="section-title">
                            <h5>Always here for you</h5>
                            <h2>Welcome to SkyLink Solutions</h2>
                        </div>
                        <p class="mt-25">We’re an adroit digital technology company with passionate and skillful expertise
                            providing excellence digital experience in software development, ICT infrastructure, security
                            and surveillance.</p>
                        <p class="mt-15">The company is using technology to create digital products and services with a
                            belief of attaining a future digital world where innovation meets reality. Our solutions enable
                            seamless communication and data management in both business and personal environments.</p>

                        <div class="about-features mt-30">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="feature-item">
                                        <i class="fa fa-rocket text-primary"></i>
                                        <span>Digital Innovation</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="feature-item">
                                        <i class="fa fa-users text-primary"></i>
                                        <span>Expert Team</span>
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
                            <img src="{{ asset('images/all-icon/w.jpg') }}" alt="Wide Coverage"
                                class="img-fluid rounded shadow">
                        </div>
                        <div class="serve-content mt-30">
                            <h3>Nationwide Digital Connectivity</h3>
                            <p>We connect groups across the country through our premier ICT services. From Morogoro to every
                                corner of Tanzania, we provide on-site support, software development, and infrastructure
                                excellence. We’ve partnered with law firms, charities, construction companies, and more to
                                drive digital transformation.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="serve-list">
                        <div class="single-serve-item mt-30 p-4 bg-white rounded shadow-sm border-left border-primary">
                            <div class="row align-items-center">
                                <div class="col-sm-4">
                                    <div class="serve-thumb">
                                        <img src="{{ asset('images/assets/project.PNG') }}" alt="Businesses"
                                            class="img-fluid rounded">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="serve-info">
                                        <h4 class="h5 mb-2">Businesses & Organizations</h4>
                                        <p class="small text-muted">Empowering startups and enterprises with smart
                                            automation and reliable ICT support for sustainable growth.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-serve-item mt-30 p-4 bg-white rounded shadow-sm border-left border-primary">
                            <div class="row align-items-center">
                                <div class="col-sm-4">
                                    <div class="serve-thumb">
                                        <img src="{{ asset('images/assets/family.PNG') }}" alt="Individuals"
                                            class="img-fluid rounded">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="serve-info">
                                        <h4 class="h5 mb-2">Individuals & Entrepreneurs</h4>
                                        <p class="small text-muted">Protecting homes and offices with smart security
                                            solutions and reliable networking systems.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-serve-item mt-30 p-4 bg-white rounded shadow-sm border-left border-primary">
                            <div class="row align-items-center">
                                <div class="col-sm-4">
                                    <div class="serve-thumb">
                                        <img src="{{ asset('images/assets/Capture.PNG') }}" alt="Government"
                                            class="img-fluid rounded">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="serve-info">
                                        <h4 class="h5 mb-2">Government & Institutions</h4>
                                        <p class="small text-muted">Providing secure surveillance and digital solutions
                                            that improve public service delivery and asset protection.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
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

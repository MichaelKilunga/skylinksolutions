@extends('layouts.app')

@section('content')
    <section id="page-banner" class="bg_cover" data-overlay="9"
        style="background-image: url({{ asset('images/bannerbg/banner-bg.png') }}); height: auto; padding: 20px 0;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-banner-cont" style="position: relative; z-index: 5;">
                        <h3 class="text-white font-weight-bold mb-1" style="text-shadow: 2px 2px 6px rgba(0,0,0,0.8); font-size: 24px;">
                            About Us</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent p-0 mb-0" style="font-size: 14px;">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">Home</a></li>
                                <li class="breadcrumb-item active text-white-50" aria-current="page" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">About Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about-page" class="pt-70 pb-70 bg-light">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="section-title mb-4">
                        <h5 class="text-primary font-weight-bold">About us</h5>
                        <h2 class="mb-3">Welcome to SkyLink Solutions</h2>
                    </div>
                    <div class="about-cont text-muted" style="font-size: 1.1rem; line-height: 1.8;">
                        <p class="text-justify mb-4">The company is using technology to create digital products and services
                            with a belief of attaining a future digital world where innovation meets reality. Our ideal goal
                            is solving social and business problems digitally. Formally established in October 2021 as
                            SkyLink Solutions, we have been providing premium website development, network installation, and
                            CCTV camera installation primarily in Morogoro.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-image rounded shadow-lg overflow-hidden">
                        <img src="{{ asset('images/slider/new/about.jpg') }}" alt="About"
                            class="img-fluid w-100 transition-transform hover-scale">
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-6 mb-4">
                    <div class="about-singel-items h-100 p-4 bg-white rounded shadow-sm border-top border-primary border-3">
                        <h4 class="text-primary mb-3"><i class="fa fa-file-pdf-o mr-2"></i> Vision</h4>
                        <p class="text-muted text-justify mb-0">To create a digital world where innovation meets the real
                            world.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="about-singel-items h-100 p-4 bg-white rounded shadow-sm border-top border-primary border-3">
                        <h4 class="text-primary mb-3"><i class="fa fa-th-list mr-2"></i> Mission</h4>
                        <p class="text-muted text-justify mb-0">Accelerate the construction of the future digital society by
                            using innovation and technology to transform problem-solving ideas to reality.</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center pt-4 border-top">
                <div class="col-12 mb-4 text-center mt-4">
                    <h3 class="font-weight-bold">Why Choose Us</h3>
                    <p class="text-muted">Delivering excellence through passion, innovation, and expertise.</p>
                </div>

                <div class="col-lg-12 mb-4">
                    <div class="about-singel-items p-4 bg-white rounded shadow-sm">
                        <h4 class="text-info mb-3"><i class="fa fa-plus-circle mr-2"></i> Comprehensive Services</h4>
                        <p class="text-muted text-justify mb-0">We’re an adroit digital technology company with passionate
                            and skillful expertise providing excellence digital experience in software development (website,
                            Mobile Application, POS Systems, Database Design), ICT infrastructure (Networking- Local Area
                            Network, Internet Access, Intercom systems, Audio and Video doorbell), security and surveillance
                            (CCTV Camera, Electric Fencing, Access Control systems, Fire Alarm system, Automotive gate
                            motor), Graphics Design (Posters, Brochures, flyer), Supplying Computer Accessories (Laptops,
                            Desktop Computers) with full ICT support and maintenance.</p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="about-singel-items h-100 p-4 bg-white rounded shadow-sm">
                        <h4 class="text-info mb-3"><i class="fa fa-book mr-2"></i> 5+ Years of Experience</h4>
                        <p class="text-muted text-justify mb-0">With more than 5 years of ICT experience, we have achieved
                            knowledge, skills, and expertise in an extensive range of technologies application type and
                            industries.</p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="about-singel-items h-100 p-4 bg-white rounded shadow-sm">
                        <h4 class="text-info mb-3"><i class="fa fa-user-circle-o mr-2"></i> Quality Assurance</h4>
                        <p class="text-muted text-justify mb-0">We have a great team that is extremely innovative and
                            passionate about their work. Thereby you will get original, groundbreaking qualitative services
                            for your business. Our designers and developers are specialized and trained in the latest
                            technologies.</p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="about-singel-items h-100 p-4 bg-white rounded shadow-sm">
                        <h4 class="text-info mb-3"><i class="fa fa-check-square-o mr-2"></i> Complete Project Management
                        </h4>
                        <p class="text-muted text-justify mb-0">From complex project to simple ones, we are experts in all
                            kinds of digital projects. Our services include a complete project management services within
                            the proposed budget.</p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="about-singel-items h-100 p-4 bg-white rounded shadow-sm">
                        <h4 class="text-info mb-3"><i class="fa fa-shield mr-2"></i> Information Security & Data Protection
                        </h4>
                        <p class="text-muted text-justify mb-0">Information security management for ICT and IT-related
                            services are an important area of concern for every organization. We apply proper measures to
                            ensure the confidentiality of information. Our team members are fully trained in advanced data
                            protection training.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="counter-part" class="bg_cover pt-80 pb-80 position-relative" data-overlay="8"
        style="background-image: url({{ asset('images/slider/new/team.jpg') }}); background-attachment: fixed; background-position: center;">
        <div class="overlay"
            style="position: absolute; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.7);"></div>
        <div class="container position-relative z-index-1">
            <div class="row justify-content-center text-center mb-5 pt-4">
                <div class="col-lg-8">
                    <h2 class="text-white font-weight-bold">We Deliver Intelligent Technology Solutions in all ICT Fields
                    </h2>
                    <div class="mt-3 mx-auto" style="width: 60px; height: 3px; background-color: #007bff;"></div>
                </div>
            </div>
            <div class="row pb-4">
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="singel-counter text-center rounded p-4 shadow-sm"
                        style="background: rgba(255,255,255,0.1); backdrop-filter: blur(5px); border: 1px solid rgba(255,255,255,0.2);">
                        <h4 class="text-light mb-2">Software Projects</h4>
                        <span class="text-white font-weight-bold" style="font-size: 2.5rem;"><span
                                class="counter">10</span>+</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="singel-counter text-center rounded p-4 shadow-sm"
                        style="background: rgba(255,255,255,0.1); backdrop-filter: blur(5px); border: 1px solid rgba(255,255,255,0.2);">
                        <h4 class="text-light mb-2">Networking Systems</h4>
                        <span class="text-white font-weight-bold" style="font-size: 2.5rem;"><span
                                class="counter">150</span>+</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="singel-counter text-center rounded p-4 shadow-sm"
                        style="background: rgba(255,255,255,0.1); backdrop-filter: blur(5px); border: 1px solid rgba(255,255,255,0.2);">
                        <h4 class="text-light mb-2">Security Systems</h4>
                        <span class="text-white font-weight-bold" style="font-size: 2.5rem;"><span
                                class="counter">100</span>+</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="singel-counter text-center rounded p-4 shadow-sm"
                        style="background: rgba(255,255,255,0.1); backdrop-filter: blur(5px); border: 1px solid rgba(255,255,255,0.2);">
                        <h4 class="text-light mb-2">Automation Systems</h4>
                        <span class="text-white font-weight-bold" style="font-size: 2.5rem;"><span
                                class="counter">1</span>+</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="teachers-part" class="pt-70 pb-70 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title mb-5 mt-4">
                        <h5 class="text-primary font-weight-bold">Featured Experts</h5>
                        <h2>Meet Our Core Team</h2>
                        <div class="mt-3 mx-auto" style="width: 60px; height: 3px; background-color: #007bff;"></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($teamMembers as $member)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-0 shadow-sm h-100 text-center overflow-hidden team-card pt-4">
                        <div class="d-flex justify-content-center">
                            <img src="{{ $member->profile_photo_url }}" alt="{{ $member->name }}"
                                class="rounded-circle img-thumbnail border-primary shadow-sm"
                                style="width: 150px; height: 150px; object-fit: cover; object-position: top;">
                        </div>
                        <div class="card-body mt-3">
                            <h5 class="card-title font-weight-bold text-dark mb-1">{{ $member->name }}</h5>
                            <span class="text-primary d-block mb-3">{{ $member->position ?? 'Team Member' }}</span>
                            <p class="text-muted small px-2">{{ $member->bio ?? '' }}</p>
                        </div>
                    </div>
                </div>
                @endforeach

                @if($teamMembers->isEmpty())
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Our team members will be listed here soon.</p>
                </div>
                @endif
            </div>
        </div>
    </section>

    <style>
        .team-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: #fff;
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
        }

        .hover-scale {
            transition: transform 0.5s ease;
        }

        .about-image:hover .hover-scale {
            transform: scale(1.05);
        }

        .about-singel-items {
            transition: all 0.3s ease;
        }

        .about-singel-items:hover {
            transform: translateY(-5px);
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
        }

        .z-index-1 {
            z-index: 1;
        }

        .border-top {
            border-top: 1px solid #dee2e6 !important;
        }

        .border-3 {
            border-top-width: 3px !important;
        }
    </style>
@endsection

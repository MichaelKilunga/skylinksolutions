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
                            Contact Us</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent p-0 mb-0" style="font-size: 14px;">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white"
                                        style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">Home</a></li>
                                <li class="breadcrumb-item active text-white-50" aria-current="page"
                                    style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">Contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact-page" class="pt-70 pb-70 bg-light">
        <div class="container mb-4">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <div class="section-title mb-4">
                        <h5 class="text-primary font-weight-bold mt-4">Get In Touch</h5>
                        <h2 class="mb-3">We'd Love To Hear From You</h2>
                        <div class="mt-3 mx-auto" style="width: 60px; height: 3px; background-color: #007bff;"></div>
                    </div>
                    <p class="text-muted" style="font-size: 1.1rem; line-height: 1.8;">
                        Seamless Communication. Our communication channel is 24/7 active to ensure that every query is
                        responded to on time.
                    </p>
                </div>
            </div>

            <div class="row">
                <!-- Contact Info -->
                <div class="col-lg-4 mt-4 mb-lg-0">
                    <div class="contact-info-wrapper bg-white p-4 p-md-5 rounded shadow-sm mb-4">
                        <div class="contact-info-item d-flex align-items-start mb-4 pb-4 border-bottom">
                            <div
                                class="contact-icon-box bg-light text-primary rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="contact-info-text ml-3">
                                <h5 class="font-weight-bold text-dark mb-1">Office Address</h5>
                                <p class="text-muted mb-0">{{ $company_setting->address ?? 'Post Building, Morogoro' }}</p>
                            </div>
                        </div>

                        <div class="contact-info-item d-flex align-items-start mb-4 pb-4 border-bottom">
                            <div
                                class="contact-icon-box bg-light text-primary rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="contact-info-text ml-3">
                                <h5 class="font-weight-bold text-dark mb-1">Phone Number</h5>
                                <p class="text-muted mb-0">{{ $company_setting->phone ?? '+255 (0) 762 725 725' }}</p>
                            </div>
                        </div>

                        <div class="contact-info-item d-flex align-items-start mb-4 pb-4 border-bottom">
                            <div
                                class="contact-icon-box bg-light text-primary rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="contact-info-text ml-3">
                                <h5 class="font-weight-bold text-dark mb-1">Email Address</h5>
                                <p class="text-muted mb-0">{{ $company_setting->email ?? 'info@skylinksolutions.co.tz' }}
                                </p>
                            </div>
                        </div>

                        <div class="contact-info-item d-flex align-items-start">
                            <div
                                class="contact-icon-box bg-light text-primary rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <div class="contact-info-text ml-3">
                                <h5 class="font-weight-bold text-dark mb-1">Working Hours</h5>
                                <p class="text-muted mb-0">
                                    {{ $company_setting->working_hours ?? 'Monday to Saturday - 8:30 Am to 5:00 Pm' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-lg-8 mt-4 mb-4">
                    <div class="contact-from bg-white p-4 p-md-5 rounded shadow-sm h-100">

                        <h4 class="font-weight-bold mb-4">Send Us A Message</h4>
                        <div class="main-form">
                            <form action="{{ route('contact.send') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="premium-form-group">
                                            <i class="fa fa-user"></i>
                                            <input type="text" name="contact_name"
                                                class="form-control form-control-premium @error('contact_name') is-invalid @enderror"
                                                placeholder="Your Name" value="{{ old('contact_name') }}" required>
                                            @error('contact_name')
                                                <div class="invalid-feedback ml-4">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="premium-form-group">
                                            <i class="fa fa-phone"></i>
                                            <input name="phone" type="text" class="form-control form-control-premium"
                                                placeholder="Phone Number" value="{{ old('phone') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-4">
                                        <div class="premium-form-group">
                                            <i class="fa fa-tag"></i>
                                            <input name="subject" type="text"
                                                class="form-control form-control-premium @error('subject') is-invalid @enderror"
                                                placeholder="Subject" value="{{ old('subject') }}" required>
                                            @error('subject')
                                                <div class="invalid-feedback ml-4">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-4">
                                        <div class="premium-form-group">
                                            <i class="fa fa-pencil" style="top: 25px; transform: none;"></i>
                                            <textarea name="text" class="form-control form-control-premium @error('text') is-invalid @enderror" rows="5"
                                                placeholder="Your Message" required style="padding-top: 15px;">{{ old('text') }}</textarea>
                                            @error('text')
                                                <div class="invalid-feedback ml-4">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn-premium btn-md">
                                            <span>Send Message</span>
                                            <i class="fa fa-paper-plane ml-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section mt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="map-wrapper shadow-lg rounded overflow-hidden" style="height: 450px;">
                        <iframe
                            src="{{ $company_setting->google_map_link ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d32025.304492780353!2d37.70668992509314!3d-6.782833299999985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x185a59b1e6c2cced%3A0xf5a1959f238d0c1a!2sSKYLINK%20SOLUTIONS!5e1!3m2!1ssw!2stz!4v1766754537925!5m2!1ssw!2stz' }}"
                            style="width:100%; height:100%; border: 0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .transition-transform {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-scale:hover {
            transform: translateY(-3px);
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
        }

        .contact-info-wrapper {
            transition: all 0.3s ease;
            border-top: 4px solid #007bff;
        }

        .contact-info-wrapper:hover {
            transform: translateY(-5px);
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, .1) !important;
        }

        .contact-icon-box {
            width: 55px;
            height: 55px;
            min-width: 55px;
            font-size: 20px;
            background: #f0f7ff !important;
            transition: all 0.3s ease;
        }

        .contact-info-item:hover .contact-icon-box {
            background: #007bff !important;
            color: #fff !important;
            transform: scale(1.1);
        }

        .contact-info-text h5 {
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .contact-info-item:hover .contact-info-text h5 {
            color: #007bff !important;
        }

        .border-bottom {
            border-bottom: 1px solid #f1f1f1 !important;
        }

        /* Premium Form Styles */
        .premium-form-group {
            position: relative;
            transition: all 0.3s ease;
        }

        .premium-form-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #007bff;
            font-size: 16px;
            transition: all 0.3s ease;
            z-index: 10;
        }

        .form-control-premium {
            height: 55px;
            padding-left: 45px;
            border-radius: 12px;
            background-color: #f8f9fa;
            border: 2px solid transparent;
            font-size: 15px;
            color: #333;
            transition: all 0.3s ease;
        }

        textarea.form-control-premium {
            height: auto;
            padding-top: 15px;
        }

        .form-control-premium:focus {
            background-color: #fff;
            border-color: #007bff;
            box-shadow: 0 10px 20px rgba(0, 123, 255, 0.1);
            outline: none;
            transform: translateY(-2px);
        }

        .form-control-premium:focus+i {
            color: #0056b3;
            transform: translateY(-50%) scale(1.1);
        }

        /* Premium Button */
        .btn-premium {
            background: linear-gradient(45deg, #007bff, #0056b3);
            border: none;
            color: #fff;
            padding: 15px 40px;
            border-radius: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .btn-premium:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 8px 25px rgba(0, 123, 255, 0.4);
            color: #fff;
            background: linear-gradient(45deg, #0056b3, #004085);
        }

        .btn-premium:active {
            transform: translateY(-1px);
        }

        .invalid-feedback {
            font-size: 13px;
            font-weight: 500;
        }

        .map-wrapper {
            position: relative;
            z-index: 1;
        }
    </style>
@endsection

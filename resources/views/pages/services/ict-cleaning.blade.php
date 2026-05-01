@extends('layouts.app')

@section('content')
    <section id="page-banner" class="bg_cover" data-overlay="9"
        style="background-image: url({{ asset('images/bannerbg/banner-bg.png') }}); height: auto; padding: 20px 0;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-banner-cont" style="position: relative; z-index: 5;">
                        <h3 class="text-white font-weight-bold mb-1" style="text-shadow: 2px 2px 6px rgba(0,0,0,0.8); font-size: 24px;">
                            ICT Cleaning & Hygiene</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent p-0 mb-0" style="font-size: 14px;">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">Home</a></li>
                                <li class="breadcrumb-item active text-white-50" aria-current="page" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">ICT Cleaning</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="ict-cleaning-details" class="pt-80 pb-80 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="main-content-card bg-white p-4 p-md-5 rounded shadow-sm border-top border-primary border-3">
                        <div class="section-title mb-4">
                            <h5 class="text-primary font-weight-bold">Professional Maintenance</h5>
                            <h2 class="h1">Protect Your Critical Infrastructure</h2>
                            <div class="mt-2" style="width: 50px; height: 3px; background-color: #007bff;"></div>
                        </div>

                        <div class="img-wrapper mb-4 overflow-hidden rounded shadow-sm">
                            <img src="{{ asset('images/assets/hygiene/clean.jpg') }}" alt="ICT Cleaning"
                                class="img-fluid transition-all hover-scale-img">
                        </div>

                        <p class="lead text-muted mb-4">
                            We specialize in the professional cleaning of ICT equipment, server rooms, and data centers. Our
                            program is designed to secure your devices from unnecessary damage by ensuring the hygiene and
                            optimal performance of your infrastructure.
                        </p>

                        <p class="text-justify mb-5">
                            Traditional cleaning methods often fail to address the specific needs of sensitive electronic
                            components. Dust buildup in server rooms can lead to overheating and hardware failure, while
                            shared office equipment like keyboards and telephones can become breeding grounds for bacteria.
                            Our specialized approach uses industry-approved products to sanitize and maintain your equipment
                            without risking damage.
                        </p>

                        <div class="row g-4 mt-2">
                            <div class="col-md-4 mb-4 mb-md-0">
                                <div
                                    class="info-box p-4 rounded text-center h-100 border bg-white shadow-hover transition-all">
                                    <div class="icon-circle mb-3 mx-auto bg-danger-light">
                                        <i class="fa fa-bug text-danger fs-3"></i>
                                    </div>
                                    <h5 class="font-weight-bold">The Issue</h5>
                                    <p class="small text-muted mb-0">Bacteria and allergens thrive on shared equipment,
                                        spreading illness among staff.</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4 mb-md-0">
                                <div
                                    class="info-box p-4 rounded text-center h-100 border bg-white shadow-hover transition-all">
                                    <div class="icon-circle mb-3 mx-auto bg-warning-light">
                                        <i class="fa fa-exclamation-triangle text-warning fs-3"></i>
                                    </div>
                                    <h5 class="font-weight-bold">The Challenge</h5>
                                    <p class="small text-muted mb-0">Regular cleaners lack the training to handle sensitive
                                        ICT hardware safely.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div
                                    class="info-box p-4 rounded text-center h-100 border bg-white shadow-hover transition-all">
                                    <div class="icon-circle mb-3 mx-auto bg-success-light">
                                        <i class="fa fa-check-circle text-success fs-3"></i>
                                    </div>
                                    <h5 class="font-weight-bold">The Solution</h5>
                                    <p class="small text-muted mb-0">Specialized tools and anti-static products to sanitize
                                        without damage.</p>
                                </div>
                            </div>
                        </div>

                        <h3 class="mt-5 mb-4 font-weight-bold">Why Choose Our Specialist Service?</h3>
                        <div class="row g-4">
                            <div class="col-md-6 mb-4">
                                <div
                                    class="specialist-item d-flex align-items-center p-3 rounded border bg-light shadow-hover transition-all">
                                    <div class="img-container mr-3 rounded overflow-hidden shadow-sm"
                                        style="width: 80px; height: 80px; min-width: 80px;">
                                        <img src="{{ asset('images/assets/hygiene/h12.PNG') }}"
                                            class="w-100 h-100 object-fit-cover">
                                    </div>
                                    <div>
                                        <h6 class="font-weight-bold mb-1">Telephone Cleaning</h6>
                                        <p class="small text-muted mb-0">Deep sanitization of handsets and dialing pads.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div
                                    class="specialist-item d-flex align-items-center p-3 rounded border bg-light shadow-hover transition-all">
                                    <div class="img-container mr-3 rounded overflow-hidden shadow-sm"
                                        style="width: 80px; height: 80px; min-width: 80px;">
                                        <img src="{{ asset('images/assets/hygiene/h11.PNG') }}"
                                            class="w-100 h-100 object-fit-cover">
                                    </div>
                                    <div>
                                        <h6 class="font-weight-bold mb-1">Monitor Cleaning</h6>
                                        <p class="small text-muted mb-0">Anti-static treatment for LCD/LED screens.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 mb-md-0">
                                <div
                                    class="specialist-item d-flex align-items-center p-3 rounded border bg-light shadow-hover transition-all">
                                    <div class="img-container mr-3 rounded overflow-hidden shadow-sm"
                                        style="width: 80px; height: 80px; min-width: 80px;">
                                        <img src="{{ asset('images/assets/hygiene/h8.PNG') }}"
                                            class="w-100 h-100 object-fit-cover">
                                    </div>
                                    <div>
                                        <h6 class="font-weight-bold mb-1">Keyboard Deep-Clean</h6>
                                        <p class="small text-muted mb-0">Extraction of debris and surface polishing.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div
                                    class="specialist-item d-flex align-items-center p-3 rounded border bg-light shadow-hover transition-all">
                                    <div class="img-container mr-3 rounded overflow-hidden shadow-sm"
                                        style="width: 80px; height: 80px; min-width: 80px;">
                                        <img src="{{ asset('images/assets/hygiene/h9.PNG') }}"
                                            class="w-100 h-100 object-fit-cover">
                                    </div>
                                    <div>
                                        <h6 class="font-weight-bold mb-1">Laptop Maintenance</h6>
                                        <p class="small text-muted mb-0">Vent cleaning and screen sanitization.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar sticky-top" style="top: 100px; z-index: 10;">
                        <div
                            class="request-form-card bg-white p-4 rounded shadow-sm border-top border-primary border-3 mb-4">
                            <h4 class="font-weight-bold mb-2">Get a Free Quote</h4>
                            <p class="small text-muted mb-4">Request our specialized cleaning service today.</p>


                            <form action="{{ route('quote.request') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control form-control-lg rounded bg-light border-0"
                                        name="fullname" placeholder="Full Name" value="{{ old('fullname') }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control form-control-lg rounded bg-light border-0"
                                        name="location" placeholder="Location" value="{{ old('location') }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <select class="form-control form-control-lg rounded bg-light border-0" name="device"
                                        required>
                                        <option disabled selected value="">Select Equipment</option>
                                        <option value="laptops" {{ old('device') == 'laptops' ? 'selected' : '' }}>Laptops</option>
                                        <option value="desktops" {{ old('device') == 'desktops' ? 'selected' : '' }}>Desktops</option>
                                        <option value="printers" {{ old('device') == 'printers' ? 'selected' : '' }}>Printers</option>
                                        <option value="servers" {{ old('device') == 'servers' ? 'selected' : '' }}>Servers & Racks</option>
                                        <option value="others" {{ old('device') == 'others' ? 'selected' : '' }}>Others</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control form-control-lg rounded bg-light border-0"
                                        name="phone_number" placeholder="Phone Number" value="{{ old('phone_number') }}" required>
                                </div>
                                <div class="form-group mb-4">
                                    <textarea class="form-control form-control-lg rounded bg-light border-0" name="message" rows="3"
                                        placeholder="Additional Details">{{ old('message') }}</textarea>
                                </div>
                                <button type="submit"
                                    class="btn btn-primary btn-lg w-100 rounded shadow-sm font-weight-bold transition-transform hover-scale">Submit
                                    Request</button>
                            </form>
                        </div>

                        <div
                            class="operation-info-card bg-white p-4 rounded shadow-sm border-left border-primary border-3">
                            <h5 class="font-weight-bold mb-3">Service Availability</h5>
                            <ul class="list-unstyled mb-0">
                                <li class="d-flex align-items-start mb-3">
                                    <div class="icon text-primary mt-1 mr-3">
                                        <i class="fa fa-calendar-check-o"></i>
                                    </div>
                                    <div>
                                        <p class="mb-0 font-weight-bold text-dark">Mon - Sat</p>
                                        <p class="small text-muted mb-0">Full week coverage</p>
                                    </div>
                                </li>
                                <li class="d-flex align-items-start">
                                    <div class="icon text-primary mt-1 mr-3">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <div>
                                        <p class="mb-0 font-weight-bold text-dark">Flexible Hours</p>
                                        <p class="small text-muted mb-0">After-hours service available</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .bg-danger-light {
            background-color: rgba(220, 53, 69, 0.1);
        }

        .bg-warning-light {
            background-color: rgba(255, 193, 7, 0.1);
        }

        .bg-success-light {
            background-color: rgba(40, 167, 69, 0.1);
        }

        .icon-circle {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .shadow-hover:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08) !important;
            transform: translateY(-5px);
        }

        .hover-scale-img {
            transition: transform 0.5s ease;
        }

        .img-wrapper:hover .hover-scale-img {
            transform: scale(1.05);
        }

        .transition-transform {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-scale:hover {
            transform: translateY(-3px);
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
            border-color: #80bdff;
            background-color: #fff !important;
        }

        .border-3 {
            border-width: 3px !important;
        }

        .object-fit-cover {
            object-fit: cover;
        }

        .transition-all {
            transition: all 0.3s ease;
        }

        .fs-3 {
            font-size: 1.75rem;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                position: static !important;
            }

            .pt-120 {
                pt-80;
            }

            .pb-120 {
                pb-80;
            }
        }
    </style>

@endsection

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
                            Our Community</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent p-0 mb-0" style="font-size: 14px;">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white"
                                        style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">Home</a></li>
                                <li class="breadcrumb-item active text-white-50" aria-current="page"
                                    style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">Community</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="volunteer-page" class="pt-80 pb-80 bg-light">
        <div class="container mb-4">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <div class="section-title mb-4">
                        <h5 class="text-primary font-weight-bold mt-4">Join Our Community</h5>
                        <h2 class="mb-3">Be Part of the Innovation</h2>
                        <div class="mt-3 mx-auto" style="width: 60px; height: 3px; background-color: #007bff;"></div>
                    </div>
                    <p class="text-muted" style="font-size: 1.1rem; line-height: 1.8;">
                        Are you passionate about technology and community impact? Join SkyLink Solutions community
                        and help us drive digital transformation across Tanzania.
                    </p>
                </div>
            </div>

            {{-- add row for or parterns --}}
            <div class="row justify-content-center mb-5">
                <div class="col-12">
                    <div class="section-title text-center mb-4">
                        <h4 class="font-weight-bold">Our Trusted Partners</h4>
                    </div>

                    <div id="partnersSlider" class="carousel slide" data-ride="carousel" data-interval="3000">
                        <div class="carousel-inner">
                            @forelse($partners->chunk(3) as $chunk)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <div class="row">
                                        @foreach($chunk as $partner)
                                            <div class="col-md-4">
                                                <div class="partner-card bg-white p-4 rounded shadow-sm border text-center h-100">
                                                    <img src="{{ asset($partner->logo_path ?? 'images/placeholder.jpg') }}" alt="{{ $partner->name }}"
                                                        class="img-fluid mb-3" style="max-height: 60px;">
                                                    <h5 class="font-weight-bold">{{ $partner->name }}</h5>
                                                    <p class="text-muted small">{{ $partner->description }}</p>
                                                    <div class="badge badge-primary-soft text-primary p-2">Activity: {{ $partner->activity }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @empty
                                <div class="carousel-item active">
                                    <div class="text-center p-5">
                                        <p class="text-muted">No partners available at the moment.</p>
                                    </div>
                                </div>
                            @endforelse
                        </div>

                        <a class="carousel-control-prev" href="#partnersSlider" role="button" data-slide="prev">
                            <span class="fa fa-chevron-left text-dark fs-5" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#partnersSlider" role="button" data-slide="next">
                            <span class="fa fa-chevron-right text-dark fs-5" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <div class="section-title mb-4">
                        <h5 class="text-primary font-weight-bold mt-4">Practical Training & Internship
                        </h5>
                        <h2 class="mb-3">Kickstart Your Career With Us</h2>
                        <div class="mt-3 mx-auto" style="width: 60px; height: 3px; background-color: #007bff;"></div>
                    </div>
                    <p class="text-muted" style="font-size: 1.1rem; line-height: 1.8;">
                        Gain hands-on experience, learn from industry experts, and build your professional network.
                        We provide a dynamic environment where your ideas matter and your growth is our priority.
                    </p>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <div
                        class="info-card bg-primary text-white p-5 rounded shadow-lg h-100 position-relative overflow-hidden">
                        <h3 class="text-white mb-4">Why Join Our Community?</h3>
                        <ul class="list-unstyled">
                            <li class="d-flex mb-4">
                                <i class="fa fa-check-circle mt-1 mr-3 fs-5"></i>
                                <div>
                                    <h5 class="text-white">Gain Experience</h5>
                                    <p class="text-white-50 small mb-0">Work alongside industry experts on real-world ICT
                                        projects.</p>
                                </div>
                            </li>
                            <li class="d-flex mb-4">
                                <i class="fa fa-check-circle mt-1 mr-3 fs-5"></i>
                                <div>
                                    <h5 class="text-white">Networking</h5>
                                    <p class="text-white-50 small mb-0">Connect with professionals and innovators in the
                                        digital field.</p>
                                </div>
                            </li>
                            <li class="d-flex mb-4">
                                <i class="fa fa-check-circle mt-1 mr-3 fs-5"></i>
                                <div>
                                    <h5 class="text-white">Impact</h5>
                                    <p class="text-white-50 small mb-0">Help local businesses and institutions transition
                                        to
                                        the digital age.</p>
                                </div>
                            </li>
                        </ul>
                        <div class="decorative-circle"
                            style="position: absolute; bottom: -50px; left: -50px; width: 150px; height: 150px; background: rgba(255,255,255,0.1); border-radius: 50%;">
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div
                        class="application-form-card bg-white p-5 rounded shadow-sm border-top border-primary border-3 h-100">
                        @if (session('success'))
                            <div class="alert alert-success d-flex align-items-center mb-4" role="alert">
                                <i class="fa fa-check-circle mr-2"></i>
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger mb-4">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <ul class="nav nav-pills mb-4 bg-light p-2 rounded" id="pills-tab" role="tablist">
                            <li class="nav-item flex-fill">
                                <a class="nav-link active text-center font-weight-bold py-3" id="pills-volunteer-tab"
                                    data-toggle="pill" href="#pills-volunteer" role="tab"
                                    aria-controls="pills-volunteer" aria-selected="true">
                                    <i class="fa fa-handshake-o mr-2"></i> Community
                                </a>
                            </li>
                            <li class="nav-item flex-fill">
                                <a class="nav-link text-center font-weight-bold py-3" id="pills-field-tab"
                                    data-toggle="pill" href="#pills-field" role="tab" aria-controls="pills-field"
                                    aria-selected="false">
                                    <i class="fa fa-graduation-cap mr-2"></i> Field Attachment
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <!-- Volunteer Tab -->
                            <div class="tab-pane fade show active" id="pills-volunteer" role="tabpanel"
                                aria-labelledby="pills-volunteer-tab">
                                <h4 class="font-weight-bold mb-4">Community Application</h4>
                                <form action="{{ route('volunteer.apply') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="small font-weight-bold">Full Name</label>
                                                <input type="text" name="name"
                                                    class="form-control bg-light border-0" placeholder="John Doe"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="small font-weight-bold">Email Address</label>
                                                <input type="email" name="email"
                                                    class="form-control bg-light border-0" placeholder="john@example.com"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label class="small font-weight-bold">Phone Number</label>
                                                <input type="text" name="phone"
                                                    class="form-control bg-light border-0" placeholder="+255..." required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label class="small font-weight-bold">Your Skills</label>
                                                <input type="text" name="skills"
                                                    class="form-control bg-light border-0"
                                                    placeholder="e.g. Web Design, Networking, Graphics" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <div class="form-group">
                                                <label class="small font-weight-bold">Why do you want to join?</label>
                                                <textarea name="motivation" class="form-control bg-light border-0" rows="4"
                                                    placeholder="Tell us about your motivation..." required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <div class="form-group">
                                                <label class="small font-weight-bold">Attachments (CV/Letter)</label>
                                                <input type="file" name="attachment"
                                                    class="form-control bg-light border-0">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit"
                                                class="btn btn-primary btn-lg px-5 rounded shadow-sm font-weight-bold transition-transform hover-scale">Submit
                                                Community Application</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Field Application Tab -->
                            <div class="tab-pane fade" id="pills-field" role="tabpanel"
                                aria-labelledby="pills-field-tab">
                                <h4 class="font-weight-bold mb-4">Field Attachment Application</h4>
                                <form action="{{ route('field.apply') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="small font-weight-bold">Full Name</label>
                                                <input type="text" name="full_name"
                                                    class="form-control bg-light border-0" placeholder="John Doe"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="small font-weight-bold">University or College</label>
                                                <input type="text" name="university"
                                                    class="form-control bg-light border-0" placeholder="e.g. UDSM, SUA"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <div class="form-group">
                                                <label class="small font-weight-bold">Program/Course</label>
                                                <input type="text" name="program"
                                                    class="form-control bg-light border-0"
                                                    placeholder="e.g. BSc in Computer Science" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label class="small font-weight-bold">Year of Study</label><br>
                                                <select name="year_of_study" class="form-control bg-light border-0 t"
                                                    required>
                                                    <option value="">Select Year</option>
                                                    <option value="1">Year 1</option>
                                                    <option value="2">Year 2</option>
                                                    <option value="3">Year 3</option>
                                                    <option value="4">Year 4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label class="small font-weight-bold">Start Date</label>
                                                <input type="date" name="start_date"
                                                    class="form-control bg-light border-0" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label class="small font-weight-bold">End Date</label>
                                                <input type="date" name="end_date"
                                                    class="form-control bg-light border-0" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label class="small font-weight-bold">Duration (Weeks)</label>
                                                <input type="number" name="duration_weeks"
                                                    class="form-control bg-light border-0" placeholder="0" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label class="small font-weight-bold">Experience/Competence on</label>
                                                <textarea name="experience" class="form-control bg-light border-0" rows="2"
                                                    placeholder="What are your current skills?"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label class="small font-weight-bold">What you want/intend to Learn from
                                                    us</label>
                                                <textarea name="learning_goals" class="form-control bg-light border-0" rows="2"
                                                    placeholder="What do you hope to achieve?"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label class="small font-weight-bold">How did you hear about us?</label>
                                                <input type="text" name="source"
                                                    class="form-control bg-light border-0"
                                                    placeholder="e.g. Social Media, Friend, Website">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <div class="form-group">
                                                <label class="small font-weight-bold">Field Attachment Letter</label>
                                                <input type="file" name="attachment"
                                                    class="form-control bg-light border-0" required>
                                                <small class="text-muted">Max size: 5MB (PDF, DOC, DOCX, JPG, PNG)</small>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit"
                                                class="btn btn-primary btn-lg px-5 rounded shadow-sm font-weight-bold transition-transform hover-scale">Submit
                                                Field Application</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const startDateInput = document.querySelector('input[name="start_date"]');
                const endDateInput = document.querySelector('input[name="end_date"]');
                const durationInput = document.querySelector('input[name="duration_weeks"]');

                function calculateWeeks() {
                    const start = startDateInput.value;
                    const end = endDateInput.value;

                    if (start && end) {
                        const startDate = new Date(start);
                        const endDate = new Date(end);

                        if (endDate > startDate) {
                            const diffTime = Math.abs(endDate - startDate);
                            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                            const weeks = Math.ceil(diffDays / 7);
                            durationInput.value = weeks;
                        } else {
                            durationInput.value = 0;
                        }
                    }
                }

                startDateInput.addEventListener('change', calculateWeeks);
                endDateInput.addEventListener('change', calculateWeeks);
            });
        </script>
    @endpush

    <style>
        .fs-5 {
            font-size: 1.25rem;
        }

        .border-3 {
            border-top-width: 3px !important;
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
            background-color: #fff !important;
        }

        .custom-select-height {
            height: 45px !important;
            padding: 0.375rem 0.75rem;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 16px 12px;
        }

        .partner-card {
            transition: all 0.3s ease;
            border: 1px solid #eee;
        }

        .partner-card:hover {
            border-color: #007bff;
            transform: translateY(-5px);
        }

        .badge-primary-soft {
            background-color: rgba(0, 123, 255, 0.1);
            font-weight: 600;
            display: inline-block;
            border-radius: 4px;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 40px;
            height: 40px;
            background: #fff;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            opacity: 0.8;
        }

        .carousel-control-prev {
            left: -20px;
        }

        .carousel-control-next {
            right: -20px;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            opacity: 1;
            background: #f8f9fa;
        }
    </style>
@endsection

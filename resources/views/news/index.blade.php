@extends('layouts.app')

@section('content')
    <!--====== PAGE BANNER PART START ======-->
    <section id="page-banner" class="bg_cover" data-overlay="9"
        style="background-image: url({{ asset('images/bannerbg/banner-bg.png') }}); height: auto; padding: 20px 0;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-banner-cont" style="position: relative; z-index: 5;">
                        <h3 class="text-white font-weight-bold mb-1"
                            style="text-shadow: 2px 2px 6px rgba(0,0,0,0.8); font-size: 24px;">
                            Latest News</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent p-0 mb-0" style="font-size: 14px;">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white"
                                        style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">Home</a></li>
                                <li class="breadcrumb-item active text-white-50" aria-current="page"
                                    style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">News</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== PAGE BANNER PART END ======-->

    <!--====== NEWS PART START ======-->
    <section id="news-main" class="pt-80 pb-80 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-50">
                        <h5 class="text-primary font-weight-bold mt-4">Stay Updated</h5>
                        <h2 class="mb-3">Insights, Updates & Announcements</h2>
                        <p class="text-muted mb-4">Explore the latest happenings at SkyLink Solutions, from system updates
                            to
                            company milestones and industry insights.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Main Content Column -->
                <div class="col-lg-9">
                    @if ($featured)
                        <!-- Featured News Item -->
                        <div class="mb-5">
                            <div class="card border-0 shadow-lg overflow-hidden glass-card featured-news">
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                                        <div class="news-image h-100">
                                            <img src="{{ $featured->image ? (Str::startsWith($featured->image, 'images/') ? asset($featured->image) : asset('storage/' . $featured->image)) : asset('images/blog/software-update.png') }}"
                                                alt="{{ $featured->title }}" class="img-fluid h-100 w-100 object-fit-cover">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body p-4 p-md-5 d-flex flex-column justify-content-center">
                                            <span
                                                class="badge badge-primary px-3 py-2 mb-3 align-self-start">{{ $featured->category }}</span>
                                            <h3 class="card-title font-weight-bold mb-3">{{ $featured->title }}</h3>
                                            <p class="card-text text-muted mb-4 text-justify">
                                                {{ Str::limit($featured->excerpt, 150) }}</p>
                                            <div class="news-meta d-flex align-items-center">
                                                @if ($featured->author_image)
                                                    <div class="author-img mr-3">
                                                        <img src="{{ Str::startsWith($featured->author_image, 'images/') ? asset($featured->author_image) : asset('storage/' . $featured->author_image) }}"
                                                            alt="{{ $featured->author_name }}"
                                                            class="rounded-circle shadow-sm"
                                                            style="width: 45px; height: 45px; object-fit: cover;">
                                                    </div>
                                                @endif
                                                <div>
                                                    <h6 class="mb-0 font-weight-bold">{{ $featured->author_name }}</h6>
                                                    <small class="text-muted"><i class="fa fa-calendar mr-1"></i>
                                                        {{ $featured->published_at->format('M d, Y') }}</small>
                                                </div>
                                            </div>
                                            <a href="{{ route('news.show', $featured->slug) }}"
                                                class="btn btn-primary mt-4 align-self-start px-4">Read Full
                                                Story</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <!-- News Grid Items -->
                        @forelse($gridNews as $item)
                            <div class="col-md-6 mb-4">
                                <div class="card border-0 shadow-sm h-100 news-card overflow-hidden glass-card">
                                    <div class="news-img-box position-relative">
                                        <img src="{{ $item->image ? (Str::startsWith($item->image, 'images/') ? asset($item->image) : asset('storage/' . $item->image)) : asset('images/blog/software-update.png') }}"
                                            alt="{{ $item->title }}" class="card-img-top">
                                        @if ($item->category)
                                            <span class="badge badge-info position-absolute m-3 px-3 py-2"
                                                style="top: 0; left: 0;">{{ $item->category }}</span>
                                        @endif
                                    </div>
                                    <div class="card-body p-4">
                                        <small class="text-muted d-block mb-2"><i class="fa fa-calendar mr-1"></i>
                                            {{ $item->published_at->format('M d, Y') }}</small>
                                        <h5 class="card-title font-weight-bold mb-3">{{ $item->title }}</h5>
                                        <p class="card-text text-muted small">{{ $item->excerpt }}</p>
                                    </div>
                                    <div class="card-footer bg-transparent border-0 p-4 pt-0">
                                        <a href="{{ route('news.show', $item->slug) }}"
                                            class="text-primary font-weight-bold small">Read More <i
                                                class="fa fa-arrow-right ml-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            @if (!$featured)
                                <div class="col-12 text-center py-5">
                                    <h4 class="text-muted">No news updates available at the moment.</h4>
                                </div>
                            @endif
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="row mt-4">
                        <div class="col-12 d-flex justify-content-center">
                            {{ $news->links() }}
                        </div>
                    </div>
                </div>

                <!-- Sidebar Column (Announcements) -->
                <div class="col-lg-3">
                    <div class="announcements-sidebar" style="top: 100px;">
                        <div class="sidebar-widget p-4 bg-white shadow-sm rounded border-0">
                            <h4 class="mb-4 font-weight-bold border-bottom pb-3 text-danger">Announcements</h4>
                            @forelse($announcements as $ann)
                                <div class="announcement-item mb-4 border-bottom pb-3 last-no-border">
                                    <small class="text-primary font-weight-bold"><i class="fa fa-bullhorn mr-1"></i>
                                        {{ $ann->published_at->format('M d, Y') }}</small>
                                    <h6 class="mt-1 font-weight-bold" style="font-size: 15px;">{{ $ann->title }}</h6>
                                    <p class="small text-muted mb-0">{{ Str::limit(strip_tags($ann->body), 100) }}</p>
                                </div>
                            @empty
                                <p class="text-muted small">No recent announcements available.</p>
                            @endforelse
                        </div>

                        <!-- Extra Card for Newsletter in Sidebar? (Optional) -->
                        <div
                            class="sidebar-widget mt-4 mb-4 p-4 bg-primary text-white shadow-sm rounded border-0 position-relative overflow-hidden">
                            <h5 class="font-weight-bold text-white mb-2">Subscribe</h5>
                            <p class="small text-white-50 mb-3">Get the latest updates directly.</p>


                            @if ($errors->any())
                                <div class="newsletter-alert error animated fadeInDown">
                                    <i class="fa fa-exclamation-circle"></i>
                                    <div>
                                        <strong>Error!</strong>
                                        @foreach ($errors->all() as $error)
                                            <p class="mb-0 small">{{ $error }}</p>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <form action="{{ route('newsletter.subscribe') }}" method="POST" class="mt-4">
                                @csrf
                                <div class="form-group mb-3">
                                    <div
                                        class="premium-input-group d-flex align-items-center bg-white rounded shadow-sm overflow-hidden">
                                        <div class="premium-icon text-primary px-3">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <input type="email" name="email"
                                            class="form-control border-0 shadow-none pl-0 premium-input"
                                            placeholder="Your Email Address" required>
                                    </div>
                                </div>
                                <button type="submit"
                                    class="btn btn-light btn-block font-weight-bold shadow-sm premium-subscribe-btn bg-danger text-white">
                                    <span class="text-white">Subscribe Now</span>
                                    <i class="fa fa-arrow-right ml-2"></i>
                                </button>
                            </form>

                            <!-- Decorative element -->
                            <div
                                style="position: absolute; bottom: -20px; right: -20px; width: 80px; height: 80px; background: rgba(255,255,255,0.05); border-radius: 50%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .object-fit-cover {
            object-fit: cover;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.7) !important;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.4) !important;
            transition: all 0.3s ease;
        }

        .news-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.1) !important;
        }

        .featured-news {
            transition: all 0.4s ease;
        }

        .featured-news:hover {
            box-shadow: 0 1.5rem 4rem rgba(0, 0, 0, 0.15) !important;
        }

        .news-img-box img {
            height: 250px;
            object-fit: cover;
            width: 100%;
            transition: transform 0.5s ease;
        }

        .news-card:hover .news-img-box img {
            transform: scale(1.05);
        }

        .pagination .page-link {
            border-radius: 50%;
            margin: 0 5px;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
            border: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            color: #fff;
        }

        .newsletter-form input:focus {
            box-shadow: none;
            border-color: #fff;
        }

        .bg_cover {
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }

        .last-no-border:last-child {
            border-bottom: none !important;
            padding-bottom: 0 !important;
            margin-bottom: 0 !important;
        }

        /* Newsletter Alert Styling */
        .newsletter-alert {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            padding: 12px 15px;
            margin-bottom: 20px;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .newsletter-alert i {
            font-size: 1.2rem;
            margin-top: 2px;
        }

        .newsletter-alert.success i {
            color: #4cd137;
        }

        .newsletter-alert.error i {
            color: #ff4757;
        }

        .newsletter-alert strong {
            display: block;
            font-size: 0.9rem;
            margin-bottom: 2px;
        }

        .placeholder-white::placeholder {
            color: rgba(255, 255, 255, 0.7) !important;
        }

        .bg-white-50:focus {
            background: rgba(255, 255, 255, 0.2) !important;
            color: white !important;
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.1) !important;
        }

        .premium-input-group {
            height: 48px;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .premium-input-group:focus-within {
            border-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .premium-input {
            height: 100%;
            background: transparent !important;
            font-size: 14px;
            color: #333 !important;
        }

        .premium-input::placeholder {
            color: #888 !important;
        }

        .premium-input:focus {
            box-shadow: none !important;
            background: transparent !important;
        }

        .premium-subscribe-btn {
            height: 48px;
            border-radius: 6px;
            color: #333;
            font-size: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            border: none;
        }

        .premium-subscribe-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2) !important;
            color: #000;
            background-color: #fff;
        }
    </style>
@endsection

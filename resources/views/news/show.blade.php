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
                            {{ $item->title }}</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent p-0 mb-0" style="font-size: 14px;">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('news.index') }}" class="text-white">News</a>
                                </li>
                                <li class="breadcrumb-item active text-white-50" aria-current="page">
                                    {{ Str::limit($item->title, 30) }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== PAGE BANNER PART END ======-->

    <!--====== NEWS SINGLE PART START ======-->
    <section id="news-single" class="pt-80 pb-80 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mt-4">
                    <div class="card border-0 shadow-lg overflow-hidden glass-card mb-5">
                        <div class="news-main-img">
                            <img src="{{ $item->image ? (Str::startsWith($item->image, 'images/') ? asset($item->image) : asset('storage/' . $item->image)) : asset('images/blog/software-update.png') }}"
                                alt="{{ $item->title }}" class="img-fluid w-100">
                        </div>
                        <div class="card-body p-5">
                            <div class="d-flex align-items-center mb-4">
                                <span class="badge badge-primary px-3 py-2 mr-3">{{ $item->category }}</span>
                                <small class="text-muted"><i class="fa fa-calendar mr-1"></i>
                                    {{ $item->published_at->format('M d, Y') }}</small>
                            </div>

                            <h2 class="font-weight-bold mb-4">{{ $item->title }}</h2>

                            <div class="news-content text-justify">
                                {!! nl2br(e($item->content)) !!}
                            </div>

                            <hr class="my-5">

                            <div class="author-box d-flex align-items-center">
                                @if ($item->author_image)
                                    <img src="{{ Str::startsWith($item->author_image, 'images/') ? asset($item->author_image) : asset('storage/' . $item->author_image) }}"
                                        alt="{{ $item->author_name }}" class="rounded-circle mr-3"
                                        style="width: 60px; height: 60px; object-fit: cover;">
                                @endif
                                <div>
                                    <h6 class="mb-0 font-weight-bold">{{ $item->author_name }}</h6>
                                    <small class="text-muted">Author</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-4">
                    <!-- Announcements Sidebar -->
                    <div class="sidebar-widget mb-5 p-4 bg-white shadow-sm rounded border-0">
                        <h4 class="mb-4 font-weight-bold border-bottom pb-3 text-danger">Announcements</h4>
                        @forelse($announcements as $ann)
                            <div class="announcement-item mb-4 border-bottom pb-3 last-no-border">
                                <small
                                    class="text-primary font-weight-bold">{{ $ann->published_at->format('M d, Y') }}</small>
                                <h6 class="mt-1 font-weight-bold">{{ $ann->title }}</h6>
                                <p class="small text-muted mb-0">{{ Str::limit(strip_tags($ann->body), 80) }}</p>
                            </div>
                        @empty
                            <p class="text-muted">No recent announcements.</p>
                        @endforelse
                    </div>

                    <!-- Recent News Widget -->
                    <div class="sidebar-widget mb-5 p-4 bg-white shadow-sm rounded border-0">
                        <h4 class="mb-4 font-weight-bold border-bottom pb-3">Recent News</h4>
                        @foreach ($recentNews as $recent)
                            <div class="recent-news-item d-flex mb-4">
                                <div class="recent-img mr-3" style="width: 80px; flex-shrink: 0;">
                                    <img src="{{ $recent->image ? (Str::startsWith($recent->image, 'images/') ? asset($recent->image) : asset('storage/' . $recent->image)) : asset('images/blog/software-update.png') }}"
                                        alt="{{ $recent->title }}" class="img-fluid rounded shadow-sm"
                                        style="height: 60px; object-fit: cover; width: 100%;">
                                </div>
                                <div class="recent-info">
                                    <h6 class="mb-1" style="font-size: 14px; line-height: 1.4;">
                                        <a href="{{ route('news.show', $recent->slug) }}"
                                            class="text-dark font-weight-bold">{{ Str::limit($recent->title, 45) }}</a>
                                    </h6>
                                    <small class="text-muted"><i class="fa fa-calendar mr-1"></i>
                                        {{ $recent->published_at->format('M d, Y') }}</small>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== NEWS SINGLE PART END ======-->

    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.7) !important;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.4) !important;
        }

        .news-content {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #444;
        }

        .last-no-border:last-child {
            border-bottom: none !important;
            padding-bottom: 0 !important;
            margin-bottom: 0 !important;
        }
    </style>
@endsection

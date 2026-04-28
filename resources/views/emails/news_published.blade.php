<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Article Published</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        .header-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        .content {
            padding: 40px 30px;
            color: #444444;
            line-height: 1.6;
        }
        .category {
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 700;
            color: #0d6efd;
            margin-bottom: 10px;
            display: block;
        }
        .content h2 {
            margin: 0 0 20px 0;
            font-size: 24px;
            font-weight: 700;
            color: #1a1a1a;
            line-height: 1.3;
        }
        .excerpt {
            font-size: 16px;
            color: #666666;
            margin-bottom: 30px;
        }
        .button-container {
            text-align: center;
            margin: 30px 0;
        }
        .button {
            display: inline-block;
            padding: 14px 30px;
            background-color: #dc3545;
            color: #ffffff;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 16px;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            font-size: 13px;
            color: #888888;
            border-top: 1px solid #eeeeee;
        }
        .unsubscribe-link {
            color: #0d6efd;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        @if($news->image)
            <img src="{{ url('storage/' . $news->image) }}" alt="{{ $news->title }}" class="header-image">
        @endif
        <div class="content">
            @if($news->category)
                <span class="category">{{ $news->category }}</span>
            @endif
            <h2>{{ $news->title }}</h2>
            <p class="excerpt">{{ $news->excerpt ?? Str::limit(strip_tags($news->content), 150) }}</p>
            
            <div class="button-container">
                <a href="{{ route('news.show', $news->slug) }}" class="button" style="color: white !important;">Read Full Article</a>
            </div>
            
            <p>Stay informed with the latest updates from SkyLink Solutions.</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} SkyLink Solutions. All rights reserved.<br>
            You are receiving this because you subscribed to our newsletter.<br>
            <a href="{{ route('newsletter.unsubscribe', ['token' => $subscriber->unsubscribe_token]) }}" class="unsubscribe-link">Unsubscribe</a>
        </div>
    </div>
</body>
</html>

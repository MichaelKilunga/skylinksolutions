<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Announcement</title>
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
            border-top: 5px solid #dc3545;
        }
        .content {
            padding: 40px 30px;
            color: #444444;
            line-height: 1.6;
        }
        .announcement-icon {
            text-align: center;
            font-size: 48px;
            margin-bottom: 20px;
        }
        .content h2 {
            margin: 0 0 20px 0;
            font-size: 24px;
            font-weight: 700;
            color: #1a1a1a;
            text-align: center;
        }
        .body-text {
            font-size: 16px;
            color: #444444;
            margin-bottom: 30px;
            white-space: pre-line;
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
        <div class="content">
            <div class="announcement-icon">📢</div>
            <h2>{{ $announcement->title }}</h2>
            <div class="body-text">
                {{ $announcement->body }}
            </div>
            
            <p style="text-align: center; color: #888;">Published on {{ $announcement->published_at->format('M d, Y') }}</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} SkyLink Solutions. All rights reserved.<br>
            You are receiving this because you subscribed to our newsletter.<br>
            <a href="{{ route('newsletter.unsubscribe', ['token' => $subscriber->unsubscribe_token]) }}" class="unsubscribe-link">Unsubscribe</a>
        </div>
    </div>
</body>
</html>

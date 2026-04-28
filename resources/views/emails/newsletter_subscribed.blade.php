<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Subscribing</title>
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
        .header {
            background: linear-gradient(135deg, #0d6efd 0%, #0042a5 100%);
            padding: 40px 20px;
            text-align: center;
            color: #ffffff;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }
        .content {
            padding: 40px 30px;
            color: #444444;
            line-height: 1.6;
        }
        .content p {
            font-size: 16px;
            margin-bottom: 20px;
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
            transition: transform 0.2s;
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
        .unsubscribe-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>SkyLink Solutions</h1>
        </div>
        <div class="content">
            <p>Hello,</p>
            <p><strong>Thank you for subscribing!</strong> You will receive news and updates from us directly in your inbox.</p>
            <p>We are excited to have you with us as we share the latest in technology, system updates, and insights from SkyLink Solutions.</p>
            
            <div class="button-container">
                <a href="{{ url('/news') }}" class="button" style="color: white !important;">Visit Our Newsroom</a>
            </div>
            
            <p>Best regards,<br>The SkyLink Solutions Team</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} SkyLink Solutions. All rights reserved.<br>
            If you wish to stop receiving these emails, you can 
            <a href="{{ route('newsletter.unsubscribe', ['token' => $subscriber->unsubscribe_token]) }}" class="unsubscribe-link">unsubscribe here</a>.
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Inter', sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; border-radius: 10px; }
        .header { text-align: center; margin-bottom: 30px; }
        .code { font-size: 32px; font-weight: 800; letter-spacing: 5px; color: #3b82f6; text-align: center; margin: 20px 0; padding: 15px; background: #f8fafc; border-radius: 8px; border: 1px dashed #3b82f6; }
        .footer { font-size: 12px; color: #777; text-align: center; margin-top: 30px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>SkyLink Solutions</h2>
            <p>Admin Password Reset Request</p>
        </div>
        <p>Hello,</p>
        <p>We received a request to reset your admin password. Use the code below to complete the process:</p>
        
        <div class="code">
            {{ $code }}
        </div>
        
        <p>This code will expire in 30 minutes.</p>
        <p>If you did not request a password reset, please ignore this email.</p>
        
        <div class="footer">
            &copy; {{ date('Y') }} SkyLink Solutions. All rights reserved.
        </div>
    </div>
</body>
</html>

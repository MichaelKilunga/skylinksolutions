<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — SkyLink Solutions</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            background: #080c18;
            display: flex; align-items: center; justify-content: center;
            overflow: hidden; position: relative;
        }

        /* Animated background */
        .bg-orbs { position: fixed; inset: 0; z-index: 0; pointer-events: none; }
        .orb {
            position: absolute; border-radius: 50%; filter: blur(80px); opacity: 0.35;
            animation: float 8s ease-in-out infinite;
        }
        .orb-1 { width: 500px; height: 500px; background: radial-gradient(circle, #3b82f6, transparent); top: -150px; left: -150px; animation-delay: 0s; }
        .orb-2 { width: 400px; height: 400px; background: radial-gradient(circle, #06b6d4, transparent); bottom: -100px; right: -100px; animation-delay: 3s; }
        .orb-3 { width: 300px; height: 300px; background: radial-gradient(circle, #8b5cf6, transparent); top: 50%; left: 60%; animation-delay: 6s; }
        @keyframes float { 0%,100%{transform:translate(0,0) scale(1);}50%{transform:translate(30px,-30px) scale(1.05);} }

        /* Grid pattern */
        .bg-grid {
            position: fixed; inset: 0; z-index: 0;
            background-image: linear-gradient(rgba(59,130,246,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.04) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        /* Card */
        .login-wrapper { position: relative; z-index: 10; width: 100%; max-width: 440px; padding: 20px; }
        .login-card {
            background: rgba(255,255,255,0.04);
            backdrop-filter: blur(24px);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 20px;
            padding: 48px 40px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.5), 0 0 0 1px rgba(255,255,255,0.04);
        }

        .login-logo {
            display: flex; align-items: center; gap: 14px; margin-bottom: 36px;
        }
        .login-logo .logo-icon {
            width: 52px; height: 52px;
            background: linear-gradient(135deg, #3b82f6, #06b6d4);
            border-radius: 14px; display: flex; align-items: center; justify-content: center;
            font-size: 22px; font-weight: 800; color: #fff;
            box-shadow: 0 8px 20px rgba(59,130,246,0.4);
        }
        .login-logo .logo-text strong { display: block; font-size: 18px; font-weight: 800; color: #fff; }
        .login-logo .logo-text span   { font-size: 12px; color: #94a3b8; }

        .login-heading h2 { font-size: 26px; font-weight: 800; color: #fff; margin-bottom: 6px; }
        .login-heading p  { font-size: 14px; color: #94a3b8; margin-bottom: 32px; }

        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-size: 13px; font-weight: 600; color: #cbd5e1; margin-bottom: 8px; }
        .input-wrapper { position: relative; }
        .input-wrapper .input-icon {
            position: absolute; left: 14px; top: 50%; transform: translateY(-50%);
            color: #475569; font-size: 15px; pointer-events: none;
        }
        .form-input {
            width: 100%; padding: 13px 16px 13px 42px;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 10px; color: #e2e8f0; font-size: 14px; font-family: 'Inter', sans-serif;
            transition: all 0.2s; outline: none;
        }
        .form-input:focus { border-color: #3b82f6; background: rgba(59,130,246,0.08); box-shadow: 0 0 0 3px rgba(59,130,246,0.15); }
        .form-input::placeholder { color: #475569; }

        .form-error { font-size: 12px; color: #f87171; margin-top: 6px; display: flex; align-items: center; gap: 4px; }

        .error-box { background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.3); border-radius: 10px; padding: 12px 16px; margin-bottom: 20px; font-size: 13px; color: #fca5a5; display: flex; align-items: center; gap: 10px; }

        .remember-row { display: flex; align-items: center; gap: 10px; margin-bottom: 24px; }
        .remember-row input[type="checkbox"] { width: 16px; height: 16px; accent-color: #3b82f6; cursor: pointer; }
        .remember-row label { font-size: 13px; color: #94a3b8; cursor: pointer; }

        .btn-login {
            width: 100%; padding: 14px;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            border: none; border-radius: 10px; color: #fff;
            font-size: 15px; font-weight: 700; font-family: 'Inter', sans-serif;
            cursor: pointer; transition: all 0.25s;
            box-shadow: 0 4px 15px rgba(59,130,246,0.4);
            letter-spacing: 0.3px;
        }
        .btn-login:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(59,130,246,0.5); background: linear-gradient(135deg, #60a5fa, #3b82f6); }
        .btn-login:active { transform: translateY(0); }

        .login-footer { text-align: center; margin-top: 28px; font-size: 12px; color: #475569; }
        .login-footer a { color: #94a3b8; text-decoration: none; }
        .login-footer a:hover { color: #fff; }
    </style>
</head>
<body>
    <div class="bg-orbs">
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        <div class="orb orb-3"></div>
    </div>
    <div class="bg-grid"></div>

    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-logo">
                <div class="logo-icon">SL</div>
                <div class="logo-text">
                    <strong>SkyLink Solutions</strong>
                    <span>Admin Panel</span>
                </div>
            </div>

            <div class="login-heading">
                <h2>Welcome back</h2>
                <p>Sign in to access the admin dashboard</p>
            </div>

            @if($errors->any())
                <div class="error-box">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.post') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-wrapper">
                        <span class="input-icon"><i class="fas fa-envelope"></i></span>
                        <input type="email" id="email" name="email" class="form-input"
                               placeholder="info@skylinksolutions.co.tz"
                               value="{{ old('email') }}" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <span class="input-icon"><i class="fas fa-lock"></i></span>
                        <input type="password" id="password" name="password" class="form-input"
                               placeholder="••••••••" required>
                    </div>
                </div>

                <div class="remember-row">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Keep me signed in</label>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt" style="margin-right:8px;"></i>Sign In to Admin Panel
                </button>
            </form>

            <div class="login-footer">
                <a href="{{ url('/') }}"><i class="fas fa-arrow-left" style="margin-right:4px;"></i>Back to website</a>
            </div>
        </div>
    </div>
</body>
</html>

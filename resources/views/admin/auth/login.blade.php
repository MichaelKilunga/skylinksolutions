<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — {{ $company_setting->company_name ?? 'SkyLink Solutions' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            background: #f0f4f8;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        /* Subtle background pattern */
        .bg-pattern {
            position: fixed;
            inset: 0;
            z-index: 0;
            background-image:
                radial-gradient(circle at 20% 50%, rgba(0, 123, 255, 0.06) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(0, 123, 255, 0.04) 0%, transparent 50%),
                radial-gradient(circle at 60% 80%, rgba(0, 123, 255, 0.03) 0%, transparent 50%);
            pointer-events: none;
        }

        /* Main container */
        .login-container {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 500px;
            padding: 20px;
            display: flex;
            justify-content: center;
        }

        /* Login panel */
        .login-panel {
            width: 100%;
            background: #fff;
            padding: 48px 44px;
            border-radius: 16px;
            border-top: 4px solid #007bff;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            display: flex;
            flex-direction: column;
        }

        .panel-logo {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            margin-bottom: 32px;
        }

        .panel-logo img {
            height: 52px;
            object-fit: contain;
        }

        .panel-logo .logo-icon {
            width: 52px;
            height: 52px;
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: 800;
            color: #fff;
            box-shadow: 0 8px 20px rgba(0, 123, 255, 0.3);
        }

        .panel-logo .logo-text {
            font-size: 18px;
            font-weight: 800;
            color: #1a1a2e;
        }

        .login-heading {
            text-align: center;
            margin-bottom: 32px;
        }

        .login-heading h2 {
            font-size: 24px;
            font-weight: 800;
            color: #1a1a2e;
            margin-bottom: 8px;
        }

        .login-heading p {
            font-size: 14px;
            color: #6c757d;
            line-height: 1.5;
        }

        /* Form styles */
        .form-group {
            margin-bottom: 24px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: #333;
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #adb5bd;
            font-size: 14px;
            pointer-events: none;
            transition: color 0.2s;
        }

        .form-input {
            width: 100%;
            padding: 14px 16px 14px 44px;
            background: #f8f9fa;
            border: 1px solid transparent;
            border-radius: 8px;
            color: #333;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            transition: all 0.25s ease;
            outline: none;
        }

        .form-input:focus {
            border-color: #007bff;
            background: #fff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .form-input:focus+.input-icon,
        .form-input:focus~.input-icon {
            color: #007bff;
        }

        .form-input::placeholder {
            color: #adb5bd;
        }

        /* Error styles */
        .error-box {
            background: #fff5f5;
            border: 1px solid #fed7d7;
            border-left: 3px solid #e53e3e;
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 24px;
            font-size: 13px;
            color: #c53030;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .error-box i {
            color: #e53e3e;
            font-size: 15px;
        }

        /* Remember row */
        .remember-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 26px;
        }

        .remember-col {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .remember-row input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: #007bff;
            cursor: pointer;
        }

        .remember-row label {
            font-size: 13px;
            color: #6c757d;
            cursor: pointer;
            font-weight: 500;
        }

        .forgot-link {
            font-size: 13px;
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }

        .forgot-link:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        /* Submit button */
        .btn-login {
            width: 100%;
            padding: 14px;
            background: #007bff;
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 15px;
            font-weight: 700;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 14px rgba(0, 123, 255, 0.3);
            letter-spacing: 0.3px;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(0, 123, 255, 0.4);
            background: #0069d9;
        }

        .btn-login:active {
            transform: translateY(0);
            box-shadow: 0 4px 14px rgba(0, 123, 255, 0.3);
        }

        /* Footer */
        .login-footer {
            text-align: center;
            margin-top: 28px;
            font-size: 14px;
            color: #6c757d;
        }

        .login-footer a {
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }

        .login-footer a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .login-container {
                padding: 12px;
            }

            .login-panel {
                padding: 36px 24px;
            }
        }
    </style>
</head>

<body>
    <div class="bg-pattern"></div>

    <div class="login-container">
        <!-- Single Login Panel -->
        <div class="login-panel">
            <div class="panel-logo">
                @if ($company_setting && $company_setting->logo)
                    <img src="{{ asset('storage/' . $company_setting->logo) }}"
                        alt="{{ $company_setting->company_name ?? 'Logo' }}">
                @else
                    <div class="logo-icon">SL</div>
                @endif
                <div class="logo-text">{{ $company_setting->company_name ?? 'SkyLink Solutions' }}</div>
            </div>

            <div class="login-heading">
                {{-- <h2>Welcome back</h2> --}}
                <p>Sign in to access the admin dashboard</p>
            </div>

            @if ($errors->any())
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
                        <input type="email" id="email" name="email" class="form-input"
                            placeholder="info@skylinksolutions.co.tz" value="{{ old('email') }}" required autofocus
                            style="padding-left: 44px;">
                        <span class="input-icon"><i class="fas fa-envelope"></i></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <input type="password" id="password" name="password" class="form-input" placeholder="••••••••"
                            required style="padding-left: 44px;">
                        <span class="input-icon"><i class="fas fa-lock"></i></span>
                    </div>
                </div>

                <div class="remember-row">
                    <div class="remember-col">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Keep me signed in</label>
                    </div>
                    @if (Route::has('admin.password.request'))
                        <a href="{{ route('admin.password.request') }}" class="forgot-link">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt" style="margin-right:8px;"></i>Sign In
                </button>
            </form>

            <div class="login-footer">
                <a href="{{ url('/') }}"><i class="fas fa-arrow-left" style="margin-right:4px;"></i> Back to
                    website</a>
            </div>
        </div>
    </div>
</body>

</html>

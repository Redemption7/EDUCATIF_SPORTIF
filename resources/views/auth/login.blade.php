<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - NK EDUCATIF SPORTIF</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-orange: #FF7A59;
            --primary-green: #1D5944;
            --accent-yellow: #FFD93D;
            --dark-navy: #0F1419;
            --light-gray: #F5F7FA;
            --text-dark: #0f1419;
            --text-light: #6b7280;
            --border-light: #e5e7eb;
            --bg-light: #fafbfc;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-orange) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            position: relative;
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: -30px;
            right: -30px;
            width: 60px;
            height: 60px;
            background: var(--primary-orange);
            border-radius: 50%;
            z-index: 0;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
        }

        .login-card {
            background: white;
            border: 1px solid var(--border-light);
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
            padding: 40px;
            animation: fadeIn 0.6s ease-out;
            position: relative;
            z-index: 1;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-header {
            text-align: center;
            margin-bottom: 32px;
            position: relative;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: 700;
            color: var(--primary-green);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .logo img {
            height: 40px;
        }

        .subtitle {
            color: var(--text-light);
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: 500;
            margin-bottom: 8px;
            font-size: 13px;
            color: var(--text-dark);
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid var(--border-light);
            border-radius: 6px;
            font-size: 14px;
            font-family: inherit;
            transition: all 0.2s ease;
            color: var(--text-dark);
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: var(--primary-green);
            box-shadow: 0 0 0 2px rgba(29, 89, 68, 0.05);
        }

        .form-group.remember {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
        }

        input[type="checkbox"] {
            width: 16px;
            height: 16px;
            cursor: pointer;
            accent-color: var(--primary-green);
        }

        .remember label {
            margin: 0;
            font-size: 13px;
            text-transform: none;
            letter-spacing: normal;
            cursor: pointer;
            font-weight: 400;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background: var(--primary-green);
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s ease;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .btn-login:hover {
            background: #164033;
            box-shadow: 0 4px 12px rgba(29, 89, 68, 0.2);
        }

        .btn-login:active {
            transform: translateY(1px);
        }

        .error-message {
            background: #fee2e2;
            color: #dc2626;
            padding: 12px 14px;
            border-radius: 6px;
            font-size: 13px;
            margin-bottom: 20px;
            border: 1px solid #fecaca;
        }

        .success-message {
            background: #d1fae5;
            color: #047857;
            padding: 12px 14px;
            border-radius: 6px;
            font-size: 13px;
            margin-bottom: 20px;
            border: 1px solid #a7f3d0;
        }

        .footer-link {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
        }

        .footer-link a {
            color: var(--primary-green);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .footer-link a:hover {
            color: #164033;
            text-decoration: underline;
        }

        .divider {
            text-align: center;
            margin: 24px 0;
            font-size: 12px;
            color: var(--text-light);
        }

        .demo-credentials {
            background: var(--bg-light);
            border: 1px dashed var(--border-light);
            border-radius: 6px;
            padding: 12px 14px;
            font-size: 12px;
            color: var(--text-light);
            line-height: 1.6;
        }

        .demo-credentials strong {
            color: var(--text-dark);
            display: block;
            margin-bottom: 4px;
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 32px 20px;
            }

            .logo {
                font-size: 24px;
            }

            .login-header {
                margin-bottom: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="NKES logo" />
                NK EDUCATIF SPORTIF
            </div>
                <div class="subtitle">Admin Portal</div>
            </div>

            @if ($errors->any())
                <div class="error-message">
                    {{ $errors->first() }}
                </div>
            @endif

            @if (session('status'))
                <div class="success-message">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}"
                        required 
                        autofocus
                        placeholder="nkes.academy@nkes-sports.org"
                    >
                    @error('email')
                        <span style="color: #dc2626; font-size: 12px; margin-top: 4px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required
                        placeholder="••••••••"
                    >
                    @error('password')
                        <span style="color: #dc2626; font-size: 12px; margin-top: 4px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group remember">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Remember me</label>
                </div>

                <button type="submit" class="btn-login">Login</button>
            </form>

            <div class="footer-link">
                <a href="{{ route('home') }}">&larr; Back to Home</a>
            </div>
        </div>
    </div>
</body>
</html>

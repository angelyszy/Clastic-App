<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Clastic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #f0f9f7 0%, #e8f7f4 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            padding: 20px;
        }

        .app-container {
            width: 100%;
            max-width: 440px;
            background: white;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(45, 122, 110, 0.15);
            overflow: hidden;
        }

        .form-wrapper {
            padding: 2.5rem 2rem;
        }

        .logo-section {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .logo-text {
            font-size: 2.5rem;
            font-weight: 700;
            letter-spacing: 0.15em;
            margin-bottom: 0.5rem;
            color: #2d7a6e;
        }

        .logo-text .bottle-icon {
            display: inline-block;
            width: 30px;
            height: 40px;
            background: linear-gradient(135deg, #5eb3a6 0%, #4a9d8f 100%);
            border-radius: 8px 8px 12px 12px;
            position: relative;
            vertical-align: middle;
            margin: 0 0.1em;
        }

        .logo-text .bottle-icon::before {
            content: '';
            position: absolute;
            top: -6px;
            left: 50%;
            transform: translateX(-50%);
            width: 12px;
            height: 8px;
            background: #5eb3a6;
            border-radius: 2px 2px 0 0;
        }

        .tagline {
            color: #4a5568;
            font-size: 1rem;
            font-weight: 500;
        }

        .google-btn {
            width: 100%;
            background: white;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 0.875rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            font-weight: 500;
            color: #4a5568;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 2rem;
            text-decoration: none;
        }

        .google-btn:hover {
            background: #f7fafc;
            border-color: #cbd5e0;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .google-icon {
            width: 20px;
            height: 20px;
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 2rem 0;
            color: #718096;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e2e8f0;
        }

        .divider span {
            padding: 0 1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-label {
            position: absolute;
            top: -8px;
            left: 12px;
            background: white;
            padding: 0 8px;
            font-size: 0.875rem;
            color: #5eb3a6;
            font-weight: 500;
            z-index: 1;
        }

        .form-control {
            border: 2px solid #5eb3a6;
            border-radius: 8px;
            padding: 1rem 1.25rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
            width: 100%;
        }

        .form-control:focus {
            border-color: #4a9d8f;
            box-shadow: 0 0 0 3px rgba(94, 179, 166, 0.1);
            outline: none;
            background: white;
        }

        .form-control::placeholder {
            color: transparent;
        }

        .btn-register {
            background: #5eb3a6;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 1rem 1.5rem;
            font-weight: 600;
            font-size: 1rem;
            width: 100%;
            transition: all 0.3s ease;
            margin-top: 1.5rem;
            cursor: pointer;
        }

        .btn-register:hover {
            background: #4a9d8f;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(94, 179, 166, 0.3);
        }

        .btn-register:active {
            transform: translateY(0);
        }

        .login-link {
            text-align: center;
            margin-top: 2rem;
            color: #2d3748;
            font-size: 1rem;
        }

        .login-link a {
            color: #5eb3a6;
            font-weight: 600;
            text-decoration: underline;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
            color: #4a9d8f;
        }

        .alert {
            border-radius: 12px;
            border: none;
            margin-bottom: 1.5rem;
            padding: 1rem 1.25rem;
            font-size: 0.95rem;
        }

        .alert-danger {
            background-color: #fed7d7;
            color: #742a2a;
        }

        .invalid-feedback {
            display: block;
            font-size: 0.875rem;
            color: #e53e3e;
            margin-top: 0.25rem;
        }

        .is-invalid {
            border-color: #e53e3e;
        }

        @media (max-width: 576px) {
            .logo-text {
                font-size: 2rem;
            }

            .logo-section {
                margin-bottom: 2rem;
            }

            .app-container {
                border-radius: 20px;
            }

            .form-wrapper {
                padding: 2rem 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="app-container">
        <div class="form-wrapper">
            <!-- Logo Section -->
            <div class="logo-section">
                <div class="logo-text">
                    CLAST<span class="bottle-icon"></span>C
                </div>
                <div class="tagline">Classify Your Plastic</div>
            </div>

            <!-- Error Alert -->
            <div class="alert alert-danger" style="display: none;">
                <strong>Oops!</strong> Please check your information and try again.
            </div>

            <!-- Google Sign In -->
            <a href="#" class="google-btn">
                <svg class="google-icon" viewBox="0 0 24 24">
                    <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                    <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                    <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                    <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                </svg>
                Sign in with Google
            </a>

            <!-- Divider -->
            <div class="divider">
                <span>OR</span>
            </div>

            <!-- Register Form -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label class="form-label">Name</label>
                    <input 
                        type="text" 
                        class="form-control @error('name') is-invalid @enderror" 
                        name="name" 
                        value="{{ old('name') }}" 
                        required 
                        autofocus
                    >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input 
                        type="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required
                    >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input 
                        type="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        name="password" 
                        required
                    >
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Confirm Password</label>
                    <input 
                        type="password" 
                        class="form-control" 
                        name="password_confirmation" 
                        required
                    >
                </div>

                <button type="submit" class="btn-register">
                    Sign Up
                </button>
            </form>

            <!-- Login Link -->
            <div class="login-link">
                Already have an account?<br>
                <a href="{{ route('login') }}">Login to your account!</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Your Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        .auth-card {
            background: #ffffff;
            padding: 40px;
            border-radius: 24px;
            border: 1px solid #f0f0f0;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.06);
        }
        .form-label { font-weight: 600; margin-bottom: 8px; }
        .custom-input {
            border-radius: 12px;
            padding: 12px;
            border: 1px solid #eee;
            background: #fdfdfd;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 70vh;">
            <div class="col-md-5">
                <div class="auth-card">
                    <div class="text-center mb-4">
                        <a href="/" class="navbar-brand text-dark text-decoration-none">
                            LOGO<span style="color: var(--primary)">.</span>
                        </a>
                        <h4 class="fw-bold mt-3">Welcome Back</h4>
                        <p class="text-muted">Enter your credentials to access your account</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control custom-input" placeholder="name@example.com" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control custom-input" placeholder="••••••••" required>
                        </div>

                        <div class="d-flex justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label small" for="remember">Remember me</label>
                            </div>
                            <a href="{{ route('password.request') }}" class="footer-link small text-decoration-none">Forgot Password?</a>
                        </div>

                        <button type="submit" class="btn btn-search w-100">Sign In</button>

                        <div class="text-center mt-4">
                            <p class="small">Don't have an account? 
                                <a href="{{ route('register') }}" class="footer-link fw-bold text-decoration-none">Create Account</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
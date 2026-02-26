<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ClickFix — Login</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #f39c12;
            --primary-hover: #d68910;
            --bg-light: #fdfcfb;
            --text-main: #2d3436;
            --text-muted: #636e72;
            --border-color: #dfe6e9;
        }

        body {
            background-color: var(--bg-light);
            font-family: 'Segoe UI', Roboto, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
        }

        .login-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 420px;
            padding: 2.5rem;
            border: 1px solid var(--border-color);
        }

        .brand-logo {
            text-align: center;
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 0.25rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-header h1 {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-main);
        }

        .form-group label {
            font-weight: 600;
            font-size: 0.85rem;
            color: var(--text-main);
            margin-bottom: 0.4rem;
        }

        .form-control {
            height: 46px;
            border-radius: 6px;
            border: 1px solid var(--border-color);
            font-size: 0.95rem;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(243, 156, 18, 0.15);
            z-index: 2;
        }

        /* Input Group Adjustments for Eye Icon */
        .input-group-text {
            background-color: #fff;
            border-left: none;
            color: var(--text-muted);
            cursor: pointer;
            border-radius: 0 6px 6px 0 !important;
        }

        .password-input {
            border-right: none;
        }

        .btn-clickfix {
            background-color: var(--primary);
            border: none;
            color: white;
            height: 48px;
            font-weight: 700;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .btn-clickfix:hover {
            background-color: var(--primary-hover);
            color: white;
            transform: translateY(-1px);
        }

        .footer-links {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.9rem;
        }

        .footer-links a {
            color: var(--primary);
            font-weight: 700;
            text-decoration: none;
        }

        .invalid-feedback {
            font-size: 0.8rem;
            font-weight: 500;
        }
    </style>
</head>

<body>

    <div class="login-card">
        <div class="brand-logo">ClickFix</div>
        
        <div class="form-header">
            <h1>Welcome Back</h1>
            <p class="text-muted small">Enter your credentials to login</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" type="email" name="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    value="{{ old('email') }}" placeholder="name@example.com" required autofocus>
                
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <div class="d-flex justify-content-between">
                    <label for="password">Password</label>
                    @if (Route::has('password.request'))
                        <a class="small font-weight-bold" href="{{ route('password.request') }}" style="color: var(--primary)">
                            Forgot Password?
                        </a>
                    @endif
                </div>
                <div class="input-group">
                    <input id="password" type="password" name="password" 
                        class="form-control password-input @error('password') is-invalid @enderror" 
                        placeholder="Enter password" required>
                    <div class="input-group-append">
                        <span class="input-group-text" id="toggleLoginPwd">
                            <i class="fa fa-eye"></i>
                        </span>
                    </div>
                </div>

                @error('password')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label small text-muted" for="remember">Remember me</label>
                </div>
            </div>

            <button type="submit" class="btn btn-clickfix btn-block shadow-sm">
                Login
            </button>

            <div class="footer-links">
                <span class="text-muted">New to ClickFix?</span> 
                <a href="{{ route('register') }}">Create Account</a>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('toggleLoginPwd').onclick = function() {
            const pwdInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (pwdInput.type === 'password') {
                pwdInput.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                pwdInput.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        };
    </script>
</body>
</html>
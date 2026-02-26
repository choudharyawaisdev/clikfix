<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ClickFix — Register</title>

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

        .register-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 450px;
            padding: 2.5rem;
            border: 1px solid var(--border-color);
        }

        .brand-logo {
            text-align: center;
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 0.25rem;
            text-transform: uppercase;
        }

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
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
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(243, 156, 18, 0.15);
        }

        /* Eye Icon Style */
        .input-group-text {
            background-color: #fff;
            border-left: none;
            cursor: pointer;
            color: var(--text-muted);
        }

        .btn-clickfix {
            background-color: var(--primary);
            border: none;
            color: white;
            height: 48px;
            font-weight: 700;
            border-radius: 6px;
            margin-top: 1rem;
        }

        .btn-clickfix:hover {
            background-color: var(--primary-hover);
            color: white;
        }

        .invalid-feedback {
            display: block; /* Ensure Laravel errors show up */
            font-weight: 500;
        }
    </style>
</head>

<body>

    <div class="register-card">
        <div class="brand-logo">ClickFix</div>
        
        <div class="form-header">
            <h1 class="h5 font-weight-bold">Create Account</h1>
            <p class="text-muted small">Join our home service marketplace</p>
        </div>

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter your name" required autofocus>
                @error('name')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="form-group">
                <label>Phone Number</label>
                <input type="tel" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" placeholder="Enter phone number" required>
                @error('phone_number')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="email@example.com" required>
                @error('email')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="form-group">
                <label>Password</label>
                <div class="input-group">
                    <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" style="border-right:none" placeholder="Create password" required>
                    <div class="input-group-append">
                        <span class="input-group-text" id="togglePwd">
                            <i class="fa fa-eye"></i>
                        </span>
                    </div>
                </div>
                @error('password')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="form-group">
                <label>Confirm Password</label>
                <div class="input-group">
                    <input id="passwordConfirm" type="password" name="password_confirmation" class="form-control" style="border-right:none" placeholder="Confirm password" required>
                    <div class="input-group-append">
                        <span class="input-group-text" id="togglePwd2">
                            <i class="fa fa-eye"></i>
                        </span>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-clickfix btn-block shadow-sm">Register Now</button>

            <div class="text-center mt-4">
                <span class="text-muted small">Already have an account?</span> 
                <a href="{{ route('login') }}" class="small font-weight-bold" style="color: var(--primary)">Sign In</a>
            </div>
        </form>
    </div>

    <script>
        // Eye Toggle Functionality
        function setupToggle(buttonId, inputId) {
            document.getElementById(buttonId).addEventListener('click', function() {
                const input = document.getElementById(inputId);
                const icon = this.querySelector('i');
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.replace('fa-eye', 'fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.replace('fa-eye-slash', 'fa-eye');
                }
            });
        }

        setupToggle('togglePwd', 'password');
        setupToggle('togglePwd2', 'passwordConfirm');
    </script>
</body>
</html>
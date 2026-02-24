<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ashfaq Sentry Store | Login</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Custom Style -->
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .card-header {
            background: #fff;
            border-bottom: none;
            text-align: center;
            padding-bottom: 0;
        }

        .card-header img {
            height: 60px;
        }

        .card-body {
            padding: 2rem;
        }

        .form-control {
            border-radius: 0.25rem;
        }

        .btn-primary {
            border-radius: 0.25rem;
        }

        .text-danger {
            font-size: 0.9rem;
        }

        .welcome {
            font-weight: bold;
            font-size: 28px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="col-md-5 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <img src="{{ asset('assets/images/Logo Devta Soft.png') }}" alt="Logo">
                    <h6 class="welcome">Welcome Back</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input 
                                type="email" 
                                class="form-control" 
                                id="email" 
                                name="email" 
                                placeholder="Enter your email" 
                                value="{{ old('email') }}" 
                                required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="password">Password</label>
                            <input 
                                type="password" 
                                class="form-control" 
                                id="password" 
                                name="password" 
                                placeholder="Enter your password" 
                                required>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        @if (session('error'))
                            <div class="form-group">
                                <span class="text-danger">{{ session('error') }}</span>
                            </div>
                        @endif

                        <div class="form-group text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

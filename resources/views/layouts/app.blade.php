<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark" data-toggled="close">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title> @yield('title')</title>
    @include('includes.style')
</head>

<body>
    <div class="page">
        @include('includes.header')
        @yield('body')

        <footer class="pt-5 pb-4" style="background-color: #0f172a; color: #94a3b8;">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-4 col-md-12">
                        <h4 class="fw-bold text-white mb-4">SERVICE<span class="text-warning">PRO</span></h4>
                        <p class="pe-lg-5">Pakistan's most trusted marketplace for verified home services. We connect
                            skilled professionals with households, ensuring quality and reliability in every task.</p>
                        <div class="d-flex mt-4">
                            <a href="#" class="me-3 text-white social-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="me-3 text-white social-icon"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="me-3 text-white social-icon"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="me-3 text-white social-icon"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-6">
                        <h6 class="text-white fw-bold mb-4">Quick Links</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#" class="text-decoration-none footer-link">Browse Services</a>
                            </li>
                            <li class="mb-2"><a href="#" class="text-decoration-none footer-link">Register as Worker</a>
                            </li>
                            <li class="mb-2"><a href="#" class="text-decoration-none footer-link">Credit Pricing</a>
                            </li>
                            <li class="mb-2"><a href="#" class="text-decoration-none footer-link">Safety Rules</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-6">
                        <h6 class="text-white fw-bold mb-4">Contact & Support</h6>
                        <ul class="list-unstyled">
                            <li class="mb-3 d-flex align-items-center">
                                <i class="fas fa-envelope text-warning me-2"></i> support@servicepro.pk
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class="fas fa-phone-alt text-warning me-2"></i> +92 300 1234567
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class="fas fa-map-marker-alt text-warning me-2"></i> Faisalabad, Punjab, Pakistan
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-12 text-center text-lg-start">
                        <h6 class="text-white fw-bold mb-4">Stay Updated</h6>
                        <div class="input-group mb-4 custom-newsletter">
                            <input type="email" class="form-control border-0 shadow-none bg-dark text-white"
                                placeholder="Enter your email" style="border-radius: 12px 0 0 12px;">
                            <button class="btn btn-warning" style="border-radius: 0 12px 12px 0;"><i
                                    class="fas fa-paper-plane"></i></button>
                        </div>
                        <div class="d-flex justify-content-center justify-content-lg-start mt-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg"
                                alt="Play Store" height="35" class="me-2">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/3/3c/Download_on_the_App_Store_Badge.svg"
                                alt="App Store" height="35">
                        </div>
                    </div>
                </div>

                <hr class="my-5 border-secondary opacity-25">

                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <small>&copy; 2026 ServicePro Marketplace. Developed with <i
                                class="fas fa-heart text-danger"></i>
                            in Pakistan.</small>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <a href="#" class="text-muted text-decoration-none small me-3">Terms of Use</a>
                        <a href="#" class="text-muted text-decoration-none small">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    @include('includes.script')
</body>

</html>
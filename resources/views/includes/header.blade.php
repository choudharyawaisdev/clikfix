<style>
    /* Professional Refinements */
    .navbar {
        padding: 0.75rem 0;
        transition: all 0.3s ease;
    }

    .navbar-brand {
        font-size: 1.5rem;
        letter-spacing: -0.5px;
    }

    /* Professional Dropdown Styling */
    .dropdown-menu {
        border-radius: 12px;
        /* Smoother, modern radius */
        padding: 0.5rem;
        min-width: 210px;
        transform: translateY(10px);
        transition: all 0.2s ease;
    }

    .dropdown-item {
        border-radius: 8px;
        /* Rounded items inside the menu */
        padding: 0.6rem 1rem;
        font-size: 0.9rem;
        font-weight: 500;
        color: #4b5563;
        transition: background 0.2s;
    }

    .dropdown-item:hover {
        background-color: #fef6e7;
        /* Subtle tint of your brand color */
        color: #f39c12;
    }

    .dropdown-item i {
        width: 20px;
        text-align: center;
        font-size: 1rem;
    }

    /* User Toggle Button */
    .user-toggle-btn {
        background: #ffffff !important;
        border: 1px solid #e5e7eb !important;
        padding: 0.4rem 0.6rem 0.4rem 0.4rem !important;
        transition: all 0.2s ease !important;
    }

    .user-toggle-btn:hover {
        border-color: #f39c12 !important;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05) !important;
    }

    .nav-link-partner {
        color: #4b5563;
        font-size: 0.95rem;
        transition: color 0.2s;
    }

    .nav-link-partner:hover {
        color: #f39c12;
    }
</style>

<nav class="navbar navbar-expand-lg sticky-top bg-white border-bottom">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            CLICK<span style="color: #f39c12;">FIX</span>
        </a>

        <div class="d-flex align-items-center">
            @guest
                <a href="{{ route('register') }}" class="btn px-4 py-2 rounded-pill fw-bold shadow-sm"
                    style="font-size: 0.9rem;background-color: #f39c12;color: white;">Register</a>
            @endguest

            @auth
                <div class="dropdown">
                    <button class="btn user-toggle-btn d-flex align-items-center rounded-pill shadow-sm" type="button"
                        id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-2 mr-2"
                            style="width: 32px; height: 32px;">
                            <i class="fa fa-user" style="color: #f39c12;"></i>
                        </div>
                        <span class="fw-bold text-dark me-2 mr-1"
                            style="font-size: 0.85rem;">{{ Auth::user()->name }}</span>
                        <i class="fa fa-chevron-down small text-muted" style="font-size: 0.7rem;"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-right mt-2 shadow-lg border-light"
                        aria-labelledby="userDropdown">
                        <div class="dropdown-header text-uppercase tracking-wider small pb-2"
                            style="font-weight: 800; color: #9ca3af;">Account Menu</div>

                        <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.edit') }}">
                            <i class="fa fa-address-card mr-3"></i>
                            <span> My Profile</span>
                        </a>

                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class="fa fa-star mr-3"></i>
                            <span> My Reviews</span>
                        </a>

                        <div class="dropdown-divider mx-2"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item d-flex align-items-center text-danger">
                                <i class="fa fa-power-off mr-3"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>
<header class="hero-section">
    <div class="container text-center">
        <span class="badge bg-warning-subtle text-warning px-3 py-2 rounded-pill mb-3 fw-bold">#1 Services
            Marketplace in Pakistan</span>
        <h1 class="display-3 fw-bold mb-3">Expert help, <span class="text-warning">instantly</span> at your door.
        </h1>
        <p class="text-muted fs-5 mx-auto" style="max-width: 600px;">Hire verified professionals for anything from
            leaking taps to complex IT solutions.</p>

        <div class="search-container col-lg-9 mx-auto">
            <div class="row g-0 align-items-center">
                <div class="col-md-3 border-end">
                    <div class="d-flex align-items-center px-3">
                        <i class="fas fa-location-dot text-muted"></i>
                        <select class="form-select form-select-lg border-0 shadow-none">
                            <option>Lahore</option>
                            <option>Karachi</option>
                            <option>Islamabad</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-center px-3">
                        <i class="fas fa-search text-muted"></i>
                        <input type="text" class="form-control form-control-lg shadow-none border-0"
                            placeholder="Search for Electrician, Plumber...">
                    </div>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-search w-100">Find Experts</button>
                </div>
            </div>
        </div>
    </div>
</header>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
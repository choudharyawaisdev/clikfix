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

    /* Modern Dropdown Styling */
    .dropdown-menu {
        border-radius: 12px; /* Smoother radius */
        padding: 0.6rem;
        min-width: 230px;
        transform: translateY(10px);
        transition: all 0.2s ease;
        border: none !important;
    }

    /* Account Menu Header Spacing */
    .dropdown-header {
        padding: 0.75rem 1rem 0.5rem !important;
        font-weight: 800;
        color: #9ca3af;
        letter-spacing: 0.05rem;
        font-size: 0.75rem;
    }

    .dropdown-item {
        border-radius: 8px; /* Rounded items */
        padding: 0.7rem 1rem;
        font-size: 0.9rem;
        font-weight: 500;
        color: #4b5563;
        transition: all 0.2s;
        display: flex;
        align-items: center;
    }

    .dropdown-item:hover {
        background-color: #fef6e7;
        color: #f39c12;
    }

    /* Icon Spacing & Sizing */
    .dropdown-item i {
        width: 24px;
        margin-right: 10px;
        font-size: 1.1rem;
        text-align: center;
    }

    .dropdown-divider {
        margin: 0.6rem 0.5rem;
        border-top: 1px solid #f3f4f6;
    }

    /* User Toggle Button Styling */
    .user-toggle-btn {
        background: #ffffff !important;
        border: 1px solid #e5e7eb !important;
        padding: 0.4rem 0.8rem 0.4rem 0.5rem !important;
        transition: all 0.2s ease !important;
    }

    .user-toggle-btn:hover {
        border-color: #f39c12 !important;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05) !important;
    }

    .text-danger:hover {
        background-color: #fff5f5 !important;
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
                    style="font-size: 0.9rem; background-color: #f39c12; color: white;">Register</a>
            @endguest

            @auth
                <div class="dropdown">
                    <button class="btn user-toggle-btn d-flex align-items-center rounded-pill shadow-sm" type="button"
                        id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        
                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-2 mr-2"
                            style="width: 32px; height: 32px;">
                            <i class="fa fa-user" style="color: #f39c12;"></i>
                        </div>
                        
                        <span class="fw-bold text-dark me-2 mr-2" style="font-size: 0.85rem;">
                            {{ Auth::user()->name }}
                        </span>
                        
                        <i class="fa fa-chevron-down small text-muted" style="font-size: 0.7rem;"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu mt-2 shadow-lg" aria-labelledby="userDropdown">
                        <div class="dropdown-header text-uppercase">Account Menu</div>

                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            <i class="fa fa-address-card"></i>
                            <span>My Profile</span>
                        </a>

                        <a class="dropdown-item" href="{{ url('worker/profile/update') }}">
                            <i class="fa fa-user-cog"></i>
                            <span>Professional Update</span>
                        </a>

                        <a class="dropdown-item" href="#">
                            <i class="fa fa-star"></i>
                            <span>My Reviews</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger border-0 w-100 text-left">
                                <i class="fa fa-power-off"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
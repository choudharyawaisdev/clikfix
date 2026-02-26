<!-- SIDEBAR -->

<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="" class="header-logo">
            <img class="mb-2 mt-3" src="{{ asset('/assets/images/Logo Devta Soft.png') }}" alt="">

            {{-- <img src="/.svg" alt="logo" class="toggle-dark">
            <img src="/assets/images/others/logo.svg" alt="logo" class="desktop-white">
            <img src="/assets/images/others/logo.svg" alt="logo" class="toggle-white"> --}}
        </a>
    </div>

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">
        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>
            <li class="slide__category"><span class="category-name">Main</span></li>
            <ul class="main-menu">

                <li class="slide">
                    <a href="{{ url('dashboard') }}" class="side-menu__item">
                        <i class="bx bxs-dashboard side-menu__icon"></i>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>

                <li class="slide">
                    <a href="{{ route('admin.categories.index') }}" class="side-menu__item">
                        <i class="bx bx-category side-menu__icon"></i>
                        <span class="side-menu__label">Category</span>
                    </a>
                </li>

                <li class="slide">
                    <a href="{{ url('admin.workers.index') }}" class="side-menu__item">
                        <i class="bx bx-hard-hat side-menu__icon"></i>
                        <span class="side-menu__label">Manage Workers</span>
                    </a>
                </li>

                <li class="slide">
                    <a href="{{ url('admin.reviews.index') }}" class="side-menu__item">
                        <i class="bx bx-chat side-menu__icon"></i>
                        <span class="side-menu__label">User Reviews</span>
                    </a>
                </li>

                @auth
                    <li class="slide mt-2">
                        <a href="#" class="side-menu__item text-danger"
                            onclick="event.preventDefault(); document.getElementById('logout-link').submit();">
                            <i class="bx bx-power-off side-menu__icon" style="color: #dc3545;"></i>
                            <span class="side-menu__label">Logout</span>
                        </a>
                        <form id="logout-link" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endauth
            </ul>


            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
                    height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg>
            </div>
        </nav>
    </div>
</aside>
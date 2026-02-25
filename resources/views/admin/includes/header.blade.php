<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/6.6.6/css/flag-icons.min.css">
<header class="app-header">
    <div class="main-header-container container-fluid">
        <div class="header-content-left">
            <div class="header-element">
                <div class="horizontal-logo">
                    <a href="#" class="header-logo">
                        <img src="{{asset('/assets/images/Logo Devta Soft.png')}}" alt="logo" class="desktop-logo">
                        <img src="{{asset('/assets/images/Logo Devta Soft.png')}}" alt="logo" class="toggle-logo">
                        <img src="{{asset('/assets/images/Logo Devta Soft.png')}}" alt="logo" class="desktop-dark">
                        <img src="{{asset('/assets/images/Logo Devta Soft.png')}}" alt="logo" class="toggle-dark">
                        <img src="{{asset('/assets/images/Logo Devta Soft.png')}}" alt="logo" class="desktop-white">
                        <img src="{{asset('/assets/images/Logo Devta Soft.png')}}" alt="logo" class="toggle-white">
                    </a>
                </div>
            </div>
            <div class="header-element">
                <a aria-label="Hide Sidebar"
                    class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle"
                    data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
            </div>
        </div>

        <div class="header-content-right mt-2">
            <div class="header-element">
                <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <div class="me-sm-2 me-0">
                            <img src="{{ asset('assets/images/profile (1).png') }}" alt="img"
                                width="32" height="32" class="rounded-circle">
                        </div>
                        <div class="d-sm-block d-none">
                            <p class="fw-semibold mb-0 lh-1">{{ auth()->user()->name }}</p>
                            <span class="op-7 fw-normal d-block fs-11">{{ auth()->user()->email }}</span>
                        </div>
                    </div>
                </a>
                <button
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                    <div class="ms-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end"
                        aria-labelledby="mainHeaderProfile">
                        <li>
                            <a class="dropdown-item d-flex" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-link').submit();">
                                <i class="ti ti-logout fs-18 me-2 op-7"></i>Log Out
                            </a>
                            <form id="logout-link" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </button>
            </div>
        </div>
    </div>
</header>

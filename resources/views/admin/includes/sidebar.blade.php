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
                 <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                     viewBox="0 0 24 24">
                     <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                 </svg>
             </div>
             <li class="slide__category"><span class="category-name">Main</span></li>
             <ul class="main-menu">

                 <!-- Show for Admin -->
                 @if (Auth::check() && Auth::user()->user_type === 'admin')
                     <!-- Dashboard -->
                     <li class="slide">
                         <a href="{{ url('dashboard') }}" class="side-menu__item">
                             <i class="bx bx-home-alt-2 side-menu__icon"></i>
                             <span class="side-menu__label">{{ __('messages.dashboard') }}</span>
                         </a>
                     </li>

                     <!-- Add User -->
                     <li class="slide mt-2">
                         <a href="{{ route('adduser.index') }}" class="side-menu__item">
                             <i class="bx bx-user-plus side-menu__icon"></i>
                             <span class="side-menu__label">{{ __('messages.add_user') }}</span>
                         </a>
                     </li>

                     <!-- Brand -->
                     <li class="slide mt-2">
                         <a href="{{ route('brands.index') }}" class="side-menu__item">
                             <i class="bx bx-purchase-tag side-menu__icon"></i>
                             <span class="side-menu__label">{{ __('messages.brand') }}</span>
                         </a>
                     </li>

                     <!-- Product Add -->
                     <li class="slide mt-2">
                         <a href="{{ route('products.index') }}" class="side-menu__item">
                             <i class="bx bx-cube side-menu__icon"></i>
                             <span class="side-menu__label">{{ __('messages.add_product') }}</span>
                         </a>
                     </li>

                     <!-- Supplier Panel Dropdown -->
                     <li class="slide mt-2">
                         <a hypertitle="Supplier Panel" href="#supplierMenu" class="side-menu__item"
                             data-bs-toggle="collapse" aria-expanded="false">
                             <i class="bx bx-truck side-menu__icon"></i>
                             <span class="side-menu__label">{{ __('messages.supplier_panel') }}</span>
                             <i class="bx bx-chevron-down ms-auto"></i>
                         </a>
                         <ul class="collapse list-unstyled" id="supplierMenu">
                             <li><a class="dropdown-item px-4 py-2 text-light"
                                     href="{{ route('purchase.index') }}">{{ __('messages.purchase') }}</a></li>
                             <li><a class="dropdown-item px-4 py-2 text-light"
                                     href="{{ url('purchase-items') }}">{{ __('messages.purchase_items') }}</a></li>
                             <li><a class="dropdown-item px-4 py-2 text-light"
                                     href="{{ url('purchase-return') }}">{{ __('messages.purchase_return') }}</a></li>
                         </ul>
                     </li>

                     <!-- Reports -->
                     <li class="slide mt-2">
                         <a href="#reportsMenu" data-bs-toggle="collapse"
                             class="side-menu__item d-flex justify-content-between align-items-center">
                             <span>
                                 <i class="bx bx-bar-chart side-menu__icon"></i>
                                 <span class="side-menu__label">{{ __('messages.reports') }}</span>
                             </span>
                             <i class="bx bx-chevron-down"></i>
                         </a>
                         <ul class="collapse list-unstyled ps-4" id="reportsMenu">
                             <li>
                                 <a class="dropdown-item px-4 py-2 text-light" href="{{ url('sale-report') }}">
                                     {{ __('messages.sale_report') }}
                                 </a>
                             </li>
                             <li>
                                 <a class="dropdown-item px-4 py-2 text-light" href="{{ url('purchase-report') }}">
                                     {{ __('messages.purchase_report') }}
                                 </a>
                             </li>
                         </ul>
                     </li>
                 @endif

                 <!-- Customer Panel Dropdown (Visible to both Admin and Employee) -->
                 @if (Auth::check() && in_array(Auth::user()->user_type, ['admin', 'employee']))
                     <li class="slide mt-2">
                         <a href="#customerMenu" class="side-menu__item" data-bs-toggle="collapse"
                             aria-expanded="false">
                             <i class="bx bx-user side-menu__icon"></i>
                             <span class="side-menu__label">{{ __('messages.customer_panel') }}</span>
                             <i class="bx bx-chevron-down ms-auto"></i>
                         </a>
                         <ul class="collapse list-unstyled" id="customerMenu">
                             <li><a class="dropdown-item px-4 py-2 text-light"
                                     href="{{ route('sales.index') }}">{{ __('messages.sale') }}</a></li>
                             <li><a class="dropdown-item px-4 py-2 text-light"
                                     href="{{ url('sale-items') }}">{{ __('messages.sale_items') }}</a></li>
                             <li><a class="dropdown-item px-4 py-2 text-light"
                                     href="{{ url('sale-return') }}">{{ __('messages.sale_return') }}</a></li>
                         </ul>
                     </li>
                 @endif

                 <!-- Expense (Visible to both Admin and Employee) -->
                 @if (Auth::check() && in_array(Auth::user()->user_type, ['admin', 'employee']))
                     <li class="slide mt-2">
                         <a href="{{ route('expenses.index') }}" class="side-menu__item">
                             <i class="bx bx-receipt side-menu__icon"></i>
                             <span class="side-menu__label">{{ __('messages.expense') }}</span>
                         </a>
                     </li>
                 @endif

                 <!-- Logout (Visible to both Admin and Employee) -->
                 @auth
                     <li class="slide mt-2">
                         <a href="#" class="side-menu__item"
                             onclick="event.preventDefault(); document.getElementById('logout-link').submit();">
                             <i class="bx bx-log-out side-menu__icon"></i>
                             <span class="side-menu__label">{{ __('messages.logout') }}</span>
                         </a>
                         <form id="logout-link" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                         </form>
                     </li>
                 @endauth
             </ul>


             <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                     width="24" height="24" viewBox="0 0 24 24">
                     <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                 </svg>
             </div>
         </nav>
     </div>
 </aside>

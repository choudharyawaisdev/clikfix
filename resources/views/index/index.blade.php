@extends('layouts.app')

@section('body')
<header class="hero-section">
    <div class="container text-center">
        <span class="badge bg-warning-subtle text-warning px-3 py-2 rounded-pill mb-3 fw-bold">#1 Services Marketplace in Pakistan</span>
        <h1 class="display-3 fw-bold mb-3">Expert help, <span class="text-warning">instantly</span> at your door.</h1>
        <p class="text-muted fs-5 mx-auto" style="max-width: 600px;">Hire verified professionals for anything from leaking taps to complex IT solutions.</p>

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
                        <input type="text" class="form-control form-control-lg shadow-none border-0" placeholder="Search for Electrician, Plumber...">
                    </div>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-search w-100">Find Experts</button>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="py-5">
    <div class="container text-center">
        <h3 class="fw-bold mb-5">What do you need help with?</h3>
        <div class="row g-4 justify-content-center">
            @php
                $categoryIcons = [
                    'Electrician' => 'fa-plug',
                    'Plumbing' => 'fa-faucet',
                    'AC Repair' => 'fa-snowflake',
                    'Carpenter' => 'fa-hammer',
                    'Cleaning' => 'fa-broom',
                    'Painter' => 'fa-paint-roller',
                    'Solar Panels' => 'fa-solar-panel',
                    'CCTV Cam' => 'fa-video',
                    'Auto Care' => 'fa-car',
                    'IT Support' => 'fa-laptop-code'
                ];
            @endphp

            @foreach($categoryIcons as $name => $icon)
            <div class="col-6 col-md-4 col-lg-2">
                <a href="{{ route('worker.workerservices', ['category' => $name]) }}" class="text-decoration-none text-dark">
                    <div class="cat-box">
                        <div class="cat-icon-wrapper"><i class="fas {{ $icon }}"></i></div>
                        <h6 class="fw-bold m-0">{{ $name }}</h6>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container"> 
        @foreach($services as $service)
            <div class="category-row mb-5" id="section-{{ $service->slug }}">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h3 class="fw-bold m-0">Expert <span class="text-warning">{{ $service->title }}s</span></h3>
                        <p class="text-muted small m-0">Verified {{ $service->title }} professionals</p>
                    </div>
                    <a href="{{ route('worker.workerservices', ['category' => $service->slug]) }}" class="btn btn-outline-warning btn-sm rounded-pill px-3">
                        View All {{ $service->title }}
                    </a>
                </div>

                <div class="row g-3">
                    @foreach($service->workerJobs as $job)
                        @php $worker = $job->user; @endphp
                        @if($worker)
                            <div class="col-lg-3 col-md-6">
                                <div class="card worker-card">
                                    <div class="worker-img-wrapper">
                                        {{-- Fetch Job Image or Fallback to Avatar --}}
                                        @if($job->image)
                                            <img src="{{ asset('storage/' . $job->image) }}" class="worker-img" alt="{{ $job->title }}">
                                        @else
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($worker->name) }}&background=f39c12&color=fff" class="worker-img">
                                        @endif
                                        
                                        {{-- Display Job Price --}}
                                        <div class="badge-rating">
                                            <span class="fw-bold">Rs. {{ number_format($job->price) }}</span>
                                        </div>
                                    </div>

                                    <div class="card-body p-3">
                                        {{-- Display Job Title --}}
                                        <h6 class="fw-bold mb-1 text-truncate" title="{{ $job->title }}">
                                            {{ $job->title }}
                                        </h6>

                                        <p class="text-muted small mb-1">
                                            <i class="fas fa-user me-1"></i> {{ $worker->name }}
                                        </p>
                                        
                                        <p class="text-muted small mb-3">
                                            <i class="fas fa-briefcase me-1"></i> {{ $service->title }}
                                        </p>

                                        @if (Auth::check())
                                            <a href="/worker/profile_details/{{ $worker->id }}" class="btn btn-view w-100">
                                                Worker Details
                                            </a>
                                        @else
                                            <button type="button" class="btn btn-view w-100" data-bs-toggle="modal" data-bs-target="#loginModal">
                                                Worker Details
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</section>

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-warning-subtle">
                <h5 class="modal-title fw-bold" id="loginModalLabel">Login Required</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center py-4">
                <div class="mb-3 text-warning">
                    <i class="fas fa-user-lock fa-3x"></i>
                </div>
                <h5 class="fw-bold">Want to see more?</h5>
                <p class="text-muted">Please log in to your account to view worker contact details and profiles.</p>
                <div class="d-grid gap-2 mt-4">
                    <a href="{{ route('login') }}" class="btn btn-warning fw-bold py-2">Login Now</a>
                    <a href="{{ route('register') }}" class="btn btn btn-sm border-0">Don't have an account? Register</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
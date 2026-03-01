@extends('layouts.app')

@section('body')
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
<section class="py-5 bg-light">
    <div class="container">

        @foreach($categories as $category)
            @php
                // Filter users for this specific category
                $filteredWorkers = $users->where('category_id', $category->id);
            @endphp

            @if($filteredWorkers->count() > 0)
                <div class="category-row mb-5" id="section-{{ Str::slug($category->title) }}">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h3 class="fw-bold m-0">Expert <span class="text-warning">{{ $category->title }}</span></h3>
                            <p class="text-muted small m-0">Verified {{ $category->title }} professionals</p>
                        </div>
                        <a href="{{ route('category.job', $category->id) }}" class="btn btn-outline-warning btn-sm rounded-pill px-3">
                            View All {{ $category->title }}
                        </a>
                    </div>

                    <div class="row g-3">
                        @foreach($filteredWorkers as $worker)
                            <div class="col-lg-3 col-md-6">
                                <div class="card worker-card">
                                    <div class="worker-img-wrapper">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($worker->name) }}&background=f39c12&color=fff" class="worker-img">
                                        <div class="badge-rating"><i class="fas fa-star text-warning"></i> 4.9</div>
                                    </div>
                                    <div class="card-body p-3">
                                        <h6 class="fw-bold mb-1">
                                            {{ $worker->name }} 
                                            <i class="fas fa-check-circle text-primary small"></i>
                                        </h6>
                                        <p class="text-muted small mb-1">
                                            <i class="fas fa-briefcase me-1"></i> {{ $worker->services }}
                                        </p>
                                        <p class="text-muted small mb-1">
                                            <i class="fas fa-phone-alt me-1"></i> {{ $worker->phone_number }}
                                        </p>
                                        <p class="text-muted small mb-3">
                                            <i class="fas fa-envelope me-1"></i> {{ $worker->email }}
                                        </p>
                                        <a href="/worker/profile_details/{{ $worker->id }}" class="btn btn-view w-100">Unlock Contact</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <hr class="my-5 opacity-25">
            @endif
        @endforeach

    </div>
</section>
@endsection
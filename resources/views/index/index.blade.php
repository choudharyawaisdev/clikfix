@extends('layouts.app')
@section('body')
    <section class="py-5">
        <div class="container text-center">
            <h3 class="fw-bold mb-5">What do you need help with?</h3>
            <div class="row g-4 justify-content-center">

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="cat-box">
                        <div class="cat-icon-wrapper"><i class="fas fa-plug"></i></div>
                        <h6 class="fw-bold m-0">Electrician</h6>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="cat-box">
                        <div class="cat-icon-wrapper"><i class="fas fa-faucet"></i></div>
                        <h6 class="fw-bold m-0">Plumbing</h6>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="cat-box">
                        <div class="cat-icon-wrapper"><i class="fas fa-snowflake"></i></div>
                        <h6 class="fw-bold m-0">AC Repair</h6>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="cat-box">
                        <div class="cat-icon-wrapper"><i class="fas fa-hammer"></i></div>
                        <h6 class="fw-bold m-0">Carpenter</h6>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="cat-box">
                        <div class="cat-icon-wrapper"><i class="fas fa-broom"></i></div>
                        <h6 class="fw-bold m-0">Cleaning</h6>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="cat-box">
                        <div class="cat-icon-wrapper"><i class="fas fa-paint-roller"></i></div>
                        <h6 class="fw-bold m-0">Painter</h6>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="cat-box">
                        <div class="cat-icon-wrapper"><i class="fas fa-solar-panel"></i></div>
                        <h6 class="fw-bold m-0">Solar Panels</h6>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="cat-box">
                        <div class="cat-icon-wrapper"><i class="fas fa-video"></i></div>
                        <h6 class="fw-bold m-0">CCTV Cam</h6>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="cat-box">
                        <div class="cat-icon-wrapper"><i class="fas fa-car"></i></div>
                        <h6 class="fw-bold m-0">Auto Care</h6>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="cat-box">
                        <div class="cat-icon-wrapper"><i class="fas fa-laptop-code"></i></div>
                        <h6 class="fw-bold m-0">IT Support</h6>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="py-5 bg-light">
        <div class="container">
            <div class="category-row mb-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h3 class="fw-bold m-0">Expert <span class="text-warning">Professionals</span></h3>
                        <p class="text-muted small m-0">Verified service providers ready to help</p>
                    </div>
                    <a href="#" class="btn btn-outline-warning btn-sm rounded-pill px-3">View All <i
                            class="fas fa-arrow-right ms-1"></i></a>
                </div>

                <div class="row g-3">
                    {{-- Loop through the users collection --}}
                    @foreach($users as $item)
                        <div class="col-lg-3 col-md-6">
                            <div class="card worker-card">
                                <div class="worker-img-wrapper">
                                    {{-- Using UI Avatars since images are removed, keeps your card height consistent --}}
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($item->name) }}&background=f39c12&color=fff"
                                        class="worker-img">
                                    <div class="badge-rating"><i class="fas fa-star text-warning"></i> 4.9</div>
                                </div>
                                <div class="card-body p-3">
                                    <h6 class="fw-bold mb-1">
                                        {{ $item->name }}
                                        <i class="fas fa-check-circle text-primary small"></i>
                                    </h6>
                                    <p class="text-muted small mb-1">
                                        <i class="fas fa-phone-alt"></i> {{ $item->phone_number }}
                                    </p>
                                    <p class="text-muted small mb-3">
                                        <i class="fas fa-envelope"></i> {{ $item->email }}
                                    </p>
                                    <a href="/worker/profile_details/">
                                        <button class="btn btn-view w-100">Unlock Contact</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
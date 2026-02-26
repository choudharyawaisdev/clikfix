@extends('layouts.app')
@section('body')
    <section class="py-5 bg-light">
        <div class="container">

            <div class="category-row mb-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h3 class="fw-bold m-0">Expert <span class="text-warning">Electricians</span></h3>
                        <p class="text-muted small m-0">Verified professionals for wiring & repairs</p>
                    </div>
                    <a href="#" class="btn btn-outline-warning btn-sm rounded-pill px-3">View All <i
                            class="fas fa-arrow-right ms-1"></i></a>
                </div>

                <div class="row g-3">
                    <div class="col-lg-3 col-md-6">
                        <div class="card worker-card">
                            <div class="worker-img-wrapper">
                                <img src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=400&q=80"
                                    class="worker-img">
                                <div class="badge-rating"><i class="fas fa-star text-warning"></i> 4.9</div>
                            </div>
                            <div class="card-body p-3">
                                <h6 class="fw-bold mb-1">Ahmed Khan <i class="fas fa-check-circle text-primary small"></i>
                                </h6>
                                <p class="text-muted small mb-3">UPS & Wiring Expert • Lahore</p>
                                <button class="btn btn-view w-100">Unlock Contact</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card worker-card">
                            <div class="worker-img-wrapper"><img
                                    src="https://images.unsplash.com/photo-1590650046871-92c887180603?auto=format&fit=crop&w=400&q=80"
                                    class="worker-img">
                                <div class="badge-rating"><i class="fas fa-star text-warning"></i> 4.7</div>
                            </div>
                            <div class="card-body p-3">
                                <h6 class="fw-bold mb-1">Zubair Ali</h6>
                                <p class="text-muted small mb-3">AC & Fridge Expert • Karachi</p>
                                <button class="btn btn-view w-100">Unlock Contact</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card worker-card">
                            <div class="worker-img-wrapper"><img
                                    src="https://images.unsplash.com/photo-1540569014015-19a7ee504e3a?auto=format&fit=crop&w=400&q=80"
                                    class="worker-img">
                                <div class="badge-rating"><i class="fas fa-star text-warning"></i> 4.8</div>
                            </div>
                            <div class="card-body p-3">
                                <h6 class="fw-bold mb-1">Umer Sheikh</h6>
                                <p class="text-muted small mb-3">Short Circuit Specialist • Isloo</p>
                                <button class="btn btn-view w-100">Unlock Contact</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card worker-card">
                            <div class="worker-img-wrapper"><img
                                    src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=400&q=80"
                                    class="worker-img">
                                <div class="badge-rating"><i class="fas fa-star text-warning"></i> 4.5</div>
                            </div>
                            <div class="card-body p-3">
                                <h6 class="fw-bold mb-1">Kamran Shah</h6>
                                <p class="text-muted small mb-3">General Electrician • Multan</p>
                                <button class="btn btn-view w-100">Unlock Contact</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-5 opacity-0">

            <div class="category-row">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h3 class="fw-bold m-0">Top <span class="text-warning">Plumbers</span></h3>
                        <p class="text-muted small m-0">Fixing leakages and installations</p>
                    </div>
                    <a href="#" class="btn btn-outline-warning btn-sm rounded-pill px-3">View All <i
                            class="fas fa-arrow-right ms-1"></i></a>
                </div>

                <div class="row g-3">
                    <div class="col-lg-3 col-md-6">
                        <div class="card worker-card">
                            <div class="worker-img-wrapper">
                                <img src="https://images.unsplash.com/photo-1585909665970-21c5bc462847?auto=format&fit=crop&w=400&q=80"
                                    class="worker-img">
                                <div class="badge-rating"><i class="fas fa-star text-warning"></i> 4.9</div>
                            </div>
                            <div class="card-body p-3">
                                <h6 class="fw-bold mb-1">Ali Raza</h6>
                                <p class="text-muted small mb-3">Master Plumber • Lahore</p>
                                <button class="btn btn-view w-100">Unlock Contact</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
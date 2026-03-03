@extends('layouts.app')

@section('body')
    <div class="profile-wrapper py-5">
        <div class="container">
            <div class="row g-4">

                <div class="col-lg-8">
                    <div class="card profile-main-card mb-4">
                        <div class="card-body p-4">
                            <div class="d-md-flex align-items-center">
                                <div class="profile-img-container mb-3 mb-md-0">
                                    <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}"
                                        alt="Profile Image" class="profile-img shadow">
                                    <span class="badge-status online"></span>
                                </div>
                                <div class="ms-md-4">
                                    <h2 class="fw-bold mb-1">{{ $user->name }}
                                        <i class="fas fa-check-circle text-primary fs-5"></i>
                                    </h2>
                                    <p class="text-muted mb-2">
                                        <i class="fas fa-tools me-2"></i>{{ $user->services ?? 'General Worker' }}
                                    </p>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="rating-pill">
                                            <i class="fas fa-star text-warning"></i> 5.0
                                            <span class="text-muted">(Verified)</span>
                                        </div>
                                        <div class="experience-badge">
                                            <strong>Member Since</strong> {{ $user->created_at->format('M Y') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card profile-sub-card mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">About / Description</h5>
                            <p class="text-secondary leading-relaxed">
                                {{ $user->description ?? 'No description provided.' }}
                            </p>
                        </div>
                    </div>

                    <div class="card profile-sub-card mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">Available Services</h5>
                            <div class="row g-3">
                                @forelse($worker_jobs as $job)
                                    <div class="col-md-4">
                                        <div class="service-card text-center p-3 h-100">
                                            <img src="{{ asset('storage/' . $job->image) }}"
                                                onerror="this.src='https://placehold.co/300x200?text=Service'"
                                                alt="{{ $job->title }}" class="service-thumb mb-3">
                                            <h6 class="fw-bold mb-1">{{ $job->title }}</h6>
                                            <p class="text-primary fw-bold mb-0">Rs. {{ number_format($job->price) }}</p>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12 text-center py-4">
                                        <p class="text-muted">No specific services listed yet.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card contact-sidebar-card sticky-top" style="top: 100px; z-index: 10;">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">Contact Details</h5>

                            <div class="contact-item d-flex align-items-center mb-3">
                                <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                                <div class="ms-3">
                                    <small class="text-muted d-block">Email Address</small>
                                    <span class="fw-semibold">{{ $user->email }}</span>
                                </div>
                            </div>

                            <div class="contact-item d-flex align-items-center mb-3">
                                <div class="contact-icon"><i class="fas fa-phone-alt"></i></div>
                                <div class="ms-3">
                                    <small class="text-muted d-block">Mobile Number</small>
                                    <span class="fw-semibold">{{ $user->phone_number ?? 'Not Available' }}</span>
                                </div>
                            </div>

                            <div class="contact-item d-flex align-items-center mb-4">
                                <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                                <div class="ms-3">
                                    <small class="text-muted d-block">Location</small>
                                    <span class="fw-semibold">Pakistan</span>
                                </div>
                            </div>

                            <button class="btn btn-search w-100 mb-2 py-3">Hire {{ explode(' ', $user->name)[0] }}
                                Now</button>
                            <a href="https://wa.me/{{ $user->phone }}" class="btn btn-outline-success w-100 py-2">
                                <i class="fab fa-whatsapp me-2"></i>WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        :root {
            --primary: #f39c12;
            --secondary: #2c3e50;
        }

        .profile-wrapper {
            background-color: #f4f7f6;
            min-height: 100vh;
        }

        .profile-img-container {
            position: relative;
            width: 120px;
            height: 120px;
        }

        .profile-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 25px;
            border: 4px solid #fff;
        }

        .badge-status.online {
            position: absolute;
            bottom: 5px;
            right: 5px;
            width: 18px;
            height: 18px;
            background: #27ae60;
            border: 3px solid #fff;
            border-radius: 50%;
        }

        .card {
            border: none;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
        }

        .rating-pill {
            background: #fff9f0;
            padding: 5px 15px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.9rem;
        }

        .experience-badge {
            font-size: 0.9rem;
            color: var(--secondary);
        }

        .service-card {
            border: 1px solid #f0f0f0;
            border-radius: 20px;
            transition: 0.3s;
            background: #fff;
        }

        .service-card:hover {
            border-color: var(--primary);
            transform: translateY(-5px);
        }

        .service-thumb {
            width: 100%;
            height: 100px;
            object-fit: cover;
            border-radius: 15px;
        }

        .contact-icon {
            width: 40px;
            height: 40px;
            background: #fff4e5;
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
        }

        .btn-search {
            background: var(--primary);
            color: white;
            border-radius: 15px;
            font-weight: 700;
            border: none;
        }

        .btn-search:hover {
            background: #e67e22;
            color: white;
        }

        .leading-relaxed {
            line-height: 1.7;
        }
    </style>
@endsection
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
                                    <img src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=300&q=80"
                                        alt="Profile Image" class="profile-img shadow">
                                    <span class="badge-status online"></span>
                                </div>
                                <div class="ms-md-4">
                                    <h2 class="fw-bold mb-1">Ahmed Khan <i
                                            class="fas fa-check-circle text-primary fs-5"></i></h2>
                                    <p class="text-muted mb-2"><i class="fas fa-tools me-2"></i>Master Electrician & Wiring
                                        Expert</p>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="rating-pill">
                                            <i class="fas fa-star text-warning"></i> 4.9 <span class="text-muted">(128
                                                Reviews)</span>
                                        </div>
                                        <div class="experience-badge">
                                            <strong>8+ Years</strong> Experience
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
                                Professional electrician with over 8 years of experience in residential and commercial
                                wiring.
                                Specializing in UPS installations, short circuit repairs, and smart home automation.
                                I pride myself on punctuality, safety standards, and providing long-term solutions for my
                                clients.
                            </p>
                        </div>
                    </div>

                    <div class="card profile-sub-card mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">My Services</h5>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="service-card text-center p-3 h-100">
                                        <img src="https://images.unsplash.com/photo-1581094288338-2314dddb7ead?auto=format&fit=crop&w=300&q=80"
                                            alt="AC Repair" class="service-thumb mb-3">
                                        <h6 class="fw-bold mb-1">AC Installation</h6>
                                        <p class="text-primary fw-bold mb-0">Rs. 2,500</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="service-card text-center p-3 h-100">
                                        <img src="https://images.unsplash.com/photo-1621905252507-b354bcadcabc?auto=format&fit=crop&w=300&q=80"
                                            alt="Wiring" class="service-thumb mb-3">
                                        <h6 class="fw-bold mb-1">Full House Wiring</h6>
                                        <p class="text-primary fw-bold mb-0">Rs. 15,000</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="service-card text-center p-3 h-100">
                                        <img src="https://images.unsplash.com/photo-1558002038-1055907df827?auto=format&fit=crop&w=300&q=80"
                                            alt="UPS" class="service-thumb mb-3">
                                        <h6 class="fw-bold mb-1">UPS Repair</h6>
                                        <p class="text-primary fw-bold mb-0">Rs. 1,200</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card profile-sub-card">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">Recent Reviews</h5>
                            <div class="review-item mb-3 pb-3 border-bottom">
                                <div class="d-flex justify-content-between mb-2">
                                    <h6 class="fw-bold m-0">Zubair Ahmed</h6>
                                    <span class="text-warning small"><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i></span>
                                </div>
                                <p class="small text-muted mb-0">"Excellent service! Fixed my main board issue within 30
                                    minutes. Highly recommended for electrical work."</p>
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
                                    <span class="fw-semibold">ahmed.khan@example.com</span>
                                </div>
                            </div>

                            <div class="contact-item d-flex align-items-center mb-3">
                                <div class="contact-icon"><i class="fas fa-phone-alt"></i></div>
                                <div class="ms-3">
                                    <small class="text-muted d-block">Mobile Number</small>
                                    <span class="fw-semibold">+92 300 1234567</span>
                                </div>
                            </div>

                            <div class="contact-item d-flex align-items-center mb-4">
                                <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                                <div class="ms-3">
                                    <small class="text-muted d-block">Address</small>
                                    <span class="fw-semibold">Model Town, Block C, Lahore</span>
                                </div>
                            </div>

                            <button class="btn btn-search w-100 mb-2 py-3">Hire Ahmed Now</button>
                            <button class="btn btn-outline-secondary w-100 py-2">Message</button>
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
            --light-bg: #f8f9fa;
        }

        .profile-wrapper {
            background-color: #f4f7f6;
            min-height: 100vh;
        }

        /* Profile Image Styles */
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

        /* Cards Styling */
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

        /* Service Card Styles */
        .service-card {
            border: 1px solid #f0f0f0;
            border-radius: 20px;
            transition: all 0.3s ease;
            background: #fff;
        }

        .service-card:hover {
            border-color: var(--primary);
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        }

        .service-thumb {
            width: 100%;
            height: 100px;
            object-fit: cover;
            border-radius: 15px;
        }

        .text-primary {
            color: var(--primary) !important;
        }

        /* Contact Sidebar */
        .contact-icon {
            width: 40px;
            height: 40px;
            background: #fff4e5;
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 1.1rem;
        }

        .btn-search {
            background: var(--primary);
            color: white;
            border-radius: 15px;
            font-weight: 700;
            transition: 0.3s;
            border: none;
        }

        .btn-search:hover {
            background: #e67e22;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(243, 156, 18, 0.4);
            color: white;
        }

        .leading-relaxed {
            line-height: 1.7;
        }
    </style>
@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServiceHub | 100+ Home Services</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; color: #333; }
        .text-orange { color: #f39c12; }
        .bg-navy { background-color: #2c3e50; color: white; }
        
        /* Hero Section */
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), 
                        url('https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=1350&q=80');
            background-size: cover; background-position: center;
            padding: 120px 0; color: white; text-align: center;
        }
        
        .search-container {
            background: #fff; padding: 15px; border-radius: 50px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3); margin-top: 40px;
        }
        .search-input { border: none; border-right: 1px solid #eee; border-radius: 0; }
        .search-input:last-child { border-right: none; }
        .btn-search { background: #f39c12; color: white; border-radius: 30px; font-weight: 600; padding: 12px 30px; }

        /* Categories */
        .cat-box {
            background: white; padding: 25px 15px; border-radius: 12px;
            transition: 0.3s; margin-bottom: 20px; border: 1px solid #eef2f3;
        }
        .cat-box:hover { border-color: #f39c12; transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.05); }
        .cat-icon { font-size: 30px; color: #f39c12; margin-bottom: 10px; }

        /* Worker Cards */
        .worker-card {
            border: none; border-radius: 15px; transition: 0.3s; margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08); overflow: hidden;
        }
        .worker-card:hover { transform: scale(1.02); }
        .worker-img { height: 180px; object-fit: cover; }
        .btn-view { background: #2c3e50; color: white; border-radius: 8px; font-size: 14px; }
        
        /* Footer */
        footer { background: #1a252f; color: #bdc3c7; padding: 60px 0 20px; }
        footer h5 { color: white; margin-bottom: 20px; }
        footer a { color: #bdc3c7; text-decoration: none; }
        footer a:hover { color: #f39c12; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="#">SERVICE<span class="text-orange">PRO</span></a>
        <div class="ml-auto">
            <a href="#" class="btn btn-link text-dark">Become a Seller</a>
            <a href="#" class="btn btn-search ml-2">Login</a>
        </div>
    </div>
</nav>

<header class="hero-section">
    <div class="container">
        <h1 class="display-4 font-weight-bold">Find & Hire Expert Service Providers</h1>
        <p class="lead">From Plumbers to Web Developers - Everything at one place.</p>
        
        <div class="search-container col-lg-10 mx-auto">
            <div class="row no-gutters">
                <div class="col-md-3">
                    <select class="form-control form-control-lg search-input">
                        <option>Select City</option>
                        <option>Lahore</option>
                        <option>Karachi</option>
                        <option>Islamabad</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control form-control-lg search-input" placeholder="What are you looking for?">
                </div>
                <div class="col-md-3 p-1">
                    <button class="btn btn-search btn-block h-100">Find Professionals</button>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="py-5">
    <div class="container text-center">
        <h2 class="font-weight-bold mb-5">Browse by Category</h2>
        <div class="row">
            <div class="col-6 col-md-2-4 col-lg-2 mb-3"><div class="cat-box"><i class="fas fa-plug cat-icon"></i><p>Electrician</p></div></div>
            <div class="col-6 col-md-2-4 col-lg-2 mb-3"><div class="cat-box"><i class="fas fa-faucet cat-icon"></i><p>Plumbing</p></div></div>
            <div class="col-6 col-md-2-4 col-lg-2 mb-3"><div class="cat-box"><i class="fas fa-broom cat-icon"></i><p>Cleaning</p></div></div>
            <div class="col-6 col-md-2-4 col-lg-2 mb-3"><div class="cat-box"><i class="fas fa-hammer cat-icon"></i><p>Carpenter</p></div></div>
            <div class="col-6 col-md-2-4 col-lg-2 mb-3"><div class="cat-box"><i class="fas fa-paint-roller cat-icon"></i><p>Painter</p></div></div>
            <div class="col-6 col-md-2-4 col-lg-2 mb-3"><div class="cat-box"><i class="fas fa-snowflake cat-icon"></i><p>AC Repair</p></div></div>
            <div class="col-6 col-md-2-4 col-lg-2 mb-3"><div class="cat-box"><i class="fas fa-car cat-icon"></i><p>Car Wash</p></div></div>
            <div class="col-6 col-md-2-4 col-lg-2 mb-3"><div class="cat-box"><i class="fas fa-laptop-code cat-icon"></i><p>IT Support</p></div></div>
            <div class="col-6 col-md-2-4 col-lg-2 mb-3"><div class="cat-box"><i class="fas fa-camera cat-icon"></i><p>Photography</p></div></div>
            <div class="col-6 col-md-2-4 col-lg-2 mb-3"><div class="cat-box"><i class="fas fa-shield-alt cat-icon"></i><p>Security</p></div></div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <h2 class="font-weight-bold mb-4">Top Professionals in Your Area</h2>
        <div class="row" id="worker-grid">
            <div class="col-lg-3 col-md-6">
                <div class="card worker-card">
                    <img src="https://images.unsplash.com/photo-1540569014015-19a7ee504e3a?auto=format&fit=crop&w=300&q=80" class="worker-img" alt="worker">
                    <div class="card-body">
                        <h6><b>Ali Raza</b> <i class="fas fa-check-circle text-primary"></i></h6>
                        <small class="text-muted">Master Plumber • Lahore</small>
                        <div class="text-orange my-2"><i class="fas fa-star"></i> 4.9 (120 reviews)</div>
                        <button class="btn btn-view btn-block">View Phone Number</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6"><div class="card worker-card"><img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=300&q=80" class="worker-img"><div class="card-body"><h6><b>Hamza Ahmed</b></h6><small class="text-muted">Electrician • Karachi</small><div class="text-orange my-2"><i class="fas fa-star"></i> 4.8</div><button class="btn btn-view btn-block">View Phone Number</button></div></div></div>
            <div class="col-lg-3 col-md-6"><div class="card worker-card"><img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=300&q=80" class="worker-img"><div class="card-body"><h6><b>Zeeshan Ali</b></h6><small class="text-muted">Painter • Islamabad</small><div class="text-orange my-2"><i class="fas fa-star"></i> 5.0</div><button class="btn btn-view btn-block">View Phone Number</button></div></div></div>
            <div class="col-lg-3 col-md-6"><div class="card worker-card"><img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=300&q=80" class="worker-img"><div class="card-body"><h6><b>Bilal Khan</b></h6><small class="text-muted">Carpenter • Faisalabad</small><div class="text-orange my-2"><i class="fas fa-star"></i> 4.7</div><button class="btn btn-view btn-block">View Phone Number</button></div></div></div>
            <div class="col-lg-3 col-md-6"><div class="card worker-card"><img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=300&q=80" class="worker-img"><div class="card-body"><h6><b>Sajid Mehmood</b></h6><small class="text-muted">AC Repair • Multan</small><div class="text-orange my-2"><i class="fas fa-star"></i> 4.6</div><button class="btn btn-view btn-block">View Phone Number</button></div></div></div>
            <div class="col-lg-3 col-md-6"><div class="card worker-card"><img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=300&q=80" class="worker-img"><div class="card-body"><h6><b>Umer Farooq</b></h6><small class="text-muted">CCTV Specialist • Lahore</small><div class="text-orange my-2"><i class="fas fa-star"></i> 4.9</div><button class="btn btn-view btn-block">View Phone Number</button></div></div></div>
            <div class="col-lg-3 col-md-6"><div class="card worker-card"><img src="https://images.unsplash.com/photo-1552058544-f2b08422138a?auto=format&fit=crop&w=300&q=80" class="worker-img"><div class="card-body"><h6><b>Asad Ali</b></h6><small class="text-muted">Gardener • Karachi</small><div class="text-orange my-2"><i class="fas fa-star"></i> 4.5</div><button class="btn btn-view btn-block">View Phone Number</button></div></div></div>
            <div class="col-lg-3 col-md-6"><div class="card worker-card"><img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=300&q=80" class="worker-img"><div class="card-body"><h6><b>Kamran Shah</b></h6><small class="text-muted">Mechanic • Sialkot</small><div class="text-orange my-2"><i class="fas fa-star"></i> 4.8</div><button class="btn btn-view btn-block">View Phone Number</button></div></div></div>
            <div class="col-lg-3 col-md-6"><div class="card worker-card"><img src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?auto=format&fit=crop&w=300&q=80" class="worker-img"><div class="card-body"><h6><b>Fahad Sheikh</b></h6><small class="text-muted">Cleaner • Lahore</small><div class="text-orange my-2"><i class="fas fa-star"></i> 4.9</div><button class="btn btn-view btn-block">View Phone Number</button></div></div></div>
            <div class="col-lg-3 col-md-6"><div class="card worker-card"><img src="https://images.unsplash.com/photo-1463453091185-61582044d556?auto=format&fit=crop&w=300&q=80" class="worker-img"><div class="card-body"><h6><b>Junaid Malik</b></h6><small class="text-muted">IT Expert • Rawalpindi</small><div class="text-orange my-2"><i class="fas fa-star"></i> 5.0</div><button class="btn btn-view btn-block">View Phone Number</button></div></div></div>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5>SERVICEPRO</h5>
                <p>Leading marketplace for connecting professionals with customers. Affordable, reliable, and fast.</p>
                <div class="social-links">
                    <a href="#" class="mr-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="mr-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="mr-3"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <h5>Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Categories</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-3 mb-4">
                <h5>Support</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">Safety Rules</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>
            </div>
            <div class="col-md-3 mb-4">
                <h5>Subscribe</h5>
                <p>Get updates on new services</p>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <button class="btn btn-search">Go</button>
                    </div>
                </div>
            </div>
        </div>
        <hr style="border-top: 1px solid #2c3e50;">
        <div class="text-center pb-3">
            <small>&copy; 2024 ServicePro Marketplace. All rights reserved.</small>
        </div>
    </div>
</footer>

</body>
</html>
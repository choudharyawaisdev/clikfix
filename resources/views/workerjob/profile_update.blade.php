@extends('layouts.app')

@section('body')
<div class="profile-wrapper py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                
                @if(session('success'))
                    <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    </div>
                @endif

                <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                    <div class="card-header bg-white border-0 p-0">
                        <ul class="nav nav-tabs nav-fill custom-tabs" id="profileTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active py-3 fw-bold" data-bs-toggle="tab" href="#basic" role="tab">
                                    <i class="fas fa-user-circle me-2"></i>Basic Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-3 fw-bold" data-bs-toggle="tab" href="#security" role="tab">
                                    <i class="fas fa-key me-2"></i>Security Settings
                                </a>
                            </li>
                        </ul>
                    </div>

                    <form action="{{ route('worker.profile.update') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="card-body p-4 p-md-5">
                            <div class="tab-content">
                                
                                <div class="tab-pane fade show active" id="basic" role="tabpanel">
                                    <div class="row g-4">
                                        <div class="col-md-4 text-center border-end">
                                            <div class="profile-img-container mx-auto">
                                                <img id="previewImage" 
                                                     src="{{ $user->profile_picture ? asset('storage/'.$user->profile_picture) : 'https://ui-avatars.com/api/?name='.urlencode($user->name) }}"
                                                     class="profile-img shadow">
                                                <label for="profile_picture" class="btn-change-photo">
                                                    <i class="fas fa-camera"></i>
                                                </label>
                                                <input type="file" name="profile_picture" id="profile_picture" hidden accept="image/*" onchange="previewFile()">
                                            </div>
                                            <p class="mt-3 small text-muted">Click the camera to upload a new photo</p>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">Full Name</label>
                                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required autocomplete="none">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Email Address</label>
                                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required autocomplete="none">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Phone Number</label>
                                                    <input type="text" name="phone_number" class="form-control" value="{{ $user->phone_number }}" autocomplete="none">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Service Category</label>
                                                    <select name="services" class="form-select">
                                                        <option value="">Select a Service</option>
                                                        @foreach($services_list as $service)
                                                            <option value="{{ $service->title }}" {{ $user->services == $service->title ? 'selected' : '' }}>
                                                                {{ $service->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Professional Description</label>
                                                    <textarea name="description" class="form-control" rows="4" placeholder="Tell us about your work experience...">{{ $user->description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="security" role="tabpanel">
                                    <div class="row justify-content-center">
                                        <div class="col-md-7 py-4">
                                            <div class="text-center mb-4">
                                                <div class="contact-icon mx-auto mb-3"><i class="fas fa-lock"></i></div>
                                                <h6 class="fw-bold">Update Password</h6>
                                                <p class="text-muted small">Enter a new password only if you want to change it.</p>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label class="form-label">New Password</label>
                                                <input type="password" name="password" class="form-control no-autofill" 
                                                       readonly onfocus="this.removeAttribute('readonly');" 
                                                       autocomplete="new-password">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Confirm New Password</label>
                                                <input type="password" name="password_confirmation" class="form-control no-autofill" 
                                                       readonly onfocus="this.removeAttribute('readonly');" 
                                                       autocomplete="new-password">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer bg-light p-4 text-end border-0">
                            <button type="submit" class="btn btn-update px-5 py-3">
                                <i class="fas fa-save me-2"></i> Update Profile Information
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    :root { --primary: #f39c12; --secondary: #2c3e50; }
    .profile-wrapper { background-color: #f4f7f6; min-height: 100vh; font-family: 'Plus Jakarta Sans', sans-serif; }
    
    .custom-tabs { border-bottom: 2px solid #eee; }
    .custom-tabs .nav-link { color: #6c757d; border: none; border-bottom: 3px solid transparent; transition: 0.3s; }
    .custom-tabs .nav-link.active { color: var(--primary); border-bottom-color: var(--primary); background: none; }
    
    .profile-img-container { position: relative; width: 140px; height: 140px; }
    .profile-img { width: 100%; height: 100%; object-fit: cover; border-radius: 28px; border: 5px solid #fff; }
    .btn-change-photo { position: absolute; bottom: 5px; right: 5px; width: 38px; height: 38px; background: var(--primary); color: #fff; border-radius: 12px; display: flex; align-items: center; justify-content: center; cursor: pointer; border: 3px solid #fff; transition: 0.3s; }
    .btn-change-photo:hover { transform: scale(1.1); background: #e67e22; }

    .form-control, .form-select { border-radius: 12px; padding: 12px 16px; border: 1px solid #e2e8f0; background: #f8fafc; font-size: 0.95rem; }
    .form-control:focus { border-color: var(--primary); box-shadow: 0 0 0 4px rgba(243, 156, 18, 0.1); background: #fff; }
    
    .contact-icon { width: 50px; height: 50px; background: #fff4e5; color: var(--primary); display: flex; align-items: center; justify-content: center; border-radius: 15px; font-size: 1.2rem; }
    
    .btn-update { background: var(--primary); color: #fff; border-radius: 16px; font-weight: 700; border: none; transition: 0.3s; box-shadow: 0 4px 12px rgba(243, 156, 18, 0.2); }
    .btn-update:hover { background: #e67e22; transform: translateY(-2px); box-shadow: 0 8px 20px rgba(243, 156, 18, 0.3); color: #fff; }
</style>

<script>
    function previewFile() {
        const preview = document.getElementById('previewImage');
        const file = document.getElementById('profile_picture').files[0];
        const reader = new FileReader();
        reader.onloadend = () => { preview.src = reader.result; }
        if (file) { reader.readAsDataURL(file); }
    }
</script>
@endsection
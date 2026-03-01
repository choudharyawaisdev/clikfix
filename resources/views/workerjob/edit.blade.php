@extends('layouts.app')

@section('body')

    <style>
        .profile-wrapper {
            background: #f4f7f6;
            min-height: 100vh;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .card {
            border: none;
            border-radius: 28px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
        }

        .form-label {
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .form-control,
        .form-select {
            border-radius: 15px;
            padding: 12px 20px;
            border: 1px solid #e0e0e0;
            background-color: #f8fafc;
            transition: 0.3s;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #f39c12;
            box-shadow: 0 0 0 4px rgba(243, 156, 18, 0.1);
            background-color: #fff;
        }

        .image-upload-wrapper {
            border: 2px dashed #d1d5db;
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            cursor: pointer;
            background: #fff;
            transition: 0.3s;
        }

        .image-upload-wrapper:hover {
            border-color: #f39c12;
            background: #fff9f0;
        }

        #imagePreview {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 15px;
            display: none;
            margin-bottom: 15px;
        }

        .btn-submit {
            background: #f39c12;
            color: white;
            border-radius: 18px;
            font-weight: 800;
            padding: 14px;
            border: none;
            width: 100%;
            transition: 0.3s;
        }

        .btn-submit:hover {
            background: #e67e22;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(243, 156, 18, 0.3);
        }

        .input-group-text {
            background: #fff;
            border-radius: 15px 0 0 15px;
            border: 1px solid #e0e0e0;
            font-weight: 700;
        }

        .price-input {
            border-radius: 0 15px 15px 0 !important;
        }
    </style>

    <div class="profile-wrapper py-5">
        <div class="container">
            <div class="card">
                <div class="card-body p-5">

                    <div class="text-center mb-5">
                        <h2 class="fw-bold">Edit Job</h2>
                        <p class="text-muted">Update the details of your posted job.</p>
                    </div>

                    <form action="{{ route('worker.jobworker.update', $job->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-4">

                            <div class="col-12">
                                <label class="form-label">Job Title</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $job->title) }}"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Service</label>
                                <select name="service_id" class="form-select" required>
                                    <option value="">Select Service</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}" {{ old('service_id', $job->service_id) == $service->id ? 'selected' : '' }}>
                                            {{ $service->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Budget (PKR)</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rs.</span>
                                    <input type="number" name="price" class="form-control price-input"
                                        value="{{ old('price', $job->price) }}" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Job Description</label>
                                <textarea name="description" rows="5" class="form-control"
                                    required>{{ old('description', $job->description) }}</textarea>
                            </div>

                            <div class="col-12">
                                <label class="form-label">
                                    Update Image (Leave empty to keep current image)
                                </label>

                                <div class="image-upload-wrapper" onclick="document.getElementById('jobImage').click()">

                                    <img id="imagePreview" src="{{ $job->image ? asset('storage/' . $job->image) : '' }}"
                                        style="{{ $job->image ? 'display:block;' : '' }}">

                                    <div id="uploadPlaceholder" style="{{ $job->image ? 'display:none;' : '' }}">
                                        <i class="fas fa-cloud-upload-alt fa-3x text-primary mb-3"></i>
                                        <h5>Click to change image</h5>
                                        <p class="text-muted small">PNG, JPG or JPEG (Max 2MB)</p>
                                    </div>

                                    <input type="file" id="jobImage" name="image" hidden accept="image/*"
                                        onchange="previewFile()">
                                </div>
                            </div>

                            <div class="col-4 mx-auto mt-4">
                                <button type="submit" class="btn-submit">
                                    Update Job
                                </button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        function previewFile() {
            const preview = document.getElementById('imagePreview');
            const placeholder = document.getElementById('uploadPlaceholder');
            const file = document.getElementById('jobImage').files[0];
            const reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
                preview.style.display = "block";
                placeholder.style.display = "none";
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>

@endsection
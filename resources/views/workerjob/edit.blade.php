@extends('layouts.app')

@section('body')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">

<style>
    /* ... (Keep your existing styles from the create page) ... */
    
    /* Added style for current image visibility */
    .current-image-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background: var(--primary);
        color: white;
        padding: 4px 12px;
        border-radius: 10px;
        font-size: 0.75rem;
        font-weight: 700;
        z-index: 2;
    }
</style>

<div class="profile-wrapper py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body p-5">
                        <div class="text-center mb-5">
                            <h2 class="fw-extrabold" style="font-weight: 800;">Edit Job Listing</h2>
                            <p class="text-muted">Update the details for "{{ $job->title }}"</p>
                        </div>

                        <form action="{{ route('worker.jobworker.update', ['jobworker' => $job->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="row g-4">
                                <div class="col-12">
                                    <label class="form-label">Job Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title', $job->title) }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Category</label>
                                    <select name="category_id" id="categorySelect" class="form-select" required>
                                        <option value="" disabled>Select a category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ (old('category_id', $job->category_id) == $category->id) ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Budget (PKR)</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rs.</span>
                                        <input type="number" class="form-control price-input" name="price" value="{{ old('price', $job->price) }}" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Job Description</label>
                                    <textarea class="form-control" name="description" rows="5" required>{{ old('description', $job->description) }}</textarea>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Update Job Image (Leave blank to keep current)</label>
                                    <div class="image-upload-wrapper" onclick="document.getElementById('jobImage').click()">
                                        
                                        @if($job->image)
                                            <span class="current-image-badge">Current Image</span>
                                            <div id="uploadPlaceholder" style="display: none;">
                                                <i class="fas fa-cloud-upload-alt fa-3x text-primary mb-3"></i>
                                                <h5>Click to change image</h5>
                                            </div>
                                            <img id="imagePreview" src="{{ asset('storage/' . $job->image) }}" style="display: block;" alt="Preview">
                                        @else
                                            <div id="uploadPlaceholder">
                                                <i class="fas fa-cloud-upload-alt fa-3x text-primary mb-3"></i>
                                                <h5>Click to upload image</h5>
                                            </div>
                                            <img id="imagePreview" src="" alt="Preview">
                                        @endif

                                        <input type="file" id="jobImage" name="image" hidden accept="image/*" onchange="previewFile()">
                                    </div>
                                </div>

                                <div class="col-12 mt-5">
                                    <div class="d-flex gap-3">
                                        <a href="{{ route('jobs.index') }}" class="btn btn-light flex-grow-1 py-3" style="border-radius: 18px; font-weight: 700;">Cancel</a>
                                        <button type="submit" class="btn-submit flex-grow-1">
                                            Update Job Details
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewFile() {
        const preview = document.getElementById('imagePreview');
        const placeholder = document.getElementById('uploadPlaceholder');
        const badge = document.querySelector('.current-image-badge');
        const file = document.getElementById('jobImage').files[0];
        const reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
            preview.style.display = "block";
            placeholder.style.display = "none";
            if(badge) badge.style.display = "none"; // Hide "Current" badge on new selection
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
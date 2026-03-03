@extends('layouts.app')

@section('body')
    <div class="container py-5">
        <h3 class="fw-bold mb-4">Workers offering: {{ $category }}</h3>

        @if($filteredWorkers->count() > 0)
            <div class="row g-3">
                @foreach($filteredWorkers as $worker)
                    <div class="col-lg-3 col-md-6">
                        <div class="card worker-card">
                            <div class="worker-img-wrapper">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($worker->name) }}&background=f39c12&color=fff"
                                    class="worker-img">
                                <div class="badge-rating"><i class="fas fa-star text-warning"></i> 4.9</div>
                            </div>
                            <div class="card-body p-3">
                                <h6 class="fw-bold mb-1">{{ $worker->name }} <i class="fas fa-check-circle text-primary small"></i>
                                </h6>
                                <p class="text-muted small mb-1"><i class="fas fa-briefcase me-1"></i> {{ $worker->services }}</p>
                                <p class="text-muted small mb-1"><i class="fas fa-phone-alt me-1"></i> {{ $worker->phone_number }}
                                </p>
                                <p class="text-muted small mb-3"><i class="fas fa-envelope me-1"></i> {{ $worker->email }}</p>
                                <a href="/worker/profile_details/{{ $worker->id }}" class="btn btn-view w-100">Unlock Contact</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-muted">No workers available for {{ $category }} at the moment.</p>
        @endif
    </div>
@endsection
@extends('layouts.app')

@section('body')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        .profile-wrapper {
            background: #f4f7f6;
            min-height: 100vh;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .card {
            border: none;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
        }

        .text-primary {
            color: #f39c12 !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #f39c12 !important;
            border-color: #f39c12 !important;
            color: white !important;
            border-radius: 8px;
        }

        .job-table thead th {
            background-color: #f8fafc;
            padding: 15px;
            font-weight: 700;
            color: #2c3e50;
            border-bottom: 2px solid #f0f0f0;
        }

        .job-thumb {
            width: 45px;
            height: 45px;
            object-fit: cover;
            border-radius: 10px;
        }

        .btn-search {
            background: #f39c12;
            color: white;
            border-radius: 12px;
            font-weight: 700;
            border: none;
            transition: 0.3s;
        }

        .btn-search:hover {
            background: #e67e22;
            transform: translateY(-2px);
            color: white;
        }
    </style>
    <div class="profile-wrapper py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div>
                                    <h4 class="fw-bold mb-0">My Posted Jobs</h4>
                                    <p class="text-muted small mb-0">Manage and track your active job listings</p>
                                </div>
                                <a href="{{ route('worker.jobworker.create') }}" class="btn btn-search px-4 py-2">
                                    + Post New Job
                                </a>
                            </div>

                            <div class="table-responsive">
                                <table id="jobsTable" class="table align-middle job-table">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Job Title</th>
                                            <th>Service</th>
                                            <th>Budget</th>
                                            <th>Created At</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($jobs as $job)
                                            <tr>
                                                <td>
                                                    @if($job->image)
                                                        <img src="{{ asset('storage/' . $job->image) }}" class="job-thumb"
                                                            alt="Job Image"
                                                            style="width:60px;height:60px;object-fit:cover;border-radius:8px;">
                                                    @else
                                                        <div class="job-thumb bg-light d-flex align-items-center justify-content-center text-muted"
                                                            style="width:60px;height:60px;border-radius:8px;">
                                                            <i class="fas fa-image"></i>
                                                        </div>
                                                    @endif
                                                </td>

                                                <td>
                                                    <div class="fw-bold text-dark">{{ $job->title }}</div>
                                                </td>

                                                <td>
                                                    <span class="badge bg-light text-dark border px-3 py-2 rounded-pill">
                                                        {{ $job->service->title ?? 'General' }}
                                                    </span>
                                                </td>

                                                <td class="text-primary fw-bold">
                                                    Rs. {{ number_format($job->price, 0) }}
                                                </td>

                                                <td class="text-muted">
                                                    {{ $job->created_at->format('M d, Y') }}
                                                </td>

                                                <td class="text-end">
                                                    <div class="dropdown">
                                                        <button class="btn btn-light btn-sm rounded-pill" type="button"
                                                            data-bs-toggle="dropdown">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>

                                                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('worker.jobworker.edit', $job->id) }}">
                                                                    <i class="fas fa-edit me-2 text-info"></i> Edit
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>

                                                            <li>
                                                                <form action="{{ route('worker.jobworker.destroy', $job->id) }}"
                                                                    method="POST" onsubmit="return confirm('Delete this job?')">
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <button type="submit" class="dropdown-item text-danger">
                                                                        <i class="fas fa-trash me-2"></i> Delete
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center text-muted py-4">
                                                    No jobs found.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#jobsTable').DataTable({
                "pageLength": 10,
                "order": [[4, "desc"]],
                "language": {
                    "searchPlaceholder": "Search jobs...",
                    "search": "",
                }
            });

            $('.dataTables_filter input').addClass('form-control rounded-pill px-3');
            $('.dataTables_length select').addClass('form-select rounded-pill');
        });
    </script>
@endsection
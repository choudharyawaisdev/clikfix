@extends('admin.layouts.app')

@section('title')
    Service Management
@endsection

@section('body')
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Services</li>
                </ol>
            </nav>
            <button class="btn btn-primary btn-sm" onclick="openAddModal()">Add Service</button>
        </div>

        <div class="col-xl-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="card-title">All Services</h6>
                </div>
                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table id="example" class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Sr</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $index => $service)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $service->title }}</td>
                                        <td>{{ $service->slug }}</td>
                                        <td>{{ $service->created_at->format('d-m-Y') }}</td>
                                        <td class="text-nowrap">
                                            <button class="btn btn-sm btn-outline-warning me-2"
                                                onclick="openEditModal({{ $service }})">
                                                <i class="fa fa-pen-to-square me-1"></i> Edit
                                            </button>

                                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                                    <i class="fa fa-trash me-1"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="serviceModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="serviceForm" method="POST" action="">
                @csrf
                <div id="methodField"></div>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="serviceModalLabel">Service</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title" class="mb-2">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Service Title" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openAddModal() {
            $('#serviceForm').attr('action', '{{ route("admin.services.store") }}');
            $('#methodField').html('');
            $('#serviceModalLabel').text('Add Service');
            $('#title').val('');
            $('#serviceModal').modal('show');
        }

        function openEditModal(service) {
            let url = '{{ route("admin.services.update", ":id") }}';
            url = url.replace(':id', service.id);
            
            $('#serviceForm').attr('action', url);
            $('#methodField').html('@method("PUT")');
            $('#serviceModalLabel').text('Edit Service');
            $('#title').val(service.title);
            $('#serviceModal').modal('show');
        }
    </script>
@endsection
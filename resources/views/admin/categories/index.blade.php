@extends('admin.layouts.app')

@section('title')
    Category Index
@endsection

@section('body')
    <div class="container-fluid">
        <!-- PAGE HEADER -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Category</li>
                </ol>
            </nav>
            <button class="btn btn-primary btn-sm" onclick="openAddModal()">Add Category</button>
        </div>

        <!-- TABLE -->
        <div class="col-xl-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="card-title">All Categories</h6>
                </div>
                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table id="example" class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Sr</th>
                                    <th>Title</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $index => $categories)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $categories->title }}</td>
                                        <td>{{ $categories->created_at->format('d-m-Y') }}</td>
                                        <td class="text-nowrap">
                                            <button class="btn btn-sm btn-outline-warning me-2"
                                                onclick="prepareEditModal({{ $categories->id }}, '{{ addslashes($category->name ?? $category->title ?? '') }}', '{{ $category->image ? Storage::url($category->image) : '' }}')">
                                                <i class="fa fa-pen-to-square me-1"></i> Edit
                                            </button>

                                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Are you sure you want to delete this category? Items in this category may become uncategorized.')">
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

    <!-- MODAL -->
    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="categoryForm" method="POST" action="">
                @csrf
                <input type="hidden" name="_method" value="POST" id="formMethod">
                <input type="hidden" name="id" id="category_id">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="categoryModalLabel">Edit Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openAddModal() {
            $('#categoryForm').attr('action', '{{ route('admin.categories.store') }}');
            $('#formMethod').val('POST');
            $('#categoryModalLabel').text('Add Category');
            $('#title').val('');
            $('#category_id').val('');
            $('#categoryModal').modal('show');
        }

        function openEditModal(category) {
            $('#categoryForm').attr('action', '/admin/categories/' + category.id);
            $('#formMethod').val('PUT');
            $('#categoryModalLabel').text('Edit Category');
            $('#title').val(category.title);
            $('#category_id').val(category.id);
            $('#categoryModal').modal('show');
        }

        function confirmDelete() {
            return confirm('Are you sure you want to delete this category?');
        }
    </script>
@endsection
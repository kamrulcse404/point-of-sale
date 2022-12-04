@extends('layout.main')
@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <!-- Page Heading -->
    <div class="row mb-2">
        <div class="col-md-6">
            <h4>Categories</h4>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('category.create') }}" class="btn btn-outline-info btn-sm"><i class="fa-solid fa-plus"></i> New
                Category</a>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Category Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td>{{ $category->updated_at }}</td>
                                <td>
                                    <a href="{{ route('category.edit', $category->id) }}"
                                        class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                        data-target="#categoryDeleteModal{{ $category->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>

                            <!--Category delete Modal -->
                            <div class="modal fade" id="categoryDeleteModal{{ $category->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="categoryModalLabel" style="color: #ee5253"><i
                                                    class="fas fa-trash-alt"></i>
                                                Do you want to Delete {{ $category->title }} ?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label style="color: #2c2c54">Category Title</label>
                                                    <input class="form-control" value="{{ $category->title }}" disabled>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-outline-danger"><i
                                                        class="fas fa-trash-alt"></i>
                                                    Category</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

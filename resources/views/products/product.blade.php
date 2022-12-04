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
            <h4>Products</h4>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('products.create') }}" class="btn btn-outline-info btn-sm"><i class="fa-solid fa-plus"></i> New
                Product</a>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Products Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Cost Price</th>
                            <th>Price</th>
                            <th>View</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Cost Price</th>
                            <th>Price</th>
                            <th>View</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ !empty($product->category->title) ? $product->category->title : 'N/A' }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->cost_price }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <a href="{{ route('products.show', $product->id) }}"
                                        class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-eye"></i></a>
                                </td>
                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="btn btn-outline-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                        data-target="#productDeleteModal{{ $product->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>

                            <!--Product delete Modal -->
                            <div class="modal fade" id="productDeleteModal{{ $product->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="productModalLabel" style="color: #ee5253"><i
                                                    class="fas fa-trash-alt"></i>
                                                Do you want to Delete this Product?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label style="color: #2c2c54">Category</label>
                                                    <input class="form-control"
                                                        value="{{ !empty($product->category->title) ? $product->category->title : 'N/A' }}"
                                                        disabled>
                                                </div>

                                                <div class="form-group">
                                                    <label style="color: #2c2c54">Product Name</label>
                                                    <input class="form-control" value="{{ $product->title }}" disabled>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-outline-danger"><i
                                                        class="fas fa-trash-alt"></i>
                                                    Product</button>
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

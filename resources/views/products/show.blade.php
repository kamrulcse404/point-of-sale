@extends('layout.main')
@section('content')
    <div>
        <div class="row justify-content-md-center mb-3">
            <div class="col">
                <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-info"><i class="fa-solid fa-arrow-left"></i>
                    Back</a>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col align-self-center">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $product->title }}'s details</h6>
                    </div>
                    <div class="card-body">

                        <div class="row justify-content-md-center">
                            <div class="col-md-10">
                                <table class="table table-striped table-borderless">
                                    <tr>
                                        <th class="text-left">Category : </th>
                                        <td>{{ !empty($product->category->title) ? $product->category->title : 'N/A' }}</td>
                                    </tr>

                                    <tr>
                                        <th class="text-left">Title : </th>
                                        <td>{{ $product->title }}</td>
                                    </tr>

                                    <tr>
                                        <th class="text-left">Description : </th>
                                        <td>{{ $product->description }}</td>
                                    </tr>

                                    <tr>
                                        <th class="text-left">Cost Price : </th>
                                        <td>{{ $product->cost_price }}</td>
                                    </tr>

                                    <tr>
                                        <th class="text-left">Price : </th>
                                        <td>{{ $product->price }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



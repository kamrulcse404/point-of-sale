@extends('layout.main')
@section('content')
    <div>
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <h4 class="mb-3 text-gray-800">Add New Product</h4>
            </div>
            <div class="col-md-4 text-right">
                <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-info"><i
                        class="fa-solid fa-arrow-left"></i>
                    Back</a>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-md-8 align-self-center">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fa-solid fa-plus"></i> New Product</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="category" style="color: #2c2c54">Category</label>
                                <select name="category_id" class="form-control" id="category">
                                    <option @if (!empty(old('category_id'))) selected @endif>--Select Category--</option>
                                    @foreach ($categories as $category)
                                        <option @if (old('category_id')) selected @endif
                                            value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title" style="color: #2c2c54">Product Title</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    placeholder="Enter product title" value="{{ old('title') }}" required>
                                @error('title')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description" style="color: #2c2c54">Description</label>
                                <textarea type="text" name="description" class="form-control" id="description" placeholder="Enter product description"
                                    required>
                                    {{ old('description') }}
                                </textarea>
                                @error('description')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="cost_price" style="color: #2c2c54">Cost price</label>
                                <input type="number" name="cost_price" class="form-control" id="cost_price"
                                    placeholder="Enter product cost price" value="{{ old('cost_price') }}" required>
                                @error('cost_price')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price" style="color: #2c2c54">Price</label>
                                <input type="number" name="price" class="form-control" id="price"
                                    placeholder="Enter product price" value="{{ old('price') }}" required>
                                @error('price')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-plus"></i>
                                New
                                Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

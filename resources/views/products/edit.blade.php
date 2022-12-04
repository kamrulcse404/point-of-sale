@extends('layout.main')
@section('content')
    <div>
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <h4 class="mb-3 text-gray-800">Product details</h4>
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
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fa-solid fa-pen-to-square"></i>
                            {{ $product->title }}'s details</h6>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('products.update', $product->id) }}" method="post">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label for="category" style="color: #2c2c54">Category</label>
                                <select name="category_id" class="form-control" id="category">
                                    @foreach ($categories as $key => $category)
                                        <option value="{{ $category->id }}"
                                            @if (old('category_id') == $key) selected @endif>{{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="title" style="color: #2c2c54">Product Title</label>
                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ $product->title }}">
                                @error('title')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description" style="color: #2c2c54">Description</label>
                                <textarea type="text" name="description" id="description" class="form-control">{{ $product->description }}</textarea>
                                @error('description')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="cost_price" style="color: #2c2c54">Cost Price</label>
                                <input type="number" name="cost_price" id="cost_price" class="form-control"
                                    value="{{ $product->cost_price }}">
                                @error('cost_price')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price" style="color: #2c2c54">Price</label>
                                <input type="number" name="price" id="price" class="form-control"
                                    value="{{ $product->price }}">
                                @error('price')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i>
                                Update</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

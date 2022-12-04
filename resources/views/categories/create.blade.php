@extends('layout.main')
@section('content')
    <div>
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <h4 class="mb-3 text-gray-800">Create New Category</h4>
            </div>
            <div class="col-md-4 text-right">
                <a href="{{ route('category.index') }}" class="btn btn-sm btn-outline-info"><i
                    class="fa-solid fa-arrow-left"></i> Back</a>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-md-8 align-self-center">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fa-solid fa-plus"></i> New Category</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title" style="color: #2c2c54">Category Title</label>
                                <input type="title" name="title" class="form-control" id="title"
                                    placeholder="Enter category title" value="{{ old('title') }}">
                                @error('title')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-plus"></i> New
                                Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

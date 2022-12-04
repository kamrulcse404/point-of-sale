@extends('layout.main')
@section('content')
    <div>
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <h4 class="mb-3 text-gray-800">Add New User</h4>
            </div>
            <div class="col-md-4 text-right">
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-info"><i class="fa-solid fa-arrow-left"></i>
                    Back</a>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-md-8 align-self-center">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fa-solid fa-plus"></i> New User</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="group" style="color: #2c2c54">Group</label>
                                <select name="group_id" class="form-control" id="group">
                                    <option @if (!empty(old('group_id'))) selected @endif>--Select Group--</option>
                                    @foreach ($groups as $group)
                                        <option @if (old('group_id')) selected @endif
                                            value="{{ $group->id }}">{{ $group->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name" style="color: #2c2c54">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Enter user name" value="{{ old('name') }}" required>
                                @error('name')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email" style="color: #2c2c54">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="Enter user email" value="{{ old('email') }}" required>
                                @error('email')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone" style="color: #2c2c54">Phone</label>
                                <input type="tel" name="phone" class="form-control" id="phone"
                                    placeholder="Enter user phone" value="{{ old('phone') }}" required>
                                @error('phone')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address" style="color: #2c2c54">Address</label>
                                <input type="text" name="address" class="form-control" id="address"
                                    placeholder="Enter user address" value="{{ old('address') }}" required>
                                @error('address')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-plus"></i> New
                                User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layout.main')
@section('content')
    <div>
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <h4 class="mb-3 text-gray-800">User details</h4>
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
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fa-solid fa-pen-to-square"></i>
                            {{ $user->name }}'s details</h6>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('users.update', $user->id) }}" method="post">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label style="color: #2c2c54">Approved By</label>
                                <input class="form-control" value="{{ $user->admin_id ? $user->admin_id : 'NULL' }}"
                                    disabled>
                            </div>

                            <div class="form-group">
                                <label for="group" style="color: #2c2c54">Group</label>
                                <select name="group_id" class="form-control" id="group">
                                    {{-- <option @if (empty(old('group_id'))) selected @endif>
                                        {{ !empty($user->group->title) ? $user->group->title : 'N/A' }}
                                    </option> --}}
                                    {{-- @foreach ($groups as $group)
                                        <option @if (old('group_id')) selected @endif
                                            value="{{ $group->id }}">
                                            {{ $group->title }}</option>
                                    @endforeach --}}

                                    @foreach ($groups as $key => $group)
                                        <option value="{{ $group->id }}"
                                            @if (old('group_id') == $key) selected @endif>{{ $group->title }}</option>
                                    @endforeach
                                </select>
                                @error('group_id')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name" style="color: #2c2c54">Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ $user->name }}">
                                @error('name')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email" style="color: #2c2c54">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ $user->email }}">
                                @error('email')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone" style="color: #2c2c54">Phone</label>
                                <input type="tel" name="phone" id="phone" class="form-control"
                                    value="{{ $user->phone }}">
                                @error('phone')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address" style="color: #2c2c54">Address</label>
                                <input type="text" name="address" id="address" class="form-control"
                                    value="{{ $user->address }}">
                                @error('address')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-user"></i>
                                Update</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

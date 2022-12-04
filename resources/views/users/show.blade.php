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
                        <h6 class="m-0 font-weight-bold text-primary">{{ $user->name }}'s details</h6>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label style="color: #2c2c54">Group</label>
                            <input class="form-control" value="{{ !empty($user->group->title) ? $user->group->title : "N/A" }}" disabled>
                        </div>

                        <div class="form-group">
                            <label style="color: #2c2c54">Approved By</label>
                            <input class="form-control" value="{{ $user->admin_id ? $user->admin_id : 'NULL' }}" disabled>
                        </div>

                        <div class="form-group">
                            <label style="color: #2c2c54">Name</label>
                            <input class="form-control" value="{{ $user->name }}" disabled>
                        </div>

                        <div class="form-group">
                            <label style="color: #2c2c54">Email</label>
                            <input class="form-control" value="{{ $user->email }}" disabled>
                        </div>

                        <div class="form-group">
                            <label style="color: #2c2c54">Phone</label>
                            <input class="form-control" value="{{ $user->phone }}" disabled>
                        </div>

                        <div class="form-group">
                            <label style="color: #2c2c54">Address</label>
                            <input class="form-control" value="{{ $user->address }}" disabled>
                        </div>

                        <div class="form-group">
                            <label style="color: #2c2c54">Created</label>
                            <input class="form-control" value="{{ $user->created_at }}" disabled>
                        </div>

                        <div class="form-group">
                            <label style="color: #2c2c54">Updated</label>
                            <input class="form-control" value="{{ $user->updated_at }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

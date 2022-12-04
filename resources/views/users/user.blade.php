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
            <h4>Users</h4>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('users.create') }}" class="btn btn-outline-info"><i class="fa-solid fa-plus"></i> New User</a>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Users Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Group</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>View</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Group</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>View</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ !empty($user->group->title) ? $user->group->title : "N/A" }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-outline-primary"><i class="fa-solid fa-eye"></i></a>
                                </td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-info"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                        data-target="#userDeleteModal{{ $user->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>

                            <!--Group delete Modal -->
                            <div class="modal fade" id="userDeleteModal{{ $user->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="userModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="userModalLabel" style="color: #ee5253"><i
                                                    class="fas fa-trash-alt"></i>
                                                Do you want to Delete this User?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label style="color: #2c2c54">Group</label>
                                                    <input class="form-control" value="{{ !empty($user->group->title) ? $user->group->title : "N/A" }}" disabled>
                                                </div>

                                                <div class="form-group">
                                                    <label style="color: #2c2c54">User Name</label>
                                                    <input class="form-control" value="{{ $user->name }}" disabled>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-outline-danger"><i
                                                        class="fas fa-trash-alt"></i>
                                                    User</button>
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

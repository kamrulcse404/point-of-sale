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
            <h4>User Groups</h4>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('groups.create') }}" class="btn btn-outline-info"><i class="fa-solid fa-plus"></i> New Group</a>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User Group Data</h6>
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
                        @foreach ($groups as $group)
                            <tr>
                                <td>{{ $group->id }}</td>
                                <td>{{ $group->title }}</td>
                                <td>{{ $group->created_at }}</td>
                                <td>{{ $group->updated_at }}</td>
                                <td>
                                    <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-outline-primary"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                        data-target="#groupDeleteModal{{ $group->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>

                            <!--Group delete Modal -->
                            <div class="modal fade" id="groupDeleteModal{{ $group->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="groupModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="authorModalLabel" style="color: #ee5253"><i
                                                    class="fas fa-trash-alt"></i>
                                                Do you want to Delete {{ $group->title }} ?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('groups.destroy', $group->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label style="color: #2c2c54">User Group Title</label>
                                                    <input type="title" name="title" class="form-control" id="title"
                                                        value="{{ $group->title }}" disabled>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-outline-danger"><i
                                                        class="fas fa-trash-alt"></i>
                                                    Group</button>
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

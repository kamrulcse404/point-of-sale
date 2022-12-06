@extends('users.user_layout')
@section('user_content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $user->name }}'s details</h6>
        </div>
        <div class="card-body">

            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <table class="table table-striped table-borderless">
                        <tr>
                            <th class="text-left">Group : </th>
                            <td>{{ !empty($user->group->title) ? $user->group->title : 'N/A' }}</td>
                        </tr>

                        <tr>
                            <th class="text-left">Name : </th>
                            <td>{{ $user->name }}</td>
                        </tr>

                        <tr>
                            <th class="text-left">Email : </th>
                            <td>{{ $user->email }}</td>
                        </tr>

                        <tr>
                            <th class="text-left">Phone : </th>
                            <td>{{ $user->phone }}</td>
                        </tr>

                        <tr>
                            <th class="text-left">Address : </th>
                            <td>{{ $user->address }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layout.main')
@section('content')
    <div>
        <div class="row justify-content-md-center mb-3">
            <div class="col">
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-info"><i class="fa-solid fa-arrow-left"></i>
                    Back</a>
            </div>
            <div class="col text-right">
                <a href="#" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-plus"></i> New Sale</a>
                <a href="#" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-plus"></i> New Purchase</a>
                <a href="#" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-plus"></i> New Payment</a>
                <a href="#" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-plus"></i> New Receipt</a>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-2">
                <div class="nav flex-column nav-pills">
                    <a class="nav-link {{ (route('users.show',$user->id)) ? 'active' : '' }} " href="{{ route('users.show', $user->id) }}">User Info</a>
                    <a class="nav-link" href="">Sales</a>
                    <a class="nav-link" href="">Purchase</a>
                    <a class="nav-link" href="">Payments</a>
                    <a class="nav-link" href="">Receipts</a>
                </div>
            </div>
            <div class="col-md-10">
                @yield('user_content')
            </div>
        </div>
    </div>
@endsection


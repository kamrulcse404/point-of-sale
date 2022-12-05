@extends('layout.main')
@section('content')
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-primary-900 mb-4">Welcome To POS</h1>
                                    </div>
                                    <form action="{{ route('authenticate') }}" method="POST">
                                        <div class="form-group">
                                            <label for="email" style="color: #2c2c54">Email</label>
                                            <input type="email" name="email" class="form-control" id="email"
                                                placeholder="Enter email address" value="{{ old('email') }}">
                                            @error('email')
                                                <p class="text-danger mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password" style="color: #2c2c54">Password</label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                placeholder="Enter password">
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="overflow-hidden text-bg-light min-vh-90 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-3">
                <div class="card mb-0">
                    <div class="card-body">
                        <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                            <img src={{ asset('assets/images/logos/logoweb.png') }} alt="logo" width="40"
                                height="auto">
                        </a>
                        <p class="text-center">Sign Up</p>
                        @auth
                            <form method="POST" action="/register">
                                @csrf
                                <div class="mb-3">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input name="first_name" type="text" class="form-control" id="firstName"
                                        aria-describedby="textHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input name="last_name" type="text" class="form-control" id="lastName"
                                        aria-describedby="textHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input name="email" type="email" class="form-control" id="email"
                                        aria-describedby="emailHelp">
                                </div>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <div class="mb-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input name="password" type="password" class="form-control" id="password">
                                </div>
                                <div class="mb-4">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input name="password_confirmation" type="password" class="form-control"
                                        id="password_confirmation">
                                </div>
                                <button type="submit" class="btn btn-outline-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign Up</button>
                                <div class="d-flex align-items-center justify-content-center">
                                    {{-- <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                                    <a class="text-primary fw-bold ms-2" href="{{ route('login') }}">Sign In</a> --}}
                                </div>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

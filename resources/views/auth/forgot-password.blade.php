<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>forget password</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}">
    <script src="{{ asset('assets/js/students.js') }}"></script>

</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-10 col-md-8 col-lg-5">
            <div class="card">
                <h3 class="mt-5 text-center">{{ __('Forgot Password') }}</h3>
                <p class="text-left m-4">
                    {{-- <i class="ti ti-alert-triangle"></i> --}}
                    No Problem! Enter your email below and we will send you an email with instructions to reset your password.

                </p>
                <div class="card-body">
                    @if (session('status'))
                        <div class="text-danger" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <div>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary w-100">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>

                        <div class="text-center mt-3">
                            <i class="ti ti-arrow-narrow-left-dashed"></i>
                            <a href="{{ route('login') }}" class="back-to-login-link">
                                {{ __('Back to Login') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/sidebarmenu.js"></script>
    <script src="./assets/js/app.min.js"></script>
    <script src="./assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="./assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="./assets/js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>

</body>

</html>

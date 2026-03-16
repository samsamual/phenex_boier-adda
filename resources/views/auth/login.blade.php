@extends('frontend.layouts.ecommercemaster')
@section('title', "Login - " .env('APP_NAME'))

@section('content')
<main id="main" class="site-main py-5" style="background: linear-gradient(to right, #f7f9fc, #e9eff5); min-height: 100vh;">

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-lg-8">
                <div class="card shadow-lg border-0 rounded-4 p-5" style="max-width: 650px; margin: 0 auto;">

                    <header class="text-center mb-5">
                        <h1 class="fw-bold display-4">Login</h1>
                        <p class="text-muted fs-5">Enter your credentials to access your account.</p>
                    </header>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                            <input type="email" id="email" name="email" class="form-control form-control-lg rounded-3 py-3"
                                   placeholder="Enter your email" value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold">Password <span class="text-danger">*</span></label>
                            <input type="password" id="password" name="password" class="form-control form-control-lg rounded-3 py-3"
                                   placeholder="Enter your password">
                            @error('password')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Remember Me & Lost Password -->
                        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center mb-4">
                            <div class="form-check mb-2 mb-sm-0">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                <label class="form-check-label fw-medium">Remember Me</label>
                            </div>
                            {{--<div>
                                <a href="#" class="text-decoration-none fw-medium">Lost your password?</a>
                            </div>--}}
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg rounded-3 py-3">Login</button>
                        </div>

                        {{--<p class="text-center text-muted">
                            Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none fw-medium">Sign Up</a>
                        </p>--}}

                    </form>

                </div>
            </div>
        </div>
    </div>
</main>
@endsection

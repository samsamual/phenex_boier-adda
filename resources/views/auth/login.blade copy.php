@extends('user.master1')
@section('title','Shasthoseba')

@section('body')
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden shadow-sm">
                    <div class="bg-soft-primary">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-3">
                                    <h5 class="text-primary mb-0">Welcome Back!</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body pt-0">
                        <div class="p-3">
                            <form class="form-horizontal" action="{{ route('login') }}" method="POST">
                                @csrf
                                
                                <!-- Email -->
                                <div class="form-group mb-3">
                                    <label for="email">Email or Mobile</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                    @error('password')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Remember Me -->
                                <div class="form-group mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">Remember Me</label>
                                </div>

                                <!-- Submit -->
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">
                                        Log In
                                    </button>
                                </div>

                            </form>

                            <!-- Registration Link -->
                            <div class="text-center mt-4">
                                <a href="{{ route('registration') }}" class="btn btn-outline-primary w-100">
                                    Registration Here
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection

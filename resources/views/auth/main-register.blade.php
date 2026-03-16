@extends('frontend.layouts.ecommercemaster')
@section('title', "Sign Up - Boier Adda")

@section('content')
<main id="main" class="site-main py-5" style="background: linear-gradient(to right, #f7f9fc, #e9eff5); min-height: 100vh;">

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-lg-9">
                <div class="card shadow-lg border-0 rounded-4 p-4 p-md-5">
                    
                    <header class="text-center mb-5">
                        <h1 class="fw-bold display-4">Create Your Account</h1>
                        <p class="text-muted fs-5">Sign up to get access to all our ebooks and resources.</p>
                    </header>

                    <form action="{{ route('main.register') }}" method="POST" class="register">
                        @csrf
                        @if(request()->has('ref'))
                            <input type="hidden" name="referred_by" value="{{ request()->query('ref') }}">
                        @endif
                        <input type="hidden" name="referred_by" value="{{ request('ref') }}">

                        <div class="row g-4">
                            <!-- Username -->
                            <div class="col-12 col-md-6">
                                <label for="name" class="form-label fw-semibold">Username <span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name" class="form-control form-control-lg rounded-3"
                                       placeholder="Enter your name" value="{{ old('name') }}" required>
                                @error('name')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="col-12 col-md-6">
                                <label for="email" class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                                <input type="email" id="email" name="email" class="form-control form-control-lg rounded-3"
                                       placeholder="Enter your email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="col-12 col-md-6">
                                <label for="password" class="form-label fw-semibold">Password <span class="text-danger">*</span></label>
                                <input type="password" id="password" name="password" class="form-control form-control-lg rounded-3"
                                       placeholder="Enter password" required>
                                @error('password')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="col-12 col-md-6">
                                <label for="password_confirmation" class="form-label fw-semibold">Confirm Password <span class="text-danger">*</span></label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg rounded-3"
                                       placeholder="Re-enter password" required>
                                @error('password_confirmation')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="col-12 col-md-6">
                                <label for="number_box_1755579092" class="form-label fw-semibold">Phone Number <span class="text-danger">*</span></label>
                                <input type="number" id="number_box_1755579092" name="number_box_1755579092"
                                       class="form-control form-control-lg rounded-3" placeholder="Enter phone number" required>
                            </div>

                            <!-- Membership Options -->
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold">Membership <span class="text-danger">*</span></label>
                                <div class="d-flex flex-column gap-2">
                                    @foreach($categories as $category)
                                    <div class="form-check form-check-lg">
                                        <input class="form-check-input membership-radio" type="radio" name="membership_category_id"
                                               id="membership_category_id_{{ $category->id }}" 
                                               value="{{ $category->id }}" data-value="{{ $category->subscription_fee }}"
                                               @if($referred_category_id)
                                                   {{ $category->id == $referred_category_id ? 'checked' : '' }}
                                                   {{ $category->id != $referred_category_id ? 'disabled' : '' }}
                                               @endif
                                               required>
                                        <label class="form-check-label fw-medium" for="membership_category_id_{{ $category->id }}">
                                            {{ $category->name }} 
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Total & Payment Gateway -->
                        <div class="mt-4" id="urm-total_container" style="display:none;">
                            <label class="form-label fw-semibold" for="ur-membership-total">Total</label>
                            <input type="text" class="form-control form-control-lg rounded-3" id="ur-membership-total" name="urm_total" readonly>
                        </div>

                        <div class="mt-3 ur_payment_gateway_container" style="display:none;">
                            <label class="form-label fw-semibold">Select Payment Gateway</label>
                            <div class="d-flex flex-column gap-2">
                                <div class="form-check form-check-lg">
                                    <input class="form-check-input" type="radio" name="urm_payment_method" id="bkash" value="bkash">
                                    <label class="form-check-label" for="bkash">Bkash</label>
                                </div>
                                <div class="form-check form-check-lg">
                                    <input class="form-check-input" type="radio" name="urm_payment_method" id="nagad" value="nagad">
                                    <label class="form-check-label" for="nagad">Nagad</label>
                                </div>
                                <div class="form-check form-check-lg">
                                    <input class="form-check-input" type="radio" name="urm_payment_method" id="duch_bangla" value="duch_bangla">
                                    <label class="form-check-label" for="duch_bangla">Duch Bangla</label>
                                </div>
                            </div>
                        </div>

                        <div class="row g-4 mt-3" id="mobile-banking-inputs" style="display:none;">
                            <div class="col-12 col-md-6">
                                <label for="mobile_number" class="form-label fw-semibold">Mobile Banking Number <span class="text-danger">*</span></label>
                                <input type="text" id="mobile_number" name="mobile_number" class="form-control form-control-lg rounded-3" placeholder="Enter mobile number">
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="transaction_id" class="form-label fw-semibold">Transaction ID <span class="text-danger">*</span></label>
                                <input type="text" id="transaction_id" name="transaction_id" class="form-control form-control-lg rounded-3" placeholder="Enter transaction ID">
                            </div>
                                {{--<div class="form-check form-check-lg">
                                    <input class="form-check-input" type="radio" name="urm_payment_method" id="ur-membership-paypal" value="paypal">
                                    <label class="form-check-label" for="ur-membership-paypal">Paypal</label>
                                </div>
                                <div class="form-check form-check-lg">
                                    <input class="form-check-input" type="radio" name="urm_payment_method" id="ur-membership-stripe" value="stripe">
                                    <label class="form-check-label" for="ur-membership-stripe">Stripe</label>
                                </div>
                                <div class="form-check form-check-lg">
                                    <input class="form-check-input" type="radio" name="urm_payment_method" id="ur-membership-bank" value="bank">
                                    <label class="form-check-label" for="ur-membership-bank">Bank</label>
                                </div>--}}
                            </div>
                        </div>

                        <!-- Stripe Container -->
                        <div class="stripe-container mt-3" style="display:none;">
                            <button type="button" class="btn btn-outline-primary mb-2 w-100" id="credit_card">Credit Card</button>
                            <div id="card-element"></div>
                        </div>

                        <!-- Submit -->
                        <div class="mt-4 d-grid">
                            <button type="submit" class="btn btn-primary btn-lg rounded-3">Create Account</button>
                        </div>

                        <p class="text-center mt-3 text-muted">Already have an account? <a href="{{ route('login') }}" class="text-decoration-none">Login</a></p>

                    </form>

                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const membershipRadios = document.querySelectorAll('.membership-radio');
    const totalContainer = document.getElementById('urm-total_container');
    const paymentGatewayContainer = document.querySelector('.ur_payment_gateway_container');
    const totalInput = document.getElementById('ur-membership-total');
    const stripeContainer = document.querySelector('.stripe-container');
    const mobileBankingInputs = document.getElementById('mobile-banking-inputs');

    function handleMembershipChange() {
        const selected = document.querySelector('.membership-radio:checked');
        if(selected) {
            totalContainer.style.display = 'block';
            paymentGatewayContainer.style.display = 'block';
            totalInput.value = selected.dataset.value || 0;
        } else {
            totalContainer.style.display = 'none';
            paymentGatewayContainer.style.display = 'none';
            stripeContainer.style.display = 'none';
            mobileBankingInputs.style.display = 'none'; // Hide mobile banking inputs when no membership is selected
            totalInput.value = '';
        }
    }

    membershipRadios.forEach(radio => radio.addEventListener('change', handleMembershipChange));

    document.querySelectorAll('input[name="urm_payment_method"]').forEach(pg => {
        pg.addEventListener('change', function() {
            stripeContainer.style.display = this.value === 'stripe' ? 'block' : 'none';

            const mobileBankingMethods = ['bkash', 'nagad', 'duch_bangla'];
            if (mobileBankingMethods.includes(this.value)) {
                mobileBankingInputs.style.display = 'flex'; // Use flex to keep inputs in one row
            } else {
                mobileBankingInputs.style.display = 'none';
            }
        });
    });

    handleMembershipChange();
});</script>
@endsection

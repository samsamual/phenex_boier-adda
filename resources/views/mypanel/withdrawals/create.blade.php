@extends('frontend.layouts.ecommercemaster')
@section('title','Ebook - Create Withdraw')




@extends('frontend.layouts.ecommercemaster')
@section('title','Ebook - Favorite Book')
@section('content')
<section class="my-0 section">
  <div class="container">
    <div class="row">

    @include('mypanel.library.user_header')

      {{-- Main Content --}}
      <div class="col-lg-9">
        <div class="tab-content">
          {{-- purchase book Tab start--}}
            <div class="tab-pane fade {{ $activeTab=='CreateWithdrawals'?'show active':'' }}" id="CreateWithdrawals">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-info">
                        Your available balance is: <strong>৳{{ number_format(Auth::user()->balance, 2) }}</strong>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('user.withdrawals.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="amount">Withdrawal Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount" step="0.01" placeholder="0.00" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="payment_details">Payment Details</label>
                            <textarea class="form-control" id="payment_details" name="payment_details" rows="4" required></textarea>
                            <small class="form-text text-muted">Please provide your payment details (e.g., Bank Name, Account Number, PayPal Email, etc.)</small>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit Request</button>
                        <a href="{{ route('user.withdrawals.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
          </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
@endsection
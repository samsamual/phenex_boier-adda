@extends('frontend.layouts.ecommercemaster')
@section('title','Affiliate Dashboard')
@section('content')

<section class="py-4 bg-light">
  <div class="container">
    <div class="row">

      @include('mypanel.library.user_header')

      <div class="col-lg-9">
        <div class="card shadow-sm border-0">
          <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Affiliate Dashboard</h5>
            <span class="badge bg-light text-success">Referral ID: {{ $user->id }}</span>
          </div>

          <div class="card-body">

            {{-- Referral List --}}
            <h6 class="fw-bold mb-3">Your Referrals (Level 1)</h6>

            @if($referrals->count() > 0)
              <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                  <thead class="table-success">
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Join Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($referrals as $key => $ref)
                      <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $ref->name }}</td>
                        <td>{{ $ref->email }}</td>
                        <td>{{ $ref->mobile }}</td>
                        <td>{{ $ref->created_at->format('d M Y') }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @else
              <div class="alert alert-info">You haven’t referred anyone yet.</div>
            @endif

            {{-- Referral Earnings --}}
            <h6 class="fw-bold mt-4 mb-3">Referral Earnings</h6>

            @if($referralCollections->count() > 0)
              <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                  <thead class="table-success">
                    <tr>
                      <th>#</th>
                      <th>Referred User</th>
                      <th>Level</th>
                      <th>Amount</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($referralCollections as $key => $refCol)
                      <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ optional($refCol->user)->name }}</td>
                        <td>Level {{ $refCol->level }}</td>
                        <td>৳ {{ number_format($refCol->amount, 2) }}</td>
                        <td>{{ $refCol->created_at->format('d M Y') }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @else
              <div class="alert alert-warning">No referral earnings yet.</div>
            @endif

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

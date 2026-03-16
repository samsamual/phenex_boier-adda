@extends('frontend.layouts.ecommercemaster')
@section('title', 'Affiliate Dashboard')
@section('content')

<section class="py-4 bg-light">
  <div class="container">
    <div class="row">

      {{-- User header --}}
      @include('mypanel.library.user_header')

      <div class="col-lg-9">
        <div class="card shadow-sm border-0">
          <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Affiliate Dashboard</h5>
            <span class="badge bg-light text-success">Referral ID: {{ $user->id }}</span>
          </div>

          <div class="card-body">

            {{-- ============ Dynamic Referral Layers ============ --}}
            @if(isset($layers) && count($layers) > 0)
              @foreach($layers as $level => $users)
                <h6 class="fw-bold mb-3 text-success">
                  Your Referrals (Layer {{ $level }}) — Max: {{ pow($layerCount, $level) }}
                </h6>

                @if($users->count() > 0)
                  <div class="table-responsive mb-4">
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
                        @foreach($users as $key => $ref)
                          <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $ref->name }}</td>
                            <td>{{ $ref->email }}</td>
                            <td>{{ $ref->mobile }}</td>
                            <td>{{ optional($ref->created_at)->format('d M Y') ?? 'N/A' }}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                @else
                  <div class="alert alert-info">No referrals found for Layer {{ $level }}.</div>
                @endif
              @endforeach
            @else
              <div class="alert alert-info">You haven’t referred anyone yet.</div>
            @endif

            {{-- ============ Referral Earnings ============ --}}
            <h6 class="fw-bold mt-4 mb-3">Referral Earnings</h6>

            @if(isset($referralCollections) && $referralCollections->count() > 0)
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
                        <td>{{ optional($refCol->user)->name ?? 'Unknown' }}</td>
                        <td>Level {{ $refCol->level }}</td>
                        <td>৳ {{ number_format($refCol->amount, 2) }}</td>
                        <td>{{ optional($refCol->created_at)->format('d M Y') ?? 'N/A' }}</td>
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

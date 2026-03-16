@extends('frontend.layouts.ecommercemaster')
@section('title','Ebook - Withdaw List')




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
            <div class="tab-pane fade {{ $activeTab=='withdrawals'?'show active':'' }}" id="withdrawals">
            <div class="d-flex justify-content-between align-items-center my-4">
                <h2>My Withdrawals</h2>
                <a href="{{ route('user.withdrawals.create') }}" class="btn btn-primary">Request a New Withdrawal</a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Payment Details</th>
                                    <th>Admin Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($withdrawals as $withdrawal)
                                    <tr>
                                        <td>{{ $withdrawal->created_at->format('Y-m-d') }}</td>
                                        <td>৳{{ number_format($withdrawal->amount, 2) }}</td>
                                        <td>
                                            @if($withdrawal->status == 'pending')
                                                <span class="badge bg-warning">Pending</span>
                                            @elseif($withdrawal->status == 'approved')
                                                <span class="badge bg-success">Approved</span>
                                            @elseif($withdrawal->status == 'rejected')
                                                <span class="badge bg-danger">Rejected</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span data-toggle="tooltip" data-placement="top" title="{{ $withdrawal->payment_details }}">
                                                {{ Str::limit($withdrawal->payment_details, 30) }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($withdrawal->admin_notes)
                                            <span data-toggle="tooltip" data-placement="top" title="{{ $withdrawal->admin_notes }}">
                                                {{ Str::limit($withdrawal->admin_notes, 30) }}
                                            </span>
                                            @else
                                                N/A
                                            @endif
                                        </td>                                    
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">You have not made any withdrawal requests yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination Links --}}
                    <div class="d-flex justify-content-center">
                        {{ $withdrawals->links() }}
                    </div>
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

@push('js')
<script>
    // Initialize Bootstrap tooltips
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endpush


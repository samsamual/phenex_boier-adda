@extends('frontend.layouts.ecommercemaster')
@section('title','Ebook - Purchase Book')
@section('content')
<section class="my-0 section">
  <div class="container">

     <!-- Success/Error Messages -->
      @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      @if(session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
      @endif
    <div class="row">

    @include('mypanel.library.user_header')

      {{-- Main Content --}}
      <div class="col-lg-9">
        <div class="tab-content">
          {{-- purchase book Tab start--}}
            <div class="tab-pane fade {{ $activeTab=='purchase'?'show active':'' }}" id="favorite">
            <div class="card">
              <div class="card-header bg-success text-white">Purchase Books</div>
              <div class="card-body">
                  <!-- purchase books content here  -->
                @forelse($books as $bookEntry)
                    <div class="col-md-4 col-lg-3 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ asset('storage/product_images/' . $bookEntry->product->featured_image) }}" class="card-img-top" alt="{{ $bookEntry->product->name_en }}" style="height: 250px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $bookEntry->product->name_en }}</h5>
                                <p class="card-text text-muted">By: {{ $bookEntry->product->author ?? 'N/A' }}</p>
                                
                                <a href="{{ asset('storage/product_files/' . $bookEntry->product->file_path) }}" target="_blank" class="btn btn-primary mt-auto">Read Now</a>
                            </div>
                        </div>
                    </div>
                @empty 
                <div class="alert alert-info">
                    You have not added any books to your favorites yet.
                </div>
                @endforelse
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




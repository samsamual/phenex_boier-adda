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
          {{-- Favorite Books Tab --}}
          <div class="tab-pane fade {{ $activeTab=='favorite'?'show active':'' }}" id="favorite">
            <div class="card">
              <div class="card-header bg-success text-white">Favorite Books</div>
              <div class="card-body">
                @if($books->count())
                  <div class="row g-4"> {{-- ✅ Bootstrap grid row with gap --}}
                    @foreach($books as $bookEntry)
                      <div class="col-md-4 col-lg-3 col-sm-6"> {{-- ✅ responsive grid --}}
                        <div class="card h-100 shadow-sm">
                          <img src="{{ asset('storage/product_images/' . $bookEntry->product->featured_image) }}" 
                               class="card-img-top" 
                               alt="{{ $bookEntry->product->name_en }}" 
                               style="height: 250px; object-fit: cover;">
                          <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-truncate">{{ $bookEntry->product->name_en }}</h5>
                            <p class="card-text text-muted small mb-2">
                              By: {{ $bookEntry->product->author ?? 'N/A' }}
                            </p>
                            <a href="{{ route('user.read.book', $bookEntry->product->id) }}" 
                               target="_blank" 
                               class="btn btn-primary mt-auto">
                              Read Now
                            </a>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                @else
                  <div class="alert alert-info m-3">
                    You have not added any books to your favorites yet.
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
@endsection

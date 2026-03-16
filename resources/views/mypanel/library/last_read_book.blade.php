@extends('frontend.layouts.ecommercemaster')
@section('title','Ebook - Last Read Book')
@section('content')
<section class="my-0 section">
  <div class="container">
    <div class="row">

    @include('mypanel.library.user_header')

      {{-- Main Content --}}
      <div class="col-lg-9">
        <div class="tab-content">
          {{-- purchase book Tab start--}}
            <div class="tab-pane fade {{ $activeTab=='last'?'show active':'' }}" id="last">
            <div class="card">
              <div class="card-header bg-success text-white">Continue Reading</div>
              <div class="card-body">
                @if($bookEntry)
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card shadow-sm">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ asset('storage/product_images/' . $bookEntry->product->featured_image) }}" class="img-fluid rounded-start" alt="{{ $bookEntry->product->name_en }}">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h4 class="card-title">{{ $bookEntry->product->name_en }}</h4>
                                            <p class="card-text text-muted">By: {{ $bookEntry->product->author ?? 'N/A' }}</p>
                                            <p class="card-text"><small class="text-muted">Last read on: {{ $bookEntry->last_read_at->format('F j, Y, g:i a') }}</small></p>
                                            <hr>
                                            <p class="card-text">{{ $bookEntry->product->excerpt_en }}</p>
                                            <a href="{{ asset('storage/product_files/' . $bookEntry->product->file_path) }}" target="_blank" class="btn btn-primary btn-lg">Continue Reading</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="alert alert-info">
                        You have not started reading any books yet.
                    </div>
                @endif
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
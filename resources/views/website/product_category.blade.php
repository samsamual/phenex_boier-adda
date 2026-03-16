@extends('frontend.layouts.ecommercemaster')
@section('title', "Genres- " .env('APP_NAME'))

@section('content')
<div id="content" class="site-content py-4 " style="background-color: #F4F4F4;">
    <div class="container">
        <nav class="mb-3">
            <ol class="breadcrumb bg-transparent p-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active text-capitalize" aria-current="page">{{ $slug }}</li>
            </ol>
        </nav>

        <header class="mb-4">
            <h1 class="fw-bold text-dark text-capitalize">{{ $slug }}</h1>
            <p class="text-muted">Browse the latest ebooks under <strong>{{ ucfirst($slug) }}</strong>.</p>
        </header>

        {{-- Sorting & Count --}}
        <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
            <p class="text-secondary mb-2">
                Showing {{ $products->count() }} of {{ $products->total() }} results
            </p>
            <form method="get" class="d-flex align-items-center">
                <label class="me-2 fw-semibold">Sort by:</label> <br>
                <select name="sort" class="form-select form-select-sm" onchange="this.form.submit()">
                    <option value="1" {{ request('sort') == 1 ? 'selected' : '' }}>Newest first</option>
                    <option value="2" {{ request('sort') == 2 ? 'selected' : '' }}>Oldest first</option>
                    <option value="4" {{ request('sort') == 4 ? 'selected' : '' }}>Price: Low to High</option>
                    <option value="3" {{ request('sort') == 3 ? 'selected' : '' }}>Price: High to Low</option>
                </select>
            </form>
        </div>

        {{-- Product Grid --}}
        <div class="row g-3">
            @forelse($products as $product)
            <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm border-0 rounded-3">
                    <div class="position-relative">
                        <a href="{{ route('productDetails', $product->slug) }}">
                            <img src="{{ route('imagecache', ['template' => 'pnism', 'filename' => $product->fi()]) }}"
                                class="card-img-top rounded-top"
                                alt="{{ $product->name_en }}"
                                loading="lazy"
                                style="width: 100%; height: auto; object-fit: contain;">

                        </a>
                        <button class="btn btn-sm btn-outline-primary position-absolute top-0 end-0 m-2 rounded-pill px-2 py-1">
                            <i class="bi bi-bag"></i> Add
                        </button>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            {{-- Categories --}}
                            <small class="text-muted d-block mb-1">
                                @foreach ($product->categories as $key => $category)
                                    {{ $category->name_en }}@if(!$loop->last),@endif
                                @endforeach
                            </small>

                            {{-- Product Title --}}
                            <h6 class="card-title mb-1 text-truncate">
                                <a href="{{ route('productDetails', $product->slug) }}" class="text-dark text-decoration-none">
                                    {{ $product->name_en }}
                                </a>
                            </h6>

                            {{-- Rating (Placeholder) --}}
                            <div class="small text-warning mb-1">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                            </div>

                            {{-- Price --}}
                            <div>
                                @if($product->discount > 0.00)
                                    <span class="text-muted text-decoration-line-through me-1">
                                        {{ number_format($product->price, 2) }} ৳
                                    </span>
                                @endif
                                <span class="fw-bold text-primary">
                                    {{ number_format($product->final_price, 2) }} ৳
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <h5 class="text-muted">No products found for this genre.</h5>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection

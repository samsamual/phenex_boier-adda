@extends('frontend.layouts.ecommercemaster')
@section('title', "Book Detail - " .env('APP_NAME'))

@push('css')

<style>
.card-hover {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card-hover:hover {
    transform: translateY(-1px) scale(1.01);
    /* subtle movement + light zoom */
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.12);
    /* soft shadow */
}
</style>
<style>
.book-fold {
    position: relative;
    height: 100%;
    width: 100%;
    display: block; /* Changed from inline-block to block */
    transition: transform 0.6s ease;
    transform-style: preserve-3d;
    cursor: pointer;
}

.book-fold img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    display: block;
    border-radius: 8px;
    transition: transform 0.6s ease;
    width: 100%;
    display: block;
    border-radius: 8px;
    transition: transform 0.6s ease;
}

/* Book page fold effect */
.book-fold:hover img {
    transform: rotateY(-25deg);
    box-shadow: 8px 0 20px rgba(0, 0, 0, 0.2);
}
</style>
<style>
.floating-alert-box {
    position: absolute;
    top: 0;
    right: 0;
    background: #fff3f3;
    border: 1px solid #ffb3b3;
    padding: 8px 14px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    gap: 6px;
    box-shadow: 0 0 10px rgba(255, 0, 0, 0.2);
    z-index: 10;
}

.text-red {
    color: #e60000;
    font-weight: bold;
    font-size: 15px;
}

.arrow-down {
    color: #e60000;
    font-size: 20px;
    font-weight: bold;
    animation: bounce 0.8s infinite;
}

@keyframes bounce {
    0%   { transform: translateY(0); }
    50%  { transform: translateY(6px); }
    100% { transform: translateY(0); }
}

</style>
<style>
    .image-box-wrapper {
    height: 500px;
    background: #ffffff;
    padding: 15px;
    border-radius: 10px;
    border: 1px solid #eee;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    position: relative; /* Important */
    overflow: hidden; /* Added to contain child elements */
}

</style>

@endpush

@section('content')

@php
$cart = $cart ?? \App\Models\Cart::where('product_id', $product->id)
->when(Auth::check(), fn($q) => $q->where('user_id', Auth::id()))
->when(!Auth::check(), fn($q) => $q->where('session_id', session('session_id')))
->first();
@endphp


<section class="section my-0 py-0">
    <div class="container py-5">

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="row g-4">


<!-- Product Image -->
<div class="col-lg-4">
    <div class="image-box-wrapper position-relative">
        <div class="floating-alert-box">
            <span class="text-red">একটু পড়ে দেখুন</span>
            <span class="arrow-down">⬇</span>
        </div>

        <div class="book-fold manual pdf-trigger" 
            data-product-id="{{ $product->id }}"
            data-bs-toggle="modal" data-bs-target="#pdfReaderModal">
            <img src="{{ route('imagecache', ['template' => 'original', 'filename' => $product->fi()]) }}"
                class="img-fluid rounded" alt="{{ $product->name_en }}">
        </div>

    </div>
</div>




            <!-- Product Info -->
            <div class="col-lg-6">
                <h1 class="h3 fw-bold mb-3">{{$product->name_en}}</h1>


                {{-- @if($product->discount > 0.00)
        <span class="text-muted text-decoration-line-through me-2 w3-medium">
            {{ number_format($product->price, 2) }} ৳
                </span>
                @endif
                <span class="fw-bold text-primary w3-medium">
                    {{ number_format($product->final_price, 2) }} ৳
                </span> --}}

                {{-- @if($product->discount > 0.00)
                <span class="text-muted text-decoration-line-through me-2 w3-medium unitPriceBox"
                    data-unit-price="{{ $product->price }}">
                {{ number_format($cart->quantity * $product->price, 2) }} ৳
                </span>
                @endif

                <span class="fw-bold text-primary w3-medium finalPriceBox"
                    data-unit-price="{{ $product->final_price }}">
                    {{ number_format($cart->quantity * $cart->product->final_price, 2) }} ৳
                </span> --}}



                @if($product->discount > 0.00)
                <span class="text-muted text-decoration-line-through me-2 w3-medium unitPriceBox"
                    data-unit-price="{{ $product->price }}">

                    @if(isset($cart->quantity))
                    {{ number_format($cart->quantity * $product->price, 2) }} ৳
                    @else
                    {{ number_format($product->price, 2) }} ৳
                    @endif

                </span>
                @endif

                {{-- Show Final Price --}}
                <span class="fw-bold text-primary w3-medium finalPriceBox"
                    data-unit-price="{{ $product->final_price }}">

                    @if(isset($cart->quantity))
                    {{ number_format($cart->quantity * $product->final_price, 2) }} ৳
                    @else
                    {{ number_format($product->final_price, 2) }} ৳
                    @endif

                </span>




                <hr class="my-2">


                <div class="d-flex justify-content-between">
                    <p class="text-muted small mb-3 w3-small">Category:
                        <a href="#" class="text-decoration-none">
                            @foreach ($product->categories as $category)
                            <span class="w3-small">{{ $category->name_en }}</span>
                            @endforeach
                        </a>


                    </p>

                </div>



                @if($product->stock > 0)
                <p class="mb-3">
                    <span class="badge bg-success px-3 py-2">
                        In Stock
                    </span>
                </p>
                @else
                <p class="mb-3">
                    <span class="badge bg-danger px-3 py-2">
                        Out of Stock
                    </span>
                </p>
                @endif

                <div style="width: 150px;">
                    <div class="mt-auto productCartItem" data-product="{{ $product->id }}">
                        @include('frontend.home.includes.productCartItem')
                    </div>
                </div>


            </div>
        </div>


        <!-- Product Details Tabs -->
        <div class="mt-5">
            <ul class="nav nav-tabs" id="productTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                        data-bs-target="#description" type="button" role="tab">
                        Description
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button"
                        role="tab">
                        Reviews (0)

                    </button>
                </li>
            </ul>

            <div class="tab-content p-4 border border-top-0 rounded-bottom" id="productTabContent">

                {{-- ✅ Description Tab --}}
                <div class="tab-pane fade show active" id="description" role="tabpanel"
                    aria-labelledby="description-tab">
                    {!! $product->description_en !!}
                </div>


                {{-- ✅ Reviews Tab --}}
                {{-- <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
            <div class="row">
                <div class="col-md-6">

               
                    <div class="mb-4">
                        @php
                            $avgRating = round($product->averageRating(), 1);
                            $reviewCount = $product->reviews->count();
                        @endphp

                        <h5>Average Rating</h5>
                        <div class="d-flex align-items-center mb-2">
                            <div class="text-warning me-2">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fa fa-star{{ $i <= $avgRating ? '' : '-o' }}"></i>
                @endfor
            </div>
            <span>{{ $avgRating }} / 5 ({{ $reviewCount }} reviews)</span>
        </div>
    </div>


    <h5>Customer Reviews</h5>
    <div class="mb-4">
        @if($product->reviews->isNotEmpty())
        @foreach($product->reviews as $review)
        <div class="border-bottom pb-3 mb-3">
            <strong>{{ $review->user->name ?? 'Anonymous' }}</strong>
            <div class="text-warning small">
                @for($i = 1; $i <= 5; $i++) <i class="fa fa-star{{ $i <= $review->rating ? '' : '-o' }}"></i>
                    @endfor
            </div>
            <p class="mb-0">{{ $review->comment }}</p>
        </div>
        @endforeach
        @else
        <p class="text-muted">There are no reviews yet.</p>
        @endif
    </div>
    </div>


    <div class="col-md-6">
        <h5>Write a Review</h5>
        <form action="{{ route('reviewsStore') }}" method="POST">
            @csrf


            <input type="hidden" value="{{$product->id}}" name="product_id">

            <div class="mb-3">
                <label class="form-label">Your Rating
                    <span class="text-danger">*</span>
                </label>
                <div class="rating-input d-flex gap-2">
                    @for($i = 1; $i <= 5; $i++) <input type="radio" class="btn-check" name="rating" id="rating{{ $i }}"
                        value="{{ $i }}" required>
                        <label class="btn btn-outline-warning btn-sm" for="rating{{ $i }}">
                            <i class="fa fa-star"></i> {{ $i }}
                        </label>
                        @endfor
                </div>
            </div>


            <div class="mb-3">
                <label for="comment" class="form-label">Your Review
                    <span class="text-danger">*</span>
                </label>
                <textarea name="comment" id="comment" rows="4" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit Review</button>
        </form>
    </div>
    </div>
    </div> --}}
    </div>
    </div>


    <!-- Related Products -->
    <div class="row mt-5">
        <h3 class="fw-bold mb-4">Related Products</h3>
        <hr class="mb-0">

        <div class="row g-3">
            @foreach ($relatedProducts as $product)
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card h-100 border-0 shadow-sm card-hover">

                    <!-- Image -->
                    <a href="{{ route('productDetails', $product->slug) }}" class="d-block">
                        <img src="{{ route('imagecache', ['template' => 'pnism', 'filename' => $product->fi()]) }}"
                            class="card-img-top rounded-top" alt="{{ $product->name_en }}">
                    </a>

                    <!-- Body -->
                    <div class="card-body d-flex flex-column p-3">

                        <!-- Category -->
                        <small class="d-block text-uppercase mb-1">
                            @foreach ($product->categories as $key => $category)
                            <span class="font-weight-bold" style="color: #dc3545">
                                {{ $category->name_en }}
                            </span>@if(!$loop->last), @endif
                            @endforeach
                        </small>

                        <!-- Product Name -->
                        <h6 class="fw-semibold text-truncate mb-2">
                            <a href="{{ route('productDetails', $product->slug) }}"
                                class="text-dark text-decoration-none">
                                {{ $product->name_en }}
                            </a>
                        </h6>

                        <!-- Price -->
                        <div class="mb-1">
                            @if($product->discount > 0.00)
                            <span class="text-muted text-decoration-line-through me-2 w3-small">
                                {{ number_format($product->price, 2) }} ৳
                            </span>
                            @endif
                            <span class="fw-bold text-primary w3-small">
                                {{ number_format($product->final_price, 2) }} ৳
                            </span>
                        </div>

                        <!-- Add to Cart Button -->
                        <div class="mt-auto productCartItem" data-product="{{ $product->id }}">
                            @include('frontend.home.includes.productCartItem')
                        </div>

                    </div>
                </div>
            </div>


            <!-- pdf read modal  -->
            <!-- PDF Modal -->
<!-- PDF Modal -->
<div class="modal fade" id="pdfReaderModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Read Product PDF</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0">
                <iframe id="pdfFrame" src="" style="width: 100%; height: 85vh;" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>


            @endforeach
        </div>



    </div>

    </div>

</section>
@endsection

@push('css')

@endpush
@push('js')
<script>
document.querySelectorAll('.pdf-trigger').forEach(el => {
    el.addEventListener('click', function() {
        const iframe = document.getElementById('pdfFrame');
        const productId = this.getAttribute('data-product-id');
        
        // Use the route instead of direct file access
        iframe.src = `/pdf/view/${productId}`;
    });
});

// Clear iframe when modal closes
const modal = document.getElementById('pdfReaderModal');
modal.addEventListener('hidden.bs.modal', function () {
    document.getElementById('pdfFrame').src = '';
});
</script>
@endpush

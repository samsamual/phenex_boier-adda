<style>
.quick-view-images {
    width: 100%;
    height: 500px; /* Taller rectangular area */
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f8f9fa; /* light background */
}

.quick-view-images img {
    height: 100%;
    width: auto; /* Keep natural width */
    object-fit: contain; /* Keeps full book visible, no cropping */
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
</style>

<div class="quick-view-product container-fluid">
    <div class="row align-items-center">
        <!-- Left: Image -->
        <div class="col-md-6 col-sm-12 mb-3 mb-md-0">
            <div class="quick-view-images text-center">
                <img src="{{ route('imagecache', ['template' => 'pnism', 'filename' => $product->fi()]) }}" 
                    alt="{{ $product->name_en }}" 
                    class="quick-view-main-image">
            </div>
        </div>


        <!-- Right: Details -->
        <div class="col-md-6 col-sm-12">
            <div class="quick-view-details p-3">
                <h2 class="product-title mb-3">{{ $product->name_en }}</h2>

                <div class="quick-view-price mb-3">
                    <span class="price h4 text-primary">৳{{ number_format($product->price, 2) }}</span>
                    @if($product->discount_price)
                    <span class="discount-price text-danger ms-2">
                        <del>৳{{ number_format($product->discount_price, 2) }}</del>
                    </span>
                    @endif
                </div>

                @php
                function html_limit($html, $limit = 100) {
                    $text = strip_tags($html);
                    return strlen($text) > $limit ? substr($text, 0, $limit) . '...' : $text;
                }
                @endphp

                <div class="quick-view-description mb-3">
                    {!! html_limit($product->description_en, 100) !!}
                </div>

                <div class="quick-view-meta mb-3">
                    <p><strong>Category:</strong> 
                        @foreach($product->categories as $category)
                            {{ $category->name_en ?? 'N/A' }}@if(!$loop->last),@endif
                        @endforeach
                    </p>

                    <p><strong>Availability:</strong> 
                        <span class="{{ $product->stock > 0 ? 'text-success' : 'text-danger' }}">
                            {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                        </span>
                    </p>
                </div>

                <div class="quick-view-actions">
                    <div class="productCartItem">
                        @include('frontend.home.includes.productCartItem')
                    </div>

                    <a href="{{ route('productDetails', $product->slug) }}" class="btn btn-outline-primary btn-lg w-100 mt-2">
                        View Full Details
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

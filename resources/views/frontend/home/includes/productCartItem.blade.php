@php
    $cart = $cart ?? \App\Models\Cart::where('product_id', $product->id)
        ->when(Auth::check(), fn($q) => $q->where('user_id', Auth::id()))
        ->when(!Auth::check(), fn($q) => $q->where('session_id', session('session_id')))
        ->first();
@endphp

<div class="cart-action-wrapper" 
    data-product="{{ $product->id }}"
    @if($cart) data-cart="{{ $cart->id }}" @endif>
    @if($cart)
        <!-- Simple display for digital items in cart (no quantity controls) -->
        <div class="text-center">
            <span class="badge bg-success me-2">✓ Added</span>
            <button
                class="btn btn-danger btn-sm deleteCartItem"
                data-url="{{ route('cartRemoveItem', $cart->id ) }}"
                data-cart="{{ $cart->id }}"
            >
                Remove
            </button>
        </div>
    @else
        <!-- Add to Cart Button -->
        <input type="hidden" name="product_qty" value="1" class="product_qty">
        <button
            class="btn btn-outline-primary w-100 btn-sm addToCart"
            data-url="{{ route('addToCart') }}"
            data-product="{{ $product->id }}"
        >
           Buy Now
        </button>
    @endif
</div>
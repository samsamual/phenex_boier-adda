<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <!-- CSRF Token for JS -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <meta name="keywords" content="shasthoseba" />
    <meta name="description" content="shasthoseba">
    <meta name="author" content="shasthoseba">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ route('imagecache', ['template' => 'original', 'filename' => $ws->favicon()]) }}"
        type="image/x-icon" />
    <link rel="apple-touch-icon"
        href="{{ route('imagecache', ['template' => 'original', 'filename' => $ws->favicon()]) }}">
    <link rel="icon" href="{{ route('imagecache', ['template' => 'original', 'filename' => $ws->favicon()]) }}"
        type="image/x-icon">


    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- Web Fonts  -->
    <link id="googleFonts"
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap"
        rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('https://www.w3schools.com/w3css/5/w3.css')}}">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{asset('h-frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('h-frontend/assets/vendor/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('h-frontend/assets/vendor/animate/animate.compat.css')}}">
    <link rel="stylesheet" href="{{asset('h-frontend/assets/vendor/simple-line-icons/css/simple-line-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('h-frontend/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('h-frontend/assets/vendor/owl.carousel/assets/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('h-frontend/assets/vendor/magnific-popup/magnific-popup.min.css')}}">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('h-frontend/assets/css/theme.css')}}">
    <link rel="stylesheet" href="{{asset('h-frontend/assets/css/theme-elements.css')}}">
    <link rel="stylesheet" href="{{asset('h-frontend/assets/css/theme-blog.css')}}">
    <link rel="stylesheet" href="{{asset('h-frontend/assets/css/theme-shop.css')}}">

    <!-- Demo CSS -->
    <link rel="stylesheet" href="{{asset('h-frontend/assets/css/demos/demo-medical.css')}}">

    <!-- Skin CSS -->
    <link id="skinCSS" rel="stylesheet" href="{{asset('h-frontend/assets/css/skins/skin-medical.css')}}">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{asset('h-frontend/assets/css/custom.css')}}">


    @stack('css')
    <style>
    .envato-buy-redirect {
        position: fixed;
        /* make it sticky/floating */
        bottom: 20px;
        /* distance from bottom */
        right: 2px;
        /* distance from right */
        z-index: 9999;
        /* above everything */
        background: #fff;
        /* optional, button background */
        padding: 10px 12px;
        border-radius: 50%;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .extra-cart-info {
        position: absolute;
        /* top: -8px; */
        /* right: -8px; */
        top: 3px;
        right: 3rem;
        width: 18px;
        height: 18px;
        text-align: center;
        line-height: 18px;
        background: #18443F;
        color: #fff;
        border-radius: 50%;
        font-size: 12px;
    }

    /* @media (max-width: 768px) {
				.envato-buy-redirect {
					bottom: 15px;
					right: 15px;
					padding: 8px 10px;
				}

				.extra-cart-info {
					width: 16px;
					height: 16px;
					line-height: 16px;
					font-size: 10px;
				}
			} */

    .nav-link {
        text-transform: none !important;
    }
    </style>
    <style>
    /* Default: hidden and not affecting layout */
    .mobile-bottom-bar {
        display: none;
        position: static;
        height: 0;
        overflow: hidden;
    }

    /* Show only on mobile */
    @media (max-width: 768px) {
        .envato-buy-redirect {
            display: none !important;
        }

        .mobile-bottom-bar {
            display: flex !important;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 60px;
            align-items: center;
            justify-content: space-between;
            background: #fff;
            box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.1);
            padding: 0 10px;
            z-index: 9999;
        }

        .checkout-btn {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #2D529F;
            color: #fff;
            font-weight: bold;
            padding: 5px 36px;
            border-radius: 10px;
            height: 90%;
            min-width: 120px;
            text-decoration: none;
        }

        .checkout-btn i {
            margin-left: 8px;
            font-size: 18px;
        }

        .checkout-price {
            position: absolute;
            top: 5px;
            right: 10px;
            background: red;
            color: #fff;
            font-size: 12px;
            padding: 2px 6px;
            border-radius: 50%;
        }

        .other-icons {
            display: flex;
            gap: 20px;
            flex: 1;
            justify-content: flex-end;
        }

        .other-icons a {
            color: #2D529F;
            font-size: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    }
    </style>

</head>

<body>
    @php
    $count_info = \App\Models\Cart::when(Auth::check(), fn($q) => $q->where('user_id', operator: Auth::id()))
    ->when(value: !Auth::check(), callback: fn($q) => $q->where('session_id', session('session_id')));
    $count_data = $count_info->count();
    $totalCartPrice = \App\Models\Cart::totalCartPrice();
    @endphp
    <div class="body" style="background-color: #F4F4F4;">
        @include('frontend.layouts.ecommerceheader')
        <div role="main" class="main">

            <a class="envato-buy-redirect" href="{{ route('new.checkout')}}">
                <i class="fas fa-shopping-cart w3-large" style="color: #2D529F"></i>
                <span class="extra-cart-info" style="background: #2D529F">
                    <span class="cartItemsCount" id="">{{  $count_data }}</span>
                </span>
            </a>

            <!-- Bottom Nav Bar start-->
            <div class="mobile-bottom-bar">
                <a href="{{ route('new.checkout')}}" class="checkout-btn">
                    <span class="checkout-text">Checkout</span>
                    <span class="checkout-price mobileCartTotalPrice">৳{{ $totalCartPrice }}</span>
                    <i class="fas fa-shopping-cart"></i>
                </a>
                <div class="other-icons">
                    <a href="{{ url('/') }}"><i class="fas fa-home"></i></a>
                    <a href="{{ url('/books') }}"><i class="fas fa-th-large"></i></a>
                    <a href="#"><i class="fas fa-search"></i></a>
                </div>
            </div>
            <!-- Bottom Nav Bar end-->
            @include('sweetalert::alert')
            @yield('content')
        </div>
        @include('frontend.layouts.footer')
    </div>

    <!-- Vendor -->
    <script src="{{asset('h-frontend/assets/vendor/plugins/js/plugins.min.js')}}"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="{{asset('h-frontend/assets/js/theme.js')}}"></script>

    <!-- Current Page Vendor and Views -->
    <script src="{{asset('h-frontend/assets/js/views/view.contact.js')}}"></script>

    <!-- Demo -->
    <script src="{{asset('h-frontend/assets/js/demos/demo-medical.js')}}"></script>

    <!-- Theme Custom -->
    <script src="{{asset('h-frontend/assets/js/custom.js')}}"></script>

    <!-- Theme Initialization Files -->
    <script src="{{asset('h-frontend/assets/js/theme.init.js')}}"></script>

    <!-- sweetalert2 js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    @stack('js')



    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {

        // Add to Cart
        $(document).on("click", ".addToCart", function() {
            let btn = $(this);
            let url = btn.data("url");
            let product_id = btn.data("product");
            let qty = parseInt(btn.closest(".productCartItem").find(".product_qty").val()) || 1;

            $.post(url, {
                product: product_id,
                qty: qty
            }, function(res) {
                if (res.status) {
                    btn.closest(".productCartItem").html(res.productCartItem);
                    $(".cartCount").text(res.cartCount);
                    $(".cartItemsCount").text(res.cartItemsCount);
                    $(".cartTotalPrice").text(res.cartTotal.toFixed(2) + " tk");
                    $(".mobileCartTotalPrice").text("৳" + res.cartTotal.toFixed(2));

                    Swal.fire({
                        toast: true,
                        icon: "success",
                        title: res.message,
                        position: "top",
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            }).fail(() => {
                Swal.fire("Error", "Could not add to cart.", "error");
            });
        });


        $(document).on('click', '.updateCartItemold', function(e) {
            e.preventDefault();

            let $btn = $(this);
            let cartId = $btn.data('cart');
            let url = $btn.data('url');
            let $wrapper = $btn.closest('.cart-action-wrapper');
            let qty = parseInt($wrapper.find('.cartQtyDisplay').text()) || 0;

            // Update quantity
            if ($btn.hasClass('plus')) {
                qty++;
            } else if ($btn.hasClass('minus')) {
                qty--;
                if (qty < 0) qty = 0; // prevent negative qty
            }

            // Disable button during AJAX
            $btn.prop('disabled', true);

            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    cart: cartId,
                    new_qty: qty,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                    if (res.status) {
                        if (qty === 0) {
                            // Replace qty box with "Add to Cart"
                            $wrapper.html(`
									<input type="hidden" name="product_qty" value="1" class="product_qty">
									<button class="btn btn-outline-primary w-100 btn-sm addToCart"
										data-url="${res.add_to_cart_url}"
										data-product="${res.product_id}">
										ADD TO CART
									</button>
								`);

                            // If no cart items left → redirect


                            if ($(".cart-item").length === 0) {
                                window.location.href = "/books";
                            }
                        } else {
                            // Update qty display & button data
                            $wrapper.find('.cartQtyDisplay').text(qty);
                            $wrapper.find('.plus').data('qty', qty);
                            $wrapper.find('.minus').data('qty', qty);

                            // Update row subtotal
                            let $row = $btn.closest('.cart-item');
                            let $priceBox = $row.find('.itemTotalPrice');
                            if ($priceBox.length) {
                                let unitPrice = parseFloat($priceBox.data('unit-price'));
                                $priceBox.text("Tk. " + (unitPrice * qty).toFixed(2));
                            }
                        }

                        // Update header/cart summary
                        $('.cartCount').text(res.cartCount);
                        $('.cartItemsCount').text(res.cartItemsCount);

                        $(".subtotal").text("Tk. " + res.cartTotal.toFixed(2));
                        $(".discount").text("-Tk. " + res.discount.toFixed(2));
                        $(".payable").text("Tk. " + res.payable.toFixed(2));
                        $(".mobileCartTotalPrice").text('৳' + res.payable.toFixed(2));
                    }
                },
                error: function() {
                    alert('Something went wrong! Please try again.');
                },
                complete: function() {
                    $btn.prop('disabled', false);
                }
            });
        });


        $(document).on('click', '.updateCartItem', function(e) {
            e.preventDefault();

            let $btn = $(this);
            let cartId = $btn.data('cart');
            let url = $btn.data('url');
            let $wrapper = $btn.closest('.cart-action-wrapper');
            let qty = parseInt($wrapper.find('.cartQtyDisplay').text()) || 0;

            // Qty update
            if ($btn.hasClass('plus')) {
                qty++;
            } else if ($btn.hasClass('minus')) {
                qty--;
                if (qty < 0) qty = 0; // negative prevent
            }

            $btn.prop('disabled', true); // prevent double click

            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    cart: cartId,
                    new_qty: qty,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                    if (res.status) {
                        if (qty === 0) {
                            // Show Add to Cart
                            $wrapper.html(`
									<input type="hidden" name="product_qty" value="1" class="product_qty">
									<button class="btn btn-outline-primary w-100 btn-sm addToCart"
										data-url="${res.add_to_cart_url}"
										data-product="${res.product_id}">
										ADD TO CART
									</button>
								`);

                            if ($(".cart-item").length === 0) {
                                window.location.href = "/books";
                            }
                        } else {
                            // Update qty display
                            $wrapper.find('.cartQtyDisplay').text(qty);
                            $wrapper.find('.plus').data('qty', qty);
                            $wrapper.find('.minus').data('qty', qty);

                            // ✅ Row subtotal update (cart page)
                            let $row = $btn.closest('.cart-item');
                            let $priceBox = $row.find('.itemTotalPrice');
                            if ($priceBox.length) {
                                let unitPrice = parseFloat($priceBox.data('unit-price'));
                                $priceBox.text("Tk. " + (unitPrice * qty).toFixed(2));
                            }

                            // ✅ Product details price update
                            updateProductDetailsPrice(qty);
                        }

                        // ✅ Header/cart summary update
                        $('.cartCount').text(res.cartCount);
                        $('.cartItemsCount').text(res.cartItemsCount);
                        $(".subtotal").text("Tk. " + res.cartTotal.toFixed(2));
                        $(".discount").text("-Tk. " + res.discount.toFixed(2));
                        $(".payable").text("Tk. " + res.payable.toFixed(2));
                        $(".mobileCartTotalPrice").text('৳' + res.payable.toFixed(2));
                    }
                },
                error: function() {
                    alert('Something went wrong! Please try again.');
                },
                complete: function() {
                    $btn.prop('disabled', false);
                }
            });
        });

        /**
         * ✅ Update product details page price dynamically
         */
        function updateProductDetailsPrice(qty) {
            let unitPriceBox = $('.unitPriceBox');
            let finalPriceBox = $('.finalPriceBox');

            if (finalPriceBox.length) {
                let unitFinal = parseFloat(finalPriceBox.data('unit-price'));
                finalPriceBox.text((unitFinal * qty).toFixed(2) + " ৳");
            }
            if (unitPriceBox.length) {
                let unitStrike = parseFloat(unitPriceBox.data('unit-price'));
                unitPriceBox.text((unitStrike * qty).toFixed(2) + " ৳");
            }
        }





        // Delete Cart Item
        $(document).on("click", ".deleteCartItem", function() {
            let btn = $(this);
            $.post(btn.data("url"), {}, function(res) {
                if (res.status) {
                    $('.cart-item[data-cart="' + res.cart_id + '"]').remove();

                    if ($(".cart-item").length === 0) {
                        window.location.href = "/books";
                    }

                    $(".cartCount").text(res.cartCount);
                    $(".cartTotalPrice").text(res.cartTotal.toFixed(2) + " tk");
                    $(".subtotal").text("Tk. " + res.cartTotal.toFixed(2));
                    $(".discount").text("-Tk. " + res.discount.toFixed(2));
                    $(".payable").text("Tk. " + res.payable.toFixed(2));
                    $(".mobileCartTotalPrice").text('৳' + res.payable.toFixed(2));

                    Swal.fire({
                        toast: true,
                        icon: "success",
                        title: res.message,
                        position: "top-end",
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            }).fail(() => {
                Swal.fire("Error", "Cart item could not be removed.", "error");
            });
        });

    });
    </script>


</body>

</html>
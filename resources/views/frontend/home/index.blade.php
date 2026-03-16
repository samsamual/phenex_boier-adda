@extends('frontend.layouts.ecommercemaster')
@section('title', "Home- " .env('APP_NAME'))
@section('content')

<style>
/* ===== Product Card Wrapper ===== */
.product-box-container {
    position: relative;
    width: 100%;
    overflow: hidden;
    border-radius: 12px;
    transition: all 0.4s ease;
    background: #fff;
}

/* ===== Product Image ===== */
.product-box-container img {
    width: 100%;
    height: auto;
    display: block;
    object-fit: cover;
    border-radius: 12px;
    transition: transform 0.4s ease;
}

/* Slight zoom on hover */
.product-box-container:hover img {
    transform: scale(1.05);
}

/* ===== QUICK VIEW BUTTON ===== */
.box-quick-view-btn {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -40%);
    background: rgba(0, 0, 0, 0.6);
    color: #fff;
    padding: 18px 45px;
    border-radius: 50px;
    font-size: 1.05rem;
    font-weight: 600;
    border: none;
    opacity: 0;
    text-align: center;
    transition: all 0.4s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 6px;
    box-shadow: 0 0 0 rgba(0, 0, 0, 0);
    cursor: pointer;
    backdrop-filter: blur(6px);
}

/* Show both icon + text together in center */
.product-box-container:hover .box-quick-view-btn {
    opacity: 1;
    transform: translate(-50%, -50%);
    background: rgba(0, 0, 0, 0.75);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
}

/* Hover on button */
.box-quick-view-btn:hover {
    background: #2563eb;
    color: #fff;
    box-shadow: 0 10px 30px rgba(37, 99, 235, 0.5);
    transform: translate(-50%, -52%);
}

/* Eye icon style */
.box-quick-view-btn i {
    font-size: 1.5rem;
    color: #fff;
}

/* Prevent flicker */
.box-quick-view-btn * {
    pointer-events: none;
}

/* wfj ksd  fkjsd fjkshadjfhsdjkf hjkshf jkshfjk sdfjkhsdkjfh kjdsfh   */

.quick-view-modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
}

.quick-view-modal .modal-content {
    background: #fff;
    max-width: 600px;
    margin: 100px auto;
    padding: 20px;
    border-radius: 10px;
}

/* ==========================================================
   HERO SECTION
========================================================== */
.hero-box {
    margin: 20px auto;
    max-width: 1200px;
}

.hero-inner {
    display: flex;
    flex-direction: column;
    gap: 30px;
    padding: 30px 20px;
}

.hero-box,
.hero-inner,
.hero-content-box,
.hero-image-box,
.box-img {
    border: none !important;
    box-shadow: none !important;
    border-radius: 0 !important;
}

.hero-content-box {
    order: 2;
    text-align: center;
}

.hero-image-box {
    order: 1;
    text-align: center;
}

.box-img {
    width: 100%;
    height: auto;
    max-width: 100%;
    border-radius: 8px;
}

/* ==========================================================
   FEATURE BOXES
========================================================== */
.features-section-box {
    margin: 40px auto;
    max-width: 1200px;
}

.features-box-inner {
    display: grid;
    grid-template-columns: 1fr;
    gap: 20px;
    padding: 20px;
}

.feature-box {
    padding: 0;
}

.box-card {
    background: #FAF4EB !important;
    border: 1px solid #e2e8f0;
    border-radius: 0 !important;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 20px;
    height: 100%;
}

.box-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    border-color: #cbd5e0;
}

.box-card .elementor-icon-box-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
}

.box-card .elementor-icon {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #4299e1;
    color: #fff;
    border-radius: 50%;
}

.box-card .elementor-icon svg {
    width: 24px;
    height: 24px;
}

.box-card .elementor-icon-box-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #2d3748;
    margin: 0;
}

.box-card .elementor-icon-box-description {
    color: #718096;
    margin: 0;
    line-height: 1.5;
}

/* ==========================================================
   PRODUCTS SECTION
========================================================== */
.products-section-box {
    margin: 40px auto;
    max-width: 1200px;
}

.box-products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 25px;
    padding: 0;
    margin: 0;
    list-style: none;
}

.product-box-container {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: all 0.3s ease;
    height: 100%;
}

.product-box-container:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.box-product-wrapper {
    display: flex;
    flex-direction: column;
    height: 100%;
}

.box-product-image {
    position: relative;
    overflow: hidden;
}

.box-product-img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.product-box-container:hover .box-product-img {
    transform: scale(1.05);
}

.box-quick-view-btn {
    position: absolute;
    bottom: 15px;
    right: 15px;
    background: rgba(255, 255, 255, 0.95);
    color: #2d3748;
    padding: 8px 12px;
    border-radius: 6px;
    font-size: 0.875rem;
    border: 1px solid #e2e8f0;
    cursor: pointer;
    transition: all 0.3s ease;
}

.box-quick-view-btn:hover {
    background: #4299e1;
    color: #fff;
}

.box-product-details {
    padding: 20px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.box-product-title {
    font-size: 1.125rem;
    font-weight: 600;
    color: #2d3748;
    margin: 0 0 8px;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.box-product-category {
    display: inline-block;
    background: #edf2f7;
    color: #4a5568;
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 0.75rem;
    margin-bottom: 12px;
}

.box-product-info {
    margin-top: auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.box-product-price {
    font-size: 1.25rem;
    font-weight: 700;
    color: #2d3748;
}

.box-product-rating {
    color: #ecc94b;
}

/* ==========================================================
   BUTTONS
========================================================== */
.box-btn {
    display: inline-block;
    background: #4299e1;
    color: #fff;
    padding: 12px 24px;
    border-radius: 6px;
    font-weight: 600;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
}

.box-btn:hover {
    background: #3182ce;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(66, 153, 225, 0.3);
}

/* ==========================================================
   RESPONSIVE DESIGN
========================================================== */
@media (min-width: 768px) {
    .hero-inner {
        flex-direction: row;
        align-items: center;
        padding: 40px 30px;
    }

    .hero-content-box {
        order: 1;
        flex: 1;
        text-align: left;
        padding-right: 30px;
    }

    .hero-image-box {
        order: 2;
        flex: 1;
    }

    .features-box-inner {
        grid-template-columns: repeat(3, 1fr);
        padding: 30px;
    }

    .box-card {
        flex-direction: row;
        text-align: left;
        padding: 30px 25px;
    }

    .box-card .elementor-icon-box-wrapper {
        flex-direction: row;
        align-items: center;
        gap: 20px;
        text-align: left;
    }

    .box-products-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
    }
}

@media (min-width: 1024px) {
    .hero-inner {
        padding: 60px 40px;
        gap: 50px;
    }

    .features-section-box {
        margin: 60px auto;
    }

    .box-products-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (min-width: 1200px) {
    .box-products-grid {
        grid-template-columns: repeat(4, 1fr);
    }
}

@media (max-width: 767px) {
    .box-inner {
        padding: 15px;
    }

    .hero-inner {
        padding: 20px 15px;
    }

    .box-card {
        flex-direction: column;
        padding: 20px 15px;
        text-align: center;
    }

    .box-card .elementor-icon-box-wrapper {
        flex-direction: column;
        gap: 15px;
        text-align: center;
    }

    .box-product-details {
        padding: 15px;
    }

    .box-product-title {
        font-size: 1rem;
    }

    .box-product-price {
        font-size: 1.125rem;
    }

    .box-btn {
        width: 100%;
        text-align: center;
        padding: 15px 20px;
    }
}

/* ==========================================================
   TOUCH DEVICE ADJUSTMENTS
========================================================== */
@media (hover: none) and (pointer: coarse) {

    .box-card:hover,
    .product-box-container:hover,
    .box-btn:hover {
        transform: none;
    }

    .box-quick-view-btn {
        padding: 12px 16px;
        font-size: 1rem;
    }
}
</style>

<style>
    .wishlist-icon {
    position: absolute;
    top: 10px;
    right: 10px;
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255, 255, 255, 0.8);
    color: #ff4d4d; /* Heart color */
    border-radius: 50%;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
    z-index: 10;
}

.wishlist-icon i {
    transition: color 0.3s ease;
}

/* Hover effect */
.wishlist-icon:hover {
    background: #ff4d4d;
    color: #fff;
}
.wishlist-icon:hover i {
    color: #fff;
}

/* Active/favorited state */
.wishlist-icon.active {
    background: #ff4d4d;
}
.wishlist-icon.active i {
    color: #fff;
}

</style>


<div id="content" class="site-content" style="background:#fff">
    <div class="ast-container">
        <div id="primary" class="content-area primary">
            <main id="main" class="site-main">
                <article class="post-16 page type-page status-publish ast-article-single" id="post-16"
                    itemtype="https://schema.org/CreativeWork" itemscope="itemscope">

                    <div class="entry-content clear" itemprop="text">

                        <!-- ================= Hero Section ================= -->
                        <div class="box-container hero-box">
                            <div class="box-inner hero-inner">
                                <div class="hero-content-box">
                                    <h2>The Book for Everyone</h2>
                                    <h2>Get Your eBook</h2>
                                    <h2>From Our Store</h2>
                                    <p>eBook— Your gateway to the finest Bangla eBooks. Explore over 10,000 titles.</p>
                                    <a href="#" class="box-btn">Learn More</a>
                                </div>

                                <div class="hero-image-box">
                                    <img src="{{ asset('frontend/img/wmremove-transformed-1-1024x606.jpeg') }}"
                                        alt="Hero Image" class="box-img" />
                                </div>
                            </div>
                        </div>

                        <!-- ================= Features Section ================= -->
                        <div class="box-container features-section-box">
                            <div class="box-inner features-box-inner">

                                <div class="feature-box box-card">
                                    <div class="elementor-icon-box-wrapper">
                                        <div class="elementor-icon">
                                            <i class="fas fa-credit-card"></i>
                                        </div>
                                        <div>
                                            <h3 class="elementor-icon-box-title">Easy Payment</h3>
                                            <p class="elementor-icon-box-description">Have 100% Secure Payments</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="feature-box box-card">
                                    <div class="elementor-icon-box-wrapper">
                                        <div class="elementor-icon">
                                            <i class="fas fa-truck"></i>
                                        </div>
                                        <div>
                                            <h3 class="elementor-icon-box-title">Free Shipping</h3>
                                            <p class="elementor-icon-box-description">Fastest & Free delivery</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="feature-box box-card">
                                    <div class="elementor-icon-box-wrapper">
                                        <div class="elementor-icon">
                                            <i class="fas fa-book-open"></i>
                                        </div>
                                        <div>
                                            <h3 class="elementor-icon-box-title">Availability</h3>
                                            <p class="elementor-icon-box-description">6 Million Books Available</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- ================= Trending Section ================= -->
                        <div class="box-container section-header-box">
                            <div class="box-inner text-center">
                                <h2>Trending Now</h2>
                                <h2>ট্রেন্ডিং ই-বুকগুলো</h2>
                            </div>
                        </div>

                        <!-- ================= Products Section ================= -->
                        <div class="box-container products-section-box">
                            <ul class="box-products-grid">
                                @foreach($trendings as $trending)
                                <li class="product-box-container">
                                    <div class="box-product-wrapper">

                                        <div class="box-product-image position-relative">
                                            <!-- Wishlist / Favorite Heart Icon -->
                                            <div class="wishlist-icon {{ auth()->check() && $trending->isFavoritedBy(auth()->user()) ? 'active' : '' }}" 
                                                data-id="{{ $trending->id }}">
                                                <i class="fa fa-heart"></i>
                                            </div>

                                            <a href="{{ route('productDetails', $trending->slug) }}">
                                                <img src="{{ route('imagecache', ['template' => 'pnism', 'filename' => $trending->fi()]) }}"
                                                    alt="{{ $trending->name_en }}" class="box-product-img">
                                            </a>

                                            <div class="box-quick-view-btn" data-product-id="{{ $trending->id }}">
                                                Quick View <i class="fa fa-eye"></i>
                                            </div>
                                        </div>

                                        <div class="box-product-details">
                                            <h3 class="box-product-title">{{ $trending->name_en }}</h3>

                                            @foreach($trending->categories as $category)
                                            <span class="box-product-category">{{ $category->name_en }}</span>
                                            @endforeach

                                            <div class="box-product-info">
                                                <span class="box-product-price">{{ $trending->price }}
                                                    <span>&#2547;</span></span>
                                                <div class="box-product-rating">
                                                    <span class="star-rating">★★★★★</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>


                    </div>
                </article>
            </main>
        </div>
    </div>
</div>


<div id="quick-view-modal" class="quick-view-modal">
    <div class="modal-content box-modal-content">
        <span class="close-btn">&times;</span>
        <div id="quick-view-content" class="box-modal-body"></div>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{ asset('frontend/js/quick-view.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Your existing JavaScript code for quick view functionality
    // This remains the same as in your original code

    const quickViewModal = document.getElementById('quick-view-modal');
    const quickViewContent = document.getElementById('quick-view-content');
    const closeBtn = document.querySelector('.close-btn');

    // Add click event to all quick view buttons
    document.querySelectorAll('.box-quick-view-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            console.log("Quick View button clicked"); // 👈 Add this line
            const productId = this.getAttribute('data-product-id');
            openQuickView(productId);
        });
    });

    // Close modal when clicking X
    closeBtn.addEventListener('click', closeQuickView);

    // Close modal when clicking outside
    quickViewModal.addEventListener('click', function(e) {
        if (e.target === quickViewModal) {
            closeQuickView();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && quickViewModal.style.display === 'block') {
            closeQuickView();
        }
    });

    function openQuickView(productId) {
        // Show loading state
        quickViewContent.innerHTML = `
            <div class="quick-view-loader" style="text-align: center; padding: 50px;">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mt-2">Loading product details...</p>
            </div>
        `;

        // Show modal
        quickViewModal.style.display = 'block';
        document.body.style.overflow = 'hidden';

        // Fetch product data via AJAX
        fetchQuickViewData(productId);
    }

    function closeQuickView() {
        if (quickViewModal) {
            quickViewModal.style.display = 'none';
            document.body.style.overflow = 'auto';
            if (quickViewContent) {
                quickViewContent.innerHTML = '';
            }
        }
    }

    function fetchQuickViewData(productId) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch(`/product/${productId}`, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    quickViewContent.innerHTML = data.html;
                    // Your existing initialization code
                } else {
                    showError('Error loading product details');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showError('Failed to load product. Please try again.');
            });
    }

    function showError(message) {
        quickViewContent.innerHTML = `
            <div style="text-align: center; padding: 50px;">
                <h3>Error</h3>
                <p>${message}</p>
                <button class="box-btn" onclick="closeQuickView()">Close</button>
            </div>
        `;
    }

    // Make closeQuickView available globally
    window.closeQuickView = closeQuickView;
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.wishlist-icon').forEach(icon => {
        icon.addEventListener('click', function() {
            const productId = this.dataset.id;
            const iconEl = this;

            fetch("{{ route('wishlist.toggle') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ product_id: productId })
            })
            .then(async res => {
                const text = await res.text();
                try {
                    return JSON.parse(text);
                } catch (e) {
                    console.error("Invalid JSON:", text);
                    return { success: false };
                }
            })
            .then(data => {
                if (data.success) {
                    iconEl.classList.toggle('active', data.favorited);
                    if (data.favorited) {
                        toastr.success('Added to favorites ❤️');
                    } else {
                        toastr.info('Removed from favorites 🖤');
                    }
                } else if (data.auth === false) {
                    toastr.warning('Please log in to use favorites!');
                } else {
                    toastr.error('Something went wrong');
                }
            })
            .catch(err => console.error('Error:', err));
        });
    });
});
</script>





@endsection
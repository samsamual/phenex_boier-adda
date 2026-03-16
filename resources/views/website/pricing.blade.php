@extends('frontend.layouts.ecommercemaster')
@section('title', "Pricing - " .env('APP_NAME'))

@section('content')
<main id="main" class="site-main">
    <article class="post-564 page type-page status-publish ast-article-single" id="post-564"
        itemtype="https://schema.org/CreativeWork" itemscope="itemscope">

        <header class="entry-header ast-no-thumbnail ast-no-title ast-header-without-markup">
        </header>

        <div class="entry-content clear" itemprop="text">

            <div class="container py-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bold display-5">Choose Your Plan & Get Reward</h2>
                    <p class="fs-5">Register on our website and grab all your rewards. We offer big gift offers for you.</p>
                </div>

                <div class="row g-4 justify-content-center">

                    <!-- Silver Plan -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card text-center h-100 shadow-lg p-4" style="border-radius:20px;">
                            <img src="../wp-content/uploads/2025/08/pricing-icon-5-1.png" class="card-img-top mx-auto mb-4" style="width:160px;height:130px;" alt="Silver Plan">
                            <div class="card-body">
                                <h4 class="card-title fw-bold display-6">Silver - 2</h4>
                                <p class="card-text fs-4"><strong>৳200</strong></p>
                                <ul class="list-unstyled mb-4 fs-6">
                                    <li>200 Books Free</li>
                                    <li>200 Days Validity</li>
                                    <li>2 Members = 1 Layer</li>
                                </ul>
                                <a href="{{ route('registration') }}" 
                                   class="btn btn-purple btn-lg text-white w-100" 
                                   style="background-color:#6f42c1; border-radius:50px; padding:12px 28px;">
                                   Signup Now
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card text-center h-100 shadow-lg p-4" style="border-radius:20px;">
                            <img src="../wp-content/uploads/2025/08/pricing-icon-5-1.png" class="card-img-top mx-auto mb-4" style="width:160px;height:130px;" alt="Silver Plan">
                            <div class="card-body">
                                <h4 class="card-title fw-bold display-6">Silver - 3</h4>
                                <p class="card-text fs-4"><strong>৳300</strong></p>
                                <ul class="list-unstyled mb-4 fs-6">
                                    <li>300 Books Free</li>
                                    <li>300 Days Validity</li>
                                    <li>3 Members = 1 Layer</li>
                                </ul>
                                <a href="{{ route('registration') }}" 
                                   class="btn btn-purple btn-lg text-white w-100" 
                                   style="background-color:#6f42c1; border-radius:50px; padding:12px 28px;">
                                   Signup Now
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card text-center h-100 shadow-lg p-4" style="border-radius:20px;">
                            <img src="../wp-content/uploads/2025/08/pricing-icon-5-1.png" class="card-img-top mx-auto mb-4" style="width:160px;height:130px;" alt="Silver Plan">
                            <div class="card-body">
                                <h4 class="card-title fw-bold display-6">Silver - 5</h4>
                                <p class="card-text fs-4"><strong>৳500</strong></p>
                                <ul class="list-unstyled mb-4 fs-6">
                                    <li>500 Books Free</li>
                                    <li>500 Days Validity</li>
                                    <li>5 Members = 1 Layer</li>
                                </ul>
                                <a href="{{ route('registration') }}" 
                                   class="btn btn-purple btn-lg text-white w-100" 
                                   style="background-color:#6f42c1; border-radius:50px; padding:12px 28px;">
                                   Signup Now
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Gold Plan -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card text-center h-100 shadow-lg p-4" style="border-radius:20px;">
                            <img src="../wp-content/uploads/2025/08/pricing-icon-4-1.png" class="card-img-top mx-auto mb-4" style="width:160px;height:130px;" alt="Gold Plan">
                            <div class="card-body">
                                <h4 class="card-title fw-bold display-6">Gold - 2</h4>
                                <p class="card-text fs-4"><strong>৳2000</strong></p>
                                <ul class="list-unstyled mb-4 fs-6">
                                    <li>2000 Books Free</li>
                                    <li>Unlimited Validity</li>
                                    <li>2 Members = 1 Layer</li>
                                </ul>
                                <a href="{{ route('registration') }}" 
                                   class="btn btn-purple btn-lg text-white w-100" 
                                   style="background-color:#6f42c1; border-radius:50px; padding:12px 28px;">
                                   Signup Now
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card text-center h-100 shadow-lg p-4" style="border-radius:20px;">
                            <img src="../wp-content/uploads/2025/08/pricing-icon-4-1.png" class="card-img-top mx-auto mb-4" style="width:160px;height:130px;" alt="Gold Plan">
                            <div class="card-body">
                                <h4 class="card-title fw-bold display-6">Gold - 3 </h4>
                                <p class="card-text fs-4"><strong>৳3000</strong></p>
                                <ul class="list-unstyled mb-4 fs-6">
                                    <li>3000 Books Free</li>
                                    <li>Unlimited Validity</li>
                                    <li>3 Members = 1 Layer</li>
                                </ul>
                                <a href="{{ route('registration') }}" 
                                   class="btn btn-purple btn-lg text-white w-100" 
                                   style="background-color:#6f42c1; border-radius:50px; padding:12px 28px;">
                                   Signup Now
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Platinum Plan -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card text-center h-100 shadow-lg p-4" style="border-radius:20px;">
                            <img src="../wp-content/uploads/2025/08/pricing-icon-6-1.png" class="card-img-top mx-auto mb-4" style="width:160px;height:130px;" alt="Platinum Plan">
                            <div class="card-body">
                                <h4 class="card-title fw-bold display-6">Platinum</h4>
                                <p class="card-text fs-4"><strong>৳5000</strong></p>
                                <ul class="list-unstyled mb-4 fs-6">
                                    <li>Unlimited Books Free</li>
                                    <li>Unlimited Validity</li>
                                    <li>5 Members = 1 Layer</li>
                                </ul>
                                <a href="{{ route('registration') }}" 
                                   class="btn btn-purple btn-lg text-white w-100" 
                                   style="background-color:#6f42c1; border-radius:50px; padding:12px 28px;">
                                   Signup Now
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div><!-- .entry-content .clear -->

    </article><!-- #post-## -->
</main>
@endsection

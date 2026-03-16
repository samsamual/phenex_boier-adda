@extends('frontend.layouts.ecommercemaster')
@section('title', "All Publishers -" .env('APP_NAME'))

@section('content')
<div class="content-wrap flex-grow-1"> <!-- Flex-grow container for footer alignment -->
    <div class="container py-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Our All Publishers</h2>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($publishers->chunk(5) as $publisherChunk)
                @foreach($publisherChunk as $publisher)
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center">
                        <div class="publisher-card mb-4">
                            <a href="#">
                                <img src="{{ asset('storage/department_images/' . $publisher->image) }}"
                                     alt="{{ $publisher->name_en }}"
                                     class="img-fluid rounded-circle mb-2 publisher-img"
                                     width="150" height="150">
                            </a>
                            <h5 class="mb-0">
                                <a href="#" class="text-decoration-none text-dark">
                                    {{ $publisher->name_en }}
                                </a>
                            </h5>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</div>

<style>
/* Ensure content grows to push footer down */
.content-wrap {
    flex: 1;
    padding-bottom: 50px; /* Extra space so footer doesn't overlap */
}

/* Publisher card styles */
.publisher-card img.publisher-img {
    border-radius: 50%;
    object-fit: cover;
    transition: transform 0.3s;
}
.publisher-card img.publisher-img:hover {
    transform: scale(1.05);
}

/* Footer link styling */
.site-footer a {
    color: #4da6ff;
    text-decoration: none;
}
.site-footer a:hover {
    color: #ffffff;
    text-decoration: underline;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .publisher-card img.publisher-img {
        width: 120px;
        height: 120px;
    }
}
@media (max-width: 480px) {
    .publisher-card h5 {
        font-size: 14px;
    }
}
</style>
@endsection

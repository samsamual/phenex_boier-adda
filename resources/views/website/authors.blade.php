@extends('frontend.layouts.ecommercemaster')
@section('title', "All Publishers - " .env('APP_NAME'))

@section('content')
<div class="content-wrap d-flex flex-column min-vh-100"> <!-- Full height container -->
    <div class="container py-4 flex-grow-1">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Our All Publishers</h2>
        </div>

        {{-- Blade loop for dynamic publishers (keep it commented for future use) --}}
        {{-- 
        @foreach($publishers as $publisher)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center">
                <div class="publisher-card mb-3">
                    <a href="#">
                        <img src="{{ asset('storage/department_images/' . $publisher->image) }}"
                             alt="{{ $publisher->name_en }}"
                             class="img-fluid rounded-circle publisher-img mb-2">
                    </a>
                    <h6 class="mb-0">
                        <a href="#" class="text-decoration-none text-dark">
                            {{ $publisher->name_en }}
                        </a>
                    </h6>
                </div>
            </div>
        @endforeach
        --}}

        <!-- Sample static publishers -->
        <div class="row g-4 justify-content-center">
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center">
                <div class="publisher-card mb-3">
                    <a href="#">
                        <img src="https://online.maryville.edu/wp-content/uploads/sites/97/2020/08/author-at-work.jpg?w=750" 
                             alt="Publisher 1" 
                             class="img-fluid rounded-circle publisher-img mb-2">
                    </a>
                    <h6 class="mb-0">
                        <a href="#" class="text-decoration-none text-dark">Publisher 1</a>
                    </h6>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center">
                <div class="publisher-card mb-3">
                    <a href="#">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcy3T4TR6E0jq6ZvohK5soLEZ9sRyXXSlmbxoyxs7cbHPz8KtS-d6KjsGH0XJaCT4kvuU&usqp=CAU" 
                             alt="Publisher 2" 
                             class="img-fluid rounded-circle publisher-img mb-2">
                    </a>
                    <h6 class="mb-0">
                        <a href="#" class="text-decoration-none text-dark">Publisher 2</a>
                    </h6>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center">
                <div class="publisher-card mb-3">
                    <a href="#">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcy3T4TR6E0jq6ZvohK5soLEZ9sRyXXSlmbxoyxs7cbHPz8KtS-d6KjsGH0XJaCT4kvuU&usqp=CAU" 
                             alt="Publisher 3" 
                             class="img-fluid rounded-circle publisher-img mb-2">
                    </a>
                    <h6 class="mb-0">
                        <a href="#" class="text-decoration-none text-dark">Publisher 3</a>
                    </h6>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center">
                <div class="publisher-card mb-3">
                    <a href="#">
                        <img src="https://online.maryville.edu/wp-content/uploads/sites/97/2020/08/author-at-work.jpg?w=750" 
                             alt="Publisher 4" 
                             class="img-fluid rounded-circle publisher-img mb-2">
                    </a>
                    <h6 class="mb-0">
                        <a href="#" class="text-decoration-none text-dark">Publisher 4</a>
                    </h6>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center">
                <div class="publisher-card mb-3">
                    <a href="#">
                        <img src="https://online.maryville.edu/wp-content/uploads/sites/97/2020/08/author-at-work.jpg?w=750" 
                             alt="Publisher 5" 
                             class="img-fluid rounded-circle publisher-img mb-2">
                    </a>
                    <h6 class="mb-0">
                        <a href="#" class="text-decoration-none text-dark">Publisher 5</a>
                    </h6>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center">
                <div class="publisher-card mb-3">
                    <a href="#">
                        <img src="https://online.maryville.edu/wp-content/uploads/sites/97/2020/08/author-at-work.jpg?w=750" 
                             alt="Publisher 6" 
                             class="img-fluid rounded-circle publisher-img mb-2">
                    </a>
                    <h6 class="mb-0">
                        <a href="#" class="text-decoration-none text-dark">Publisher 6</a>
                    </h6>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
.content-wrap {
    padding-bottom: 30px; /* space for footer */
}

/* Publisher card image */
.publisher-img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    transition: transform 0.3s;
}
.publisher-img:hover {
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
@media (max-width: 992px) {
    .publisher-img { width: 130px; height: 130px; }
}
@media (max-width: 768px) {
    .publisher-img { width: 120px; height: 120px; }
}
@media (max-width: 576px) {
    .publisher-img { width: 100px; height: 100px; }
    .publisher-card h6 { font-size: 0.85rem; }
}
</style>
@endsection

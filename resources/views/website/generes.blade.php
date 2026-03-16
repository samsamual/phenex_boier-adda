@extends('frontend.layouts.ecommercemaster')
@section('title', "Genres - " .env('APP_NAME'))

@section('content')
<div class="container py-5" >
    <div class="text-center mb-4">
        <h2 class="fw-bold">Genres</h2>
        <p>Choose Your Book from our large number of categories and start reading!</p>
    </div>

    <div class="row g-4">
        @foreach($categories as $category)
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <div class="card h-100 text-center border-0 shadow-sm p-2">
                <a href="{{ route('slug.generes', $category->slug) }}" target="_blank" class="text-decoration-none text-dark">
                    <div class="position-relative">
                        <img 
                            src="{{ asset('storage/product_categories_images/' . $category->image) }}"
                            class="card-img-top img-fluid rounded"
                            alt="{{ $category->name_en }}"
                            style="object-fit: cover; height: 150px;" <!-- Medium image height -->
                        >
                    </div>
                    <div class="card-body p-2">
                        <h6 class="fw-semibold" style="font-size: 1rem;">{{ $category->name_en }}</h6> <!-- Slightly bigger text -->
                        <small class="text-muted" style="font-size: 0.85rem;">{{ $category->products()->count() }} Products</small>
                    </div>
                </a>
            </div>
        </div>



        @endforeach
    </div>
</div>

@endsection
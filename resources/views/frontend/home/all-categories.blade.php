@extends('frontend.layouts.master')
@section('title', 'All Categories')

@push('css')
<style>
    .category-card .card-body {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 1rem;
    }
    .category-card h5 {
        color: white;
        margin-bottom: 0;
    }
</style>
@endpush

@section('content')
    <div class="container py-4">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4 mb-4">
                    <div class="card category-card">
                        <a href="{{ route('productCategory', $category->slug) }}">
                            <img src="{{ route('imagecache', ['template' => 'pnism', 'filename' => $category->fi()]) }}" class="card-img-top" alt="{{ $category->name_en }}" style="height: 200px; object-fit: contain;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $category->name_en }}</h5>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@extends('frontend.layouts.ecommercemaster')
@section('title', "Blog - " .env('APP_NAME'))

@section('content')
<main id="main" class="site-main">
    <article class="post-529 page type-page status-publish ast-article-single" id="post-529"
        itemtype="https://schema.org/CreativeWork" itemscope="itemscope">

        <header class="entry-header ast-no-thumbnail ast-no-title ast-header-without-markup"></header>

        <div class="entry-content clear" itemprop="text">

            <div class="container py-5">
                <h2 class="mb-4 text-center">All Posts</h2>

                @if($blogs->count() > 0)
                    <div class="row g-4">
                        @foreach ($blogs as $blog)
                        <div class="col-12">
                            <div class="card shadow-sm flex-row flex-wrap align-items-center p-3">
                                <!-- Blog Image -->
                                <div class="col-12 col-md-4 mb-3 mb-md-0">
                                    <img src="{{ asset('uslive/cpmd/' . $blog->fi()) }}"
                                         alt="{{ $blog->title }}"
                                         class="img-fluid rounded"
                                         style="height: 200px; width: 100%; object-fit: cover;">
                                </div>

                                <!-- Blog Content -->
                                <div class="col-12 col-md-8">
                                    <div class="card-body d-flex flex-column h-100">
                                        <h5 class="card-title">{{ $blog->title }}</h5>
                                        <p class="card-text flex-grow-1">{!! Str::limit($blog->excerpt, 200) !!}</p>
                                        <a href="{{ route('single.blog', $blog->id) }}" class="btn btn-primary mt-2 align-self-start">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center">
                        <p>No posts found.</p>
                    </div>
                @endif

                <!-- Pagination -->
                <div class="d-flex justify-content-end mt-4">
                    <nav class="navigation pagination" aria-label="Posts">
                        <h2 class="screen-reader-text">Posts navigation</h2>
                        <div class="nav-links">
                            <span aria-current="page" class="page-numbers current">1</span>
                            <a class="page-numbers" href="page/2/index.html">2</a>
                            <a class="next page-numbers" href="page/2/index.html">Next &raquo;</a>
                        </div>
                    </nav>
                </div>

            </div>
        </div>
    </article>
</main>

@endsection

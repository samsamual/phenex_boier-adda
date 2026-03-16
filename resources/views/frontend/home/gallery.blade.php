@extends('frontend.layouts.master')

@push('css')
@endpush

@section('content')

<!-- Page Header -->
<section class="page-header page-header-modern bg-color-primary page-header-md my-0">
    <div class="container">
        <div class="row">
            <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                <h1>Shasthoseba Foundation</h1>
            </div>
            <div class="col-md-4 order-1 order-md-2 align-self-center">
                <ul class="breadcrumb d-block text-md-end breadcrumb-light">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Shasthoseba Foundation</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Ambulance Provider Section -->
<section class="section my-0">
  <div class="container pb-3">
    
    <!-- Section Title -->
    <div class="row mb-4">
      <div class="col text-center">
        <h2 class="fw-bold display-6 text-primary mb-3">Foundation Executive Members</h2>
        <hr>
      </div>
    </div>

    <!-- Ambulance Providers Grid -->
    <div class="row g-4">
      
      <!-- Provider Item -->
      @foreach ($galleries as $gallery)
      <div class="col-md-6 col-lg-3">
        <div class="card border-0 shadow-sm h-100 rounded-3 overflow-hidden">
          <a href="javascript:void(0)" class="text-decoration-none">
            <img src="{{ route('imagecache', ['template'=>'original','filename'=>$gallery->fi()]) }}" 
                 class="card-img-top img-fluid rounded-top-3" alt="{{ $gallery->name }}">
            <div class="card-body p-3">
              <h5 class="card-title fw-semibold mb-1">{{ $gallery->title }}</h5>
              <p class="card-subtitle text-muted w3-small">{{ $gallery->designation }}</p>
            
            </div>
          </a>
        </div>
      </div>
      @endforeach


    </div>
  </div>
</section>


@endsection

@push('js')
<script>
    // future JS scripts here
</script>
@endpush

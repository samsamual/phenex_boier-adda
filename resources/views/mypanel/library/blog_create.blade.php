@extends('frontend.layouts.ecommercemaster')
@section('title', 'Create Blog Post')
@section('content')

<section class="py-4 bg-light">
  <div class="container">
    <div class="row">

      {{-- Sidebar --}}
      @include('mypanel.library.user_header')

      {{-- Main Content --}}
      <div class="col-lg-9">
        <div class="card border-0 shadow-sm">
          <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
              <i class="fa fa-pencil-square-o me-2"></i> Create New Blog
            </h5>
            {{--<a href="{{ route('user.blog.list') }}" class="btn btn-light btn-sm fw-semibold">
              <i class="fa fa-list me-1"></i> View All Blogs
            </a>--}}
          </div>

          <div class="card-body">
            <form action="{{ route('user.blog.store') }}" method="POST" enctype="multipart/form-data" novalidate>
              @csrf

              {{-- Blog Title --}}
              <div class="mb-3">
                <label for="name_en" class="form-label fw-semibold">Blog Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name_en" name="name_en"
                       placeholder="Enter your blog title..." value="{{ old('name_en') }}" required>
                @error('name_en') <small class="text-danger">{{ $message }}</small> @enderror
              </div>

              {{-- Description --}}
              <div class="mb-3">
                <label for="description_en" class="form-label fw-semibold">Blog Description <span class="text-danger">*</span></label>
                <textarea class="form-control" id="description_en" name="description_en"
                          rows="5" placeholder="Write your blog content here...">{{ old('description_en') }}</textarea>
                @error('description_en') <small class="text-danger">{{ $message }}</small> @enderror
              </div>

            {{-- Category --}}
            <div class="mb-3">
            <label for="category_id" class="form-label fw-semibold text-dark">
                <i class="fa fa-folder-open me-1 text-success"></i> Category <span class="text-danger">*</span>
            </label>
            <select class="form-select bg-white text-dark border" id="category_id" name="category_id" required>
                <option value="" disabled selected>Select a Category</option>
                @foreach($categories as $category)
                <option class="text-dark" value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <small class="text-danger d-block mt-1">{{ $message }}</small>
            @enderror
            </div>



              {{-- Featured Image --}}
              <div class="mb-4">
                <label for="featured_image" class="form-label fw-semibold">Featured Image <span class="text-danger">*</span></label>
                <input type="file" class="form-control" id="featured_image" name="featured_image" accept="image/*" onchange="previewImage(event)">
                @error('featured_image') <small class="text-danger">{{ $message }}</small> @enderror

                {{-- Image Preview --}}
                <div class="mt-3">
                  <img id="imagePreview" src="#" alt="Preview" class="img-thumbnail d-none"
                       style="width: 180px; height: 180px; object-fit: cover;">
                </div>
              </div>

              {{-- Submit Button (Right Aligned) --}}
              <div class="text-end">
                <button type="submit" class="btn btn-success px-4">
                  <i class="fa fa-paper-plane me-1"></i> Create Blog
                </button>
              </div>

            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- Image Preview Script --}}
@push('scripts')
<script>
  function previewImage(event) {
    const imagePreview = document.getElementById('imagePreview');
    const file = event.target.files[0];
    if (file) {
      imagePreview.src = URL.createObjectURL(file);
      imagePreview.classList.remove('d-none');
    } else {
      imagePreview.classList.add('d-none');
    }
  }
</script>
@endpush

@endsection

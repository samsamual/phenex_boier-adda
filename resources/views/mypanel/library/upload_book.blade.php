@extends('frontend.layouts.ecommercemaster')
@section('title','Ebook - Upload Book')
@section('content')
<section class="my-0 section">
  <div class="container">
    <div class="row">

    @include('mypanel.library.user_header')

      {{-- Main Content --}}
      <div class="col-lg-9">
        <div class="tab-content">
          {{-- upload book Tab --}}
          <div class="tab-pane fade {{ $activeTab=='upload'?'show active':'' }}" id="upload">
            <div class="card">
              <div class="card-header bg-success text-white">Upload Book</div>
              <div class="card-body">
                <form action="{{ route('user.library.store_book') }}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                  @csrf

                  {{-- Book Name --}}
                  <div class="row g-3 mb-3">
                    <div class="col-md-12">
                      <label for="name_en" class="form-label">Book Title <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name_en') }}" placeholder="Book Title" required>
                      @error('name_en')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    
                    {{-- Description --}}
                    <div class="col-md-12">
                      <label for="description_en" class="form-label">Description <span class="text-danger">*</span></label>
                      <textarea class="form-control" id="description_en" name="description_en" rows="3" placeholder="Book Description">{{ old('description_en') }}</textarea>
                      @error('description_en')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>

                  {{-- Price --}}
                  <div class="row">
                    <div class="mb-3 col-md-6">
                      <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                      <input type="number" class="form-control" id="price" name="price" value="{{ old('price', '0.00') }}" step="0.01" required>
                      @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    {{--Categories --}}
                    <div class="mb-3 col-md-6">
                      <label for="categories" class="form-label">Category <span class="text-danger">*</span></label>

                      <select multiple class="form-control" id="categories" name="categories[]">
                          @foreach($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->name_en }}</option>
                          @endforeach
                      </select>
                      <small class="form-text text-muted">Hold Ctrl or Cmd to select multiple categories.</small>
                      @error('categories')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  {{-- Cover Image --}}
                  <div class="mb-3">
                    <label for="featured_image" class="form-label">Cover Image <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" id="featured_image" name="featured_image" accept="image/*" required>
                    @error('featured_image')<span class="text-danger">{{ $message }}</span>@enderror
                  </div>

                  {{-- Book File --}}
                  <div class="mb-3">
                    <label for="file_path" class="form-label">Book File (PDF only) <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" id="file_path" name="file_path" accept=".pdf" required>
                    @error('file_path')<span class="text-danger">{{ $message }}</span>@enderror
                  </div>

                  <div class="mt-3">
                    <button type="submit" class="btn btn-success">Save Changes</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
@endsection

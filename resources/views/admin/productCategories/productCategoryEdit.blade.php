@extends('admin.master')

@section('title')
   Admin Dashboard | Product Category Edit
@endsection

@push('css')
<!-- Add any page-specific CSS here -->
@endpush

@section('body')
<section class="content py-3">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mb-2 shadow-lg">
                <div class="card-header px-2 py-2">
                    <h3 class="card-title text-muted"><i class="fas fa-edit text-primary"></i> Edit Product Category</h3>
                    <a href="{{ route('admin.productCategoriesAll') }}" class="btn btn-outline-secondary btn-xs float-right">Back</a>
                </div>
            </div>

            <div class="card shadow-lg card-outline card-primary">
                <div class="card-body p-3">

                    <form action="{{ route('admin.productCategoryUpdate', $category) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        {{-- Name  --}}
                        <div class="form-group">
                            <label for="name_en">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name_en" id="name_en" value="{{ old('name_en', $category->name_en) }}" 
                                class="form-control @error('name_en') is-invalid @enderror" placeholder="Enter category name" 
                                onkeyup="makeSlug(this.value)">
                            @error('name_en')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                       

                        {{-- Slug --}}
                        <div class="form-group">
                            <label for="slug">Slug <span class="text-danger">*</span></label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug', $category->slug) }}" 
                                class="form-control @error('slug') is-invalid @enderror" placeholder="Enter slug">
                            @error('slug')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Excerpt --}}
                        <div class="form-group">
                            <label for="excerpt">Excerpt</label>
                            <textarea name="excerpt" id="excerpt" rows="3" class="form-control" placeholder="Short description">{{ old('excerpt', $category->excerpt) }}</textarea>
                        </div>

                        {{-- Current Image --}}
                        <div class="form-group">
                            <label>Current Image</label>
                            <div>
                                @if($category->image)
                                    <img src="{{ asset('storage/product_categories_images/' . $category->image) }}" 
                                        alt="{{ $category->name_en }}" class="img-thumbnail" style="max-height:150px;">
                                @else
                                    <p>No image uploaded</p>
                                @endif
                            </div>
                        </div>

                        {{-- Change Image --}}
                        <div class="form-group">
                            <label for="image">Change Image</label>
                            <input type="file" name="image" id="image" class="form-control-file @error('image') is-invalid @enderror">
                            @error('image')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Active Checkbox --}}
                        <div class="form-check mb-3">
                            <input type="checkbox" name="active" id="active" class="form-check-input" {{ old('active', $category->active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="active">Active</label>
                        </div>

                        <button type="submit" class="btn btn-primary float-right">Update Category</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script>
    function makeSlug(val) {
        let str = val.trim().toLowerCase();
        let slug = str.replace(/\s+/g, '-').replace(/[^\w\-]+/g, '');
        document.getElementById('slug').value = slug;
    }
</script>
@endpush

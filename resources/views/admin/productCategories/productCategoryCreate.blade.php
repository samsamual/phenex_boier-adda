@extends('admin.master')

@section('title', 'Admin Dashboard | Product Category Create')

@push('css')
@endpush

@section('body')
<section class="content py-3">
    <div class="row">
        <div class="col-md-8 mx-auto">

            <!-- Header Card -->
            <div class="card mb-2 shadow-lg">
                <div class="card-header- d-flex justify-content-between align-items-center px-2 py-2">
                    <h3 class="card-title text-sm text-bold text-muted pt-1">
                        <i class="fas fa-plus-circle text-primary"></i> Add New Category
                    </h3>
                    <a href="{{ route('admin.productCategoriesAll') }}" class="btn btn-outline-primary btn-xs">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>

            <!-- Form Card -->
            <div class="card card-primary card-outline shadow-lg">
                <div class="card-body bg-light px-3">
                    <form action="{{ route('admin.productCategoryStore') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Name -->
                        <div class="form-group row">
                            <label for="name_en" class="col-sm-3 col-form-label text-left">
                                Name <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" name="name_en" value="{{ old('name_en') }}" id="name_en" class="form-control" placeholder="Name" required onkeyup="makeSlug(this.value)">
                                @error('name_en') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Slug -->
                        <div class="form-group row">
                            <label for="slug" class="col-sm-3 col-form-label text-left">
                                Slug <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" name="slug" value="{{ old('slug') }}" id="slug" class="form-control" placeholder="URL" required>
                                @error('slug') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Excerpt -->
                        <div class="form-group row">
                            <label for="excerpt" class="col-sm-3 col-form-label text-left">Excerpt</label>
                            <div class="col-sm-9">
                                <textarea name="excerpt" id="excerpt" rows="2" class="form-control" placeholder="Short description...">{{ old('excerpt') }}</textarea>
                            </div>
                        </div>

                        <!-- Image -->
                        <div class="form-group row">
                            <label for="image" class="col-sm-3 col-form-label text-left">Featured Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                        </div>

                        <!-- Active -->
                        <div class="form-group row">
                            <label for="active" class="col-sm-3 col-form-label text-left">Active</label>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" name="active" type="checkbox" id="active" checked>
                                </div>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="form-group row mb-0">
                            <div class="col-sm-9 offset-sm-3 text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

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
        let slug = val.trim().toLowerCase().replace(/\s+/g, '-');
        document.getElementById('slug').value = slug;
    }
</script>
@endpush

@extends('admin.master')
@section('title', 'Admin Dashboard | Create Membership')

@section('body')
<section class="pt-5">
    <div class="container">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-info text-white">
                <h4 class="card-title mb-0">Create Membership</h4>
            </div>

            <div class="card-body bg-light">
                <form action="{{ route('memberships.store') }}" method="POST">
                    @csrf

                    <div class="row justify-content-center">
                        <div class="col-md-8">

                            <div class="card p-4 shadow-sm">
                                <div class="card-body">

                                    {{-- Name --}}
                                    <div class="form-group mb-3">
                                        <label for="name" class="fw-bold">Membership Name <span class="text-danger">*</span></label>
                                        <input type="text"
                                            name="name"
                                            id="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}"
                                            placeholder="Enter membership name">
                                        @error('name')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Subscription Fee --}}
                                    <div class="form-group mb-3">
                                        <label for="subscription_fee" class="fw-bold">Subscription Fee (৳)<span class="text-danger">*</span></label>
                                        <input type="number"
                                            name="subscription_fee"
                                            id="subscription_fee"
                                            step="0.01"
                                            class="form-control @error('subscription_fee') is-invalid @enderror"
                                            value="{{ old('subscription_fee') }}"
                                            placeholder="Enter subscription fee">
                                        @error('subscription_fee')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Free Books --}}
                                    <div class="form-group mb-3">
                                        <label for="free_books" class="fw-bold">Free Books</label>
                                        <input type="number"
                                            name="free_books"
                                            id="free_books"
                                            class="form-control @error('free_books') is-invalid @enderror"
                                            value="{{ old('free_books', 0) }}"
                                            placeholder="Number of free books">
                                        @error('free_books')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Validity Days --}}
                                    <div class="form-group mb-3">
                                        <label for="validity_days" class="fw-bold">Validity (Days)</label>
                                        <input type="number"
                                            name="validity_days"
                                            id="validity_days"
                                            class="form-control @error('validity_days') is-invalid @enderror"
                                            value="{{ old('validity_days') }}"
                                            placeholder="Enter number of days">
                                        @error('validity_days')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- Layer Count --}}
                                    <div class="form-group mb-3">
                                        <label for="layer_count" class="fw-bold">Layer Count</label>
                                        <input type="number"
                                            name="layer_count"
                                            id="layer_count"
                                            class="form-control @error('layer_count') is-invalid @enderror"
                                            value="{{ old('layer_count') }}"
                                            placeholder="Enter Layer Members Numbers">
                                        @error('layer_count')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Access All Books --}}
                                    <div class="form-check mb-3">
                                        <input type="checkbox"
                                            name="access_all_books"
                                            id="access_all_books"
                                            class="form-check-input"
                                            value="1"
                                            {{ old('access_all_books') ? 'checked' : '' }}>
                                        <label class="form-check-label fw-bold" for="access_all_books">
                                            Access All Books
                                        </label>
                                    </div>

                                    {{-- Active --}}
                                    <div class="form-check mb-4">
                                        <input type="checkbox"
                                            name="active"
                                            id="active"
                                            class="form-check-input"
                                            value="1"
                                            {{ old('active', true) ? 'checked' : '' }}>
                                        <label class="form-check-label fw-bold" for="active">
                                            Active
                                        </label>
                                    </div>

                                    {{-- Submit --}}
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success px-4">
                                            <i class="fas fa-save"></i> Save Membership
                                        </button>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

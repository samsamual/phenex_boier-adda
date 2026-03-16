@extends('admin.master')
@section('title', 'Admin Dashboard | Edit Membership')

@section('body')
<section class="pt-5">
    <div class="card">
        <div class="card-header bg-info">
            <div class="card-title">Edit Membership</div>
        </div>
        <div class="card-body w3-light-gray">
        <form action="{{ route('memberships.update', $membership->id) }}" method="POST">
            @csrf
            @method('PATCH')

                <div class="row py-2">
                    <div class="col-12 col-md-10 m-auto card p-4">

                        {{-- Name --}}
                        <div class="form-group mb-3">
                            <label for="name">Membership Name<span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name', $membership->name) }}" 
                                   placeholder="Membership name...">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Subscription Fee --}}
                        <div class="form-group mb-3">
                            <label for="subscription_fee">Subscription Fee (৳)<span class="text-danger">*</span></label>
                            <input type="number" 
                                   step="0.01"
                                   class="form-control @error('subscription_fee') is-invalid @enderror" 
                                   id="subscription_fee" 
                                   name="subscription_fee" 
                                   value="{{ old('subscription_fee', $membership->subscription_fee) }}" 
                                   placeholder="Enter subscription fee...">
                            @error('subscription_fee')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Free Books --}}
                        <div class="form-group mb-3">
                            <label for="free_books">Free Books</label>
                            <input type="number" 
                                   class="form-control @error('free_books') is-invalid @enderror" 
                                   id="free_books" 
                                   name="free_books" 
                                   value="{{ old('free_books', $membership->free_books) }}" 
                                   placeholder="Number of free books...">
                            @error('free_books')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Validity Days --}}
                        <div class="form-group mb-3">
                            <label for="validity_days">Validity (Days)</label>
                            <input type="number" 
                                   class="form-control @error('validity_days') is-invalid @enderror" 
                                   id="validity_days" 
                                   name="validity_days" 
                                   value="{{ old('validity_days', $membership->validity_days) }}" 
                                   placeholder="Enter validity in days...">
                            @error('validity_days')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        {{--Layer Count --}}
                        <div class="form-group mb-3">
                            <label for="layer_count">Layer Count</label>
                            <input type="number" 
                                   class="form-control @error('layer_count') is-invalid @enderror" 
                                   id="layer_count" 
                                   name="layer_count" 
                                   value="{{ old('layer_count', $membership->layer_count) }}" 
                                   placeholder="Enter Layer Members Numbers">
                            @error('layer_count')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- Access All Books --}}
                        <div class="form-check mb-3">
                            <input type="checkbox" 
                                   class="form-check-input" 
                                   id="access_all_books" 
                                   name="access_all_books" 
                                   {{ old('access_all_books', $membership->access_all_books) ? 'checked' : '' }}>
                            <label class="form-check-label" for="access_all_books">Access All Books</label>
                        </div>

                        {{-- Active --}}
                        <div class="form-check mb-3">
                            <input type="checkbox" 
                                   class="form-check-input" 
                                   id="active" 
                                   name="active" 
                                   {{ old('active', $membership->active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="active">Active</label>
                        </div>

                        <button type="submit" class="btn btn-success mt-2">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
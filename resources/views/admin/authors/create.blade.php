@extends('admin.master')
@section('title', "Admin Dashboard | Create Author")

@section('body')
<section class="pt-5">
    <div class="card">
        <div class="card-header bg-info">
            <div class="card-title">Create Author</div>
        </div>
        <div class="card-body w3-light-gray">
            <form action="{{ route('authors.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row py-2">
                    <div class="col-12 col-md-9 m-auto card p-5">

                        {{-- Name --}}
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input 
                                type="text" 
                                name="name" 
                                id="name" 
                                class="form-control @error('name') is-invalid @enderror" 
                                placeholder="Author Name" 
                                value="{{ old('name') }}"
                            >
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Phone --}}
                        <div class="form-group mb-3">
                            <label for="phone">Phone</label>
                            <input 
                                type="text" 
                                name="phone" 
                                id="phone" 
                                class="form-control @error('phone') is-invalid @enderror" 
                                placeholder="Phone Number" 
                                value="{{ old('phone') }}"
                            >
                            @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input 
                                type="email" 
                                name="email" 
                                id="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                placeholder="Email Address" 
                                value="{{ old('email') }}"
                            >
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Bio --}}
                        <div class="form-group mb-3">
                            <label for="bio">Bio</label>
                            <textarea 
                                name="bio" 
                                id="bio" 
                                cols="30" 
                                rows="5" 
                                class="form-control @error('bio') is-invalid @enderror" 
                                placeholder="Short Biography">{{ old('bio') }}</textarea>
                            @error('bio')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Image --}}
                        <div class="form-group mb-3">
                            <label for="img">Author Image</label>
                            <input 
                                type="file" 
                                name="img" 
                                id="img" 
                                class="form-control @error('img') is-invalid @enderror"
                            >
                            @error('img')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Active --}}
                        <div class="form-check mb-3">
                            <input 
                                type="checkbox" 
                                class="form-check-input" 
                                id="active" 
                                name="active" 
                                value="1" 
                                {{ old('active') ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="active">Active</label>
                        </div>

                        <button type="submit" class="btn btn-success mt-2">Create Author</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

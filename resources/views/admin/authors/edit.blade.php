@extends('admin.master')
@section('title', "Admin Dashboard | Edit Author")

@section('body')
<section class="pt-5">
    <div class="card">
        <div class="card-header bg-info">
            <div class="card-title">Edit Author</div>
        </div>
        <div class="card-body w3-light-gray">
            <form action="{{ route('authors.update', $author->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row py-2">
                    <div class="col-12 col-md-9 m-auto card p-5">

                        {{-- Name --}}
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input 
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                id="name" 
                                placeholder="Name" 
                                name="name" 
                                value="{{ old('name', $author->name) }}">
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
                                value="{{ old('phone', $author->phone) }}">
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
                                value="{{ old('email', $author->email) }}">
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
                                placeholder="Short Biography">{{ old('bio', $author->bio) }}</textarea>
                            @error('bio')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Image --}}
                        <div class="form-group mb-3">
                            <label for="img">Author Image</label>
                            <input type="file" name="img" id="img" class="form-control mb-2">
                            @if($author->img)
                                <img src="{{ asset($author->img) }}" alt="Author Image" width="100" height="100" class="rounded border">
                            @endif
                            @error('img')
                                <p class="text-danger">{{ $message }}</p>
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
                                {{ old('active', $author->active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="active">Active</label>
                        </div>

                        <button type="submit" class="btn btn-success mt-2">Update Author</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

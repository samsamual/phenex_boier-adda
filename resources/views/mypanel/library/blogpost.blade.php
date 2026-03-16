@extends('frontend.layouts.ecommercemaster')
@section('title', 'Blog Post Dashboard')

@section('content')

<section class="py-4 bg-light">
  <div class="container">
    <div class="row">

      @include('mypanel.library.user_header')

      <div class="col-lg-9">
        <div class="card border-0 shadow-sm">
          <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
              <i class="bi bi-journal-text me-2"></i> My Blog Posts
            </h5>
            <a href="{{ route('user.blog.create') }}" class="btn btn-light btn-sm fw-semibold">
              <i class="bi bi-plus-circle me-1"></i> Add New
            </a>
          </div>

          <div class="card-body">

            @if($blogs->count() > 0)
              <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                  <thead class="table-success">
                    <tr>
                      <th width="5%">#</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th width="12%">Image</th>
                      <th width="15%">Created Date</th>
                      <th width="10%">Status</th>
                      <th width="15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($blogs as $key => $blog)
                      <tr>
                        <td>{{ $key + 1 }}</td>
                        <td class="fw-semibold">{{ $blog->title }}</td>
                        <td>
                          <span class="badge bg-light text-dark border">{{ $blog->category->name ?? 'Uncategorized' }}</span>
                        </td>
                        <td>
                          @if($blog->feature_image)
                            <img src="{{ $blog->feature_image ? asset('storage/post_images/'.$blog->feature_image) : '#' }}" alt="Blog Image" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                          @else
                            <span class="text-muted">No Image</span>
                          @endif
                        </td>
                        <td>{{ $blog->created_at->format('d M, Y') }}</td>
                        <td>
                          @if($blog->status == 'published')
                            <span class="badge bg-success">Published</span>
                          @elseif($blog->status == 'draft')
                            <span class="badge bg-secondary">Draft</span>
                          @else
                            <span class="badge bg-warning text-dark">Pending</span>
                          @endif
                        </td>
                        <td>
                          <div class="btn-group">
                            <a href="{{ route('user.blog.edit', $blog->id) }}" class="btn btn-sm btn-outline-success">
                              <i class="fa fa-pencil"></i>
                            </a>
                            <form action="{{ route('user.blog.delete', $blog->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-outline-danger ms-1">
                                <i class="fa fa-trash"></i>
                              </button>
                            </form>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @else
              <div class="text-center py-5">
                <img src="{{ asset('images/empty_blog.svg') }}" alt="No Blogs" class="mb-3" style="width: 150px;">
                <h6 class="text-muted mb-3">You haven’t posted any blogs yet.</h6>
                <a href="{{ route('user.blog.create') }}" class="btn btn-success">
                  <i class="fa fa-plus-circle me-1"></i> Write Your First Blog
                </a>
              </div>
            @endif

          </div>
        </div>
      </div>

    </div>
  </div>
</section>

@endsection

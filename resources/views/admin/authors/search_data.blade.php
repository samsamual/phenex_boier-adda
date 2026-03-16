<table class="table table-bordered table-sm">
    <thead>
        <tr>
            <th>SL</th>
            <th>Action</th>
            <th>Name</th>
            <th>Image</th>
            <th>Active</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = ($authors->currentPage() - 1) * $authors->perPage() + 1;
        @endphp

        @forelse ($authors as $author)
            <tr>
                <td>{{ $i++ }}</td>

                <td class="d-flex">
                    {{-- Edit --}}
                    <a href="{{ route('authors.edit', $author) }}" class="text-success mr-2">
                        <i class="fas fa-edit"></i>
                    </a>

                    {{-- Delete --}}
                    <form action="{{ route('authors.destroy', $author) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-danger" onclick="return confirm('Are you sure you want to delete this author?')" style="all:unset; cursor: pointer;">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>

                <td>{{ $author->name }}</td>

                <td>
                    <img src="{{ route('imagecache', [ 'template'=>'sbixs','filename' => $author->ai() ]) }}" alt="">
                </td>


                <td>
                    <input 
                        type="checkbox" 
                        class="author-toggle" 
                        data-id="{{ $author->id }}" 
                        data-url="{{ route('authors.active') }}" 
                        {{ $author->active ? 'checked' : '' }}
                        data-toggle="toggle" 
                        data-size="sm" 
                        data-on="On"  
                        data-off="Off" 
                        data-onstyle="success" 
                        data-offstyle="danger"
                    >
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-danger h5 text-center">No Authors Found</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{-- Pagination --}}
<div class="mt-3">
    {{ $authors->links() }}
</div>


@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    $('.author-toggle').change(function() {
        var mode = $(this).prop('checked');
        var id = $(this).data('id');
        var url = $(this).data('url');

        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                mode: mode,
                id: id
            },
            success: function(response) {
                if(response.status) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Updated!',
                        text: response.msg,
                        timer: 1500,
                        showConfirmButton: false
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                    });
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Server Error!'
                });
            }
        });
    });
});
</script>
@endpush

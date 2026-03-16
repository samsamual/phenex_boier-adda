<table class="table table-borderd table-sm">
    <thead>
        <tr>
            <th>SL</th>
            <th>Action</th>
            <th>Name</th>
            <th>Image</th>
            <th>Featured</th>
            <th>Active</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = (($publishers->currentPage() - 1) * $publishers->perPage() + 1); ?>
        @forelse ($publishers as $category)
            <tr>
                <td>{{ $i++ }}</td>

                <td class="d-flex">
                <a href="{{route('publishers.edit',$category)}}" class="text-success mr-2"><i class="fas fa-edit"></i></a>

                    <form action="{{route('publishers.destroy', $category) }}" method="post">
                        @csrf
                        @method('delete')
                        <button href="{{route('publishers.destroy', $category)}}" class="text-danger" onclick="return confirm('Are you sure? you want to delete this puiblisher Item?')" style="all:unset; cursor: pointer;"><i class="fas fa-trash"></i></button>
                    </form>

                </td>
                <td>{{ $category->name_en }}</td>

                <td>
                    <img src="{{ route('imagecache', [ 'template'=>'sbixs','filename' => $category->fi() ]) }}" alt="">
                </td>
                <td>
                    @if ($category->featured)
                    <span class="badge badge-primary">Featured</span>
                    @endif

                </td>

                <td>
                    <input type="checkbox" name="toogle" data-url="{{route('publishers.active')}}" value="{{$category->id}}" data-toggle="toggle" data-size="sm" {{$category->active==1 ? 'checked' : '' }} data-on="On"  data-off="Off" data-onstyle="success" data-offstyle="danger">
                </td>

            </tr>

        @empty
            <tr>
                <td colspan="6" class="text-danger h5 text-center">No Department Found</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{ $publishers->links() }}

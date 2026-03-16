<table class="table table-bordered text-center">
    <thead>
        <tr>
            <th>SL</th>
            <th>Action</th>
            <th>Doctor Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Chambar Location</th>
            <th>Doctor Fee</th>
            <th>Gender</th>
            <th>Image</th>
            <th>Active</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = (($doctors->currentPage() - 1) * $doctors->perPage() + 1); ?>
        @forelse ($doctors as $doctor)
            <tr style="height: {{ $doctors->count() < 3 ? '80px' : '' }};">
                <td>{{ $i++ }}</td>

                <td>
                    <div class="dropdown show">
                        <a class="btn btn-primary btn-xs dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                            <a class="dropdown-item" href="{{route('doctors.edit',$doctor)}}"><i class="fas fa-edit"></i>edit</a>
                            <a class="dropdown-item" href="{{route('doctor.chambers',$doctor)}}"><i class="fas fa-user-md"></i> Doctor Chambers</a>
                            <a class="dropdown-item" href="{{ route('admin.user',['id' =>$doctor->user_id]) }}"><i class="fas fa-users"></i> User Info</a>
                            <form action="{{route('doctors.destroy', $doctor) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="dropdown-item ml-3" onclick="return confirm('Are you sure? you want to delete this gallery Item?')" style="all:unset; cursor: pointer;"><i class="fas fa-trash"></i> Delete</button>
                            </form>
                        </div>
                    </div>

                </td>
                <td><a href="{{route('doctors.index',['id' => $doctor->id ?? ''])}}">{{ Str::ucfirst($doctor->name_en) }}</a></td>
                <td>{{ $doctor->email }}</td>
                <td>{{ $doctor->mobile }}</td>
                <td>{{ $doctor->chambar_location }}</td>
                <td>{{ $doctor->doctor_fee }}</td>
                <td>{{ ucfirst($doctor->gender) }}</td>


                <td>
                    <img src="{{ route('imagecache', [ 'template'=>'sbixs','filename' => $doctor->fi() ]) }}" alt="">
                </td>


                <td>
                    <input type="checkbox" name="toogle" data-url="{{route('doctor.active')}}" value="{{$doctor->id}}" data-toggle="toggle" data-size="sm" {{$doctor->active==1 ? 'checked' : '' }} data-on="On"  data-off="Off" data-onstyle="success" data-offstyle="danger">
                </td>

            </tr>

        @empty
            <tr>
                <td colspan="9" class="text-danger h5 text-center">No Doctor Found</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{ $doctors->links() }}

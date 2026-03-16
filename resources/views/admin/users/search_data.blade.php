<table id="example1" class="table table-sm table-bordered table-striped">
    <thead>
        <tr>
            <th width="20">SL</th>
            <th wisth="100">Action</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Temp Password</th>
            <th>Transaction Number</th>
            <th>Transaction ID</th>
            <th>Joined</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="">
        <?php $i = (($users->currentPage() - 1) * $users->perPage() + 1); ?>

        @foreach($users as $user)
        <tr style="height: {{ $users->count() < 3 ? '100px' : '' }};">
            <td>{{$i++}}</td>
            <td>


                <div class="dropdown show">
                    <a class="btn btn-primary btn-xs dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                        <a class="dropdown-item" href="{{route('admin.edit-user',$user->id)}}"><i
                                class="fas fa-edit"></i> Edit</a>
                        <a class="dropdown-item" href="{{route('admin.show-user',$user->id)}}"><i class="fa fa-eye"></i>
                            Show</a>
                        {{-- <a class="dropdown-item" href="{{ route('patient.allvists',$user->id) }}"><i
                            class="fas fa-users"></i> All Visits</a> --}}
                        <a class="dropdown-item" href="{{route('admin.delete-user',$user->id)}}"><i class="fa fa-trash">
                                Delete</i></a>

                    </div>
                </div>
            </td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->mobile}}</td>
            <td>{{ $user->password_temp }}</td>
            <td>{{ $user->bkash_number }}</td>
            <td>{{ $user->transaction_id }}</td>
            <td>{{ optional($user->created_at)->diffForHumans() ?? 'N/A' }}</td>


            <td>
                <div class="form-check form-switch">
                    <input type="checkbox" class="form-check-input toggle-approve" id="approveSwitch{{ $user->id }}"
                        data-id="{{ $user->id }}" {{ $user->is_approve ? 'checked' : '' }}>
                </div>
            </td>


        </tr>

        @endforeach

    </tbody>

</table>

{{ $users->render() }}

<style>
.form-check-input[type="checkbox"] {
    width: 50px;
    height: 25px;
    appearance: none;
    background-color: #c6c6c6;
    border-radius: 25px;
    position: relative;
    outline: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

.form-check-input[type="checkbox"]::before {
    content: "";
    position: absolute;
    width: 21px;
    height: 21px;
    border-radius: 50%;
    background-color: white;
    top: 2px;
    left: 2px;
    transition: 0.3s;
}

.form-check-input:checked {
    background-color: #28a745;
    /* green */
}

.form-check-input:checked::before {
    transform: translateX(25px);
}
</style>

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).on('change', '.toggle-approve', function() {
    let switchInput = $(this);
    let userId = switchInput.data('id');
    let status = switchInput.prop('checked') ? 1 : 0;

    // Ask confirmation before changing status
    Swal.fire({
        title: 'Are you sure?',
        text: status ? "You want to approve this user!" : "You want to deactivate this user!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, confirm it!',
        cancelButtonText: 'Cancel',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "{{ route('admin.user.approve.toggle') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: userId,
                    status: status
                },
                success: function(response) {
                    Swal.fire({
                        title: response.status ? 'Success' : 'Error',
                        text: response.message,
                        icon: response.status ? 'success' : 'error',
                        timer: 1500,
                        showConfirmButton: false
                    });
                },
                error: function() {
                    Swal.fire('Error', 'Something went wrong!', 'error');
                    switchInput.prop('checked', !status); // revert state
                }
            });
        } else {
            switchInput.prop('checked', !status); // revert state if canceled
        }
    });
});
</script>
@endpush
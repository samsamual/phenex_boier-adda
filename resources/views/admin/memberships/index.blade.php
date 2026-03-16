@extends('admin.master')
@section('title',"Admin Dashboard | All Memberships")

@section('body')
    <section class="pt-5">
        <div class="card">
            <div class="card-header bg-card">
                <div class="card-title">All Memberships</div>
            </div>
            <div class="card-body">
                 <div class="table-responsive">
                    <table class="table table-bordered table-hover table-sm table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Action</th>
                                <th>Name</th>
                                <th>Subscription Fee</th>
                                <th>Free Books</th>
                                <th>Validity Days</th>
                                <th>Layer Member</th>
                                <th>Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = (($membershipCategory->currentPage() - 1) * $membershipCategory->perPage() + 1); ?>
                            @forelse ($membershipCategory as $membership)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>

                                    <td class="d-flex">
                                    <a href="{{route('memberships.edit',$membership)}}" class="text-success mr-2"><i class="fas fa-edit"></i></a>

                                        <form action="{{route('memberships.destroy', $membership) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button href="{{route('memberships.destroy', $membership)}}" class="text-danger" onclick="return confirm('Are you sure? you want to delete this membership Item?')" style="all:unset; cursor: pointer;"><i class="fas fa-trash"></i></button>
                                        </form>

                                    </td>
                                    <td>{{ $membership->name }}</td>
                                    <td>{{ Str::limit($membership->subscription_fee,50) }}</td>

                                    <td>{{ $membership->free_books == null ? 'All' : $membership->free_books}}</td>
                                    <td>{{ $membership->validity_days == null ? 'Unlimited' : $membership->validity_days }}</td>
                                    <td>{{ $membership->layer_count }}</td>
                                    <td>
                                        @if ($membership->active)
                                        <span class="badge badge-primary">Active</span>
                                        @else 
                                         <span class="badge badge-danger">Inactive</span>
                                        @endif

                                    </td>
                                 
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="6" class="text-danger h5 text-center">No gallery Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $membershipCategory->links() }}
                 </div>
            </div>
        </div>
    </section>
@endsection




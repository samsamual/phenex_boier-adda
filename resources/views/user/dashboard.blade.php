@extends('frontend.layouts.ecommercemaster')

@section('content')
<section class="my-0 section">
    <div class="container">

        <!-- Success/Error Messages -->
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="row">
            @include('mypanel.library.user_header')

            @if(auth()->check() && auth()->user()->is_approve == 1)
              {{-- Main Content --}}
              <div class="col-lg-9">
                  <div class="tab-content">

                      {{-- Dashboard Tab --}}
                      <div class="tab-pane fade {{ $activeTab=='dashboard'?'show active':'' }}" id="dashboard">
                          <div class="row g-3">
                              {{-- Total Orders --}}
                              <div class="col-md-4">
                                  <a href="{{ route('user.orders', ['type' => 'all']) }}" class="text-decoration-none">
                                      <div class="card border-success shadow-sm">
                                          <div class="card-body d-flex align-items-center gap-3">
                                              <div class="bg-success text-white d-flex justify-content-center align-items-center rounded-circle"
                                                  style="width:50px; height:50px; font-size:20px;">
                                                  <i class="fa-solid fa-cart-plus"></i>
                                              </div>
                                              <div>
                                                  <h4 class="text-success mb-0">{{ $user->orders()->count() }}</h4>
                                                  <small>Total Orders</small>
                                              </div>
                                          </div>
                                      </div>
                                  </a>
                              </div>

                              {{-- Today Orders --}}
                              <div class="col-md-4">
                                  <a href="{{ route('user.orders', ['type' => 'today']) }}" class="text-decoration-none">
                                      <div class="card border-primary shadow-sm">
                                          <div class="card-body d-flex align-items-center gap-3">
                                              <div class="bg-primary text-white d-flex justify-content-center align-items-center rounded-circle"
                                                  style="width:50px; height:50px; font-size:20px;">
                                                  <i class="fa-solid fa-cart-plus"></i>
                                              </div>
                                              <div>
                                                  <h4 class="text-primary mb-0">{{ $todayOrdersCount }}</h4>
                                                  <small>Today Orders</small>
                                              </div>
                                          </div>
                                      </div>
                                  </a>
                              </div>

                              {{-- Cancelled Orders --}}
                              <div class="col-md-4">
                                  <a href="{{ route('user.orders', ['type' => 'cancelled']) }}"
                                      class="text-decoration-none">
                                      <div class="card border-danger shadow-sm">
                                          <div class="card-body d-flex align-items-center gap-3">
                                              <div class="bg-danger text-white d-flex justify-content-center align-items-center rounded-circle"
                                                  style="width:50px; height:50px; font-size:20px;">
                                                  <i class="fa-solid fa-cart-plus"></i>
                                              </div>
                                              <div>
                                                  <h4 class="text-danger mb-0">{{ $cancelOrdersCount }}</h4>
                                                  <small>Cancelled Orders</small>
                                              </div>
                                          </div>
                                      </div>
                                  </a>
                              </div>

                              {{-- Cancelled Orders --}}
                              <div class="col-md-4">
                                  <a href="{{ route('user.orders', ['type' => 'cancelled']) }}"
                                      class="text-decoration-none">
                                      <div class="card border-danger shadow-sm">
                                          <div class="card-body d-flex align-items-center gap-3">
                                              <div class="bg-danger text-white d-flex justify-content-center align-items-center rounded-circle"
                                                  style="width:50px; height:50px; font-size:20px;">
                                                  <i class="fa-solid fa-dollar-sign"></i> <!-- $ -->
                                              </div>
                                              <div>
                                                  <h4 class="text-danger mb-0">{{ auth()->user()->balance }}</h4>
                                                  <small>Current Balance </small>
                                              </div>
                                          </div>
                                      </div>
                                  </a>
                              </div>


                          </div>
                      </div>

                      {{-- Orders Tab --}}
                      <div class="tab-pane fade {{ $activeTab=='order'?'show active':'' }}" id="order">
                          <div class="card">
                              <div
                                  class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                                  <h5 class="mb-0">My Orders</h5>
                                  @if(isset($type))
                                  <div class="btn-group btn-group-sm">
                                      <a href="{{ route('user.orders', ['type' => 'all']) }}"
                                          class="btn {{ $type=='all'?'btn-light border':'btn-outline-light' }}">All</a>
                                      <a href="{{ route('user.orders', ['type' => 'today']) }}"
                                          class="btn {{ $type=='today'?'btn-light border':'btn-outline-light' }}">Today</a>
                                      <a href="{{ route('user.orders', ['type' => 'cancelled']) }}"
                                          class="btn {{ $type=='cancelled'?'btn-light border':'btn-outline-light' }}">Cancelled</a>
                                  </div>
                                  @endif
                              </div>
                              <div class="card-body p-3">
                                  @if($orders->count())
                                  <div class="table-responsive">
                                      <table class="table table-bordered table-hover mb-0">
                                          <thead class="table-light">
                                              <tr>
                                                  <th>ORDER</th>
                                                  <th>DATE</th>
                                                  <th>STATUS</th>
                                                  <th>TOTAL</th>
                                                  <th>ACTION</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              @foreach ($orders as $order)
                                              <tr>
                                                  <td>{{ $order->id }}</td>
                                                  <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                                  <td class="text-capitalize">{{ $order->order_status }}</td>
                                                  <td>{{ number_format($order->grand_total, 2) }} tk</td>
                                                  <td>
                                                      <a class="btn btn-primary btn-xs" target="_blank"
                                                          href="{{ route('user.orderPrint', $order->id) }}"><i
                                                              class="fas fa-print w3-small"></i> Invoice</a>
                                                      <a class="btn btn-primary btn-xs" target="_blank"
                                                          href="{{ route('user.orderChalan', $order->id) }}"><i
                                                              class="fas fa-print w3-small"></i> Chalan</a>

                                                  </td>
                                              </tr>
                                              @endforeach
                                          </tbody>
                                      </table>
                                  </div>
                                  <div class="mt-3">
                                      {{ $orders->links() }}
                                  </div>
                                  @else
                                  <p class="text-center text-muted">No orders found.</p>
                                  @endif
                              </div>
                          </div>
                      </div>

                      {{-- Personal Info Edit Tab --}}
                      <div class="tab-pane fade {{ $activeTab=='edit'?'show active':'' }}" id="edit">
                          <div class="card">
                              <div class="card-header bg-success text-white">Account Details</div>
                              <div class="card-body">
                                  <form action="{{ route('user.changeMyInformation') }}" method="POST"
                                      class="needs-validation" novalidate>
                                      @csrf

                                      {{-- Name & Mobile --}}
                                      <div class="row g-3 mb-3">
                                          <div class="col-md-6">
                                              <label for="name" class="form-label">Name <span
                                                      class="text-danger">*</span></label>
                                              <input type="text" id="name" name="name"
                                                  value="{{ old('name',$user->name) }}" class="form-control" required>
                                              @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                          </div>
                                          <div class="col-md-6">
                                              <label for="mobile" class="form-label">Mobile <span
                                                      class="text-danger">*</span></label>
                                              <input type="text" id="mobile" name="mobile"
                                                  value="{{ old('mobile',$user->mobile) }}" class="form-control" required>
                                              @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
                                          </div>
                                      </div>

                                      {{-- Email --}}
                                      <div class="mb-3">
                                          <label for="email" class="form-label">Email <span
                                                  class="text-danger">*</span></label>
                                          <input type="email" id="email" name="email"
                                              value="{{ old('email',$user->email) }}" class="form-control" required>
                                          @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                                      </div>

                                      {{-- Father Name --}}
                                      <div class="mb-3">
                                          <label for="father_name" class="form-label">Father Name <span
                                                  class="text-danger">*</span></label>
                                          <input type="text" id="father_name" name="father_name" class="form-control"
                                              value="{{ old('father_name',$user->father_name) }}" required>
                                          @error('father_name')<span class="text-danger">{{ $message }}</span>@enderror
                                      </div>

                                      {{-- Address --}}
                                      <div class="mb-3">
                                          <label for="address" class="form-label">Address <span
                                                  class="text-danger">*</span></label>
                                          <input type="text" id="address" name="address" class="form-control"
                                              value="{{ old('address',$user->address) }}" required>
                                          @error('address')<span class="text-danger">{{ $message }}</span>@enderror
                                      </div>

                                      {{-- Registration Date --}}
                                      <div class="mb-3">
                                          <label for="reg_date" class="form-label">Date Of Registration <span
                                                  class="text-danger">*</span></label>
                                          <input type="date" id="reg_date" name="reg_date" class="form-control"
                                              value="{{ old('reg_date',$user->reg_date) }}" required>
                                          @error('reg_date')<span class="text-danger">{{ $message }}</span>@enderror
                                      </div>

                                      {{-- Bkash Number --}}
                                      <div class="mb-3">
                                          <label for="bkash_number" class="form-label">Registration Payment Bkash No <span
                                                  class="text-danger">*</span></label>
                                          <input type="text" id="bkash_number" name="bkash_number" class="form-control"
                                              value="{{ old('bkash_number',$user->bkash_number) }}" required>
                                          @error('bkash_number')<span class="text-danger">{{ $message }}</span>@enderror
                                      </div>

                                      {{-- Date of Birth --}}
                                      <div class="mb-3">
                                          <label for="dob" class="form-label">Date Of Birth <span
                                                  class="text-danger">*</span></label>
                                          <input type="date" id="dob" name="dob" class="form-control"
                                              value="{{ old('dob',$user->dob) }}" required>
                                          @error('dob')<span class="text-danger">{{ $message }}</span>@enderror
                                      </div>

                                      {{-- Blood Group --}}
                                      <div class="mb-3">
                                          <label for="blood_group" class="form-label">Blood Group <span
                                                  class="text-danger">*</span></label>
                                          <select id="blood_group" name="blood_group" class="form-select" required>
                                              <option value="">Select One</option>
                                              @foreach(['A+','A-','B+','B-','O+','O-','AB+','AB-'] as $bg)
                                              <option value="{{ $bg }}"
                                                  {{ old('blood_group', $user->blood_group) == $bg ? 'selected' : '' }}>
                                                  {{ $bg }}
                                              </option>
                                              @endforeach
                                          </select>
                                          @error('blood_group')<span class="text-danger">{{ $message }}</span>@enderror
                                      </div>

                                      <hr class="mt-4">
                                      <h6>Change Password</h6>
                                      <div class="row g-3">
                                          <div class="col-md-6">
                                              <label class="form-label">Current Password</label>
                                              <input type="password" name="old_password" class="form-control">
                                          </div>
                                          <div class="col-md-6">
                                              <label class="form-label">New Password</label>
                                              <input type="password" name="new_password" class="form-control">
                                          </div>
                                          <div class="col-12">
                                              <label class="form-label">Confirm New Password</label>
                                              <input type="password" name="confirm_password" class="form-control">
                                          </div>
                                      </div>

                                      <div class="mt-3">
                                          <button type="submit" class="btn btn-success">Save Changes</button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>

                      {{-- upload book Tab --}}
                      <div class="tab-pane fade {{ $activeTab=='upload'?'show active':'' }}" id="upload">
                          <div class="card">
                              <div class="card-header bg-success text-white">Upload Book</div>
                              <div class="card-body">
                                  <form action="{{ route('user.library.store_book') }}" method="POST"
                                      class="needs-validation" novalidate enctype="multipart/form-data">
                                      @csrf

                                      {{-- Book Name --}}
                                      <div class="row g-3 mb-3">
                                          <div class="col-md-12">
                                              <label for="name_en" class="form-label">Book Title <span
                                                      class="text-danger">*</span></label>
                                              <input type="text" class="form-control" id="name_en" name="name_en"
                                                  value="{{ old('name_en') }}" placeholder="Book Title" required>
                                              @error('name_en')<span class="text-danger">{{ $message }}</span>@enderror
                                          </div>

                                          {{-- Description --}}
                                          <div class="col-md-12">
                                              <label for="description_en" class="form-label">Description <span
                                                      class="text-danger">*</span></label>
                                              <textarea class="form-control" id="description_en" name="description_en"
                                                  rows="3"
                                                  placeholder="Book Description">{{ old('description_en') }}</textarea>
                                              @error('description_en')<span
                                                  class="text-danger">{{ $message }}</span>@enderror
                                          </div>
                                      </div>

                                      {{-- Price --}}
                                      <div class="row">
                                          <div class="mb-3 col-md-6">
                                              <label for="price" class="form-label">Price <span
                                                      class="text-danger">*</span></label>
                                              <input type="number" class="form-control" id="price" name="price"
                                                  value="{{ old('price', '0.00') }}" step="0.01" required>
                                              @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                                          </div>

                                          {{--Categories --}}
                                          <div class="mb-3 col-md-6">
                                              <label for="categories" class="form-label">Category <span
                                                      class="text-danger">*</span></label>

                                              <select multiple class="form-control" id="categories" name="categories[]">
                                                  @foreach($categories as $category)
                                                  <option value="{{ $category->id }}">{{ $category->name_en }}</option>
                                                  @endforeach
                                              </select>
                                              <small class="form-text text-muted">Hold Ctrl or Cmd to select multiple
                                                  categories.</small>
                                              @error('categories')<span class="text-danger">{{ $message }}</span>@enderror
                                          </div>
                                      </div>
                                      {{-- Cover Image --}}
                                      <div class="mb-3">
                                          <label for="featured_image" class="form-label">Cover Image <span
                                                  class="text-danger">*</span></label>
                                          <input type="file" class="form-control" id="featured_image"
                                              name="featured_image" accept="image/*" required>
                                          @error('featured_image')<span class="text-danger">{{ $message }}</span>@enderror
                                      </div>

                                      {{-- Book File --}}
                                      <div class="mb-3">
                                          <label for="file_path" class="form-label">Book File (PDF only) <span
                                                  class="text-danger">*</span></label>
                                          <input type="file" class="form-control" id="file_path" name="file_path"
                                              accept=".pdf" required>
                                          @error('file_path')<span class="text-danger">{{ $message }}</span>@enderror
                                      </div>

                                      <div class="mt-3">
                                          <button type="submit" class="btn btn-success">Save Changes</button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>

                      <!-- content ends here  -->
                  </div>
              </div>
            @else
              {{-- Popup Modal --}}
              <div class="modal fade show" id="approvalModal" tabindex="-1" aria-modal="true" role="dialog"
                  style="display: block; background-color: rgba(0,0,0,0.5);">
                  <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content text-center p-4">
                          <h4 class="mb-3 text-danger">Account Pending Approval</h4>
                          <p class="text-muted mb-4">Please wait for the admin to approve your account before accessing
                              this section.</p>
                              <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
                        {{-- <a href="{{ route('logout') }}"
                              onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                              class="btn btn-primary">
                              Logout
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>--}}
                      </div>
                  </div>
              </div>
            @endif
        </div>
    </div>
</section>
@endsection

@push('js')
<script>
// Profile Image Upload
document.getElementById('profilePreview').addEventListener('click', () => document.getElementById('profileImageInput')
    .click());
document.getElementById('profileImageInput').addEventListener('change', function() {
    const file = this.files[0];
    if (!file) return;
    const formData = new FormData();
    formData.append('image', file);
    formData.append('_token', '{{ csrf_token() }}');
    const reader = new FileReader();
    reader.onload = e => document.getElementById('profilePreview').src = e.target.result;
    reader.readAsDataURL(file);
    fetch("{{ route('user.uploadProfileImage') }}", {
            method: 'POST',
            body: formData
        })
        .then(res => res.json()).then(data => {
            if (!data.success) alert('Upload failed')
        }).catch(() => alert('Upload failed'));
});
</script>
@endpush
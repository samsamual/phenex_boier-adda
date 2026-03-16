      {{-- Sidebar --}}
      <aside class="col-lg-3 mb-4">
        <div class="card text-center">
          <div class="card-body">
            <img id="profilePreview"
                 src="{{ route('imagecache', ['template' => 'pfimd', 'filename' => $user->fi()]) }}"
                 alt="Profile"
                 class="rounded-circle border border-success mb-2"
                 style="width:80px; height:80px; object-fit:cover; cursor:pointer;">
            <input type="file" id="profileImageInput" accept="image/*" class="d-none">

            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="text-muted">{{ $user->email }}</p>
          </div>

          <ul class="list-group list-group-flush text-start">
            <li class="list-group-item">
              <a href="{{route('user.dashboard')}}" 
                 class="tab-link {{ $activeTab=='dashboard'?'text-success fw-bold':'' }}">
                 Dashboard
              </a>
            </li>
            <li class="list-group-item">
              <a href="{{route('user.orders', ['type' => 'all'])}}" 
                 class="tab-link {{ $activeTab=='order'?'text-success fw-bold':'' }}">
                 Orders
              </a>
            </li>
            <li class="list-group-item">
              <a href="{{ route('user.editMyInformation')}}" 
                 class="tab-link {{ $activeTab=='edit'?'text-success fw-bold':'' }}">
                 Personal Info
              </a>
            </li>
            <li class="list-group-item">
              <a href="{{ route('user.invite') }}" 
                 class="tab-link {{ $activeTab=='invite'?'text-success fw-bold':'' }}">
                 Invite a Friend
              </a>
            </li>
            <li class="list-group-item">
              <a href="{{ route('user.affiliate') }}" 
                 class="tab-link {{ $activeTab=='affiliate'?'text-success fw-bold':'' }}">
                 Affiliate Listing
              </a>
            </li>
            @if(Auth::user()->can_upload_books)
            <li class="list-group-item">
              <a href="{{ route('user.library.create_book') }}" 
                 class="tab-link {{ $activeTab=='upload'?'text-success fw-bold':'' }}">
                 Upload Book
              </a>
            </li>
            @endif
            <li class="list-group-item">
              <a href="{{ route('user.library.favorite_books') }}" 
                 class="tab-link {{ $activeTab=='favorite'?'text-success fw-bold':'' }}">
                 Favorite Books
              </a>
            </li>

            <li class="list-group-item">
              <a href="{{ route('user.library.purchased_books') }}" 
                 class="tab-link {{ $activeTab=='purchase'?'text-success fw-bold':'' }}">
                 Purchased Books
              </a>
            </li>

            <li class="list-group-item">
              <a href="{{ route('user.library.last_read_book') }}" 
                 class="tab-link {{ $activeTab=='last'?'text-success fw-bold':'' }}">
                 Last Read Book
              </a>
            </li>
            <li class="list-group-item">
              <a href="{{ route('user.withdrawals.index') }}" 
                 class="tab-link {{ $activeTab=='withdrawal'?'text-success fw-bold':'' }}">
                 Withdrawal
              </a>
            </li>
            <li class="list-group-item">
              <a href="{{ route('user.blogpost') }}" 
                 class="tab-link {{ $activeTab=='blog'?'text-success fw-bold':'' }}">
                 Blog Post
              </a>
            </li>
            <li class="list-group-item">
              <a href="{{ route('logout') }}" class="text-danger">Logout</a>
            </li>
          </ul>
        </div>
      </aside>
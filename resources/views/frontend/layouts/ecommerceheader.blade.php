<header id="header" class="header-effect-shrink"
    data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 120, 'stickyHeaderContainerHeight': 70}">
    
  <div class="header-body border-top-0">
    <div class="header-container container">
      <div class="header-row">

        <!-- LEFT COLUMN (LOGO) -->
        <div class="header-column">
          <div class="header-row">
            <div class="header-logo">
              <a href="{{ url('/') }}">  
                <img alt="{{$ws->website_title ?? ''}}" width="110" height="80" src="{{ route('imagecache', [ 'template'=>'original','filename' => $ws->logo() ]) }}">
              </a>
            </div>
            {{-- <div class="header-logo">
              <a href="{{ url('/') }}" class="d-flex align-items-center justify-content-center" style="text-decoration: none;">
                <h2 class="ebook-title">eBook 2</h2>
              </a>
            </div> --}}
          </div>
        </div>

        <!-- RIGHT COLUMN (NAVIGATION) -->
        <div class="header-column justify-content-end">
          <div class="header-row">
            <div class="header-nav order-2 order-lg-1">
              <div class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1">
                <nav class="collapse">
                  <ul class="nav nav-pills" id="mainNav">
                    <li class="dropdown-full-color dropdown-secondary">
                      <a class="nav-link {{ request()->routeIs('shop.shasthoseba') ? 'active' : '' }}" href="{{route('shop.shasthoseba')}}">Books</a>
                    </li>
                    <li class="dropdown-full-color dropdown-secondary">
                      <a class="nav-link {{ request()->routeIs('generes') ? 'active' : '' }}" href="{{route('generes')}}">Generes</a>
                    </li>
                    <li class="dropdown-full-color dropdown-secondary">
                      <a class="nav-link {{ request()->routeIs('authors') ? 'active' : '' }}" href="{{route('authors')}}">Authors</a>
                    </li>
                    <li class="dropdown-full-color dropdown-secondary">
                      <a class="nav-link {{ request()->routeIs('publisher') ? 'active' : '' }}" href="{{route('publisher')}}">Publisher</a>
                    </li>
                    <li class="dropdown-full-color dropdown-secondary">
                      <a class="nav-link {{ request()->routeIs('pricing') ? 'active' : '' }}" href="{{route('pricing')}}">Pricing</a>
                    </li>
                    <li class="dropdown-full-color dropdown-secondary">
                      <a class="nav-link {{ request()->routeIs('blog') ? 'active' : '' }}" href="{{route('blog')}}">Blog</a>
                    </li>

                    @if(Auth::check())
                      @php $user = auth()->user(); @endphp
                      <li class="dropdown dropdown-full-color dropdown-secondary">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                          <i class="fa fa-user"></i>&nbsp; {{ $user->name }}
                        </a>
                        <ul class="dropdown-menu">
                          @if ($user->hasRole('admin'))
                            <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                          @endif
                          <li><a class="dropdown-item" href="{{ route('user.dashboard') }}">Member Dashboard</a></li>
                          <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                      </li>
                    @else
                      <li class="dropdown-full-color dropdown-secondary">
                        <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">
                          Login
                        </a>
                      </li>
                    @endif
                  </ul>
                </nav>
              </div>
              <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
                <i class="fas fa-bars"></i>
              </button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</header>

<!-- Custom Style -->
<style>
  .ebook-title {
    font-family: "Marcellus SC", Sans-serif;
    font-size: 37px;
    font-weight: 600;
    color: #000000;
    margin: 0;
    text-align: center;
  }
  .header-logo a {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
  }
</style>

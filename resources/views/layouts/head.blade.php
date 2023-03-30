<div class="app-header header sticky">
  <div class="container-fluid main-container">
    <div class="d-flex align-items-center">
      <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0);"></a>
      <div class="responsive-logo">
        <a href="index.html" class="header-logo">
          <img src="{{ asset('assets/images/brand/logo-3.png') }}" class="mobile-logo logo-1" alt="logo">
          <img src="{{ asset('assets/images/brand/logo.png') }}" class="mobile-logo dark-logo-1" alt="logo">
        </a>
      </div>
      <!-- sidebar-toggle-->
      <a class="logo-horizontal " href="index.html">
        <img src="../assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
        <img src="../assets/images/brand/logo-3.png" class="header-brand-img light-logo1" alt="logo">
      </a>
      <!-- LOGO -->

      <div class="d-flex order-lg-2 ms-auto header-right-icons">
        <!-- SEARCH -->
        <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon fe fe-more-vertical text-dark"></span>
        </button>
        <div class="navbar navbar-collapse responsive-navbar p-0">
          <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
            <div class="d-flex order-lg-2">
              <div class="dropdown d-block d-lg-none">
                <a href="javascript:void(0);" class="nav-link icon" data-bs-toggle="dropdown">
                  <i class="fe fe-search"></i>
                </a>
                <div class="dropdown-menu header-search dropdown-menu-start">
                  <div class="input-group w-100 p-2">
                    <input type="text" class="form-control" placeholder="Search....">
                    <div class="input-group-text btn btn-primary">
                      <i class="fa fa-search" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>

              @if (Auth::guard('admin')->check())
                <div class="dropdown d-md-flex profile-1">
                  <a href="javascript:void(0);" data-bs-toggle="dropdown" class="nav-link leading-none d-flex px-1">
                    <span>
                      <img src="{{ asset('assets/images/users/user.jpg') }}" alt="profile-user"
                        class="avatar  profile-user brround cover-image">
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <div class="drop-heading">
                      <div class="text-center">
                        <h5 class="text-dark mb-0">{{ Auth::guard('admin')->user()->username }}</h5>
                        <small class="text-muted">Administrator</small>
                      </div>
                    </div>
                    <div class="dropdown-divider m-0"></div>
                    {{-- <a class="dropdown-item" href="profile.html">
                      <i class="dropdown-icon fe fe-user"></i> Profile
                    </a> --}}
                    <a class="dropdown-item" href="{{ route('admin.logout') }}">
                      <i class="dropdown-icon fe fe-alert-circle"></i> Sign out
                    </a>
                  </div>
                </div>
              @else
                <div class="dropdown d-md-flex profile-1">
                  <a href="javascript:void(0);" data-bs-toggle="dropdown" class="nav-link leading-none d-flex px-1">
                    <span>
                      <img src="{{ asset('assets/images/users/user.jpg') }}" alt="profile-user"
                        class="avatar  profile-user brround cover-image">
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <div class="drop-heading">
                      <div class="text-center">
                        <h5 class="text-dark mb-0">{{ Auth::guard('web')->user()->nama_lengkap }}</h5>
                        <small class="text-muted">Pegawai</small>
                      </div>
                    </div>
                    <div class="dropdown-divider m-0"></div>
                    {{-- <a class="dropdown-item" href="profile.html">
                      <i class="dropdown-icon fe fe-user"></i> Profile
                    </a> --}}
                    <a class="dropdown-item" href="{{ route('logout') }}">
                      <i class="dropdown-icon fe fe-alert-circle"></i> Sign out
                    </a>
                  </div>
                </div>
              @endif
              <!-- SIDE-MENU -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

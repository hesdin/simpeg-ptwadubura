<div class="app-header header sticky">
  <div class="container-fluid main-container">
    <div class="d-flex align-items-center">
      <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0);"></a>
      <div class="responsive-logo">
        <a href="index.html" class="header-logo">
          <img src="../assets/images/brand/logo-3.png" class="mobile-logo logo-1" alt="logo">
          <img src="../assets/images/brand/logo.png" class="mobile-logo dark-logo-1" alt="logo">
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

              <!-- Theme-Layout -->
              <!-- FULL-SCREEN -->
              {{-- <div class="dropdown d-md-flex notifications">
                <a class="nav-link icon" data-bs-toggle="dropdown"><i class="fe fe-bell"></i><span
                    class=" pulse"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow ">
                  <div class="drop-heading border-bottom">
                    <div class="d-flex">
                      <h6 class="mt-1 mb-0 fs-16 fw-semibold">You have Notification</h6>
                      <div class="ms-auto">
                        <span class="badge bg-success rounded-pill">3</span>
                      </div>
                    </div>
                  </div>
                  <div class="notifications-menu">
                    <a class="dropdown-item d-flex" href="chat.html">
                      <div class="me-3 notifyimg  bg-primary-gradient brround box-shadow-primary">
                        <i class="fe fe-message-square"></i>
                      </div>
                      <div class="mt-1 wd-80p">
                        <h5 class="notification-label mb-1">New review received</h5>
                        <span class="notification-subtext">2 hours ago</span>
                      </div>
                    </a>
                    <a class="dropdown-item d-flex" href="chat.html">
                      <div class="me-3 notifyimg  bg-secondary-gradient brround box-shadow-primary">
                        <i class="fe fe-mail"></i>
                      </div>
                      <div class="mt-1 wd-80p">
                        <h5 class="notification-label mb-1">New Mails Received</h5>
                        <span class="notification-subtext">1 week ago</span>
                      </div>
                    </a>
                    <a class="dropdown-item d-flex" href="cart.html">
                      <div class="me-3 notifyimg  bg-success-gradient brround box-shadow-primary">
                        <i class="fe fe-shopping-cart"></i>
                      </div>
                      <div class="mt-1 wd-80p">
                        <h5 class="notification-label mb-1">New Order Received</h5>
                        <span class="notification-subtext">1 day ago</span>
                      </div>
                    </a>
                  </div>
                  <div class="dropdown-divider m-0"></div>
                  <a href="javascript:void(0);" class="dropdown-item text-center p-3 text-muted">View all
                    Notification</a>
                </div>
              </div> --}}
              <!-- NOTIFICATIONS -->
              @if (Auth::guard('admin')->check())
                <div class="dropdown d-md-flex profile-1">
                  <a href="javascript:void(0);" data-bs-toggle="dropdown" class="nav-link leading-none d-flex px-1">
                    <span>
                      <img src="{{ asset('assets/images/users/8.jpg') }}" alt="profile-user"
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
                      <img src="{{ asset('foto pegawai/' . Auth::guard('web')->user()->foto) }}" alt="profile-user"
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

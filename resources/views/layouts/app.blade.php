<!doctype html>
<html lang="en" dir="ltr">

<head>

  <!-- META DATA -->
  <meta charset="UTF-8">
  <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Sistem Informasi Kepegawaian">
  <meta name="author" content="PT Wadubura">
  <meta name="keywords" content="Simpeg, PT Wadubura">

  <!-- FAVICON -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/favicon.ico') }}" />

  <!-- TITLE -->
  <title>{{ config('app.name') }} - @yield('title') </title>

  {{-- CSS --}}
  @include('layouts.css')

</head>

<body class="app sidebar-mini ltr light-mode">

  <!-- GLOBAL-LOADER -->
  {{-- <div id="global-loader">
    <img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
  </div> --}}
  <!-- /GLOBAL-LOADER -->

  <!-- PAGE -->
  <div class="page">
    <div class="page-main">

      <!-- app-Header -->
      @include('layouts.head')
      <!-- /app-Header -->

      <!--APP-SIDEBAR-->
      @if (Auth::guard('web')->check())
        @include('user.sidebar')
      @else
        @include('admin.sidebar')
      @endif
      <!--/APP-SIDEBAR-->

      <!--app-content open-->
      <div class="main-content app-content mt-0">
        <div class="side-app">

          <!-- CONTAINER -->
          <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            {{--
            <div class="page-header">
              <div>
                <h1 class="page-title">Dashboard 01</h1>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard 01</li>
                </ol>
              </div>
              <div class="ms-auto pageheader-btn">
                <a href="javascript:void(0);" class="btn btn-primary btn-icon text-white me-2">
                  <span>
                    <i class="fe fe-plus"></i>
                  </span> Add Account
                </a>
                <a href="javascript:void(0);" class="btn btn-success btn-icon text-white">
                  <span>
                    <i class="fe fe-log-in"></i>
                  </span> Export
                </a>
              </div>
            </div>
            --}}
            <!-- PAGE-HEADER END -->

            {{-- CONTENT --}}
            @yield('content')

          </div>
          <!-- CONTAINER END -->
        </div>
      </div>
      <!--app-content end-->
    </div>

    <!-- Sidebar-right -->
    <div class="sidebar sidebar-right sidebar-animate">
      <div class="panel panel-primary card mb-0 shadow-none border-0">
        <div class="tab-menu-heading border-0 d-flex p-3">
          <div class="card-title mb-0">Notifications</div>
          <div class="card-options ms-auto">
            <a href="javascript:void(0);" class="sidebar-icon text-end float-end me-1" data-bs-toggle="sidebar-right"
              data-target=".sidebar-right"><i class="fe fe-x text-white"></i></a>
          </div>
        </div>
        <div class="panel-body tabs-menu-body latest-tasks p-0 border-0">
          <div class="tabs-menu border-bottom">
            <!-- Tabs -->
            <ul class="nav panel-tabs">
              <li class=""><a href="#side1" class="active" data-bs-toggle="tab"><i class="fe fe-user me-1"></i>
                  Profile</a></li>
              <li><a href="#side2" data-bs-toggle="tab"><i class="fe fe-users me-1"></i> Contacts</a></li>
              <li><a href="#side3" data-bs-toggle="tab"><i class="fe fe-settings me-1"></i> Settings</a></li>
            </ul>
          </div>
          <div class="tab-content">
            <div class="tab-pane active" id="side1">
              <div class="card-body text-center">
                <div class="dropdown user-pro-body">
                  <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround mx-auto text-center"
                      src="../assets/images/faces/6.jpg"><span class="avatar-status profile-status bg-green"></span>
                  </div>
                  <div class="user-info mg-t-20">
                    <h6 class="fw-semibold  mt-2 mb-0">Mintrona Pechon</h6>
                    <span class="mb-0 text-muted fs-12">Premium Member</span>
                  </div>
                </div>
              </div>
              <a class="dropdown-item d-flex border-bottom border-top" href="profile.html">
                <div class="d-flex"><i class="fe fe-user me-3 tx-20 text-muted"></i>
                  <div class="pt-1">
                    <h6 class="mb-0">My Profile</h6>
                    <p class="tx-12 mb-0 text-muted">Profile Personal information</p>
                  </div>
                </div>
              </a>
              <a class="dropdown-item d-flex border-bottom" href="chat.html">
                <div class="d-flex"><i class="fe fe-message-square me-3 tx-20 text-muted"></i>
                  <div class="pt-1">
                    <h6 class="mb-0">My Messages</h6>
                    <p class="tx-12 mb-0 text-muted">Person message information</p>
                  </div>
                </div>
              </a>
              <a class="dropdown-item d-flex border-bottom" href="emailservices.html">
                <div class="d-flex"><i class="fe fe-mail me-3 tx-20 text-muted"></i>
                  <div class="pt-1">
                    <h6 class="mb-0">My Mails</h6>
                    <p class="tx-12 mb-0 text-muted">Persons mail information</p>
                  </div>
                </div>
              </a>
              <a class="dropdown-item d-flex border-bottom" href="editprofile.html">
                <div class="d-flex"><i class="fe fe-settings me-3 tx-20 text-muted"></i>
                  <div class="pt-1">
                    <h6 class="mb-0">Account Settings</h6>
                    <p class="tx-12 mb-0 text-muted">Settings Information</p>
                  </div>
                </div>
              </a>
              <a class="dropdown-item d-flex border-bottom" href="login.html">
                <div class="d-flex"><i class="fe fe-power me-3 tx-20 text-muted"></i>
                  <div class="pt-1">
                    <h6 class="mb-0">Sign Out</h6>
                    <p class="tx-12 mb-0 text-muted">Account Signout</p>
                  </div>
                </div>
              </a>
            </div>
            <div class="tab-pane" id="side2">
              <div class="list-group list-group-flush ">
                <div class="list-group-item d-flex  align-items-center">
                  <div class="me-2">
                    <span class="avatar avatar-md brround cover-image"
                      data-bs-image-src="../assets/images/faces/9.jpg"><span
                        class="avatar-status bg-success"></span></span>
                  </div>
                  <div class="">
                    <div class="fw-semibold" data-bs-toggle="modal" data-target="#chatmodel">Mozelle Belt</div>
                    <p class="mb-0 tx-12 text-muted">mozellebelt@gmail.com</p>
                  </div>
                </div>
                <div class="list-group-item d-flex  align-items-center">
                  <div class="me-2">
                    <span class="avatar avatar-md brround cover-image"
                      data-bs-image-src="../assets/images/faces/11.jpg"></span>
                  </div>
                  <div class="">
                    <div class="fw-semibold" data-bs-toggle="modal" data-target="#chatmodel">Florinda Carasco
                    </div>
                    <p class="mb-0 tx-12 text-muted">florindacarasco@gmail.com</p>
                  </div>
                </div>
                <div class="list-group-item d-flex  align-items-center">
                  <div class="me-2">
                    <span class="avatar avatar-md brround cover-image"
                      data-bs-image-src="../assets/images/faces/10.jpg"><span
                        class="avatar-status bg-success"></span></span>
                  </div>
                  <div class="">
                    <div class="fw-semibold" data-bs-toggle="modal" data-target="#chatmodel">Alina Bernier</div>
                    <p class="mb-0 tx-12 text-muted">alinaaernier@gmail.com</p>
                  </div>
                </div>
                <div class="list-group-item d-flex  align-items-center">
                  <div class="me-2">
                    <span class="avatar avatar-md brround cover-image"
                      data-bs-image-src="../assets/images/faces/2.jpg"><span
                        class="avatar-status bg-success"></span></span>
                  </div>
                  <div class="">
                    <div class="fw-semibold" data-bs-toggle="modal" data-target="#chatmodel">Zula Mclaughin</div>
                    <p class="mb-0 tx-12 text-muted">zulamclaughin@gmail.com</p>
                  </div>
                </div>
                <div class="list-group-item d-flex  align-items-center">
                  <div class="me-2">
                    <span class="avatar avatar-md brround cover-image"
                      data-bs-image-src="../assets/images/faces/13.jpg"></span>
                  </div>
                  <div class="">
                    <div class="fw-semibold" data-bs-toggle="modal" data-target="#chatmodel">Isidro Heide</div>
                    <p class="mb-0 tx-12 text-muted">isidroheide@gmail.com</p>
                  </div>
                </div>
                <div class="list-group-item d-flex  align-items-center">
                  <div class="me-2">
                    <span class="avatar avatar-md brround cover-image"
                      data-bs-image-src="../assets/images/faces/12.jpg"><span
                        class="avatar-status bg-success"></span></span>
                  </div>
                  <div class="">
                    <div class="fw-semibold" data-bs-toggle="modal" data-target="#chatmodel">Mozelle Belt</div>
                    <p class="mb-0 tx-12 text-muted">mozellebelt@gmail.com</p>
                  </div>
                </div>
                <div class="list-group-item d-flex  align-items-center">
                  <div class="me-2">
                    <span class="avatar avatar-md brround cover-image"
                      data-bs-image-src="../assets/images/faces/4.jpg"></span>
                  </div>
                  <div class="">
                    <div class="fw-semibold" data-bs-toggle="modal" data-target="#chatmodel">Florinda Carasco
                    </div>
                    <p class="mb-0 tx-12 text-muted">florindacarasco@gmail.com</p>
                  </div>
                </div>
                <div class="list-group-item d-flex  align-items-center">
                  <div class="me-2">
                    <span class="avatar avatar-md brround cover-image"
                      data-bs-image-src="../assets/images/faces/7.jpg"></span>
                  </div>
                  <div class="">
                    <div class="fw-semibold" data-bs-toggle="modal" data-target="#chatmodel">Alina Bernier</div>
                    <p class="mb-0 tx-12 text-muted">alinabernier@gmail.com</p>
                  </div>
                </div>
                <div class="list-group-item d-flex  align-items-center">
                  <div class="me-2">
                    <span class="avatar avatar-md brround cover-image"
                      data-bs-image-src="../assets/images/faces/2.jpg"></span>
                  </div>
                  <div class="">
                    <div class="fw-semibold" data-bs-toggle="modal" data-target="#chatmodel">Zula Mclaughin</div>
                    <p class="mb-0 tx-12 text-muted">zulamclaughin@gmail.com</p>
                  </div>
                </div>
                <div class="list-group-item d-flex  align-items-center">
                  <div class="me-2">
                    <span class="avatar avatar-md brround cover-image"
                      data-bs-image-src="../assets/images/faces/14.jpg"><span
                        class="avatar-status bg-success"></span></span>
                  </div>
                  <div class="">
                    <div class="fw-semibold" data-bs-toggle="modal" data-target="#chatmodel">Isidro Heide</div>
                    <p class="mb-0 tx-12 text-muted">isidroheide@gmail.com</p>
                  </div>
                </div>
                <div class="list-group-item d-flex  align-items-center">
                  <div class="me-2">
                    <span class="avatar avatar-md brround cover-image"
                      data-bs-image-src="../assets/images/faces/11.jpg"></span>
                  </div>
                  <div class="">
                    <div class="fw-semibold" data-bs-toggle="modal" data-target="#chatmodel">Florinda Carasco
                    </div>
                    <p class="mb-0 tx-12 text-muted">florindacarasco@gmail.com</p>
                  </div>
                </div>
                <div class="list-group-item d-flex  align-items-center">
                  <div class="me-2">
                    <span class="avatar avatar-md brround cover-image"
                      data-bs-image-src="../assets/images/faces/9.jpg"></span>
                  </div>
                  <div class="">
                    <div class="fw-semibold" data-bs-toggle="modal" data-target="#chatmodel">Alina Bernier</div>
                    <p class="mb-0 tx-12 text-muted">alinabernier@gmail.com</p>
                  </div>
                </div>
                <div class="list-group-item d-flex  align-items-center">
                  <div class="me-2">
                    <span class="avatar avatar-md brround cover-image"
                      data-bs-image-src="../assets/images/faces/15.jpg"><span
                        class="avatar-status bg-success"></span></span>
                  </div>
                  <div class="">
                    <div class="fw-semibold" data-bs-toggle="modal" data-target="#chatmodel">Zula Mclaughin</div>
                    <p class="mb-0 tx-12 text-muted">zulamclaughin@gmail.com</p>
                  </div>
                </div>
                <div class="list-group-item d-flex  align-items-center">
                  <div class="me-2">
                    <span class="avatar avatar-md brround cover-image"
                      data-bs-image-src="../assets/images/faces/4.jpg"></span>
                  </div>
                  <div class="">
                    <div class="fw-semibold" data-bs-toggle="modal" data-target="#chatmodel">Isidro Heide</div>
                    <p class="mb-0 tx-12 text-muted">isidroheide@gmail.com</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="side3">
              <a class="dropdown-item bg-gray-100 pd-y-10" href="javascript:void(0);">
                Account Settings
              </a>
              <div class="card-body">
                <div class="form-group mg-b-10">
                  <label class="custom-switch ps-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked>
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description mg-l-10">Updates Automatically</span>
                  </label>
                </div>
                <div class="form-group mg-b-10">
                  <label class="custom-switch ps-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description mg-l-10">Allow Location Map</span>
                  </label>
                </div>
                <div class="form-group mg-b-10">
                  <label class="custom-switch ps-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked>
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description mg-l-10">Show Contacts</span>
                  </label>
                </div>
                <div class="form-group mg-b-10">
                  <label class="custom-switch ps-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked>
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description mg-l-10">Show Notication</span>
                  </label>
                </div>
                <div class="form-group mg-b-10">
                  <label class="custom-switch ps-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description mg-l-10">Show Tasks Statistics</span>
                  </label>
                </div>
                <div class="form-group mg-b-10">
                  <label class="custom-switch ps-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked>
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description mg-l-10">Show Email Notification</span>
                  </label>
                </div>
              </div>
              <a class="dropdown-item bg-gray-100 pd-y-10" href="javascript:void(0);">
                General Settings
              </a>
              <div class="card-body">
                <div class="form-group mg-b-10">
                  <label class="custom-switch ps-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked>
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description mg-l-10">Show User Online</span>
                  </label>
                </div>
                <div class="form-group mg-b-10">
                  <label class="custom-switch ps-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description mg-l-10">Website Notication</span>
                  </label>
                </div>
                <div class="form-group mg-b-10">
                  <label class="custom-switch ps-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description mg-l-10">Show Recent activity</span>
                  </label>
                </div>
                <div class="form-group mg-b-10">
                  <label class="custom-switch ps-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description mg-l-10">Logout Automatically</span>
                  </label>
                </div>
                <div class="form-group mg-b-10">
                  <label class="custom-switch ps-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked>
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description mg-l-10">Allow All Notifications</span>
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/Sidebar-right-->

    {{-- FOOTER --}}
    @include('layouts.footer')
  </div>

  <!-- BACK-TO-TOP -->
  <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

  {{-- JS --}}
  @include('layouts.js')

</body>

</html>

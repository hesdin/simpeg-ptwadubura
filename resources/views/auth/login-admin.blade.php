<!doctype html>
<html lang="en" dir="ltr">

<head>

  <!-- META DATA -->
  <meta charset="UTF-8">
  <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Zanex – Bootstrap  Admin & Dashboard Template">
  <meta name="author" content="Spruko Technologies Private Limited">
  <meta name="keywords"
    content="admin, dashboard, dashboard ui, admin dashboard template, admin panel dashboard, admin panel html, admin panel html template, admin panel template, admin ui templates, administrative templates, best admin dashboard, best admin templates, bootstrap 4 admin template, bootstrap admin dashboard, bootstrap admin panel, html css admin templates, html5 admin template, premium bootstrap templates, responsive admin template, template admin bootstrap 4, themeforest html">

  <!-- FAVICON -->
  <link rel="shortcut icon" type="image/x-icon" href="../assets/images/brand/favicon.ico" />

  <!-- TITLE -->
  <title>Login Admin</title>

  <!-- BOOTSTRAP CSS -->
  <link id="style" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

  <!-- STYLE CSS -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" />

  <!--- FONT-ICONS CSS -->
  <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />

</head>

<body class="login-img">

  <!-- BACKGROUND-IMAGE -->
  <div>

    <!-- GLOABAL LOADER -->
    <div id="global-loader">
      <img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOABAL LOADER -->

    <!-- PAGE -->
    <div class="page login-page">
      <div>
        <!-- CONTAINER OPEN -->
        <div class="col col-login mx-auto mt-7">
          <div class="text-center text-white">
            <img src="{{ asset('assets/images/brand/logo-1.png') }}" class="header-brand-img" alt="">
            SIMPEG
          </div>
        </div>
        <div class="container-login100">

          <div class="wrap-login100 p-0">

            @if (Session::has('fail'))
              <div class="alert alert-danger alert-dismissible fade show mb-0 mx-3 my-3" role="alert">
                <span class="alert-inner--icon"><i class="fe fe-slash"></i></span>
                <span class="alert-inner--text"><strong>Gagal! </strong>{{ Session::get('fail') }}</span>
              </div>
            @endif

            <div class="card-body">
              <form action="{{ route('admin.login.check') }}" method="POST" class="login100-form validate-form">
                @csrf
                <span class="login100-form-title">
                  Login Admin
                </span>
                <div class="wrap-input100 validate-input">
                  <input class="input100" type="text" name="username" placeholder="Username" required>
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                    <i class="mdi mdi-account-box" aria-hidden="true"></i>
                  </span>
                </div>
                <div class="wrap-input100 validate-input">
                  <input class="input100" type="password" name="password" placeholder="Password" required>
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                    <i class="zmdi zmdi-lock" aria-hidden="true"></i>
                  </span>
                </div>
                <div class="text-end pt-1">
                  <p class="mb-0"><a href="{{ route('login') }}" class="text-primary ms-1">Login Pegawai</a></p>
                </div>
                <div class="container-login100-form-btn">
                  <button type="submit" class="login100-form-btn btn-primary">
                    Login
                  </button>
                </div>
              </form>
            </div>
            <div class="card-footer">
              <div class="d-flex justify-content-center my-3">
                <h5 class="text-center me-4 text-dark">
                  PT. WADU BURA
                </h5>
              </div>
            </div>
          </div>
        </div>
        <!-- CONTAINER CLOSED -->
      </div>
    </div>
    <!-- End PAGE -->

  </div>
  <!-- BACKGROUND-IMAGE CLOSED -->

  <!-- JQUERY JS -->
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

  <!-- BOOTSTRAP JS -->
  <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

  <!-- SPARKLINE JS -->
  <script src="{{ asset('assets/js/jquery.sparkline.min.js') }}"></script>

  <!-- CHART-CIRCLE JS -->
  <script src="{{ asset('assets/js/circle-progress.min.js') }}"></script>

  <!-- Perfect SCROLLBAR JS-->
  <script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>

  <!-- INPUT MASK JS -->
  <script src="{{ asset('assets/plugins/input-mask/jquery.mask.min.js') }}"></script>

  <!-- Color Theme js -->
  <script src="{{ asset('assets/js/themeColors.js') }}"></script>

  <!-- swither styles js -->
  <script src="{{ asset('assets/js/swither-styles.js') }}"></script>

  <!-- CUSTOM JS -->
  <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>

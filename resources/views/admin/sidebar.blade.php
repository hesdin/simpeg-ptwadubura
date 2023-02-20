<div class="sticky">
  <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="side-header">
      <a class="header-brand1" href="{{ route('admin.dashboard') }}">
        {{-- <img src="{{ asset('assets/images/brand/logo.png') }}" class="header-brand-img desktop-logo" alt="logo">
        <img src="{{ asset('assets/images/brand/logo-1.png') }}" class="header-brand-img toggle-logo" alt="logo">
        <img src="{{ asset('assets/images/brand/logo-2.png') }}" class="header-brand-img light-logo" alt="logo">
        <img src="{{ asset('assets/images/brand/logo-3.png') }}" class="header-brand-img light-logo1" alt="logo"> --}}
        <h3>SIMPEG</h3>
      </a>
      <!-- LOGO -->
    </div>
    <div class="main-sidemenu">
      <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
          width="24" height="24" viewBox="0 0 24 24">
          <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
        </svg>
      </div>
      <ul class="side-menu">
        <li class="sub-category">
          <h3>Menu</h3>
        </li>
        <li class="slide">
          <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.dashboard') }}"><i
              class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span>
          </a>
        </li>

        <li class="slide">
          <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
              class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Data Master</span><i
              class="angle fa fa-angle-right"></i></a>
          <ul class="slide-menu" style="display: none;">
            <li class="side-menu-label1"><a href="javascript:void(0)">Data Master</a></li>
            {{-- <li><a href="{{ route('admin.jam.kerja') }}" class="slide-item">Jam Kerja</a></li> --}}
            <li><a href="{{ route('admin.jabatan') }}" class="slide-item">Jabatan</a></li>


          </ul>
        </li>

        <li class="slide">
          <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.data-pegawai.index') }}"><i
              class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Data Pegawai</span>
          </a>
        </li>

        <li class="slide">
          <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.absensi') }}"><i
              class="side-menu__icon fe fe-book"></i><span class="side-menu__label">Data Absensi</span>
          </a>
        </li>

        <li class="slide">
          <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.penggajian') }}"><i
              class="side-menu__icon fe fe-database"></i><span class="side-menu__label">Data Penggajian</span>
          </a>
        </li>

        <li class="slide">
          <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.laporan') }}"><i
              class="side-menu__icon fe fe-file"></i><span class="side-menu__label">Laporan</span>
          </a>
        </li>

        <li class="slide">
          <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.logout') }}"><i
              class="side-menu__icon fe fe-log-out"></i><span class="side-menu__label">Logout</span>
          </a>
        </li>

      </ul>
      <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
          height="24" viewBox="0 0 24 24">
          <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
        </svg></div>
    </div>
  </aside>
</div>

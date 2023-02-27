@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
  <div class="row pt-6" id="user-profile">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="wideget-user">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-xl-6">
                <div class="wideget-user-desc d-sm-flex">
                  <div class="wideget-user-img">
                    <img class="avatar avatar-xxl brround cover-image"
                      src="{{ asset('foto pegawai/' . Auth::guard('web')->user()->foto) }}" alt="img">
                  </div>
                  <div class="user-wrap">
                    <h4>{{ Auth::guard('web')->user()->nama_lengkap }}</h4>
                    <h6 class="text-muted mb-3">Jabatan :
                      {{ Str::ucfirst(Auth::guard('web')->user()->jabatan->nama_jabatan) }}</h6>
                    {{-- <a href="javascript:void(0);" class="btn btn-primary mt-1 mb-1"><i class="fa fa-rss"></i> Follow</a>
                    <a href="emailservices.html" class="btn btn-secondary mt-1 mb-1"><i class="fa fa-envelope"></i>
                      E-mail</a> --}}
                  </div>
                </div>
              </div>
              <div class="col-lg-12 col-md-12 col-xl-6">
                <div class="text-xl-right mt-4 mt-xl-0">
                  <a href="{{ route('admin.logout') }}" class="btn btn-danger btn-icon">
                    <span>
                      <i class="fe fe-log-in"></i>
                    </span> Logout
                  </a>

                </div>

              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
    <!-- COL-END -->
  </div>
@endsection

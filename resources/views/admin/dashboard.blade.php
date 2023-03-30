@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
  <!-- ROW-1 -->
  <div class="row pt-6">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
          <div class="card overflow-hidden">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h6 class="">Total Pegawai</h6>
                  <h3 class="mb-2 number-font">{{ $user }}</h3>
                </div>
                <div class="col col-auto">
                  <div class="counter-icon bg-primary-gradient box-shadow-primary brround ms-auto">
                    <i class="fe fe-trending-up text-white mb-5 "></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
          <div class="card overflow-hidden">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h6 class="">Total Jabatan</h6>
                  <h3 class="mb-2 number-font">{{ $jabatan }}</h3>
                </div>
                <div class="col col-auto">
                  <div class="counter-icon bg-success-gradient box-shadow-success brround  ms-auto">
                    <i class="fe fe-briefcase text-white mb-5 "></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
          <div class="card overflow-hidden">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h6 class="">Total Laporan</h6>
                  <h3 class="mb-2 number-font">{{ $laporan }}</h3>
                </div>
                <div class="col col-auto">
                  <div class="counter-icon bg-danger-gradient box-shadow-danger brround  ms-auto">
                    <i class="icon icon-doc text-white mb-5 "></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
          <div class="card overflow-hidden">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h6 class="">Total Gaji</h6>
                  <h4 class="mb-2 number-font">{{ number_format($gaji, 0, ',', '.') }}</h4>
                </div>
                <div class="col col-auto">
                  <div class="counter-icon bg-secondary-gradient box-shadow-secondary brround ms-auto">
                    <i class="fe fe-dollar-sign text-white mb-5 "></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- ROW-1 END -->
@endsection

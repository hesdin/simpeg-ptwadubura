@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
  <div class="page-header">
    <div>
      <h1 class="page-title">Absen Harian</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Pegawai</a></li>
        <li class="breadcrumb-item active" aria-current="page">Absen Harian</li>
      </ol>
    </div>
    <div class="ms-auto pageheader-btn">
      <a href="javascript:void(0);" class="btn btn-success btn-icon text-white me-2">
        <span>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-file-earmark-excel-fill" viewBox="0 0 16 16">
            <path
              d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM5.884 6.68 8 9.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 10l2.233 2.68a.5.5 0 0 1-.768.64L8 10.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 10 5.116 7.32a.5.5 0 1 1 .768-.64z" />
          </svg>
        </span>Export Excel
      </a>
      <a target="_blank" href="{{ route('export.pdf',auth()->guard('web')->user()->id) }}"
        class="btn btn-danger btn-icon text-white">
        <span>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
            <path
              d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z" />
            <path fill-rule="evenodd"
              d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z" />
          </svg>
        </span>Export PDF
      </a>
    </div>
  </div>

  <div class="row row-sm pt-3">
    <div class="col-lg-12">
      <div class="card custom-card">
        <div class="card-body">

          <div class="table-responsive">
            <table class="table  border text-nowrap text-md-nowrap mg-b-0">
              <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>Waktu</th>
                  <th>Absen Masuk</th>
                  <th>Absen Keluar</th>
                </tr>
              </thead>
              <tbody>
                @if (\Carbon\Carbon::now()->isoFormat('dddd') == 'Sunday')
                  <tr>
                    <td colspan="4" class="text-center fs-6 text-danger">
                      Hari Ini Libur
                    </td>
                  </tr>
                @else
                  <tr>
                    <form action="{{ route('absen.harian') }}" method="POST">
                      @csrf
                      <td class="fs-6 align-middle">{{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</td>
                      <td class="fs-6 align-middle">
                        <span id="real-time-clock"></span>
                      </td>
                      <td>
                        <button type="submit" href="#" class="btn btn-md btn-primary" name="absen_masuk">
                          Absen Masuk</button>
                      </td>
                      <td>
                        <button type="submit" href="#" class="btn btn-md btn-success" name="absen_pulang">
                          Absen Pulang</button>
                      </td>
                    </form>
                  </tr>
                @endif

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  @push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    <script>
      @if (Session::has('fail'))
        Swal.fire({
          icon: 'warning',
          title: 'Gagal',
          text: '{{ Session::get('fail') }}',
        })
      @endif

      @if (Session::has('success'))
        Swal.fire({
          icon: 'success',
          title: 'Sukses',
          text: '{{ Session::get('success') }}',
        })
      @endif



      function realTimeClock() {
        var rtClock = new Date();
        var hours = rtClock.getHours();
        var minutes = rtClock.getMinutes();
        var seconds = rtClock.getSeconds();
        var timeOfDay = "";

        // determine the time of day
        if (hours >= 0 && hours < 6) {
          timeOfDay = "Malam";
        } else if (hours >= 6 && hours < 12) {
          timeOfDay = "Pagi";
        } else if (hours >= 12 && hours < 15) {
          timeOfDay = "Siang";
        } else if (hours >= 15 && hours < 18) {
          timeOfDay = "Sore";
        } else {
          timeOfDay = "Malam";
        }

        // convert hours to 12-hour format
        hours = (hours > 12) ? hours - 12 : hours;

        // add leading zero to hours if it is less than 10
        hours = (hours < 10 ? "0" : "") + hours;

        // add leading zero to minutes if it is less than 10
        minutes = (minutes < 10 ? "0" : "") + minutes;

        // add leading zero to seconds if it is less than 10
        seconds = (seconds < 10 ? "0" : "") + seconds;

        // display the time in HTML
        document.getElementById("real-time-clock").innerHTML = hours + ":" + minutes + ":" + seconds + " " + timeOfDay;

        // set the timer to update every second
        setTimeout(realTimeClock, 1000);
      }

      // start the timer
      realTimeClock();
    </script>
  @endpush
@endsection

@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
  <div class="row row-sm pt-6">
    <div class="col-lg-12">
      <div class="card custom-card">
        <div class="card-body">
          <div>
            {{-- <span id="real-time-clock"></span> --}}

            <h3 class="card-title mb-3">Absen Harian</h3>
            {{-- <p class="text-muted card-sub-title">Using the most basic table markup</p> --}}
          </div>
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

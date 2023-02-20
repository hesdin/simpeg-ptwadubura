@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
  <div class="row row-sm pt-6">
    <div class="col-lg-12">
      <div class="card custom-card">
        <div class="card-body">
          <div>
            <h3 class="card-title mb-3">Jam Kerja</h3>
            {{-- <p class="text-muted card-sub-title">Using the most basic table markup</p> --}}
          </div>
          <div class="table-responsive">
            <table class="table  border text-nowrap text-md-nowrap mg-b-0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Keterangan</th>
                  <th>Jam Mulai</th>
                  <th>Jam Selesai</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($d_jam_kerja as $jam_kerja)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $jam_kerja->keterangan }}</td>
                    <td>{{ $jam_kerja->jam_mulai }}</td>
                    <td>{{ $jam_kerja->jam_selesai }}</td>
                    <td>
                      <a href="#" class="btn btn-md btn-primary">Edit</a>
                    </td>
                  </tr>
                @endforeach


              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

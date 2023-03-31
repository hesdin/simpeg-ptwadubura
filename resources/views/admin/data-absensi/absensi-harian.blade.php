@extends('layouts.app')

@section('title', 'Data Pegawai')

@section('content')
  <div class="page-header">
    <div>
      <h1 class="page-title">Data Absensi Harian</h1>
      {{-- <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Table</li>
      </ol> --}}
    </div>
    <div class="ms-auto pageheader-btn">


    </div>
  </div>

  {{-- ROW --}}
  <div class="row row-sm">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Absensi Harian</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
              <div class="row">
                <div class="col-sm-12">
                  <table class="table table-bordered text-nowrap border-bottom dataTable no-footer" id="basic-datatable"
                    role="grid" aria-describedby="basic-datatable_info">
                    <thead>
                      <tr role="row">
                        <th class="wd-15p border-bottom-0 sorting sorting_asc" tabindex="0"
                          aria-controls="basic-datatable" rowspan="1" colspan="1" style="width: 100.35px;"
                          aria-sort="ascending" aria-label="Tanggal: activate to sort column descending">Tanggal
                        </th>
                        <th class="wd-15p border-bottom-0 sorting sorting_asc" tabindex="0"
                          aria-controls="basic-datatable" rowspan="1" colspan="1" style="width: 100.35px;"
                          aria-sort="ascending" aria-label="Nama Lengkap: activate to sort column descending">Nama Lengkap
                        </th>
                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="basic-datatable"
                          rowspan="1" colspan="1" style="width: 77px;"
                          aria-label="NIP: activate to sort column ascending">NIP</th>
                        <th class="wd-20p border-bottom-0 sorting" tabindex="0" aria-controls="basic-datatable"
                          rowspan="1" colspan="1" style="width: 154.85px;"
                          aria-label="Absen Masuk: activate to sort column ascending">Absen Masuk</th>
                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="basic-datatable"
                          rowspan="1" colspan="1" style="width: 79.75px;"
                          aria-label="Absen Pulang: activate to sort column ascending">Absen Pulang</th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($d_absen as $absen)
                        <tr class="odd">
                          <td class="sorting_1">{{ \Carbon\Carbon::parse($absen->created_at)->format('d-m-Y') }}
                          </td>
                          <td class="sorting_1">{{ $absen->user->nama_lengkap }}</td>
                          <td>{{ $absen->user->nip }}</td>
                          <td>
                            @if (\Carbon\Carbon::parse($absen->absen_masuk)->format('H:i') > '08:00')
                              {{ \Carbon\Carbon::parse($absen->absen_masuk)->format('H:i') }} <span
                                class="text-danger fw-bold">- Terlambat</span>
                            @else
                              {{ \Carbon\Carbon::parse($absen->absen_masuk)->format('H:i') }}
                            @endif
                          </td>
                          <td>
                            @if (\Carbon\Carbon::parse($absen->absen_pulang)->format('H:i') < '16:00')
                              {{ \Carbon\Carbon::parse($absen->absen_pulang)->format('H:i') }} <span
                                class="text-danger fw-bold">-
                                Lebih Awal</span>
                            @else
                              {{ \Carbon\Carbon::parse($absen->absen_pulang)->format('H:i') }}
                            @endif
                          </td>

                        </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    <script>
      @if (Session::has('success'))
        Swal.fire({
          icon: 'success',
          title: 'Sukses',
          text: '{{ Session::get('success') }}',
        })
      @endif

      $('.confirm').click(function(event) {
        let form = $(this).closest("form");
        let name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Yakin ingin menghapus data ini?`,
            text: "Data yang dihapus tidak dapat dikembalikan.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
    </script>
  @endpush

@endsection

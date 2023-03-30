@extends('layouts.app')

@section('title', 'Data Pegawai')

@section('content')
  <div class="page-header">
    <div>
      <h1 class="page-title">Data Gaji {{ $user->nama_lengkap ?? 'User' }}</h1>
      {{-- <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Table</li>
      </ol> --}}
    </div>
    <div class="ms-auto pageheader-btn">
      <a href="{{ route('admin.hitung.show', $user->id) }}" class="btn btn-primary btn-icon text-white me-2">
        <span>
          <i class="fe fe-plus"></i>
        </span> Tambah
      </a>
    </div>
  </div>

  {{-- ROW --}}
  <div class="row row-sm">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Riwayat Gaji</h3>
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
                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="basic-datatable"
                          rowspan="1" colspan="1" style="width: 77px;"
                          aria-label="Gaji Pokok: activate to sort column ascending">Gaji Pokok</th>
                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="basic-datatable"
                          rowspan="1" colspan="1" style="width: 77px;"
                          aria-label="Tunjangan: activate to sort column ascending">Tunjangan</th>
                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="basic-datatable"
                          rowspan="1" colspan="1" style="width: 77px;"
                          aria-label="Bonus / Lembur: activate to sort column ascending">Bonus / Lembur</th>
                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="basic-datatable"
                          rowspan="1" colspan="1" style="width: 77px;"
                          aria-label="Potongan: activate to sort column ascending">Potongan</th>
                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="basic-datatable"
                          rowspan="1" colspan="1" style="width: 77px;"
                          aria-label="Total Gaji: activate to sort column ascending">Total Gaji</th>
                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="basic-datatable"
                          rowspan="1" colspan="1" style="width: 77px;"
                          aria-label="Slip Gaji: activate to sort column ascending">Slip Gaji</th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($d_gaji as $gaji)
                        <tr class="odd">
                          <td class="sorting_1">{{ $gaji->created_at->isoFormat('D MMMM Y') }}</td>
                          <td>{{ $gaji->gaji_pokok }}</td>
                          <td>{{ $gaji->tunjangan }}</td>
                          <td>{{ $gaji->bonus_lembur }}</td>
                          <td>{{ $gaji->potongan }}</td>
                          <td>{{ $gaji->total_gaji }}</td>
                          <td class="">
                            <a href="{{ route('admin.slip.gaji', $gaji->id) }}"
                              class="btn btn-primary btn-sm rounded-11 me-2" data-bs-toggle="tooltip"
                              data-bs-original-title="Lihat">
                              <i style="font-size: 18px" class="mdi mdi-arrow-right-bold-box"></i>
                            </a>
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
        }) r
      @endif

      @if (Session::has('error'))
        Swal.fire({
          icon: 'danger',
          title: 'Gagal',
          text: '{{ Session::get('error') }}',
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

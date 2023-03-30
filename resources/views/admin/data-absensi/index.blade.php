@extends('layouts.app')

@section('title', 'Data Pegawai')

@section('content')
  <div class="page-header">
    <div>
      <h1 class="page-title">Data Absensi</h1>
      {{-- <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Table</li>
      </ol> --}}
    </div>
    <div class="ms-auto pageheader-btn">
      <a target="_blank" href="{{ route('admin.export.pdf') }}" class="btn btn-danger btn-icon text-white">
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

  {{-- ROW --}}
  <div class="row row-sm">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Absensi Pegawai</h3>
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
                          aria-sort="ascending" aria-label="Nama Lengkap: activate to sort column descending">Nama Lengkap
                        </th>
                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="basic-datatable"
                          rowspan="1" colspan="1" style="width: 77px;"
                          aria-label="NIP: activate to sort column ascending">NIP</th>
                        <th class="wd-25p border-bottom-0 sorting" tabindex="0" aria-controls="basic-datatable"
                          rowspan="1" colspan="1" style="width: 66.3px;"
                          aria-label="Aksi: activate to sort column ascending">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($d_pegawai as $pegawai)
                        <tr class="odd">
                          <td class="sorting_1">{{ $pegawai->nama_lengkap }}</td>
                          <td>{{ $pegawai->nip }}</td>
                          <td class="">
                            <a href="{{ route('admin.absensi.show', $pegawai->id) }}"
                              class="btn btn-primary btn-sm rounded-11 me-2" data-bs-toggle="tooltip"
                              data-bs-original-title="Cek Absensi">
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

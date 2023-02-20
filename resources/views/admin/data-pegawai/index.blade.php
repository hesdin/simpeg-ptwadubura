@extends('layouts.app')

@section('title', 'Data Pegawai')

@section('content')
  <div class="page-header">
    <div>
      <h1 class="page-title">Data Pegawai</h1>
      {{-- <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Table</li>
      </ol> --}}
    </div>
    <div class="ms-auto pageheader-btn">
      <a href="{{ route('admin.data-pegawai.create') }}" class="btn btn-primary btn-icon text-white me-2">
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
          <h3 class="card-title">Daftar Pegawai</h3>
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
                        <th class="wd-20p border-bottom-0 sorting" tabindex="0" aria-controls="basic-datatable"
                          rowspan="1" colspan="1" style="width: 154.85px;"
                          aria-label="Jenis Kelamin: activate to sort column ascending">Jenis Kelamin</th>
                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="basic-datatable"
                          rowspan="1" colspan="1" style="width: 79.75px;"
                          aria-label="Jabatan: activate to sort column ascending">Jabatan</th>
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
                          <td>{{ $pegawai->jenis_kelamin }}</td>
                          <td>{{ Str::ucfirst($pegawai->jabatan->nama_jabatan) }}</td>
                          <td class="">
                            <form action="{{ route('admin.data-pegawai.destroy', $pegawai->id) }}" method="POST">
                              @method('delete')
                              @csrf
                              <a href="{{ route('admin.data-pegawai.edit', $pegawai->id) }}"
                                class="btn btn-primary btn-sm rounded-11 me-2" data-bs-toggle="tooltip"
                                data-bs-original-title="Edit">
                                <i>
                                  <svg class="table-edit" xmlns="http://www.w3.org/2000/svg" height="20"
                                    viewBox="0 0 24 24" width="16">
                                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                                    <path
                                      d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM5.92 19H5v-.92l9.06-9.06.92.92L5.92 19zM20.71 5.63l-2.34-2.34c-.2-.2-.45-.29-.71-.29s-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41z">
                                    </path>
                                  </svg>
                                </i>
                              </a>
                              <button type="submit" class="btn btn-danger btn-sm rounded-11 confirm"
                                data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                <i>
                                  <svg class="table-delete" xmlns="http://www.w3.org/2000/svg" height="20"
                                    viewBox="0 0 24 24" width="16">
                                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                                    <path
                                      d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4h-3.5z">
                                    </path>
                                  </svg>
                                </i>
                              </button>
                            </form>
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

@extends('layouts.app')

@section('title', 'Data Pegawai')

@section('content')
  <div class="page-header">
    <div>
      <h1 class="page-title">Data Jabatan</h1>
      {{-- <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Table</li>
      </ol> --}}
    </div>
    <div class="ms-auto pageheader-btn">
      <a href="" class="btn btn-primary btn-icon text-white me-2" data-bs-target="#modaldemo1" data-bs-toggle="modal">
        <span>
          <i class="fe fe-plus"></i>
        </span> Tambah
      </a>
    </div>
  </div>

  {{-- ROW --}}
  <div class="row row-sm">
    <div class="col-lg-12">
      <div class="card custom-card">
        <div class="card-body">
          <div>
            <h3 class="card-title mb-3">Daftar Jabatan</h3>
            {{-- <p class="text-muted card-sub-title">Using the most basic table markup</p> --}}
          </div>
          <div class="table-responsive">
            <table class="table  border text-nowrap text-md-nowrap mg-b-0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Jabatan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($d_jabatan as $jabatan)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ Str::ucfirst($jabatan->nama_jabatan) }}</td>
                    <td class="">
                      <form action="{{ route('admin.jabatan.destroy', $jabatan->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <a href="{{ route('admin.data-pegawai.edit', $jabatan->id) }}"
                          class="btn btn-primary btn-sm rounded-11 me-2" data-bs-target="#modaledit{{ $jabatan->id }}"
                          data-bs-toggle="modal">
                          <i>
                            <svg class="table-edit" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 24 24"
                              width="16">
                              <path d="M0 0h24v24H0V0z" fill="none"></path>
                              <path
                                d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM5.92 19H5v-.92l9.06-9.06.92.92L5.92 19zM20.71 5.63l-2.34-2.34c-.2-.2-.45-.29-.71-.29s-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41z">
                              </path>
                            </svg>
                          </i>
                        </a>
                        <button type="submit" class="btn btn-danger btn-sm rounded-11 confirm" data-bs-toggle="tooltip"
                          data-bs-original-title="Delete">
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

                      {{-- Modal Edit --}}
                      <div class="modal fade" id="modaledit{{ $jabatan->id }}">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content modal-content-demo">
                            <div class="modal-header">
                              <h6 class="modal-title">Edit Jabatan</h6><button aria-label="Close" class="btn-close"
                                data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('admin.jabatan.update', $jabatan->id) }}" method="POST">
                                @method('PATCH')
                                @csrf
                                <div class="">
                                  <div class="form-group">
                                    <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                                    <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan"
                                      value="{{ $jabatan->nama_jabatan }}" required>
                                  </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-primary" type="submit">Edit</button>
                              <button class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                            </div>
                            </form>

                          </div>
                        </div>
                      </div>
                      {{-- Modal Edit End --}}

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

  <div class="modal fade" id="modaldemo1">
    <div class="modal-dialog" role="document">
      <div class="modal-content modal-content-demo">
        <div class="modal-header">
          <h6 class="modal-title">Tambah Jabatan</h6><button aria-label="Close" class="btn-close"
            data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.jabatan.store') }}" method="POST">
            @csrf
            <div class="">
              <div class="form-group">
                <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan"
                  placeholder="Nama Jabatan" required>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="submit">Tambah</button>
          <button class="btn btn-light" data-bs-dismiss="modal">Batal</button>
        </div>
        </form>

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
            title: `Yakin ingin dihapus ?`,
            text: "Seluruh pegawai dengan jabatan ini akan terhapus.",
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

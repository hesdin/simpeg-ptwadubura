@extends('layouts.app')

@section('title', 'Data Pegawai')

@section('content')
  <div class="page-header">
    <div>
      <h1 class="page-title">Data Laporan</h1>
      {{-- <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Table</li>
      </ol> --}}
    </div>
    <div class="ms-auto pageheader-btn">
      <a href="" class="btn btn-primary btn-icon text-white me-2" data-bs-target="#addLaporan" data-bs-toggle="modal">
        <span>
          <i class="fa fa-plus"></i>
        </span> Tambah
      </a>
    </div>
  </div>

  {{-- ROW --}}
  <div class="row row-sm">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Riwayat Laporan</h3>
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
                          aria-label="Nama File: activate to sort column ascending">Nama File</th>
                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="basic-datatable"
                          rowspan="1" colspan="1" style="width: 77px;"
                          aria-label="File: activate to sort column ascending">File</th>
                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="basic-datatable"
                          rowspan="1" colspan="1" style="width: 77px;"
                          aria-label="Slip Gaji: activate to sort column ascending">Aksi</th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($d_laporan as $laporan)
                        <tr class="odd">
                          <td class="sorting_1">{{ $laporan->created_at->isoFormat('D MMMM Y') }}</td>
                          <td>{{ $laporan->nama_laporan }}</td>
                          <td>
                            <a href="{{ asset('file/' . $laporan->file) }}" target="_blank">
                              <i style="font-size: 20px" class="mdi mdi-file-document text-success"></i>
                            </a>
                          </td>
                          <td class="">
                            <a class="btn btn-primary btn-sm rounded-11 me-2"
                              data-bs-target="#editLaporan{{ $laporan->id }}" data-bs-toggle="modal">
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
                            <a href="{{ route('laporan.delete', $laporan->id) }}" class="btn btn-danger btn-sm rounded-11"
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
                            </a>
                          </td>
                        </tr>

                        {{-- UPDATE MODAL --}}
                        <div class="modal fade" id="editLaporan{{ $laporan->id }}">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content modal-content-demo">
                              <div class="modal-header">
                                <h6 class="modal-title">Edit Laporan</h6><button aria-label="Close" class="btn-close"
                                  data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <form action="{{ route('laporan.update', $laporan->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                <div class="modal-body">
                                  <div class="">
                                    <div class="form-group">
                                      <label for="nama_laporan" class="form-label">Nama File</label>
                                      <input type="text" class="form-control" id="nama_laporan" name="nama_laporan"
                                        value="{{ $laporan->nama_laporan }}">
                                    </div>
                                    <div class="form-group">
                                      <a class="text-dark" href="{{ asset('file/' . $laporan->file) }}"
                                        target="_blank">
                                        <i style="font-size: 16px" class="mdi mdi-file-find text-success"></i>
                                        Lihat File Laporan
                                      </a>
                                      <label class="form-label mt-2">Upload ulang</label>
                                      <input class="form-control" type="file" name="file">
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button class="btn btn-primary">Simpan</button>
                              </form>
                              <button class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                            </div>
                          </div>
                        </div>
                </div>
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

  <!-- EDIT MODAL -->




  <!-- ADD MODAL -->
  <div class="modal fade" id="addLaporan">
    <div class="modal-dialog" role="document">
      <div class="modal-content modal-content-demo">
        <div class="modal-header">
          <h6 class="modal-title">Tambah Laporan</h6><button aria-label="Close" class="btn-close"
            data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        </div>
        <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="">
              <div class="form-group">
                <label for="nama_laporan" class="form-label">Nama File</label>
                <input type="text" class="form-control" id="nama_laporan" name="nama_laporan"
                  placeholder="Nama File">
              </div>
              <div class="form-group">
                <label class="form-label mt-0">File</label>
                <input class="form-control" type="file" name="file">
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
    </script>
  @endpush

@endsection

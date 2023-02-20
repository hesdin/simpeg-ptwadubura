@extends('layouts.app')

@section('title', 'Tambah Pegawai')

@section('content')
  <div class="row pt-6">
    <div class="col-lg-9 col-xl-8 col-md-9 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Tambah Data Pegawai</h4>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.data-pegawai.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="">
              <div class="form-group">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                  placeholder="Nama Lengkap">
              </div>
              <div class="form-group">
                <label for="nip" class="form-label">Nomor Induk Kepegawaian</label>
                <input type="text" class="form-control" id="nip" name="nip"
                  placeholder="Nomor Induk Kepegawaian" maxlength="16" minlength="16">
              </div>
              <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
              </div>
              <div class="form-group">
                <label class="form-label">Jabatan</span></label>
                <select class="form-control form-select select2 select2-hidden-accessible" data-bs-placeholder="Select"
                  tabindex="-1" aria-hidden="true" name="jabatan_id">
                  <option>Pilih Jabatan</option>
                  @foreach ($d_jabatan as $jabatan)
                    <option value="{{ $jabatan->id }}">{{ Str::ucfirst($jabatan->nama_jabatan) }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label class="form-label">Jenis Kelamin</span></label>
                <select class="form-control form-select select2 select2-hidden-accessible" data-bs-placeholder="Select"
                  tabindex="-1" aria-hidden="true" name="jenis_kelamin">
                  <option value="laki-laki">Laki-Laki</option>
                  <option value="perempuan">Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                  placeholder="Tempat Lahir">
              </div>
              <div class="form-group">
                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir">
              </div>
              <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="Password">
              </div>

              <div class="form-group">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control mb-4" placeholder="Masukan Alamat" rows="2" name="alamat"></textarea>
              </div>

            </div>
            <button type="submit" class="btn btn-primary mt-4 mb-0">Tambah</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  @push('js')
    <!-- SELECT2 JS -->
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
  @endpush
@endsection

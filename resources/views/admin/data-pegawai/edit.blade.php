@extends('layouts.app')

@section('title', 'Edit Pegawai')

@section('content')
  <div class="row pt-6">
    <div class="col-lg-9 col-xl-8 col-md-9 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit Data {{ $pegawai->nama_lengkap }}</h4>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.data-pegawai.update', $pegawai->id) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="">
              <div class="form-group">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                  value="{{ $pegawai->nama_lengkap }}">
              </div>
              <div class="form-group">
                <label for="nip" class="form-label">Nomor Induk Kepegawaian</label>
                <input type="text" class="form-control" id="nip" name="nip" maxlength="16" minlength="16"
                  value="{{ $pegawai->nip }}">
              </div>
              <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $pegawai->email }}">
              </div>
              <div class="form-group">
                <label class="form-label">Jabatan <span class="text-red">*</span></label>
                <select class="form-control form-select select2 select2-hidden-accessible" data-bs-placeholder="Select"
                  tabindex="-1" aria-hidden="true" name="jabatan_id">
                  @foreach ($d_jabatan as $jabatan)
                    <option value="{{ $jabatan->id }}" {{ $pegawai->jabatan_id == $jabatan->id ? 'selected' : '' }}>
                      {{ Str::ucfirst($jabatan->nama_jabatan) }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label class="form-label">Jenis Kelamin <span class="text-red">*</span></label>
                <select class="form-control form-select select2" name="jenis_kelamin">
                  <option value="laki-laki" {{ $pegawai->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-Laki
                  </option>
                  <option value="perempuan" {{ $pegawai->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan
                  </option>
                </select>
              </div>
              <div class="form-group">
                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                  value="{{ $pegawai->tempat_lahir }}">
              </div>
              <div class="form-group">
                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                  value="{{ $pegawai->tgl_lahir }}">
              </div>

              <div class="form-group">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control mb-4" rows="2" name="alamat">{{ $pegawai->alamat }}</textarea>
              </div>

              <div class="form-group">
                <label for="password" class="form-label">Ganti Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password Baru">
                <p class="text-red">*Kosongkan jika tidak mengganti password</p>
              </div>

            </div>

            <button type="submit" class="btn btn-primary mt-4 mb-0">Update Data</button>
        </div>
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

@extends('layouts.app')

@section('title', 'Data Pegawai')

@section('content')
  <div class="row pt-6">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-start">
              <h3 class="card-title mb-0">Slip Gaji - <span class="text-danger">{{ $gaji->status }}</span></h3>
            </div>
            <div class="float-end">
              <h6 class="card-title">{{ $gaji->created_at->isoFormat('D MMMM Y') }}</h6>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-lg-12 text-center">
              <h5>PT. WADU BURA</h5>
              <p>Daha, Kabupaten Dompu Nusa Tenggara Barat (NTB)</p>
            </div>
            <div class="col-lg-6 ">
              <address>
                Nama : {{ $gaji->user->nama_lengkap }}<br>
                NIP : {{ $gaji->user->nip }}<br>
                Jabatan : {{ $gaji->user->jabatan->nama_jabatan }}<br>
                Gaji Bulan : {{ \Carbon\Carbon::now()->translatedFormat('F') }}
              </address>
            </div>
          </div>
          <div class="table-responsive push">
            <table class="table table-bordered table-hover mb-0 text-nowrap">
              <tbody>
                <tr class=" ">
                  <th class="text-center"></th>
                  <th>Perhitungan Gaji</th>
                  <th class="text-center">Sub Total</th>
                </tr>
                <tr>
                  <td class="text-center">1</td>
                  <td>
                    <p class="font-w600 mb-1">Gaji Pokok</p>

                  </td>
                  <td class="text-center"> Rp {{ number_format($gaji->gaji_pokok, 0, ',', '.') }}</td>
                </tr>

                <tr>
                  <td class="text-center">2</td>
                  <td>
                    <p class="font-w600 mb-1">Tunjangan</p>

                  </td>
                  <td class="text-center">Rp {{ number_format($gaji->tunjangan, 0, ',', '.') }}</td>
                </tr>

                <tr>
                  <td class="text-center">3</td>
                  <td>
                    <p class="font-w600 mb-1">Lembur</p>

                  </td>
                  <td class="text-center">Rp {{ number_format($gaji->bonus_lembur, 0, ',', '.') }}</td>
                </tr>

                <tr>
                  <td class="text-center">3</td>
                  <td>
                    <p class="font-w600 mb-1">Potongan</p>

                  </td>
                  <td class="text-center">Rp {{ number_format($gaji->potongan, 0, ',', '.') }}</td>
                </tr>

                <tr>
                  <td colspan="2" class="fw-bold text-uppercase text-end">Total Gaji</td>
                  <td class="fw-bold text-end h4">Rp {{ number_format($gaji->total_gaji, 0, ',', '.') }}</td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer text-end">
          @if (auth()->guard('admin')->check())
            @if ($gaji->status == 'Pending')
              <form action="{{ route('admin.status.gaji', $gaji->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger mb-1"><i class="si si-paper-plane"></i> Kirim Info
                  Gaji</button>
              </form>
            @else
              <a class="btn btn-primary mb-1 text-white"><i class="si si-check me-2"></i>Info Gaji Terkirin</a>
            @endif
          @endif
        </div>
      </div>
    </div><!-- COL-END -->
  </div>

@endsection

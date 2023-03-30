@extends('layouts.app')

@section('title', 'Data Pegawai')

@section('content')
  <div class="container pt-6">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-custom">
          <div class="card-header">
            <h3 class="card-title">
              Penggajian
            </h3>

          </div>
          <!--begin::Form-->

          <div class="card-body">
            <form action="{{ route('admin.total.gaji', $user->id) }}" method="post">
              @csrf
              <div class="form-group">
                <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                <input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok" placeholder="Gaji Pokok"
                  required>
              </div>

              <div class="form-group">
                <label for="tunjangan" class="form-label">Tunjangan</label>
                <input type="text" class="form-control" id="tunjangan" name="tunjangan" placeholder="Tunjangan"
                  required>
              </div>

              <div class="form-group">
                <label for="bonus_lembur" class="form-label">Bonus / Lembur</label>
                <input type="text" class="form-control" id="bonus_lembur" name="bonus_lembur"
                  value="{{ $lembur }}" readonly>

              </div>

              <div class="form-group">
                <label for="potongan" class="form-label">Potongan</label>
                <input type="text" class="form-control" id="potongan" name="potongan" value="{{ $potongan }}"
                  readonly>
              </div>

              <div class="card-footer ps-0">
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button type="reset" class="btn btn-secondary">Kembali</button>
              </div>


            </form>
            <!--end::Form-->
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

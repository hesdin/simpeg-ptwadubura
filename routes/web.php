<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\User\UserController;

Route::get('/admin', function () {
    return redirect()->route('admin.login');
});

Route::get('/', function () {
    return redirect()->route('login');
});


Route::middleware(['guest:web'])->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginCheck'])->name('login.check');
});

Route::middleware(['auth:web'])->group(function () {
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('absen', [UserController::class, 'absen'])->name('absen');
    Route::post('absen', [UserController::class, 'absenHarian'])->name('absen.harian');
    Route::get('gaji', [UserController::class, 'gaji'])->name('gaji');
    Route::get('gaji/{id}', [AdminController::class, 'slipGaji'])->name('slip.gaji');
    Route::get('cek-gaji', [UserController::class, 'Cekgaji'])->name('cek.gaji');
    Route::get('laporan', [UserController::class, 'laporan'])->name('laporan');
    Route::post('laporan', [UserController::class, 'laporanStore'])->name('laporan.store');
    Route::patch('laporan/{id}', [UserController::class, 'laporanUpdate'])->name('laporan.update');
    Route::get('laporan/{id}', [UserController::class, 'laporanDelete'])->name('laporan.delete');

    // Export
    Route::get('export/pdf/{id}', [ExportController::class, 'pegawaiPdf'])->name('export.pdf');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin'])->group(
        function () {
            Route::get('login', [AuthController::class, 'loginAdmin'])->name('login');
            Route::post('login', [AuthController::class, 'loginAdminCheck'])->name('login.check');
        }
    );


    Route::middleware(['auth:admin'])->group(
        function () {
            Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
            Route::get('jabatan', [AdminController::class, 'jabatan'])->name('jabatan');
            Route::post('jabatan', [AdminController::class, 'jabatanStore'])->name('jabatan.store');
            Route::patch('jabatan/{id}', [AdminController::class, 'jabatanUpdate'])->name('jabatan.update');
            Route::delete('jabatan/{id}', [AdminController::class, 'jabatanDestroy'])->name('jabatan.destroy');
            Route::get('jam-kerja', [AdminController::class, 'jamKerja'])->name('jam.kerja');
            Route::get('absensi', [AdminController::class, 'absensi'])->name('absensi');
            Route::get('absensi/{id}', [AdminController::class, 'absensiShow'])->name('absensi.show');
            Route::get('penggajian', [AdminController::class, 'penggajian'])->name('penggajian');

            Route::get('hitung/{id}', [AdminController::class, 'penggajiansHitung'])->name('hitung.show');

            Route::get('penggajian/{id}', [AdminController::class, 'penggajiansShow'])->name('penggajian.show');

            Route::post('gaji/{id}', [AdminController::class, 'totalGaji'])->name('total.gaji');

            Route::get('slip-gaji/{id}', [AdminController::class, 'slipGaji'])->name('slip.gaji');

            Route::post('gaji-status/{id}', [AdminController::class, 'statusGaji'])->name('status.gaji');

            Route::resource('data-pegawai', PegawaiController::class);
            Route::get('laporan', [AdminController::class, 'laporan'])->name('laporan');
            Route::get('download/{id}', [AdminController::class, 'download'])->name('download');

            Route::get('export-pdf', [ExportController::class, 'exportPdf'])->name('export.pdf');

            Route::get('logout', [AuthController::class, 'logoutAdmin'])->name('logout');
        }
    );
});

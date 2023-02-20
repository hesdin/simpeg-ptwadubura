<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absen;
use App\Models\Gaji;
use App\Models\Jabatan;
use App\Models\JamKerja;
use App\Models\Laporan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class AdminController extends Controller
{
    public function dashboard()
    {
        $user = User::all()->count();

        $jabatan = Jabatan::all()->count();

        $gaji = Gaji::where('status', 'Selesai')->sum('total_gaji');

        $laporan = Laporan::all()->count();

        $data = [
            'user' => $user,
            'jabatan' => $jabatan,
            'gaji' => $gaji,
            'laporan' => $laporan,
        ];

        return view('admin.dashboard', $data);
    }

    public function jabatan()
    {
        $d_jabatan = Jabatan::all();

        if ($d_jabatan->first()) {
            return view('admin.jabatan.index', compact('d_jabatan'));
        }

        $jabatan = new Jabatan;

        $jabatan->id = 1;
        $jabatan->nama_jabatan = 'safety';
        $jabatan->save();

        return redirect()->route('admin.jabatan', compact('d_jabatan'));
    }

    public function jabatanStore(Request $request)
    {
        $jabatan = new Jabatan;

        $jabatan->nama_jabatan = $request->nama_jabatan;

        $jabatan->save();

        return back()->with('success', 'Berhasil Ditambahkan');
    }

    public function jabatanUpdate(Request $request, $id)
    {
        $jabatan = Jabatan::findOrFail($id);

        $jabatan->nama_jabatan = $request->nama_jabatan;

        $jabatan->update();

        return back()->with('success', 'Berhasil Diupdate');
    }

    public function jabatanDestroy($id)
    {
        $jabatan = Jabatan::findOrFail($id);

        $jabatan->delete();

        return back()->with('success', 'Berhasil Dihapus');
    }

    public function jamKerja()
    {
        $d_jam_kerja = JamKerja::all();

        return view('admin.jam-kerja.index', compact('d_jam_kerja'));
    }

    public function absensi()
    {
        $d_pegawai = User::all();

        return view('admin.data-absensi.index', compact('d_pegawai'));
    }

    public function absensiShow($id)
    {
        $d_absen = Absen::where('user_id', $id)->get();

        return view('admin.data-absensi.show', compact('d_absen'));
    }

    public function penggajian()
    {
        $d_pegawai = User::all();

        return view('admin.data-penggajian.index', compact('d_pegawai'));
    }

    public function penggajiansShow($id)
    {
        $d_gaji = Gaji::where('user_id', $id)->get();

        $user = User::findOrFail($id);

        $data = [
            'd_gaji' => $d_gaji,
            'user' => $user,
        ];

        return view('admin.data-penggajian.show', $data);
    }

    public function totalGaji(Request $request, $id)
    {

        if ($request->has('lihat_slip')) {
            $admin = $request->lihat_slip;
            $gaji = Gaji::findOrFail($id);

            $data = [
                'admin' => $admin,
                'gaji' => $gaji,
            ];
            return view('admin.data-penggajian.gaji', $data);
        }

        $gaji_pokok = $request->gaji_pokok;
        $tunjangan = $request->tunjangan;
        $bonus_lembur = $request->bonus_lembur;
        $potongan = $request->potongan;

        $total_gaji = $gaji_pokok + $tunjangan;

        if ($request->filled('bonus_lembur')) {
            $total_gaji = $total_gaji + $bonus_lembur;
        }

        if ($request->filled('potongan')) {
            $total_gaji = $total_gaji - $potongan;
        }

        $gaji = new Gaji;

        $gaji->gaji_pokok = $gaji_pokok;
        $gaji->user_id = $id;
        $gaji->tunjangan = $tunjangan;
        $gaji->bonus_lembur = $bonus_lembur;
        $gaji->potongan = $potongan;
        $gaji->total_gaji = $total_gaji;

        $gaji->save();

        return back()->with('success', 'Gaji berhasil di tambahkan, silahkan cek slip gaji lalu kirim info gaji ke pegawai');
    }

    public function statusGaji($id)
    {
        $gaji = Gaji::findOrFail($id);

        $gaji->status = 'Selesai';

        $gaji->update();

        return redirect()->route('admin.penggajian.show', $gaji->user_id);
    }

    public function Cekgaji()
    {
        # code...
    }

    public function laporan()
    {
        $d_laporan = Laporan::all();

        return view('admin.laporan', compact('d_laporan'));
    }

    public function download($id)
    {
        $laporan = Laporan::findOrFail($id);

        $filePath = public_path('file/' . $laporan->file);
        $headers = ['Content-Type: application'];
        $fileName = $laporan->nama_laporan;

        return response()->download($filePath, $fileName, $headers);
    }
}
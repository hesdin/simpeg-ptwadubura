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

    public function penggajiansHitung($id)
    {
        $gaji = Gaji::where('user_id', $id)->whereMonth('created_at', '=', date('m'))->first();

        if ($gaji) {
            return back()->with('error', 'Gaji bulan ini sudah dihitung, cek pada riwayat gaji');
        }

        $user = User::findOrFail($id);
        $absen = Absen::where('user_id', $user->id)
            ->whereMonth('created_at', '=', date('m'))
            ->get();

        // inisialisasi variabel jumlah jam kerja dan upah
        $jumlah_jam_kerja = 0;
        $potongan = 0;
        $lembur = 0;

        // loop untuk menghitung jumlah jam kerja dan upah dari setiap data absen
        foreach ($absen as $data) {
            // konversi waktu masuk dan pulang ke dalam format timestamp
            $masuk = strtotime(date('Y-m-d', strtotime($data['created_at']))  . ' ' . $data['absen_masuk']);
            $pulang = strtotime(date('Y-m-d', strtotime($data['created_at'])) . ' ' . $data['absen_pulang']);

            // hitung selisih waktu
            $selisih_waktu = date_diff(date_create(date('H:i:s', $masuk)), date_create(date('H:i:s', $pulang)));

            // hitung jumlah jam kerja
            $jam_kerja = $selisih_waktu->h + ($selisih_waktu->i / 60);

            // hitung upah
            if ($jam_kerja >= 8) {
                $lembur += ($jam_kerja - 8) * 170000;
                $jumlah_jam_kerja += 8;
            } else {
                $potongan += (8 - $jam_kerja) * 170000;
                $jumlah_jam_kerja += $jam_kerja;
            }
        }

        $data = [
            'user' => $user,
            'potongan' => $potongan,
            'lembur' => $lembur,
        ];


        return view('admin.data-penggajian.hitung', $data);
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
        $gaji_pokok = $request->gaji_pokok;
        $tunjangan = $request->tunjangan;
        $bonus_lembur = $request->bonus_lembur;
        $potongan = $request->potongan;

        $total_gaji = $gaji_pokok + $tunjangan + $bonus_lembur - $potongan;

        $gaji = new Gaji;

        $gaji->gaji_pokok = $gaji_pokok;
        $gaji->user_id = $id;
        $gaji->tunjangan = $tunjangan;
        $gaji->bonus_lembur = $bonus_lembur;
        $gaji->potongan = $potongan;
        $gaji->total_gaji = $total_gaji;

        $gaji->save();

        return redirect()->route('admin.penggajian.show', $id)->with('success', 'Gaji berhasil di tambahkan, silahkan cek slip gaji lalu kirim info gaji ke pegawai');
    }

    public function statusGaji($id)
    {
        $gaji = Gaji::findOrFail($id);

        $gaji->status = 'Selesai';

        $gaji->update();

        return redirect()->route('admin.penggajian.show', $gaji->user_id);
    }

    public function slipGaji($id)
    {
        $gaji = Gaji::findOrFail($id);

        $data = [

            'gaji' => $gaji,
        ];
        return view('admin.data-penggajian.gaji', $data);
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

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Absen;
use App\Models\Gaji;
use App\Models\JamKerja;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function absen()
    {

        return view('user.absen.index');
    }

    public function absenHarian(Request $request)
    {
        date_default_timezone_set("Asia/Makassar");

        if ($request->has('absen_masuk')) {

            $user = auth()->guard('web')->user()->id;

            $absen = Absen::where('user_id', $user)
                ->whereDate('created_at', today())
                ->count();

            // dd($absen);

            if ($absen > 0) {
                return back()->with('fail', 'Kamu sudah absen masuk');
            }
            ;

            $absen = new Absen;

            $absen->user_id = auth()->guard('web')->user()->id;
            $absen->absen_masuk = \Carbon\Carbon::now();

            $absen->save();

            return back()->with('success', 'Absen masuk berhasil, kembali nanti untuk absen pulang');
        }

        if ($request->has('absen_pulang')) {

            $user = auth()->guard('web')->user()->id;

            $absen_masuk = Absen::where('user_id', $user)
                ->whereDate('created_at', today())
                ->whereNotNull('absen_masuk')
                ->count();


            if ($absen_masuk === 0) {
                return redirect()->back()->with('fail', 'Silahkan Absen Masuk dulu');

            }

            $absen_pulang = Absen::where('user_id', $user)
                ->whereDate('created_at', today())
                ->whereNull('absen_pulang')
                ->count();

            if ($absen_pulang > 0) {

                $absen = Absen::where('user_id', $user)
                    ->whereDate('created_at', today())->first();
                $absen->user_id = auth()->guard('web')->user()->id;
                $absen->absen_pulang = \Carbon\Carbon::now();

                $absen->update();

                return back()->with('success', 'Absen pulang berhasil, kembali absen besok');
            }
            ;
            return back()->with('fail', 'Absensi hari ini selesai, kembali absen besok');


        }
    }

    public function gaji()
    {
        $user = auth()->guard('web')->user()->id;

        $d_gaji = Gaji::where('user_id', $user)
            ->where('status', 'selesai')
            ->get();

        $data = [
            'd_gaji' => $d_gaji,
        ];

        return view('user.gaji.index', $data);
    }

    public function laporan()
    {
        $d_laporan = Laporan::all();

        return view('user.laporan.index', compact('d_laporan'));
    }

    public function laporanStore(Request $request)
    {
        $laporan = new Laporan;

        $laporan->nama_laporan = $request->nama_laporan;

        // File Laporan
        $fileName = $request->nama_laporan . '.' . $request->file->extension();
        $request->file->move(public_path('file'), $fileName);
        $laporan->file = $fileName;

        $laporan->save();

        return back()->with('success', 'Berhasil Ditambahkan');
    }

    public function laporanUpdate(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);

        $laporan->nama_laporan = $request->nama_laporan;

        if ($request->has('file')) {
            $fileName = $request->nama_laporan . '.' . $request->file->extension();
            // Read file path
            $filePath = public_path('file/' . $laporan->file);
            // Check file exists
            if (File::exists($filePath)) {
                // Delete file
                File::delete($filePath);
            }
            $request->file->move(public_path('file'), $fileName);
            $laporan->file = $fileName;
        }

        $laporan->update();

        return back()->with('success', 'Berhasil Diubah');
    }

    public function laporanDelete($id)
    {
        $laporan = Laporan::findOrFail($id);

        // Read file path
        $filePath = public_path('file/' . $laporan->file);
        // Check file exists
        if (File::exists($filePath)) {
            // Delete file
            File::delete($filePath);
        }

        $laporan->delete();

        return back()->with('success', 'Berhasil Dihapus');

    }
}

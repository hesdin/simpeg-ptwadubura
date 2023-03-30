<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use PDF;

use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function pegawaiPdf($id)
    {
        $d_absen = Absen::where('user_id', $id)->get();

        $pdf = PDF::loadview('user.exports.absen-pdf', ['d_absen' => $d_absen]);
        return $pdf->stream();

        // $pdf = new PDF();
        // $pdf->loadView('user.exports.absen-pdf', $d_absen)
        //     ->setPaper('a4', 'portrait');

        // return $pdf->stream();
    }

    public function exportPdf()
    {
        $d_absen = Absen::all();

        $pdf = PDF::loadview('admin.exports.absen-pdf', ['d_absen' => $d_absen]);
        return $pdf->stream();
    }
}

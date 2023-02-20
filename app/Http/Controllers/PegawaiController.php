<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $d_pegawai = User::with('jabatan')->get();

    return view('admin.data-pegawai.index', compact('d_pegawai'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $d_jabatan = Jabatan::all();

    return view('admin.data-pegawai.create', compact('d_jabatan'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // dd($request->all());
    $pegawai = new User;

    $pegawai->jabatan_id = $request->jabatan_id;

    if ($pegawai->jabatan_id == '1') {
      $pegawai->role = '1';
    }

    $pegawai->nama_lengkap = $request->nama_lengkap;
    $pegawai->nip = $request->nip;
    $pegawai->email = $request->email;
    $pegawai->jabatan_id = $request->jabatan_id;
    $pegawai->jenis_kelamin = $request->jenis_kelamin;
    $pegawai->tempat_lahir = $request->tempat_lahir;
    $pegawai->tgl_lahir = $request->tgl_lahir;
    $pegawai->alamat = $request->alamat;
    $pegawai->password = bcrypt($request->password);

    $store = $pegawai->save();

    if ($store) {
      return redirect()->route('admin.data-pegawai.index')->with('success', 'Pegawai Berhasil Ditambahkan !');
    }

    dd('gagal');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $pegawai = User::findOrFail($id);
    $d_jabatan = Jabatan::all();

    $data = [
      'pegawai' => $pegawai,
      'd_jabatan' => $d_jabatan,

    ];

    return view('admin.data-pegawai.edit', $data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $pegawai = User::findOrFail($id);

    $pegawai->nama_lengkap = $request->nama_lengkap;
    $pegawai->nip = $request->nip;
    $pegawai->email = $request->email;
    $pegawai->jabatan_id = $request->jabatan_id;
    $pegawai->jenis_kelamin = $request->jenis_kelamin;
    $pegawai->tempat_lahir = $request->tempat_lahir;
    $pegawai->tgl_lahir = $request->tgl_lahir;
    $pegawai->alamat = $request->alamat;

    if ($request->filled('password')) {
      $pegawai->password = bcrypt($request->password);
    }

    $update = $pegawai->update();

    if ($update) {
      return redirect()->route('admin.data-pegawai.index')->with('success', 'Data Pegawai Berhasil Diupdate !');
    }

    dd('gagal');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $pegawai = User::findOrFail($id);

    $destroy = $pegawai->delete();

    if ($destroy) {
      return redirect()->route('admin.data-pegawai.index')->with('success', 'Data Pegawai Berhasil Dihapus !');
    }
  }
}

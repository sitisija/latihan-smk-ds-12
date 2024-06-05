<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function siswa(Request $request)
    {
        $search = $request->search;
        $dataSiswa = Siswa::paginate(2);
        return view('siswa/index', [
            'search' => $search,
            'dataSiswa' => $dataSiswa
        ]);
    }
    public function tambah()
    {
        return view('siswa/tambah');
    }
    public function aksi_tambah(Request $request)
    {
        Siswa::insert([
            'nama' => $request->nama,
            'alamat' => $request->alamat
        ]);
    }
    public function edit_siswa($id){
        $dataSiswa =  Siswa::where('id', $id)->first();

        return view('siswa/edit_siswa', [
            'dataSiswa' => $dataSiswa
        ]);
    }
    public function aksi_edit_siswa(Request $request,$id){
        Siswa::where('id',$id)->update($request->only(['siswa']));
        return redirect()->route('siswa');
    }
    public function hapus_siswa($id){
        Siswa::where('id', $id)->delete();
        return redirect()->route('siswa');
    }
}

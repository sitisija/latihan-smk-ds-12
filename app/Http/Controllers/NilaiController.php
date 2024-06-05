<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index(){
        // Mengambil data nilai beserta data siswa terkait menggunakan join
        // $dataNilai = Nilai::join('siswa', 'nilai.siswa_id', '=', 'siswa.id')
        //                   ->get();
                // Mengambil data nilai beserta data siswa terkait menggunakan join dan select
                // $dataNilai = Nilai::select('nilai.id', 'siswa.nama as siswa_nama', 'nilai.nilai')
                //                   ->join('siswa', 'nilai.siswa_id', '=', 'siswa.id')
                //                   ->get();
                // $dataNilai = Nilai::join('siswa', 'nilai.siswa_id', '=', 'siswa.id')
                // ->select('nilai.*', 'siswa.nama') // Pilih kolom yang ingin diambil
                // ->get();
                $dataNilai=Nilai::select('*','nilai.id as nilai_id')->join('siswa','nilai.siswa_id','=','siswa.id')->get();
                // Mengirim data ke view 'nilai.index'
                return view('nilai.index',[
                    'dataNilai'=>$dataNilai
                ]);
            }
            public function tambah(){
                $dataSiswa=Siswa::get();
                return view('nilai.tambah',['dataSiswa'=>$dataSiswa]);
            }
            public function aksi_tambah(Request $request){
                // dd($request->all());
                // dd($request->only(['siswa_id','nilai']));
                $request->validate([
                    'siswa_id'=>'required',
                    'nilai'=>'required|numeric'
                ]);
                //bisa direk balik
                //if($request->nilai > 100)
                //if($request->nilai >=100)
                if($request->nilai>100 ||$request->nilai < 0){
                    return redirect()->back()->with([
                        'validasi_nilai'=>'Nilai tidak bisa lebih dari 100 dan tidak bisa kurang dari 0'
                    ]);
                }
                Nilai::insert([
                    'siswa_id'=>$request->siswa_id,
                    'nilai'=>$request->nilai
                ]);
                return redirect()->route('nilai')->with('Pesan','Data berhasil ditambahkan');
                // Nilai::insert($request->only(['siswa_id','nilai']));
            }
            public function hapus($id){
                // echo $id;die;
                //nilai id nya di apus !
                Nilai::where('id', $id)->delete();
                return redirect()->route('nilai')->with('Hapus','Data berhasil dihapus');
            }
            public function edit($id){
                $nilai=Nilai::where('id',$id)->first();
                $dataSiswa = Siswa::get();
                return view('nilai.edit',[
                    'dataSiswa'=>$dataSiswa,
                    'nilai'=>$nilai
                ]);
            }
            public function aksi_edit(Request $request, $id)
            {
                if (empty($request->siswa_id)) {
                    return redirect()->back()->with([
                        'validasi_nilai' => 'Siswa harus dipilih.'
                    ]);
                }
            
                if ($request->nilai > 100 || $request->nilai < 0) {
                    return redirect()->back()->with([
                        'validasi_nilai' => 'Nilai tidak bisa lebih dari 100 dan tidak bisa kurang dari 0'
                    ]);
                }
            
                Nilai::where('id', $id)->update([
                    'siswa_id' => $request->siswa_id,
                    'nilai' => $request->nilai
                ]);
            
                return redirect()->route('nilai')->with('edit', 'Data berhasil di edit');
            }
            
        }

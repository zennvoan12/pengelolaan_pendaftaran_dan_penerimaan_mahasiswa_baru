<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Jurusan;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PendaftarExport;
class DashboardController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $role = Auth::user()->role_id;
        $calonMhs = Pendaftar::all();
        $pendaftar = Pendaftar::where('user_id', $id)->first();
        $jurusan = Jurusan::all();
        if($role == 2 && empty($pendaftar) == false){
            $pilihanJurusan = Jurusan::where('id', $pendaftar->jurusan_id)->first();
            return view ('dashboard.index', compact ('pendaftar', 'id', 'calonMhs', 'jurusan', 'pilihanJurusan'));
        }else{
            return view ('dashboard.index', compact ('pendaftar', 'id', 'calonMhs', 'jurusan'));
        }
    }

    public function create(Request $request)
    {
        $pendaftar = new Pendaftar;

        $indonesia = implode(",", $request['indonesia']);
        $inggris = implode(",", $request['inggris']);
        $mtk = implode(",", $request['mtk']);
        $user = $request->user_id;
        $nama = $request->nama;

        $pendaftar->no_reg = rand(0000000000, 9999999999);
        $pendaftar->nama = $nama;
        $pendaftar->nik = $request->nik;
        $pendaftar->tempat_lahir = $request->tempat_lahir;
        $pendaftar->tanggal_lahir = $request->tanggal_lahir;
        $pendaftar->jenis_kelamin = $request->jk;
        $pendaftar->kewarganegaraan = $request->kewarganegaraan;
        $pendaftar->agama = $request->agama;
        $pendaftar->nama_ibu = $request->nama_ibu;
        $pendaftar->email_daftar = $request->email_daftar;
        $pendaftar->no_telp = $request->no_telp;
        $pendaftar->alamat = $request->alamat;
        $pendaftar->kode_pos = $request->kode_pos;
        $pendaftar->pendidikan = $request->pendidikan;
        $pendaftar->asal_sekolah = $request->sekolah;
        $pendaftar->nilai_indonesia = $indonesia;
        $pendaftar->nilai_inggris = $inggris;
        $pendaftar->nilai_mtk = $mtk;
        $pendaftar->jurusan_id = $request->jurusan;
        $pendaftar->user_id = $user;
        $pendaftar->gelombang_id = 1;

        if ($request->hasFile('foto')){
            $ext = $request->file('foto')->extension();
            $foto = 'foto_'.$nama.'_'.$user.'_'.time().'.'.$ext;

            $request->file('foto')->storeAs(
                'public/foto_diri', $foto
            );
        $pendaftar->foto = $foto;
        }
        if ($request->hasFile('berkas')){
            $ext = $request->file('berkas')->extension();
            $berkas = 'berkas_pendukung_'.$nama.'_'.$user.'_'.time().'.'.$ext;

            $request->file('berkas')->storeAs(
                'public/berkas_pendukung', $berkas
            );
        $pendaftar->berkas = $berkas;
        }

        $pendaftar->save();

        return redirect('/dashboard');

    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $pendaftar = Pendaftar::where('user_id', $id)->first();
        $indonesia = implode(",", $request['indonesia']);
        $inggris = implode(",", $request['inggris']);
        $mtk = implode(",", $request['mtk']);
        $user = $request->user_id;
        $nama = $request->nama;

        $pendaftar->nama = $nama;
        $pendaftar->nik = $request->nik;
        $pendaftar->tempat_lahir = $request->tempat_lahir;
        $pendaftar->tanggal_lahir = $request->tanggal_lahir;
        $pendaftar->jenis_kelamin = $request->jk;
        $pendaftar->kewarganegaraan = $request->kewarganegaraan;
        $pendaftar->agama = $request->agama;
        $pendaftar->nama_ibu = $request->nama_ibu;
        $pendaftar->email_daftar = $request->email_daftar;
        $pendaftar->no_telp = $request->no_telp;
        $pendaftar->alamat = $request->alamat;
        $pendaftar->kode_pos = $request->kode_pos;
        $pendaftar->pendidikan = $request->pendidikan;
        $pendaftar->asal_sekolah = $request->sekolah;
        $pendaftar->nilai_indonesia = $indonesia;
        $pendaftar->nilai_inggris = $inggris;
        $pendaftar->nilai_mtk = $mtk;
        $pendaftar->jurusan_id = $request->jurusan;
        $pendaftar->user_id = $user;

        if ($request->hasFile('foto')){
            $ext = $request->file('foto')->extension();
            $foto = 'foto_'.$nama.'_'.$user.'_'.time().'.'.$ext;

            $request->file('foto')->storeAs(
                'public/foto_diri', $foto
            );
            
            Storage::delete('public/foto_diri/'.$request->old_foto);
            
            $pendaftar->foto = $foto;
        }
        if ($request->hasFile('berkas')){
            $ext = $request->file('berkas')->extension();
            $berkas = 'berkas_pendukung_'.$nama.'_'.$user.'.'.$ext;

            $request->file('berkas')->storeAs(
                'public/berkas_pendukung', $berkas
            );
            
            Storage::delete('public/berkas_pendukung/'.$request->old_berkas);

            $pendaftar->berkas = $berkas;
        }

        $pendaftar->save();
        
        return redirect()->back();
    }

    public function show($id)
    {
        $pendaftar = Pendaftar::find($id)->first();
        $pilihanJurusan = Jurusan::where('id', $pendaftar->jurusan_id)->first();
        return view ('dashboard.showPendaftar', compact ('pendaftar', 'pilihanJurusan'));
    }

    public function nonaktif(Request $request)
    {
        $pendaftar = Pendaftar::pluck('can_update')->all();
        foreach ($pendaftar as $p){

            if ($p != true) {
                $datasave = [
                    'can_update' => true,
                ];
                DB::table('pendaftars')->update($datasave);
            } else {
                $datasave = [
                    'can_update' => false,
                ];
                DB::table('pendaftars')->update($datasave);
            }
        }

        // $status[] = $request->status;

        // for($i= 0 ; $i<count($status);$i++){
            
        //     }

        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new PendaftarExport, 'pendaftar_yang_lulus.xlsx');
    }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Jurusan;
use App\Imports\NilaiImport;
use App\Imports\SoalImport;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $role = Auth::user()->role_id;
        $calonMhs = Pendaftar::all();
        $pendaftar = Pendaftar::where('user_id', $id)->first();
        $jurusan = Jurusan::all();
        if ($role == 2 && empty($pendaftar) == false) {
            $pilihanJurusan = DB::table('jurusans')->where('kode_jurusan', $pendaftar->jurusan_kode)->first();
            return view('dashboard.index', compact('pendaftar', 'id', 'calonMhs', 'jurusan', 'pilihanJurusan'));
        } else {
            return view('dashboard.index', compact('pendaftar', 'id', 'calonMhs', 'jurusan'));
        }
    }

    public function create(Request $request)
    {


        $validate = $request->validate([

            "nama" => "required|max:50",
            "nik" => "required|max:16",
            "tempat_lahir" => "required|max:30",
            "tanggal_lahir" => "required",
            // "jenis_kelamin" => "required",
            "kewarganegaraan" => "required",
            "agama" => "required",
            "nama_ibu" => "required",
            "email_daftar" => "required",
            "no_telp" => "required",
            "alamat" => "required",
            "kode_pos" => "required|max:5",
            "pendidikan" => "required",
            // "asal_sekolah" => "required",
            // "nilai_indonesia" => "required|max:2",
            // "nilai_inggris" => "required|max:2",
            // "nilai_mtk" => "required|max:2"



        ]);
        $pendaftar = new Pendaftar;
        $indonesia = implode(",", $request['indonesia']);
        $inggris = implode(",", $request['inggris']);
        $mtk = implode(",", $request['mtk']);
        $user = $request->user_id;
        $nama = $request->nama;
        $jurusan = $request->jurusan;
        $kode = DB::table('jurusans')->where('kode_jurusan', $jurusan)->pluck('fakultas_kode')->first();

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
        $pendaftar->jurusan_kode = $jurusan;
        $pendaftar->fakultas_kode = $kode;
        $pendaftar->user_id = $user;
        $pendaftar->gelombang_id = 1;
        // dd($kode);
        if ($request->hasFile('foto')) {
            $ext = $request->file('foto')->extension();
            $foto = 'foto_' . $nama . '_' . $user . '_' . time() . '.' . $ext;

            $request->file('foto')->storeAs(
                'public/foto_diri',
                $foto
            );
            $pendaftar->foto = $foto;
        }
        if ($request->hasFile('berkas')) {
            $ext = $request->file('berkas')->extension();
            $berkas = 'berkas_pendukung_' . $nama . '_' . $user . '_' . time() . '.' . $ext;

            $request->file('berkas')->storeAs(
                'public/berkas_pendukung',
                $berkas
            );
            $pendaftar->berkas = $berkas;
        }

        $pendaftar->save();

        $notification = [
            'message' => 'Anda Berhasil Terdaftar',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function update(Request $request)
    {
        $validate = $request->validate(
            [

                "nama" => "required|max:50",
                "nik" => "required|max:16",
                "tempat_lahir" => "required|max:30",
                "tanggal_lahir" => "required",
                // "jenis_kelamin" => "required",
                "kewarganegaraan" => "required",
                "agama" => "required",
                "nama_ibu" => "required",
                // "email_daftar" => "required|exists:users",
                "no_telp" => "required",
                "alamat" => "required",
                "kode_pos" => "required|max:5",
                "pendidikan" => "required",
                // "asal_sekolah" => "required",
                // "nilai_indonesia" => "required|max:2",
                // "nilai_inggris" => "required|max:2",
                // "nilai_mtk" => "required|max:2"

            ],
            [
                'kode_pos.required' => 'Masa Ga D isi Mas',
                'kode_pos.max' => 'Kode Pos Harus Isi 5 Bos'
            ]
        );


        $id = Auth::user()->id;
        $pendaftar = Pendaftar::where('user_id', $id)->first();
        $indonesia = implode(",", $request['indonesia']);
        $inggris = implode(",", $request['inggris']);
        $mtk = implode(",", $request['mtk']);
        $user = $request->user_id;
        $nama = $request->nama;
        $jurusan = $request->jurusan;
        $kode = DB::table('jurusans')->where('kode_jurusan', $jurusan)->pluck('fakultas_kode')->first();

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
        $pendaftar->jurusan_kode = $jurusan;
        $pendaftar->fakultas_kode = $kode;
        $pendaftar->user_id = $user;

        if ($request->hasFile('foto')) {
            $ext = $request->file('foto')->extension();
            $foto = 'foto_' . $nama . '_' . $user . '_' . time() . '.' . $ext;

            $request->file('foto')->storeAs(
                'public/foto_diri',
                $foto
            );

            Storage::delete('public/foto_diri/' . $request->old_foto);

            $pendaftar->foto = $foto;
        }
        if ($request->hasFile('berkas')) {
            $ext = $request->file('berkas')->extension();
            $berkas = 'berkas_pendukung_' . $nama . '_' . $user . '.' . $ext;

            $request->file('berkas')->storeAs(
                'public/berkas_pendukung',
                $berkas
            );

            Storage::delete('public/berkas_pendukung/' . $request->old_berkas);

            $pendaftar->berkas = $berkas;
        }

        $pendaftar->save();

        $notification = [
            'message' => 'Data Berhasil Di Ubah',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function show($id)
    {
        $pendaftar = Pendaftar::find($id)->first();
        $jurusan = Jurusan::all();
        $pilihanJurusan = Jurusan::where('id', $pendaftar->jurusan_id)->first();
        return view('dashboard.showPendaftar', compact('pendaftar', 'pilihanJurusan', 'jurusan'));
    }

    public function nonaktif(Request $request)
    {
        $pendaftar = Pendaftar::pluck('can_update')->all();
        foreach ($pendaftar as $p) {

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

        $notification = [
            'message' => 'Berhasil',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }
}
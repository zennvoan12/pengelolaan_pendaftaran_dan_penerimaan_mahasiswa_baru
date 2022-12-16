<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fakultas;
use App\Models\Jurusan;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\DB;

class FakultasController extends Controller
{
    public function index()
    {
        $data['fakultas'] = Fakultas::orderBy('kode_fakultas', 'asc')->get();
        $data['pendaftar'] = Pendaftar::get();
        return view('fakultas.index')->with($data);
    }
    public function show($id)
    {
        $data['jurusan'] = Fakultas::findOrFail($id)->jurusan()->orderBy('nama_jurusan', 'asc')->get();
        $data['fakultas'] = Fakultas::where('kode_fakultas', $id)->first();
        $data['pendaftar'] = Pendaftar::get();
        return view('fakultas.jurusan')->with($data);
    }
    public function pendaftar($id, $data)
    {
        $fakultas = Fakultas::where('kode_fakultas', $id)->pluck('nama_fakultas')->first();
        $jurusan = Jurusan::where('kode_jurusan', $data)->pluck('nama_jurusan')->first();
        $pendaftar = Jurusan::find($data)->pendaftar()->orderBy('nama', 'asc')->get();
        return view('fakultas.pendaftar', compact('pendaftar', 'fakultas', 'jurusan'));
    }
}
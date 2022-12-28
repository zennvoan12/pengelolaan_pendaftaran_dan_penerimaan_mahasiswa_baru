<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $primaryKey = 'no_reg';

    protected $guarded = [];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_kode', 'kode_jurusan');
    }
    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_kode', 'kode_fakultas');
    }

    public static function getDataPendaftar()
    {
        $pendaftar = Pendaftar::all();
        $pendaftar_filter = [];
        foreach($pendaftar as $value => $item){
            if($item->lulus == 0){
                $status = "Tidak";
            }elseif($item->lulus == 1){
                $status = "Lulus";
            }else{
                $status = "Belum Diseleksi";
            }
            $jurusan = Jurusan::where('kode_jurusan', $item->jurusan_kode)->pluck('nama_jurusan')->first();
            $gelombang = Gelombang::where('id_gelombang', $item->gelombang_id)->pluck('nama_gelombang')->first();
            $pendaftar_filter[$value]['no'] = $value+1;
            $pendaftar_filter[$value]['no_reg'] = $pendaftar[$value]->no_reg;
            $pendaftar_filter[$value]['nama'] = $pendaftar[$value]->nama;
            $pendaftar_filter[$value]['jurusan'] = $jurusan;
            $pendaftar_filter[$value]['gelombang'] = $gelombang;
            $pendaftar_filter[$value]['status'] = $status;
        }

        return $pendaftar_filter;

    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jurusan;
use App\Models\Gelombang;

class Pendaftar extends Model
{
    use HasFactory;

    protected $primaryKey = 'no_reg';

    protected $guarded = [];

    public function jurusans()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public static function getDataPendaftar()
    {
        $pendaftar = Pendaftar::all();
        $pendaftar_filter = [];
        foreach($pendaftar as $value => $item){
            $jurusan = Jurusan::where('id', $item->jurusan_id)->pluck('nama_jurusan')->first();
            $gelombang = Gelombang::where('id_gelombang', $item->gelombang_id)->pluck('nama_gelombang')->first();
            $pendaftar_filter[$value]['no'] = $value+1;
            $pendaftar_filter[$value]['no_reg'] = $pendaftar[$value]->no_reg;
            $pendaftar_filter[$value]['nama'] = $pendaftar[$value]->nama;
            $pendaftar_filter[$value]['jurusan'] = $jurusan;
            $pendaftar_filter[$value]['gelombang'] = $gelombang;
        }
        
        return $pendaftar_filter;

    }
    // protected $fillable = [
        // 'no_reg',
        // 'nama',
        // 'nik',
        // 'tempat_lahir',
        // 'tanggal_lahir',
        // 'jenis_kelamin',
        // 'kewarganegaraan',
        // 'agama',
        // 'nama_ibu',
        // 'email_daftar',
        // 'no_telp',
        // 'alamat',
        // 'kode_pos',
        // 'pendidikan',
        // 'asal_sekolah',
        // 'nilai_indonesia',
        // 'nilai_inggris',
        // 'nilai_mtk',
        // 'pilihan_prodi',
        // 'user_id',
    // ];
}

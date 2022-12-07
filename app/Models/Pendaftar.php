<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $primaryKey = 'no_reg';

    // protected $guarded = [];

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

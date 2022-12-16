<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $primaryKey = 'kode_jurusan';
    protected $keyType = 'string';

    public function pendaftar()
    {
        return $this->hasMany(Pendaftar::class, 'jurusan_kode', 'kode_jurusan');
    }
}

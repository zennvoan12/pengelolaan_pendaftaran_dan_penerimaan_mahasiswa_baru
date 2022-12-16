<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_fakultas';
    protected $keyType = 'string';
    public function jurusan()
    {
        return $this->hasMany(Jurusan::class, 'fakultas_kode', 'kode_fakultas');
    }
    public function pendaftar()
    {
        return $this->hasMany(Pendaftar::class, 'fakultas_kode', 'kode_fakultas');
    }
}

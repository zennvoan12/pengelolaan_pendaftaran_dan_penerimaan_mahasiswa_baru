<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    public function pendaftar()
    {
        return $this->hasMany(Pendaftar::class, 'jurusan_id');
    }
}

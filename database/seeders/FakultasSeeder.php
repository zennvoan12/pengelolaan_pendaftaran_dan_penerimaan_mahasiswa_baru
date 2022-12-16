<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fakultas;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fakultas = [
            [
                'kode_fakultas' => 'FT',
                'nama_fakultas' => 'Fakultas Teknik'
            ],
            [
                'kode_fakultas' => 'FEBI',
                'nama_fakultas' => 'Fakultas Ekonomi Bisnis Islam'
            ],
            [
                'kode_fakultas' => 'FASTER',
                'nama_fakultas' => 'Fakultas Sains Terapan'
            ],
            [
                'kode_fakultas' => 'FH',
                'nama_fakultas' => 'Fakultas Hukum'
            ],
            [
                'kode_fakultas' => 'FKIP',
                'nama_fakultas' => 'Fakultas Keguruan Ilmu Pendidikan'
            ]
            ];
            foreach ($fakultas as $value){
                Fakultas::create($value);
            }
    }
}

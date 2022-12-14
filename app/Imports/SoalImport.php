<?php

namespace App\Imports;

use App\Models\Soal;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SoalImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        $soal = $row['soal'];
        $jawaban_benar = $row['jawaban_benar'];
        $pilihan_jawaban = $row['pilihan_jawaban'];
        return new Soal([
            'soal' => $soal,
            'jawaban_benar' => $jawaban_benar,
            'pilihan_jawaban' => $pilihan_jawaban
        ]);
    }
}

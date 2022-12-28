<?php

namespace App\Exports;

use App\Models\Pendaftar;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PendaftarExport implements FromArray, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function array(): array
    {
        return Pendaftar::getDataPendaftar();
    }

    public function headings(): array
    {
        return [
            'No',
            'No Registrasi',
            'Nama',
            'Jurusan',
            'Gelombang',
            'Status'
        ];
    }
}
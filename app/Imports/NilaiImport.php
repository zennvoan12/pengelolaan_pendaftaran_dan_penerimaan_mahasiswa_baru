<?php

namespace App\Imports;

use App\Models\Pendaftar;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\DB;

class NilaiImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // $detail = Pendaftar::find($row['no_reg']);
            // $detail->nilai_ujian = $row['nilai_ujian'];
            // $detail->update();
            $nilai = $row['nilai_ujian'];
            $id = $row['no_reg'];
            DB::table('pendaftars')->where('no_reg', '=', $id)->update(
                ['nilai_ujian' => $nilai]);
        }
    }
}

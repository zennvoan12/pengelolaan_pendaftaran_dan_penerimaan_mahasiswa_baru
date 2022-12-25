<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PendaftarExport;

class SeleksiController extends Controller
{
    public function index()
    {
        $calonMhs = Pendaftar::all();
            return view('seleksi.index', compact('calonMhs'));
    }
    public function seleksi(Request $request)
    {
        $pendaftar = Pendaftar::get();
        foreach ($pendaftar as $item) {
            $id = $item->no_reg;
            $ujian = $item->nilai_ujian;
            $indonesia = $item->nilai_indonesia;
            $nilaiIndonesia = explode("," , $indonesia);
            $total_indonesia = array_sum($nilaiIndonesia);
            $inggris = $item->nilai_inggris;
            $nilaiinggris = explode("," , $inggris);
            $total_inggris = array_sum($nilaiinggris);
            $mtk = $item->nilai_mtk;
            $nilaimtk = explode("," , $mtk);
            $total_mtk = array_sum($nilaimtk);
            $total_nilai = [$total_mtk, $total_indonesia , $total_inggris , $ujian];
            $patokan = array_sum($total_nilai);
            if ($patokan >= 800) {
                $datasave = [
                    'lulus' => 1,
                ];
                DB::table('pendaftars')->where('no_reg', '=', $id)->update($datasave);
            } else{
                $datasave = [
                    'lulus' => 0,
                ];
                DB::table('pendaftars')->where('no_reg', '=', $id)->update($datasave);
            }
        }
        return redirect()->back();
        // $id = $request->id;
        // for($i = 0; $i<count($id); $i++){
        //     $datasave = [
        //         'total_nilai' => $request['nilai'][$i]
        //     ];
        //     DB::table('pendaftars')->where('no_reg', '=', $id[$i])->update($datasave);
        // }
        // $pendaftar = Pendaftar::get();
        // foreach ($pendaftar as $value)
        // {
        //     DB::table('pendaftars')->where('total_nilai', '>', '899')->update([
        //         'lulus' => 1
        //     ]);
        // }
        // return redirect()->back();
    }
    public function export()
    {
        return Excel::download(new PendaftarExport, 'pendaftar_yang_lulus.xlsx');
    }
}

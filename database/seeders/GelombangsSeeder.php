<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GelombangsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Gelombang 1', 'Gelombang 2', 'Gelombang 3'];
        foreach($data as $value => $item){
            DB::table('gelombangs')->insert([
                'id_gelombang' => $value+1,
                'nama_gelombang' => $item
            ]);
        }
    }
}

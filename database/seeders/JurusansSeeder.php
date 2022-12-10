<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jurusan;


class JurusansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ft = ['Teknik Informatika' , 'Teknik Sipil', 'Teknik Industri'];
        $faster = ['Agri Bisnis' , 'Agro Teknologi' , 'Administrasi Bisnis Internasional'];
        $febi = ['Ekonomi Syariah' , 'Perbankan Syariah' , 'Akuntansi Syariah'];
        $fkip = ['Pendidikan Sastra dan Bahasa Indonesia',
                 'Pendidikan Pancasila dan Kewarganegaraan',
                 'Pendidikan Matematika',
                 'Pendidikan Jasmani Kesehatan dan Rekreasi',
                 'Pendidikan Bahasa Inggris'];

        Jurusan::create([
            'kode_jurusan' => 'fh-' . rand(00000, 99999),
            'nama_jurusan' => 'Ilmu Hukum',
            'fakultas_kode' => 'FH'
        ]);
        foreach($ft as $value){
            $kode = null;
            $kode = rand(00000, 99999);
            $data = [
                'kode_jurusan' => 'ft-' . $kode,
                'nama_jurusan' => $value,
                'fakultas_kode' => 'FT'
            ];
        Jurusan::create($data);
        }
        foreach($faster as $value){
            $kode = null;
            $kode = rand(00000, 99999);
            $data = [
                'kode_jurusan' => 'faster-' . $kode,
                'nama_jurusan' => $value,
                'fakultas_kode' => 'FASTER'
            ];
        Jurusan::create($data);
        }
        foreach($febi as $value){
            $kode = null;
            $kode = rand(00000, 99999);
            $data = [
                'kode_jurusan' => 'febi-' . $kode,
                'nama_jurusan' => $value,
                'fakultas_kode' => 'FEBI'
            ];
        Jurusan::create($data);
        }
        foreach($fkip as $value){
            $kode = null;
            $kode = rand(00000, 99999);
            $data = [
                'kode_jurusan' => 'fkip-' . $kode,
                'nama_jurusan' => $value,
                'fakultas_kode' => 'FKIP'
            ];
        Jurusan::create($data);
        }
    }
}
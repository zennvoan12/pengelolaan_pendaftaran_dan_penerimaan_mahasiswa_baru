<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as faker;
use App\Models\User;
use App\Models\Jurusan;
use Illuminate\Support\Facades\DB;

class PendaftarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $user = User::all();
        foreach ($user as $item) {
            $jurusan = Jurusan::inRandomOrder()->first();
                $x = 0;
                $nilaiIndonesia = null;
                        $nilaiInggris = null;
                        $nilaiMtk = null;
                    while($x <= 4) {
                        $nilaiIndonesia[] = rand(00 , 99);
                        $nilaiInggris[] = rand(00 , 99);
                        $nilaiMtk[] = rand(00, 99);
                        $x++;
                    }
                    $mtk = implode(",", $nilaiMtk);
                    $inggris = implode(",", $nilaiInggris);
                    $indonesia = implode(",", $nilaiIndonesia);
    
                    $id = $item['id'];
                    $email = $item['email'];
                            DB::table('pendaftars')->insert([
                                'no_reg' => rand(0000000000 , 9999999999),
                                'nama' => $faker->name,
                                'nik' => rand(0000000000000000, 1000000000000000),
                                'tempat_lahir' => $faker->city,
                                'tanggal_lahir' => $faker->date,
                                'jenis_kelamin' => $faker->randomElement([1 , 2]),
                                'kewarganegaraan' => $faker->randomElement(['WNI', 'WNA']),
                                'agama' => $faker->randomElement(['Islam', 'Katolik', 'Protestas', 'Hindu', 'Buddha']),
                                'nama_ibu' => $faker->name,
                                'email_daftar' => $email,
                                'no_telp' => rand(00000000000, 20000000000),
                                'alamat' => $faker->address,
                                'kode_pos' => $faker->postcode,
                                'pendidikan' => $faker->randomElement(['SMA', 'SMK']),
                                'asal_sekolah' => $faker->randomElement(['SMK BPC', 'SMK ABC', 'SMA IBU', 'SMA DUA']),
                                'nilai_indonesia' => $indonesia,
                                'nilai_inggris' => $inggris,
                                'nilai_mtk' => $mtk,
                                'jurusan_kode' => $jurusan->kode_jurusan,
                                'fakultas_kode' => $jurusan->fakultas_kode,
                                'user_id' => $id,
                                'gelombang_id' => 1
                            ]);

                        }
    }
}
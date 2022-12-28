<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->char('no_reg', 10);
            $table->string('nama', 50);
            $table->char('nik', 50)->unique();
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->char('jenis_kelamin', 1);
            $table->char('kewarganegaraan', 3);
            $table->string('agama', 10);
            $table->string('nama_ibu', 50);
            $table->char('email_daftar', 50)->unique();
            $table->char('no_telp', 15)->unique();
            $table->string('alamat', 255);
            $table->char('kode_pos', 5);
            $table->char('pendidikan', 3);
            $table->string('asal_sekolah', 100);
            $table->string('nilai_indonesia', 15);
            $table->string('nilai_inggris', 15);
            $table->string('nilai_mtk', 15);
            $table->char('jurusan_kode', 15);
            $table->char('gelombang_id');
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            $table->primary('no_reg');

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('jurusan_kode')->references('kode_jurusan')->on('jurusans')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('gelombang_id')->references('id_gelombang')->on('gelombangs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftars');
    }
}
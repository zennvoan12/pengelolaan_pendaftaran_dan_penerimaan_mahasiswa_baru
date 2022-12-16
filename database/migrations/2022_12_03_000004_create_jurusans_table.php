<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurusansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurusans', function (Blueprint $table) {
            $table->char('kode_jurusan', 15);
            $table->string('nama_jurusan', 50);
            $table->char('fakultas_kode', 10);
            $table->timestamps();
            $table->primary('kode_jurusan');

            $table->foreign('fakultas_kode')->references('kode_fakultas')->on('fakultas')
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
        Schema::dropIfExists('jurusans');
    }
}

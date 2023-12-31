<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seminar', function (Blueprint $table) {
            $table->id();
            $table->string("mahasiswa_nim");
            $table->string("mahasiswa_nama");
            $table->string("tahun_ajaran");
            $table->dateTime("waktu_seminar");
            $table->string("no_berita_acara");
            $table->string("path_lampiran");
            $table->string("path_foto_kegiatan");
            $table->integer("user_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seminar');
    }
};

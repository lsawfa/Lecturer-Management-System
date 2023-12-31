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
        Schema::create('kelas_aktivitas', function (Blueprint $table) {
            $table->id();
            $table->string('kelas_matkul');
            $table->string('kelas_nama');
            $table->dateTime('kelas_waktu');
            $table->integer('kelas_sks');
            $table->integer('aktivitas_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas_aktivitas');
    }
};

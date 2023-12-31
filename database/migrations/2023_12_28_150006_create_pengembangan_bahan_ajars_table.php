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
        Schema::create('pengembangan_bahan_ajars', function (Blueprint $table) {
            $table->id();
            $table->string("jenis_bahan_ajar");
            $table->string("deskripsi_bahan_ajar");
            $table->string("hasil_pengembangan");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengembangan_bahan_ajars');
    }
};

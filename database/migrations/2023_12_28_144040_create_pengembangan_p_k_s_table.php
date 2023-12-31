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
        Schema::create('pengembangan_p_k_s', function (Blueprint $table) {
            $table->id();
            $table->string("matkul_pengembangan");
            $table->string("deskripsi_pengembangan");
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
        Schema::dropIfExists('pengembangan_p_k_s');
    }
};

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
        Schema::create('user_data', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('user_tempat_lahir');
            $table->date('user_tanggal_lahir');
            $table->string('user_nidn');
            $table->string('user_golongan');
            $table->string('user_pangkat');
            $table->string('user_pendidikan_terkahir');
            $table->string('user_pendidikans1');
            $table->string('user_pendidikans2');
            $table->string('user_pendidikans3');
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_data');
    }
};

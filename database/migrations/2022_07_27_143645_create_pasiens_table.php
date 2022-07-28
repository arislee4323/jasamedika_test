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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_pasien');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('rt');
            $table->string('rw');
            $table->unsignedBigInteger('kelurahan_id');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->foreign('kelurahan_id')->references('id')->on('kelurahans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasiens');
    }
};

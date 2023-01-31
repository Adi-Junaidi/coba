<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelayananInformasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelayanan_informasis', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('materi_id');
            $table->foreignId('laporan_id');
            $table->date('tanggal');
            $table->string('nama');
            $table->string('materi_lainnya');
            $table->string('jabatan_narsum');
            $table->string('narsum');
            $table->integer('jumlah_peserta');
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
        Schema::dropIfExists('pelayanan_informasis');
    }
}

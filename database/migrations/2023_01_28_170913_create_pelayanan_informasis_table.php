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
            $table->id();
            $table->foreignId('pikr_id');
            $table->foreignId('materi_id')->default(0);
            $table->foreignId('laporan_id');
            $table->date('tanggal');
            $table->string('nama');
            $table->string('materi_lainnya')->nullable();
            $table->string('narsum');
            $table->string('jabatan_narsum');
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

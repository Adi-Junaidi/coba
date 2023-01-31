<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonselingKelompoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konseling_kelompoks', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('materi_id');
            $table->foreignId('pengurus_id');
            $table->foreignId('laporan_id');
            $table->date('tanggal');
            $table->integer('jumlah_cowok');
            $table->integer('jumlah_cewek');
            $table->integer('jumlah_rawal');
            $table->integer('jumlah_rtengah');
            $table->integer('jumlah_rakhir');
            $table->string('materi_lainnya');
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
        Schema::dropIfExists('konseling_kelompoks');
    }
}

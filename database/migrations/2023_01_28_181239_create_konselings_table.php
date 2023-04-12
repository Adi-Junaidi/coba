<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonselingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konselings', function (Blueprint $table) {
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
            $table->string('materi_lainnya')->nullable();
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
        Schema::dropIfExists('konselings');
    }
}

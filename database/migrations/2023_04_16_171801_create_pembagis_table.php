<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembagisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembagi_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pikr_id');
            $table->integer('materi');
            $table->integer('narasumber');
            $table->integer('peserta_pelayanan');
            $table->integer('peserta_ki');
            $table->integer('peserta_kk');
            $table->integer('artikel');
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
        Schema::dropIfExists('pembagis');
    }
}

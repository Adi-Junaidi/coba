<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pikr_id');
            $table->integer('materi_pelayanan')->default(0);
            $table->integer('narasumber_pelayanan')->default(0);
            $table->integer('peserta_pelayanan')->default(0);
            $table->integer('materi_ki')->default(0);
            $table->integer('peserta_ki')->default(0);
            $table->integer('materi_kk')->default(0);
            $table->integer('peserta_kk')->default(0);
            $table->integer('artikel')->default(0);
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
        Schema::dropIfExists('points');
    }
}

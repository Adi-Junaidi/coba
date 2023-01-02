<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriPikrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // ini tabel pivot untuk materi dan pikr, insya allah sudah bisa digunakan

        Schema::create('materi_pikr', function (Blueprint $table) {
            $table->integer('pikr_id')->unsigned();
            $table->integer('materi_id')->unsigned();
            $table->foreign('pikr_id')->references('id')->on('pikrs')->onDelete('cascade');
            $table->foreign('materi_id')->references('id')->on('materis')->onDelete('cascade');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materi_pikrs');
    }
}

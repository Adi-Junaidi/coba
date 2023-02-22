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
            $table->foreignId('pikr_id');
            $table->foreignId('materi_id');
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

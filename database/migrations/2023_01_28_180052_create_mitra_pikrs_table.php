<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitraPikrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitra_pikr', function (Blueprint $table) {
            $table->foreignId('pikr_id');
            $table->foreignId('mitra_id');
            $table->string('mou');
            $table->string('bentuk_kerjasama');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mitra_pikrs');
    }
}

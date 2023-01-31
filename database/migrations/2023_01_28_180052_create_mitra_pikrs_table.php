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
            $table->integer('pikr_id')->unsigned();
            $table->integer('mitra_id')->unsigned();
            $table->foreign('pikr_id')->references('id')->on('pikrs')->onDelete('cascade');
            $table->foreign('mitra_id')->references('id')->on('mitras')->onDelete('cascade');
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

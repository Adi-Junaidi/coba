<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePikrSaranasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pikr_sarana', function (Blueprint $table) {
            $table->integer('pikr_id')->unsigned();
            $table->integer('sarana_id')->unsigned();
            $table->foreign('pikr_id')->references('id')->on('pikrs')->onDelete('cascade');
            $table->foreign('sarana_id')->references('id')->on('saranas')->onDelete('cascade');
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
        Schema::dropIfExists('pikr_saranas');
    }
}

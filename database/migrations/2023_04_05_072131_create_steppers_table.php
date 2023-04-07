<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSteppersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('steppers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pikr_id');
            $table->boolean('step_1')->default(false);
            $table->boolean('step_2')->default(false);
            $table->boolean('step_3')->default(false);
            $table->boolean('step_4')->default(false);
            $table->boolean('step_5')->default(false);
            $table->boolean('step_6')->default(false);
            $table->string('current_step')->default('');
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
        Schema::dropIfExists('steppers');
    }
}

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
            $table->boolean('identitas')->default(true);
            $table->boolean('informasi')->default(false);
            $table->boolean('materi')->default(false);
            $table->boolean('sarana')->default(false);
            $table->string('current_step')->default('Incomplete');
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

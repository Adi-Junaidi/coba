<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembinasTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('pembinas', function (Blueprint $table) {
      $table->id();
      $table->foreignId('jabatan_id')->nullable();
      $table->foreignId('desa_id');
      $table->string('no_register');
      $table->string('nama');
      $table->string('no_urut');
      $table->string('jabatan_lainnya')->nullable();
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
    Schema::dropIfExists('pembinas');
  }
}

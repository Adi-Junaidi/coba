<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePikrsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('pikrs', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id');
      $table->foreignId('desa_id');
      $table->foreignId('sk_id');
      $table->foreignId('pembina_id'); // untuk jabatan dan jabatan lainnya itu merupakan properti dari pembina, jadi dia tersimpan di table pembina
      $table->string('no_register');
      $table->string('nama'); //
      $table->string('no_urut');
      $table->string('alamat'); //
      $table->string('basis'); //
      $table->boolean('punya_medsos')->default(false);
      $table->string('akun_medsos'); //
      $table->string('sumber_dana'); //
      $table->boolean('keterpaduan_kelompok')->default(false);
      $table->boolean('pro_pn')->default(false);
      $table->string('materi_lainnya');
      $table->string('sarana_lainnya');
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
    Schema::dropIfExists('pikrs');
  }
}

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
      $table->foreignId('sk_id')->nullable();
      $table->foreignId('pembina_id');
      $table->string('no_register')->default('0000000000');
      $table->string('nama');
      $table->string('no_urut')->default('000');
      $table->string('alamat');
      $table->string('basis');
      $table->string('sumber_dana')->default('Tidak Ada');
      $table->string('akun_medsos')->nullable();
      $table->boolean('keterpaduan_kelompok')->default(false);
      $table->boolean('pro_pn')->default(false);
      $table->string('materi_lainnya')->default(false);
      $table->string('sarana_lainnya')->default(false);
      $table->boolean('verified')->default(false);
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

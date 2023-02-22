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
            $table->foreignId('desa_id'); //
            $table->foreignId('sk_id'); //
            $table->foreignId('pembina_id'); //
            $table->foreignId('jabatan_id'); //
            $table->string('no_register');
            $table->string('nama'); //
            $table->string('no_urut');
            $table->string('alamat'); //
            $table->string('basis'); //
            $table->string('punya_medsos'); //
            $table->string('akun_medsos'); //
            $table->string('sumber_dana'); //
            $table->string('keterpaduan_kelompok'); //
            $table->string('pro_pn'); //
            $table->string('materi_lainnya');
            $table->string('sarana_lainnya');
            $table->string('jabatan_lainnya'); //
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

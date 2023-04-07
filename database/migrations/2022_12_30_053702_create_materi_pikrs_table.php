<?php

use App\Models\Materi;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
        Schema::create('materi_pikrs', function (Blueprint $table) {
            $materi = [
                "pubertas",
                "seksualitas",
                "reproduksi",
                "kesehatan_dan_gizi_remaja",
                "perilaku_beresiko",
                "tindakan_berbahaya",
                "persiapan_pernikahan",
                "perkembangan_keluarga",
                "pengasuhan_keluarga_sehat",
                "soft_skill",
                "hard_skill"
            ];

            $table->id();
            $table->foreignId('pikr_id');
            foreach ($materi as $m) {
                $table->boolean($m);
            }
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
        Schema::dropIfExists('materi_pikrs');
    }
}

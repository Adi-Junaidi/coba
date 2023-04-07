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

        Schema::create('pikr_saranas', function (Blueprint $table) {
            $sarana = [
                "ruang_sekretariat",
                "ruang_khusus_konseling",
                "papan_nama",
                "leaflet",
                "poster",
                "genre_kit",
                "pedoman_pengelolaan_pik_r",
                "modul_fasilitator_pik_r",
                "buku_pegangan_ps",
                "modul_tentang_kita",
                "lembar_balik",
                "buku_komik_berseri"
            ];

            $table->foreignId('pikr_id');
            foreach ($sarana as $item) {
                $table->boolean($item);
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
        Schema::dropIfExists('pikr_saranas');
    }
}

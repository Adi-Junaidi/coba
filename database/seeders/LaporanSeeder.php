<?php

namespace Database\Seeders;

use App\Models\Laporan;
use Illuminate\Database\Seeder;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Laporan::create([
            "pikr_id" => "1",
            "bulan_lapor" => "5",
            "tahun_lapor" => "2022",
        ]);
        Laporan::create([
            "pikr_id" => "1",
            "bulan_lapor" => "3",
            "tahun_lapor" => "2022",
        ]);
        Laporan::create([
            "pikr_id" => "1",
            "bulan_lapor" => "4",
            "tahun_lapor" => "2022",
        ]);

    }
}

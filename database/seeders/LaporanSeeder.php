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
            "bulan" => "5",
            "tahun" => "2022",
        ]);
        Laporan::create([
            "pikr_id" => "1",
            "bulan" => "3",
            "tahun" => "2022",
        ]);
        Laporan::create([
            "pikr_id" => "1",
            "bulan" => "4",
            "tahun" => "2022",
        ]);

    }
}

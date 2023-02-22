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
            "tanggal" => "2022-12-22",
        ]);

        Laporan::create([
            "pikr_id" => "1",
            "tanggal" => "2022-11-22",
        ]);

        Laporan::create([
            "pikr_id" => "1",
            "tanggal" => "2022-10-22",
        ]);
    }
}

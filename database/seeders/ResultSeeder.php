<?php

namespace Database\Seeders;

use App\Models\Result;
use Illuminate\Database\Seeder;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Result::create([
            "pikr_id" => "1",
            "criteria_id" => "1",
            "bulan_tahun" => "01-2023", // formatnya YYYY-MM-DD
            "point" => "2.00"
        ]);
        Result::create([
            "pikr_id" => "1",
            "criteria_id" => "2",
            "bulan_tahun" => "01-2023", // formatnya YYYY-MM-DD
            "point" => "4.00"
        ]);
        Result::create([
            "pikr_id" => "1",
            "criteria_id" => "3",
            "bulan_tahun" => "01-2023", // formatnya YYYY-MM-DD
            "point" => "123.00"
        ]);
        Result::create([
            "pikr_id" => "1",
            "criteria_id" => "4",
            "bulan_tahun" => "01-2023", // formatnya YYYY-MM-DD
            "point" => "3.00"
        ]);
        Result::create([
            "pikr_id" => "1",
            "criteria_id" => "5",
            "bulan_tahun" => "01-2023", // formatnya YYYY-MM-DD
            "point" => "4.00"
        ]);
        Result::create([
            "pikr_id" => "1",
            "criteria_id" => "6",
            "bulan_tahun" => "01-2023", // formatnya YYYY-MM-DD
            "point" => "3.00"
        ]);
        Result::create([
            "pikr_id" => "1",
            "criteria_id" => "7",
            "bulan_tahun" => "01-2023", // formatnya YYYY-MM-DD
            "point" => "4.00"
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Point;
use Illuminate\Database\Seeder;

class PointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Point::create([
            "pikr_id" => "1",
            "criteria_id" => "1",
            "bulan_tahun" => "01-2023", // formatnya YYYY-MM-DD
            "point" => "2.00"
        ]);
        Point::create([
            "pikr_id" => "1",
            "criteria_id" => "2",
            "bulan_tahun" => "01-2023", // formatnya YYYY-MM-DD
            "point" => "4.00"
        ]);
        Point::create([
            "pikr_id" => "1",
            "criteria_id" => "3",
            "bulan_tahun" => "01-2023", // formatnya YYYY-MM-DD
            "point" => "123.00"
        ]);
        Point::create([
            "pikr_id" => "1",
            "criteria_id" => "4",
            "bulan_tahun" => "01-2023", // formatnya YYYY-MM-DD
            "point" => "3.00"
        ]);
        Point::create([
            "pikr_id" => "1",
            "criteria_id" => "5",
            "bulan_tahun" => "01-2023", // formatnya YYYY-MM-DD
            "point" => "4.00"
        ]);
        Point::create([
            "pikr_id" => "1",
            "criteria_id" => "6",
            "bulan_tahun" => "01-2023", // formatnya YYYY-MM-DD
            "point" => "3.00"
        ]);
        Point::create([
            "pikr_id" => "1",
            "criteria_id" => "7",
            "bulan_tahun" => "01-2023", // formatnya YYYY-MM-DD
            "point" => "4.00"
        ]);

        Point::create([
            "pikr_id" => "1",
            "criteria_id" => "8",
            "bulan_tahun" => "01-2023", // formatnya YYYY-MM-DD
            "point" => "4.00"
        ]);

        Point::create([
            "pikr_id" => "2 ",
            "criteria_id" => "1",
            "bulan_tahun" => "01-2023", // formatnya YYYY-MM-DD
            "point" => "2.00"
        ]);
        Point::create([
            "pikr_id" => "2",
            "criteria_id" => "2",
            "bulan_tahun" => "01-2023", // formatnya YYYY-MM-DD
            "point" => "4.00"
        ]);
        Point::create([
            "pikr_id" => "2",
            "criteria_id" => "3",
            "bulan_tahun" => "01-2023", // formatnya YYYY-MM-DD
            "point" => "123.00"
        ]);
        Point::create([
            "pikr_id" => "2",
            "criteria_id" => "4",
            "bulan_tahun" => "01-2023", // formatnya YYYY-MM-DD
            "point" => "3.00"
        ]);
        Point::create([
            "pikr_id" => "2",
            "criteria_id" => "5",
            "bulan_tahun" => "01-2023", // formatnya YYYY-MM-DD
            "point" => "4.00"
        ]);
        Point::create([
            "pikr_id" => "2",
            "criteria_id" => "6",
            "bulan_tahun" => "01-2023", // formatnya YYYY-MM-DD
            "point" => "3.00"
        ]);
        Point::create([
            "pikr_id" => "2",
            "criteria_id" => "7",
            "bulan_tahun" => "01-2023", // formatnya YYYY-MM-DD
            "point" => "4.00"
        ]);
        Point::create([
            "pikr_id" => "2",
            "criteria_id" => "8",
            "bulan_tahun" => "01-2023", // formatnya YYYY-MM-DD
            "point" => "5.00"
        ]);
    }
}

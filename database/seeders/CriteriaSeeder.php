<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Criteria::create([
            "nama" => "Materi Pelayanan Informasi",
            "status" => "benefit",
            "bobot" => 5,
            "normalisasi" => 0.05
        ]);
        
        Criteria::create([
            "nama" => "Narasumber Pelayanan Informasi",
            "status" => "benefit",
            "bobot" => 5,
            "normalisasi" => 0.05
        ]);
        
        Criteria::create([
            "nama" => "Peserta Pelayanan Informasi",
            "status" => "benefit",
            "bobot" => 30,
            "normalisasi" => 0.3
        ]);
        
        Criteria::create([
            "nama" => "Materi Konseling Individu",
            "status" => "benefit",
            "bobot" => 5,
            "normalisasi" => 0.05
        ]);

        Criteria::create([
            "nama" => "Peserta Konseling Individu",
            "status" => "benefit",
            "bobot" => 10,
            "normalisasi" => 0.1
        ]);
        
        Criteria::create([
            "nama" => "Materi Konseling Kelompok",
            "status" => "benefit",
            "bobot" => 5,
            "normalisasi" => 0.5
        ]);

        Criteria::create([
            "nama" => "Peserta Konseling Kelompok",
            "status" => "benefit",
            "bobot" => 20,
            "normalisasi" => 0.2
        ]);

        Criteria::create([
            "nama" => "Artikel",
            "status" => "benefit",
            "bobot" => 20,
            "normalisasi" => 0.2
        ]);

    }
}

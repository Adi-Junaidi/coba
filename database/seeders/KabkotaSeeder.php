<?php

namespace Database\Seeders;

use App\Models\Kabkota;
use Illuminate\Database\Seeder;

class KabkotaSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Kabkota::create([
      "nama" => "Kabupaten Gorontalo",
      "kode" => "01",
      "provinsi_id" => "1"
    ]);

    Kabkota::create([
      "nama" => "Kabupaten Boalemo",
      "kode" => "02",
      "provinsi_id" => "1"
    ]);

    Kabkota::create([
      "nama" => "Kabupaten Bone Bolango",
      "kode" => "03",
      "provinsi_id" => "1"
    ]);

    Kabkota::create([
      "nama" => "Kabupaten Pohuwato",
      "kode" => "04",
      "provinsi_id" => "1"
    ]);

    Kabkota::create([
      "nama" => "Kabupaten Gorontalo Utara",
      "kode" => "05",
      "provinsi_id" => "1"
    ]);

    Kabkota::create([
      "nama" => "Kota Gorontalo",
      "kode" => "71",
      "provinsi_id" => "1"
    ]);
  }
}

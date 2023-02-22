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
      "kode" => "1",
      "provinsi_id" => "1"
    ]);

    Kabkota::create([
      "nama" => "Kabupaten Boalemo",
      "kode" => "2",
      "provinsi_id" => "1"
    ]);

    Kabkota::create([
      "nama" => "Kabupaten Bone Bolango",
      "kode" => "3",
      "provinsi_id" => "1"
    ]);

    Kabkota::create([
      "nama" => "Kabupaten Pohuwato",
      "kode" => "4",
      "provinsi_id" => "1"
    ]);

    Kabkota::create([
      "nama" => "Kabupaten Gorontalo Utara",
      "kode" => "5",
      "provinsi_id" => "1"
    ]);

    Kabkota::create([
      "nama" => "Kota Gorontalo",
      "kode" => "71",
      "provinsi_id" => "1"
    ]);
  }
}

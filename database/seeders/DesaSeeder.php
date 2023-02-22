<?php

namespace Database\Seeders;

use App\Models\Desa;
use Illuminate\Database\Seeder;

class DesaSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // Kecamatan Limboto | id: 1
    Desa::create([
      "nama" => "Kayu Bulan",
      "kode" => "01",
      "kecamatan_id" => 1
    ]);
    Desa::create([
      "nama" => "Kayu Merah",
      "kode" => "02",
      "kecamatan_id" => 1
    ]);
    Desa::create([
      "nama" => "Hunggaluwa",
      "kode" => "03",
      "kecamatan_id" => 1
    ]);

    // Kecamatan Kota Barat | id: 20 | temporary data
    Desa::create([
      "nama" => "Buladu",
      "kode" => "01",
      "kecamatan_id" => 20
    ]);

    // Kecamatan Kota Selatan | id: 21 | temporary data
    Desa::create([
      "nama" => "Biawu",
      "kode" => "01",
      "kecamatan_id" => 21
    ]);

    // Kecamatan Kota Utara | id: 22 | temporary data
    Desa::create([
      "nama" => "Dulomo",
      "kode" => "01",
      "kecamatan_id" => 22
    ]);
  }
}

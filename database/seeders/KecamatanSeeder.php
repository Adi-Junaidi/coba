<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Kecamatan::create([
      "nama" => "Kota Barat",
      "kode" => "01",
      "kabkota_id" => "1"
    ]);

    Kecamatan::create([
      "nama" => "Kota Selatan",
      "kode" => "02",
      "kabkota_id" => "1"
    ]);

    Kecamatan::create([
      "nama" => "Kota Utara",
      "kode" => "03",
      "kabkota_id" => "1"
    ]);
  }
}

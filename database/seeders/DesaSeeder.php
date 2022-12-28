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
    Desa::create([
      "nama" => "Buladu",
      "kode" => "01",
      "kecamatan_id" => "1"
    ]);

    Desa::create([
      "nama" => "Biawu",
      "kode" => "01",
      "kecamatan_id" => "2"
    ]);

    Desa::create([
      "nama" => "Dulomo",
      "kode" => "01",
      "kecamatan_id" => "3"
    ]);
  }
}

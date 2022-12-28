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
      "nama" => "Kota Gorontalo",
      "kode" => "71",
      "provinsi_id" => "1"
    ]);
  }
}

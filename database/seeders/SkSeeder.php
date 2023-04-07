<?php

namespace Database\Seeders;

use App\Models\Sk;
use Illuminate\Database\Seeder;

class SkSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Sk::create([
      "pikr_id" => "25",
      "no_sk" => "25",
      "tanggal_sk" => "2012-12-12", // formatnya YYYY-MM-DD
      "dikeluarkan_oleh" => "OPD-KB"
    ]);
  }
}

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
      "status" => "ada",
      "no_sk" => "25",
      "tanggal_sk" => "12 Desember 2012",
      "dikeluarkan_oleh" => "OPD-KB"
    ]);
  }
}

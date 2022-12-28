<?php

namespace Database\Seeders;

use App\Models\Pembina;
use Illuminate\Database\Seeder;

class PembinaSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Pembina::create([
      "no_register" => "757101B02",
      "nama" => "Dewi H. Yasin, Amd.Kom",
      "no_urut" => "02",
      "jabatan_id" => "1",
      "desa_id" => "1"
    ]);

    Pembina::create([
      "no_register" => "757102B01",
      "nama" => "Mirah Delima, SKM",
      "no_urut" => "01",
      "jabatan_id" => "1",
      "desa_id" => "2"
    ]);

    Pembina::factory(20)->create();
  }
}

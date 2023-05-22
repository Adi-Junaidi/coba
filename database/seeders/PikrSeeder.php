<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Desa;
use App\Models\Pembina;
use App\Models\Pikr;
use App\Models\Stepper;
use App\Models\User;
use Database\Factories\PikrFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PikrSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Pikr::create([
      "user_id" => User::create([
        "nama" => "PIK-R As-Salam",
        "username" => "pikr",
        "email" => "assalaam@gmail.com",
        "password" => Hash::make("12345678")
      ])->id,
      "no_register" => "7571075002",
      "nama" => "PIK-R As-Salam",
      "no_urut" => "002",
      "alamat" => "Jl. Poigar",
      "basis" => "SMA/Sederajat",
      "akun_medsos" => "Instagram (@pikr-assalam)",
      "desa_id" => 1,
      "pembina_id" => 1,
      "verified" => true
    ]);

    Pikr::factory(100)->create()->each(function ($pikr) {
      $title = "Judul Artikel $pikr->nama";
      $slug = preg_replace('/\W/', '-', strtolower($title));
      Article::create([
        "pikr_id" => $pikr->id,
        "title" => $title,
        "slug" => $slug,
        "image" => "",
        "body" => "Lorem ipsum dolor sit amet consectetur adispisicing elit.",
        "bulan_tahun" => "Januari 2023"
      ]);
    });
  }
}

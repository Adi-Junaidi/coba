<?php

namespace Database\Seeders;

use App\Models\Pikr;
use App\Models\User;
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
      "basis" => "Pendidikan - SMA/Setara",
      "akun_medsos" => "Instagram (@pikr-assalam)",
      "sumber_dana" => "lainnya",
      "keterpaduan_kelompok" => true,
      "pro_pn" => true,
      "materi_lainnya" => "",
      "sarana_lainnya" => "",
      "desa_id" => 1,
      "sk_id" => 1,
      "pembina_id" => 1
    ]);
  }
}

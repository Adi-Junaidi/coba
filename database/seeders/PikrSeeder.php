<?php

namespace Database\Seeders;

use App\Models\Pikr;
use App\Models\Stepper;
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
      "desa_id" => 1,
      "pembina_id" => 1,
    ]);

    // Stepper::create([
    //   'pikr_id' => '24',
    //   'step_1' => true,
    //   'current_step' => 'step_1',
    // ]);
  }
}

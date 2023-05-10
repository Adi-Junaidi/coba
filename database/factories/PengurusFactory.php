<?php

namespace Database\Factories;

use App\Models\Pikr;
use Illuminate\Database\Eloquent\Factories\Factory;

class PengurusFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $jabatan = [
      "Pembina",
      "Ketua",
      "Sekretaris",
      "Bendahara",
      "Ketua Bidang",
      "Pendidik Sebaya",
      "Konselor Sebaya",
      "Anggota",
    ];
    $jabatan = $jabatan[mt_rand(0, count($jabatan) - 1)];

    return [
      'pikr_id' => mt_rand(1, Pikr::count()),
      'nik' => $this->faker->numerify(str_repeat("#", 16)),
      'nama' => $this->faker->name(),
      'jabatan' => $jabatan,
      'no_hp' => $this->faker->phoneNumber(),
      'pernah_pelatihan' => mt_rand(0, 1)
    ];
  }
}

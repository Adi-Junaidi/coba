<?php

namespace Database\Factories;

use App\Models\Desa;
use App\Models\Pembina;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PikrFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $basis = [
      "SMP/Sederajat",
      "SMA/Sederajat",
      "Perguruan Tinggi",
      "Organisasi Keagamaan",
      "LSM/Organisasi Kepemudaan/Organisasi Kemasyarakatan"
    ];
    $basis = $basis[mt_rand(0, count($basis) - 1)];

    return [
      "user_id" => User::factory()->create()->id,
      "nama" => 'PIK-R ' . $this->faker->company(),
      "alamat" => $this->faker->address(),
      "basis" => $basis,
      "akun_medsos" => "",
      "keterpaduan_kelompok" => mt_rand(0, 1),
      "pro_pn" => mt_rand(0, 1),
      "desa_id" => mt_rand(1, Desa::count()),
      "pembina_id" => Pembina::factory()->create()->id
    ];
  }
}

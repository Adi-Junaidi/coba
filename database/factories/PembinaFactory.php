<?php

namespace Database\Factories;

use App\Models\Desa;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PembinaFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      "user_id" => User::factory()->create()->id,
      "nama" => $this->faker->name(),
      "jabatan_id" => 1,
      "desa_id" => mt_rand(1, Desa::count())
    ];
  }
}

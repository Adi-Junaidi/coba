<?php

namespace Database\Factories;

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
            "no_register" => $this->faker->numerify("######B##"),
            "nama" => $this->faker->name(),
            "no_urut" => $this->faker->randomNumber(2),
            "jabatan_id" => 1,
            "desa_id" => mt_rand(1, 3)
        ];
    }
}

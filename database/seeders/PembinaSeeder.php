<?php

namespace Database\Seeders;

use App\Models\Pembina;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
      "user_id" => User::create([
        "nama" => "Dewi H. Yasin, Amd.Kom",
        "username" => "pembina1",
        "email" => "pembina1@gmail.com",
        "password" => Hash::make('12345678'),
      ])->id,
      "nama" => "Dewi H. Yasin, Amd.Kom",
      "jabatan_id" => "1",
      "desa_id" => "1"
    ]);

    Pembina::create([
      "user_id" => User::create([
        "nama" => "Mirah Delima, SKM",
        "username" => "pembina2",
        "email" => "pembina2@gmail.com",
        "password" => Hash::make('12345678'),
      ])->id,
      "nama" => "Mirah Delima, SKM",
      "jabatan_id" => "1",
      "desa_id" => "2"
    ]);

    Pembina::factory(20)->create();
  }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    User::create([
      "nama" => "admin",
      "username" => "admin",
      "email" => "admin@gmail.com",
      "password" => bcrypt("12345678")
    ]);

    $this->call([
      JabatanSeeder::class,
      ProvinsiSeeder::class,
      KabkotaSeeder::class,
      KecamatanSeeder::class,
      DesaSeeder::class,
      PembinaSeeder::class,
      PikrSeeder::class,
      SkSeeder::class,
      MateriSeeder::class,
      SaranaSeeder::class,
      LaporanSeeder::class,
      PengurusSeeder::class,
      CriteriaSeeder::class,
      PointSeeder::class,
    ]);
  }
}

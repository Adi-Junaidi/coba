<?php

namespace Database\Seeders;

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
    $this->call([
      JabatanSeeder::class,
      ProvinsiSeeder::class,
      KabkotaSeeder::class,
      KecamatanSeeder::class,
      DesaSeeder::class,
      PembinaSeeder::class
    ]);
  }
}

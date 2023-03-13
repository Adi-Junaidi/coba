<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // Kabupaten Gorontalo | id: 1
    Kecamatan::create([
      "nama" => "Limboto",
      "kode" => "01",
      "kabkota_id" => 1
    ]);
    Kecamatan::create([
      "nama" => "Telaga",
      "kode" => "02",
      "kabkota_id" => 1
    ]);
    Kecamatan::create([
      "nama" => "Batudaa",
      "kode" => "03",
      "kabkota_id" => 1
    ]);
    Kecamatan::create([
      "nama" => "Tibawa",
      "kode" => "04",
      "kabkota_id" => 1
    ]);
    Kecamatan::create([
      "nama" => "Batudaa Pantai",
      "kode" => "05",
      "kabkota_id" => 1
    ]);
    Kecamatan::create([
      "nama" => "Boliyohuto",
      "kode" => "09",
      "kabkota_id" => 1
    ]);
    Kecamatan::create([
      "nama" => "Telaga Biru",
      "kode" => "10",
      "kabkota_id" => 1
    ]);
    Kecamatan::create([
      "nama" => "Bongomeme",
      "kode" => "11",
      "kabkota_id" => 1
    ]);
    Kecamatan::create([
      "nama" => "Tolangohula",
      "kode" => "13",
      "kabkota_id" => 1
    ]);
    Kecamatan::create([
      "nama" => "Mootilango",
      "kode" => "14",
      "kabkota_id" => 1
    ]);
    Kecamatan::create([
      "nama" => "Pulubala",
      "kode" => "16",
      "kabkota_id" => 1
    ]);
    Kecamatan::create([
      "nama" => "Limboto Barat",
      "kode" => "17",
      "kabkota_id" => 1
    ]);
    Kecamatan::create([
      "nama" => "Tilango",
      "kode" => "18",
      "kabkota_id" => 1
    ]);
    Kecamatan::create([
      "nama" => "Tabongo",
      "kode" => "19",
      "kabkota_id" => 1
    ]);
    Kecamatan::create([
      "nama" => "Biluhu",
      "kode" => "20",
      "kabkota_id" => 1
    ]);
    Kecamatan::create([
      "nama" => "Asparaga",
      "kode" => "21",
      "kabkota_id" => 1
    ]);
    Kecamatan::create([
      "nama" => "Talaga Jaya",
      "kode" => "22",
      "kabkota_id" => 1
    ]);
    Kecamatan::create([
      "nama" => "Bilato",
      "kode" => "23",
      "kabkota_id" => 1
    ]);
    Kecamatan::create([
      "nama" => "Dungaliyo",
      "kode" => "24",
      "kabkota_id" => 1
    ]);

    // Kabupaten Boalemo | id: 2
    Kecamatan::create([
      "nama" => "Paguyaman",
      "kode" => "01",
      "kabkota_id" => 2
    ]);
    Kecamatan::create([
      "nama" => "Wonosari",
      "kode" => "02",
      "kabkota_id" => 2
    ]);
    Kecamatan::create([
      "nama" => "Dulupi",
      "kode" => "03",
      "kabkota_id" => 2
    ]);
    Kecamatan::create([
      "nama" => "Tilamuta",
      "kode" => "04",
      "kabkota_id" => 2
    ]);
    Kecamatan::create([
      "nama" => "Mananggu",
      "kode" => "05",
      "kabkota_id" => 2
    ]);
    Kecamatan::create([
      "nama" => "Botumoito",
      "kode" => "06",
      "kabkota_id" => 2
    ]);
    Kecamatan::create([
      "nama" => "Paguyaman Pantai",
      "kode" => "07",
      "kabkota_id" => 2
    ]);

    // Kota Gorontalo | id: 6
    Kecamatan::create([
      "nama" => "Kota Barat",
      "kode" => "01",
      "kabkota_id" => 6
    ]);
    Kecamatan::create([
      "nama" => "Kota Selatan",
      "kode" => "02",
      "kabkota_id" => 6
    ]);
    Kecamatan::create([
      "nama" => "Kota Utara",
      "kode" => "03",
      "kabkota_id" => 6
    ]);
    Kecamatan::create([
      "nama" => "Dungingi",
      "kode" => "04",
      "kabkota_id" => 6
    ]);
    Kecamatan::create([
      "nama" => "Kota Timur",
      "kode" => "05",
      "kabkota_id" => 6
    ]);
    Kecamatan::create([
      "nama" => "Kota Tengah",
      "kode" => "06",
      "kabkota_id" => 6
    ]);
    Kecamatan::create([
      "nama" => "Sipatana",
      "kode" => "07",
      "kabkota_id" => 6
    ]);
    Kecamatan::create([
      "nama" => "Dumbo Raya",
      "kode" => "08",
      "kabkota_id" => 6
    ]);
    Kecamatan::create([
      "nama" => "Hulonthalangi",
      "kode" => "09",
      "kabkota_id" => 6
    ]);
  }
}

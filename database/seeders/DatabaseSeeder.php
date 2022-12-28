<?php

namespace Database\Seeders;

use App\Models\Desa;
use App\Models\Jabatan;
use App\Models\Kabkota;
use App\Models\Pembina;
use App\Models\Provinsi;
use App\Models\Kecamatan;
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
        Pembina::factory(20)->create();

        Jabatan::create([
            "nama" => "PKB/PLKB",
            "kode" => "B"
        ]);

        Provinsi::create([
            "nama" => "Gorontalo",
            "kode" => "75"
        ]);

        Kabkota::create([
            "nama" => "Kota Gorontalo",
            "kode" => "71",
            "provinsi_id" => "1"
        ]);

        Kecamatan::create([
            "nama" => "Kota Barat",
            "kode" => "01",
            "kabkota_id" => "1"
        ]);

        Kecamatan::create([
            "nama" => "Kota Selatan",
            "kode" => "02",
            "kabkota_id" => "1"
        ]);

        Kecamatan::create([
            "nama" => "Kota Utara",
            "kode" => "03",
            "kabkota_id" => "1"
        ]);

        Desa::create([
            "nama" => "Buladu",
            "kode" => "01",
            "kecamatan_id" => "1"
        ]);

        Desa::create([
            "nama" => "Biawu",
            "kode" => "01",
            "kecamatan_id" => "2"
        ]);

        Desa::create([
            "nama" => "Dulomo",
            "kode" => "01",
            "kecamatan_id" => "3"
        ]);

        Pembina::create([
            "no_register" => "757101B02",
            "nama" => "Dewi H. Yasin, Amd.Kom",
            "no_urut" => "02",
            "jabatan_id" => "1",
            "desa_id" => "1"
        ]);

        Pembina::create([
            "no_register" => "757102B01",
            "nama" => "Mirah Delima, SKM",
            "no_urut" => "01",
            "jabatan_id" => "1",
            "desa_id" => "2"
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Pikr;
use App\Models\Sk;
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

        // untuk seeder pikr dan sk sudah saya buat disini karena sy coba buat di file seedernya sendiri tapi malah error

        Pikr::create([
            "no_register" => "7571075002",
            "nama" => "PIK-R As-Salam",
            "no_urut" => "002",
            "alamat" => "Jl. Poigar",
            "basis" => "Pendidikan - SMA/Setara",
            "akun_medsos" => "Instagram (@pikr-assalam)",
            "sumber_dana" => "lainnya",
            "keterpaduan_kelompok" => "Ya",
            "pro_pn" => "Ya",
            "materi_lainnya" => "",
            "sarana_lainnya" => "",
            "jabatan_lainnya" => "",
            "desa_id" => "1",
            "sk_id" => "1",
            "pembina_id" => "1"
        ]);

        Sk::create([
            "status" => "ada",
            "no_sk" => "25",
            "tanggal_sk" => "12 Desember 2012",
            "dikeluarkan_oleh" => "OPD-KB"
        ]);

        $this->call([
            JabatanSeeder::class,
            ProvinsiSeeder::class,
            KabkotaSeeder::class,
            KecamatanSeeder::class,
            DesaSeeder::class,
            PembinaSeeder::class
            // Pikr::class,
            // Sk::class
        ]);
    }
}

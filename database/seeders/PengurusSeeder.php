<?php

namespace Database\Seeders;

use App\Models\Pengurus;
use Illuminate\Database\Seeder;

class PengurusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengurus::create([
            'pikr_id' => 1,
            'nik' => 'tes',
            'nama' => 'tes',
            'jabatan' => 'Pendidik Sebaya',
            'no_hp' => 'tes',
            'pernah_pelatihan' => 1,
        ]);

        Pengurus::create([
            'pikr_id' => 1,
            'nik' => 'tess',
            'nama' => 'tes',
            'jabatan' => 'Konselor Sebaya',
            'no_hp' => 'tes',
            'pernah_pelatihan' => 1,
        ]);
    }
}

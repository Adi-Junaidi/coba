<?php

namespace Database\Seeders;

use App\Models\Materi;
use Illuminate\Database\Seeder;

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Materi::create([
            'nama'=> 'Pubertas',
            'kategori'=> 'Kesehatan Remaja',
        ]);

        Materi::create([
            'nama'=> 'Seksualitas',
            'kategori'=> 'Kesehatan Remaja',
        ]);

        Materi::create([
            'nama'=> 'Reproduksi',
            'kategori'=> 'Kesehatan Remaja',
        ]);

        Materi::create([
            'nama'=> 'Kesehatan dan Gizi Remaja',
            'kategori'=> 'Kesehatan Remaja',
        ]);

        Materi::create([
            'nama'=> 'Perilaku Beresiko',
            'kategori'=> 'Kesehatan Remaja',
        ]);

        Materi::create([
            'nama'=> 'Tindakan Berbahaya',
            'kategori'=> 'Kesehatan Remaja',
        ]);

        Materi::create([
            'nama'=> 'Persiapan Pernikahan',
            'kategori'=> 'Perencanaan Berkeluarga',
        ]);

        Materi::create([
            'nama'=> 'Perkembangan Keluarga',
            'kategori'=> 'Perencanaan Berkeluarga',
        ]);

        Materi::create([
            'nama'=> 'Pengasuhan Keluarga Sehat',
            'kategori'=> 'Perencanaan Berkeluarga',
        ]);

        Materi::create([
            'nama'=> 'Soft Skill',
            'kategori'=> 'Life Skill',
        ]);

        Materi::create([
            'nama'=> 'Hard Skill',
            'kategori'=> 'Life Skill',
        ]);

    }
}

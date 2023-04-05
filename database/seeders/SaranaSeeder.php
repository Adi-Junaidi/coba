<?php

namespace Database\Seeders;

use App\Models\Sarana;
use Illuminate\Database\Seeder;

class SaranaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sarana::create([
            'nama'=> 'Ruang Sekretariat',
            'kategori'=> 'Ruangan',
        ]);

        Sarana::create([
            'nama'=> 'Papan Nama',
            'kategori'=> 'Lainnya',
        ]);

        Sarana::create([
            'nama'=> 'Ruang Khusus Konseling',
            'kategori'=> 'Ruangan',
        ]);

        Sarana::create([
            'nama'=> 'Pedoman Pengelolaan PIK-R',
            'kategori'=> 'Buku',
        ]);

        Sarana::create([
            'nama'=> 'Modul Fasilitator PIK-R',
            'kategori'=> 'Buku',
        ]);
        
        Sarana::create([
            'nama'=> 'Buku Pegangan PS',
            'kategori'=> 'Buku',
        ]);
        
        Sarana::create([
            'nama'=> 'Modul "Tentang Kita"',
            'kategori'=> 'Buku',
        ]);

        Sarana::create([
            'nama'=> 'Lembar Balik',
            'kategori'=> 'Buku',
        ]);

        Sarana::create([
            'nama'=> 'Leaflet',
            'kategori'=> 'Lainnya',
        ]);

        Sarana::create([
            'nama'=> 'Poster',
            'kategori'=> 'Lainnya',
        ]);

        Sarana::create([
            'nama'=> 'GenRe Kit',
            'kategori'=> 'Lainnya',
        ]);

        Sarana::create([
            'nama'=> 'Buku Komik Berseri',
            'kategori'=> 'Buku',
        ]);

    }
}

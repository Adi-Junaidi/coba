<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembina
{
    private static $data_pembina = [
        [
            "no_register" => "757101B02",
            "nama" => "Dewi H. Yasin, Amd.Kom",
            "jabatan" => "PKB/PLKB",
            "no_urut" => "02",
            "provinsi" => "Gorontalo",
            "kab_kota" => "Kota Gorontalo",
            "kecamatan" => "Kota Barat",
            "desa_kel" => "Buladu"
        ],
        [
            "no_register" => "757102B01",
            "nama" => "Mirah Delima, SKM",
            "jabatan" => "PKB/PLKB",
            "no_urut" => "01",
            "provinsi" => "Gorontalo",
            "kab_kota" => "Kota Gorontalo",
            "kecamatan" => "Kota Selatan",
            "desa_kel" => "Biawu"
        ],
        [
            "no_register" => "757102B14",
            "nama" => "Venty S. Kasan",
            "jabatan" => "PKB/PLKB",
            "no_urut" => "14",
            "provinsi" => "Gorontalo",
            "kab_kota" => "Kota Gorontalo",
            "kecamatan" => "Kota Selatan",
            "desa_kel" => "Biawu"
        ],
        [
            "no_register" => "757103B02",
            "nama" => "Merdi R. Buheli, S.AP",
            "jabatan" => "PKB/PLKB",
            "no_urut" => "02",
            "provinsi" => "Gorontalo",
            "kab_kota" => "Kota Gorontalo",
            "kecamatan" => "Kota Utara",
            "desa_kel" => "Dulomo"
        ],
        [
            "no_register" => "757103B03",
            "nama" => "Laila A. Ono, S.AP",
            "jabatan" => "PKB/PLKB",
            "no_urut" => "03",
            "provinsi" => "Gorontalo",
            "kab_kota" => "Kota Gorontalo",
            "kecamatan" => "Kota Utara",
            "desa_kel" => "Dulomo"
        ]
    ];

    public static function all()
    {
        return self::$data_pembina;
    }
}

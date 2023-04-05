<?php

namespace Database\Seeders;

use App\Models\Desa;
use Illuminate\Database\Seeder;

class DesaSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // Kecamatan Limboto | id: 1
    Desa::create([
      "nama" => "Kayu Bulan",
      "kode" => "01",
      "kecamatan_id" => 1
    ]);
    Desa::create([
      "nama" => "Kayu Merah",
      "kode" => "02",
      "kecamatan_id" => 1
    ]);
    Desa::create([
      "nama" => "Hunggaluwa",
      "kode" => "03",
      "kecamatan_id" => 1
    ]);
    Desa::create([
      "nama" => "Bolihuangga",
      "kode" => "04",
      "kecamatan_id" => 1
    ]);

    // Kecamatan Telaga | id: 2
    Desa::create([
      "nama" => "Bulila",
      "kode" => "11",
      "kecamatan_id" => 2
    ]);
    Desa::create([
      "nama" => "Mongolato",
      "kode" => "14",
      "kecamatan_id" => 2
    ]);
    Desa::create([
      "nama" => "Luhu",
      "kode" => "15",
      "kecamatan_id" => 2
    ]);
    Desa::create([
      "nama" => "Hulawa",
      "kode" => "16",
      "kecamatan_id" => 2
    ]);
    Desa::create([
      "nama" => "Pilohayanga",
      "kode" => "17",
      "kecamatan_id" => 2
    ]);
    Desa::create([
      "nama" => "Dulamayo Selatan",
      "kode" => "18",
      "kecamatan_id" => 2
    ]);
    Desa::create([
      "nama" => "Dulamayo Barat",
      "kode" => "19",
      "kecamatan_id" => 2
    ]);
    Desa::create([
      "nama" => "Dulohupa",
      "kode" => "20",
      "kecamatan_id" => 2
    ]);
    Desa::create([
      "nama" => "Pilohayanga Barat",
      "kode" => "21",
      "kecamatan_id" => 2
    ]);

    // Kecamatan Batudaa | id: 3
    Desa::create([
      "nama" => "Iluta",
      "kode" => "01",
      "kecamatan_id" => 3
    ]);
    Desa::create([
      "nama" => "Bua",
      "kode" => "02",
      "kecamatan_id" => 3
    ]);
    Desa::create([
      "nama" => "Huntu",
      "kode" => "03",
      "kecamatan_id" => 3
    ]);
    Desa::create([
      "nama" => "Payunga",
      "kode" => "04",
      "kecamatan_id" => 3
    ]);
    Desa::create([
      "nama" => "Barakati",
      "kode" => "12",
      "kecamatan_id" => 3
    ]);
    Desa::create([
      "nama" => "Ilohungayo",
      "kode" => "13",
      "kecamatan_id" => 3
    ]);
    Desa::create([
      "nama" => "Dunggala",
      "kode" => "14",
      "kecamatan_id" => 3
    ]);
    Desa::create([
      "nama" => "Pilobuhuta",
      "kode" => "15",
      "kecamatan_id" => 3
    ]);

    // Kecamatan Tibawa | id: 4
    Desa::create([
      "nama" => "Isimu Utara",
      "kode" => "01",
      "kecamatan_id" => 4
    ]);
    Desa::create([
      "nama" => "Isimu Selatan",
      "kode" => "02",
      "kecamatan_id" => 4
    ]);
    Desa::create([
      "nama" => "Datahu",
      "kode" => "03",
      "kecamatan_id" => 4
    ]);
    Desa::create([
      "nama" => "Tolotio",
      "kode" => "04",
      "kecamatan_id" => 4
    ]);
    Desa::create([
      "nama" => "Labanu",
      "kode" => "05",
      "kecamatan_id" => 4
    ]);
    Desa::create([
      "nama" => "Reksonegoro",
      "kode" => "06",
      "kecamatan_id" => 4
    ]);
    Desa::create([
      "nama" => "Buhu",
      "kode" => "07",
      "kecamatan_id" => 4
    ]);
    Desa::create([
      "nama" => "Dunggala",
      "kode" => "08",
      "kecamatan_id" => 4
    ]);
    Desa::create([
      "nama" => "Molowahu",
      "kode" => "09",
      "kecamatan_id" => 4
    ]);
    Desa::create([
      "nama" => "Iloponu",
      "kode" => "10",
      "kecamatan_id" => 4
    ]);
    Desa::create([
      "nama" => "Ilomata",
      "kode" => "11",
      "kecamatan_id" => 4
    ]);
    Desa::create([
      "nama" => "Motilango",
      "kode" => "12",
      "kecamatan_id" => 4
    ]);
    Desa::create([
      "nama" => "Isimu Raya",
      "kode" => "13",
      "kecamatan_id" => 4
    ]);
    Desa::create([
      "nama" => "Balahu",
      "kode" => "14",
      "kecamatan_id" => 4
    ]);
    Desa::create([
      "nama" => "Botumoputi",
      "kode" => "15",
      "kecamatan_id" => 4
    ]);
    Desa::create([
      "nama" => "Ulobua",
      "kode" => "16",
      "kecamatan_id" => 4
    ]);

    // Kecamatan Batudaa Pantai | id: 5
    Desa::create([
      "nama" => "Tontayuo",
      "kode" => "04",
      "kecamatan_id" => 5
    ]);
    Desa::create([
      "nama" => "Biluhu Timur",
      "kode" => "05",
      "kecamatan_id" => 5
    ]);
    Desa::create([
      "nama" => "Kayubulan",
      "kode" => "06",
      "kecamatan_id" => 5
    ]);
    Desa::create([
      "nama" => "Bongo",
      "kode" => "07",
      "kecamatan_id" => 5
    ]);
    Desa::create([
      "nama" => "Lopo",
      "kode" => "08",
      "kecamatan_id" => 5
    ]);
    Desa::create([
      "nama" => "Lamu",
      "kode" => "09",
      "kecamatan_id" => 5
    ]);
    Desa::create([
      "nama" => "Olimoo'o",
      "kode" => "12",
      "kecamatan_id" => 5
    ]);
    Desa::create([
      "nama" => "Buhudaa",
      "kode" => "13",
      "kecamatan_id" => 5
    ]);
    Desa::create([
      "nama" => "Langgula",
      "kode" => "14",
      "kecamatan_id" => 5
    ]);

    // Kecamatan Boliyohuto | id: 6
    Desa::create([
      "nama" => "Sidomulyo",
      "kode" => "01",
      "kecamatan_id" => 6
    ]);
    Desa::create([
      "nama" => "Parungi",
      "kode" => "04",
      "kecamatan_id" => 6
    ]);
    Desa::create([
      "nama" => "Diloniyohu",
      "kode" => "06",
      "kecamatan_id" => 6
    ]);
    Desa::create([
      "nama" => "Sidodadi",
      "kode" => "07",
      "kecamatan_id" => 6
    ]);
    Desa::create([
      "nama" => "Potanga",
      "kode" => "10",
      "kecamatan_id" => 6
    ]);
    Desa::create([
      "nama" => "Motoduto",
      "kode" => "11",
      "kecamatan_id" => 6
    ]);
    Desa::create([
      "nama" => "Iloheluma",
      "kode" => "12",
      "kecamatan_id" => 6
    ]);
    Desa::create([
      "nama" => "Monggolito",
      "kode" => "14",
      "kecamatan_id" => 6
    ]);
    Desa::create([
      "nama" => "Bandung Rejo",
      "kode" => "15",
      "kecamatan_id" => 6
    ]);
    Desa::create([
      "nama" => "Dulohupa",
      "kode" => "18",
      "kecamatan_id" => 6
    ]);
    Desa::create([
      "nama" => "Sidomulyo Selatan",
      "kode" => "19",
      "kecamatan_id" => 6
    ]);
    Desa::create([
      "nama" => "Bongongoayu",
      "kode" => "20",
      "kecamatan_id" => 6
    ]);
    Desa::create([
      "nama" => "Tolite",
      "kode" => "21",
      "kecamatan_id" => 6
    ]);

    // Kecamatan Telaga Biru | id: 7
    Desa::create([
      "nama" => "Dulamayo Utara",
      "kode" => "01",
      "kecamatan_id" => 7
    ]);
    Desa::create([
      "nama" => "Ulapato A",
      "kode" => "02",
      "kecamatan_id" => 7
    ]);
    Desa::create([
      "nama" => "Ulapato B",
      "kode" => "03",
      "kecamatan_id" => 7
    ]);
    Desa::create([
      "nama" => "Talumelito",
      "kode" => "04",
      "kecamatan_id" => 7
    ]);
    Desa::create([
      "nama" => "Tuladenggi",
      "kode" => "05",
      "kecamatan_id" => 7
    ]);
    Desa::create([
      "nama" => "Pantungo",
      "kode" => "06",
      "kecamatan_id" => 7
    ]);
    Desa::create([
      "nama" => "Lupoyo",
      "kode" => "07",
      "kecamatan_id" => 7
    ]);
    Desa::create([
      "nama" => "Pentadio Timur",
      "kode" => "08",
      "kecamatan_id" => 7
    ]);
    Desa::create([
      "nama" => "Pentadio Barat",
      "kode" => "09",
      "kecamatan_id" => 7
    ]);
    Desa::create([
      "nama" => "Dumati",
      "kode" => "10",
      "kecamatan_id" => 7
    ]);
    Desa::create([
      "nama" => "Modelidu",
      "kode" => "11",
      "kecamatan_id" => 7
    ]);
    Desa::create([
      "nama" => "Tinelo",
      "kode" => "12",
      "kecamatan_id" => 7
    ]);
    Desa::create([
      "nama" => "Timuato",
      "kode" => "13",
      "kecamatan_id" => 7
    ]);
    Desa::create([
      "nama" => "Tapaluluo",
      "kode" => "14",
      "kecamatan_id" => 7
    ]);
    Desa::create([
      "nama" => "Tonala",
      "kode" => "15",
      "kecamatan_id" => 7
    ]);

    // Kecamatan Bongomeme | id: 8
    Desa::create([
      "nama" => "Dulamayo",
      "kode" => "01",
      "kecamatan_id" => 8
    ]);
    Desa::create([
      "nama" => "Upomela",
      "kode" => "08",
      "kecamatan_id" => 8
    ]);
    Desa::create([
      "nama" => "Tohupo",
      "kode" => "09",
      "kecamatan_id" => 8
    ]);
    Desa::create([
      "nama" => "Molanihu",
      "kode" => "10",
      "kecamatan_id" => 8
    ]);
    Desa::create([
      "nama" => "Molopatodu",
      "kode" => "11",
      "kecamatan_id" => 8
    ]);
    Desa::create([
      "nama" => "Molas",
      "kode" => "12",
      "kecamatan_id" => 8
    ]);
    Desa::create([
      "nama" => "Batulayar",
      "kode" => "13",
      "kecamatan_id" => 8
    ]);
    Desa::create([
      "nama" => "Batuloreng",
      "kode" => "14",
      "kecamatan_id" => 8
    ]);
    Desa::create([
      "nama" => "Bongohulawa",
      "kode" => "15",
      "kecamatan_id" => 8
    ]);
    Desa::create([
      "nama" => "Otopade",
      "kode" => "16",
      "kecamatan_id" => 8
    ]);
    Desa::create([
      "nama" => "Owalanga",
      "kode" => "22",
      "kecamatan_id" => 8
    ]);
    Desa::create([
      "nama" => "Liyodu",
      "kode" => "23",
      "kecamatan_id" => 8
    ]);
    Desa::create([
      "nama" => "Liyoto",
      "kode" => "24",
      "kecamatan_id" => 8
    ]);
    Desa::create([
      "nama" => "Kayu Merah",
      "kode" => "25",
      "kecamatan_id" => 8
    ]);

    // Kecamatan Tolangohula | id: 9
    Desa::create([
      "nama" => "Sukamakmur",
      "kode" => "01",
      "kecamatan_id" => 9
    ]);
    Desa::create([
      "nama" => "Lakeya",
      "kode" => "02",
      "kecamatan_id" => 9
    ]);
    Desa::create([
      "nama" => "Gandasari",
      "kode" => "03",
      "kecamatan_id" => 9
    ]);
    Desa::create([
      "nama" => "Molohu",
      "kode" => "04",
      "kecamatan_id" => 9
    ]);
    Desa::create([
      "nama" => "Polohungo",
      "kode" => "07",
      "kecamatan_id" => 9
    ]);
    Desa::create([
      "nama" => "Binajaya",
      "kode" => "08",
      "kecamatan_id" => 9
    ]);
    Desa::create([
      "nama" => "Tamaila",
      "kode" => "09",
      "kecamatan_id" => 9
    ]);
    Desa::create([
      "nama" => "Sidoharjo",
      "kode" => "10",
      "kecamatan_id" => 9
    ]);
    Desa::create([
      "nama" => "Suka Makmur Utara",
      "kode" => "13",
      "kecamatan_id" => 9
    ]);
    Desa::create([
      "nama" => "Margomulyo",
      "kode" => "14",
      "kecamatan_id" => 9
    ]);
    Desa::create([
      "nama" => "Makmur Abadi",
      "kode" => "15",
      "kecamatan_id" => 9
    ]);
    Desa::create([
      "nama" => "Gandara",
      "kode" => "16",
      "kecamatan_id" => 9
    ]);
    Desa::create([
      "nama" => "Ombulo Tango",
      "kode" => "17",
      "kecamatan_id" => 9
    ]);
    Desa::create([
      "nama" => "Tamaila Utara",
      "kode" => "18",
      "kecamatan_id" => 9
    ]);
    Desa::create([
      "nama" => "Himalaya",
      "kode" => "19",
      "kecamatan_id" => 9
    ]);

    // Kecamatan Kota Barat | id: 20 | temporary data
    Desa::create([
      "nama" => "Buladu",
      "kode" => "01",
      "kecamatan_id" => 20
    ]);

    // Kecamatan Kota Selatan | id: 21 | temporary data
    Desa::create([
      "nama" => "Biawu",
      "kode" => "01",
      "kecamatan_id" => 21
    ]);

    // Kecamatan Kota Utara | id: 22 | temporary data
    Desa::create([
      "nama" => "Dulomo",
      "kode" => "01",
      "kecamatan_id" => 22
    ]);
  }
}

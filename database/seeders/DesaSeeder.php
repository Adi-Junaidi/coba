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

    // Kecamatan Mootilango | id: 10
    Desa::create([
      "nama" => "Paris",
      "kode" => "01",
      "kecamatan_id" => 10
    ]);
    Desa::create([
      "nama" => "Helumo",
      "kode" => "02",
      "kecamatan_id" => 10
    ]);
    Desa::create([
      "nama" => "Pilomonu",
      "kode" => "03",
      "kecamatan_id" => 10
    ]);
    Desa::create([
      "nama" => "Satria",
      "kode" => "04",
      "kecamatan_id" => 10
    ]);
    Desa::create([
      "nama" => "Karya Mukti",
      "kode" => "05",
      "kecamatan_id" => 10
    ]);
    Desa::create([
      "nama" => "Talumopatu",
      "kode" => "06",
      "kecamatan_id" => 10
    ]);
    Desa::create([
      "nama" => "Sidomukti",
      "kode" => "07",
      "kecamatan_id" => 10
    ]);
    Desa::create([
      "nama" => "Payu",
      "kode" => "08",
      "kecamatan_id" => 10
    ]);
    Desa::create([
      "nama" => "Sukamaju",
      "kode" => "09",
      "kecamatan_id" => 10
    ]);
    Desa::create([
      "nama" => "Huyula",
      "kode" => "10",
      "kecamatan_id" => 10
    ]);

    // Kecamatan Pulubala | id: 11
    Desa::create([
      "nama" => "Pongongaila",
      "kode" => "01",
      "kecamatan_id" => 11
    ]);
    Desa::create([
      "nama" => "Pulubala",
      "kode" => "02",
      "kecamatan_id" => 11
    ]);
    Desa::create([
      "nama" => "Molamahu",
      "kode" => "03",
      "kecamatan_id" => 11
    ]);
    Desa::create([
      "nama" => "Bakti",
      "kode" => "04",
      "kecamatan_id" => 11
    ]);
    Desa::create([
      "nama" => "Tridharma",
      "kode" => "05",
      "kecamatan_id" => 11
    ]);
    Desa::create([
      "nama" => "Molalahu",
      "kode" => "06",
      "kecamatan_id" => 11
    ]);
    Desa::create([
      "nama" => "Mulyonegoro",
      "kode" => "07",
      "kecamatan_id" => 11
    ]);
    Desa::create([
      "nama" => "Puncak",
      "kode" => "08",
      "kecamatan_id" => 11
    ]);
    Desa::create([
      "nama" => "Toyidito",
      "kode" => "09",
      "kecamatan_id" => 11
    ]);
    Desa::create([
      "nama" => "Ayumolingo",
      "kode" => "10",
      "kecamatan_id" => 11
    ]);
    Desa::create([
      "nama" => "Bukit Aren",
      "kode" => "11",
      "kecamatan_id" => 11
    ]);

    // Kecamatan Limboto Barat | id: 12
    Desa::create([
      "nama" => "Pone",
      "kode" => "01",
      "kecamatan_id" => 12
    ]);
    Desa::create([
      "nama" => "Huidu",
      "kode" => "02",
      "kecamatan_id" => 12
    ]);
    Desa::create([
      "nama" => "Ombulo",
      "kode" => "03",
      "kecamatan_id" => 12
    ]);
    Desa::create([
      "nama" => "Daenaa",
      "kode" => "04",
      "kecamatan_id" => 12
    ]);
    Desa::create([
      "nama" => "Yosonegoro",
      "kode" => "05",
      "kecamatan_id" => 12
    ]);
    Desa::create([
      "nama" => "Tunggulo",
      "kode" => "06",
      "kecamatan_id" => 12
    ]);
    Desa::create([
      "nama" => "Hutabohu",
      "kode" => "07",
      "kecamatan_id" => 12
    ]);
    Desa::create([
      "nama" => "Podengo",
      "kode" => "08",
      "kecamatan_id" => 12
    ]);
    Desa::create([
      "nama" => "Haya-Haya",
      "kode" => "09",
      "kecamatan_id" => 12
    ]);
    Desa::create([
      "nama" => "Huidu Utara",
      "kode" => "10",
      "kecamatan_id" => 12
    ]);

    // Kecamatan Tilango | id: 13
    Desa::create([
      "nama" => "Tualango",
      "kode" => "01",
      "kecamatan_id" => 13
    ]);
    Desa::create([
      "nama" => "Dulomo",
      "kode" => "02",
      "kecamatan_id" => 13
    ]);
    Desa::create([
      "nama" => "Tilote",
      "kode" => "03",
      "kecamatan_id" => 13
    ]);
    Desa::create([
      "nama" => "Tabumela",
      "kode" => "04",
      "kecamatan_id" => 13
    ]);
    Desa::create([
      "nama" => "Ilotidea",
      "kode" => "05",
      "kecamatan_id" => 13
    ]);
    Desa::create([
      "nama" => "Lauwonu",
      "kode" => "06",
      "kecamatan_id" => 13
    ]);
    Desa::create([
      "nama" => "Tenggela",
      "kode" => "07",
      "kecamatan_id" => 13
    ]);
    Desa::create([
      "nama" => "Tinelo",
      "kode" => "08",
      "kecamatan_id" => 13
    ]);

    // Kecamatan Tabongo | id: 14
    Desa::create([
      "nama" => "Tabongo Timur",
      "kode" => "01",
      "kecamatan_id" => 14
    ]);
    Desa::create([
      "nama" => "Tabongo Barat",
      "kode" => "02",
      "kecamatan_id" => 14
    ]);
    Desa::create([
      "nama" => "Limehe Barat",
      "kode" => "03",
      "kecamatan_id" => 14
    ]);
    Desa::create([
      "nama" => "Limehe Timur",
      "kode" => "04",
      "kecamatan_id" => 14
    ]);
    Desa::create([
      "nama" => "Ilomangga",
      "kode" => "05",
      "kecamatan_id" => 14
    ]);
    Desa::create([
      "nama" => "Motinelo",
      "kode" => "06",
      "kecamatan_id" => 14
    ]);
    Desa::create([
      "nama" => "Moahudu",
      "kode" => "07",
      "kecamatan_id" => 14
    ]);
    Desa::create([
      "nama" => "Teratai",
      "kode" => "08",
      "kecamatan_id" => 14
    ]);
    Desa::create([
      "nama" => "Limehu",
      "kode" => "09",
      "kecamatan_id" => 14
    ]);

    // Kecamatan Biluhu | id: 15
    Desa::create([
      "nama" => "Biluhu Barat",
      "kode" => "01",
      "kecamatan_id" => 15
    ]);
    Desa::create([
      "nama" => "Lobuto",
      "kode" => "02",
      "kecamatan_id" => 15
    ]);
    Desa::create([
      "nama" => "Biluhu Tengah",
      "kode" => "03",
      "kecamatan_id" => 15
    ]);
    Desa::create([
      "nama" => "Luluo",
      "kode" => "04",
      "kecamatan_id" => 15
    ]);
    Desa::create([
      "nama" => "Huwongo",
      "kode" => "05",
      "kecamatan_id" => 15
    ]);
    Desa::create([
      "nama" => "Lobuto Timur",
      "kode" => "06",
      "kecamatan_id" => 15
    ]);
    Desa::create([
      "nama" => "Botubulu'o",
      "kode" => "07",
      "kecamatan_id" => 15
    ]);
    Desa::create([
      "nama" => "Olimeyala",
      "kode" => "08",
      "kecamatan_id" => 15
    ]);

    // Kecamatan Asparaga | id: 16
    Desa::create([
      "nama" => "Bululi",
      "kode" => "01",
      "kecamatan_id" => 16
    ]);
    Desa::create([
      "nama" => "Mohiyolo",
      "kode" => "02",
      "kecamatan_id" => 16
    ]);
    Desa::create([
      "nama" => "Pangahu",
      "kode" => "03",
      "kecamatan_id" => 16
    ]);
    Desa::create([
      "nama" => "Karya Indah",
      "kode" => "04",
      "kecamatan_id" => 16
    ]);
    Desa::create([
      "nama" => "Prima",
      "kode" => "05",
      "kecamatan_id" => 16
    ]);
    Desa::create([
      "nama" => "Tiohu",
      "kode" => "06",
      "kecamatan_id" => 16
    ]);
    Desa::create([
      "nama" => "Olimohulo",
      "kode" => "07",
      "kecamatan_id" => 16
    ]);
    Desa::create([
      "nama" => "Karya Baru",
      "kode" => "08",
      "kecamatan_id" => 16
    ]);
    Desa::create([
      "nama" => "Bihe",
      "kode" => "09",
      "kecamatan_id" => 16
    ]);
    Desa::create([
      "nama" => "Bontulo",
      "kode" => "10",
      "kecamatan_id" => 16
    ]);

    // Kecamatan Talaga Raya | id: 17
    Desa::create([
      "nama" => "Hutadaa",
      "kode" => "01",
      "kecamatan_id" => 17
    ]);
    Desa::create([
      "nama" => "Buhu",
      "kode" => "02",
      "kecamatan_id" => 17
    ]);
    Desa::create([
      "nama" => "Luwoo",
      "kode" => "03",
      "kecamatan_id" => 17
    ]);
    Desa::create([
      "nama" => "Bunggalo",
      "kode" => "04",
      "kecamatan_id" => 17
    ]);
    Desa::create([
      "nama" => "Bulota",
      "kode" => "05",
      "kecamatan_id" => 17
    ]);

    // Kecamatan Bilato | id: 18
    Desa::create([
      "nama" => "Totopo",
      "kode" => "01",
      "kecamatan_id" => 18
    ]);
    Desa::create([
      "nama" => "Bilato",
      "kode" => "02",
      "kecamatan_id" => 18
    ]);
    Desa::create([
      "nama" => "Ilomata",
      "kode" => "03",
      "kecamatan_id" => 18
    ]);
    Desa::create([
      "nama" => "Taulaa",
      "kode" => "04",
      "kecamatan_id" => 18
    ]);
    Desa::create([
      "nama" => "Juria",
      "kode" => "05",
      "kecamatan_id" => 18
    ]);
    Desa::create([
      "nama" => "Pelehu",
      "kode" => "06",
      "kecamatan_id" => 18
    ]);
    Desa::create([
      "nama" => "Bumela",
      "kode" => "07",
      "kecamatan_id" => 18
    ]);
    Desa::create([
      "nama" => "Lamahu",
      "kode" => "08",
      "kecamatan_id" => 18
    ]);
    Desa::create([
      "nama" => "Musyawarah",
      "kode" => "09",
      "kecamatan_id" => 18
    ]);
    Desa::create([
      "nama" => "Suka Damai",
      "kode" => "10",
      "kecamatan_id" => 18
    ]);

    // Kecamatan Dungaliyo | id: 19
    Desa::create([
      "nama" => "Pilolalenga",
      "kode" => "01",
      "kecamatan_id" => 19
    ]);
    Desa::create([
      "nama" => "Kaliyoso",
      "kode" => "02",
      "kecamatan_id" => 19
    ]);
    Desa::create([
      "nama" => "Dungaliyo",
      "kode" => "03",
      "kecamatan_id" => 19
    ]);
    Desa::create([
      "nama" => "Ambara",
      "kode" => "04",
      "kecamatan_id" => 19
    ]);
    Desa::create([
      "nama" => "Bongomeme",
      "kode" => "05",
      "kecamatan_id" => 19
    ]);
    Desa::create([
      "nama" => "Duwanga",
      "kode" => "06",
      "kecamatan_id" => 19
    ]);
    Desa::create([
      "nama" => "Ayuhula",
      "kode" => "07",
      "kecamatan_id" => 19
    ]);
    Desa::create([
      "nama" => "Pangadaa",
      "kode" => "08",
      "kecamatan_id" => 19
    ]);
    Desa::create([
      "nama" => "Botu Bulowe",
      "kode" => "09",
      "kecamatan_id" => 19
    ]);
    Desa::create([
      "nama" => "Momala",
      "kode" => "10",
      "kecamatan_id" => 19
    ]);
    Desa::create([
      "nama" => "Huntu Lo Hulawa",
      "kode" => "11",
      "kecamatan_id" => 19
    ]);

    // Kecamatan Paguyaman | id: 20
    Desa::create([
      "nama" => "Bongo Nol",
      "kode" => "04",
      "kecamatan_id" => 20
    ]);
    Desa::create([
      "nama" => "Bongo IV",
      "kode" => "05",
      "kecamatan_id" => 20
    ]);
    Desa::create([
      "nama" => "Molombulahe",
      "kode" => "06",
      "kecamatan_id" => 20
    ]);
    Desa::create([
      "nama" => "Mutiara",
      "kode" => "07",
      "kecamatan_id" => 20
    ]);
    Desa::create([
      "nama" => "Saripi",
      "kode" => "08",
      "kecamatan_id" => 20
    ]);
    Desa::create([
      "nama" => "Wonggahu",
      "kode" => "09",
      "kecamatan_id" => 20
    ]);
    Desa::create([
      "nama" => "Tangkobu",
      "kode" => "10",
      "kecamatan_id" => 20
    ]);
    Desa::create([
      "nama" => "Bongo Tua",
      "kode" => "11",
      "kecamatan_id" => 20
    ]);
    Desa::create([
      "nama" => "Kualalumpur",
      "kode" => "12",
      "kecamatan_id" => 20
    ]);
    Desa::create([
      "nama" => "Mustika",
      "kode" => "13",
      "kecamatan_id" => 20
    ]);
    Desa::create([
      "nama" => "Tenilo",
      "kode" => "14",
      "kecamatan_id" => 20
    ]);
    Desa::create([
      "nama" => "Huwongo",
      "kode" => "15",
      "kecamatan_id" => 20
    ]);
    Desa::create([
      "nama" => "Karya Murni",
      "kode" => "16",
      "kecamatan_id" => 20
    ]);
    Desa::create([
      "nama" => "Girisa",
      "kode" => "19",
      "kecamatan_id" => 20
    ]);
    Desa::create([
      "nama" => "Batu Kramat",
      "kode" => "20",
      "kecamatan_id" => 20
    ]);
    Desa::create([
      "nama" => "Bualo",
      "kode" => "21",
      "kecamatan_id" => 20
    ]);
    Desa::create([
      "nama" => "Sosial",
      "kode" => "22",
      "kecamatan_id" => 20
    ]);
    Desa::create([
      "nama" => "Permata",
      "kode" => "23",
      "kecamatan_id" => 20
    ]);
    Desa::create([
      "nama" => "Hulawa",
      "kode" => "24",
      "kecamatan_id" => 20
    ]);
    Desa::create([
      "nama" => "Balate Jaya",
      "kode" => "25",
      "kecamatan_id" => 20
    ]);
    Desa::create([
      "nama" => "Rejonegoro",
      "kode" => "26",
      "kecamatan_id" => 20
    ]);
    Desa::create([
      "nama" => "Diloato",
      "kode" => "27",
      "kecamatan_id" => 20
    ]);

    // Kecamatan Wonosari | id: 21
    Desa::create([
      "nama" => "Harapan",
      "kode" => "01",
      "kecamatan_id" => 21
    ]);
    Desa::create([
      "nama" => "Bongo Dua",
      "kode" => "02",
      "kecamatan_id" => 21
    ]);
    Desa::create([
      "nama" => "Bongo Tiga",
      "kode" => "03",
      "kecamatan_id" => 21
    ]);
    Desa::create([
      "nama" => "Mekarjaya",
      "kode" => "04",
      "kecamatan_id" => 21
    ]);
    Desa::create([
      "nama" => "Sukamaju",
      "kode" => "05",
      "kecamatan_id" => 21
    ]);
    Desa::create([
      "nama" => "Pangeya",
      "kode" => "06",
      "kecamatan_id" => 21
    ]);
    Desa::create([
      "nama" => "Jatimulya",
      "kode" => "07",
      "kecamatan_id" => 21
    ]);
    Desa::create([
      "nama" => "Sukamulya",
      "kode" => "08",
      "kecamatan_id" => 21
    ]);
    Desa::create([
      "nama" => "Sari Tani",
      "kode" => "09",
      "kecamatan_id" => 21
    ]);
    Desa::create([
      "nama" => "Dimito",
      "kode" => "10",
      "kecamatan_id" => 21
    ]);
    Desa::create([
      "nama" => "Tanjung Harapan",
      "kode" => "11",
      "kecamatan_id" => 21
    ]);
    Desa::create([
      "nama" => "Raharja",
      "kode" => "12",
      "kecamatan_id" => 21
    ]);
    Desa::create([
      "nama" => "Tri Rukun",
      "kode" => "13",
      "kecamatan_id" => 21
    ]);
    Desa::create([
      "nama" => "Dulohupa",
      "kode" => "14",
      "kecamatan_id" => 21
    ]);

    // Kecamatan Dulupi | id: 22
    Desa::create([
      "nama" => "Dulupi",
      "kode" => "01",
      "kecamatan_id" => 22
    ]);
    Desa::create([
      "nama" => "Tabongo",
      "kode" => "02",
      "kecamatan_id" => 22
    ]);
    Desa::create([
      "nama" => "Kotaraja",
      "kode" => "03",
      "kecamatan_id" => 22
    ]);
    Desa::create([
      "nama" => "Polohungo",
      "kode" => "04",
      "kecamatan_id" => 22
    ]);
    Desa::create([
      "nama" => "Pangi",
      "kode" => "05",
      "kecamatan_id" => 22
    ]);
    Desa::create([
      "nama" => "Tangga Jaya",
      "kode" => "06",
      "kecamatan_id" => 22
    ]);
    Desa::create([
      "nama" => "Tanah Putih",
      "kode" => "07",
      "kecamatan_id" => 22
    ]);
    Desa::create([
      "nama" => "Tangga Barito",
      "kode" => "08",
      "kecamatan_id" => 22
    ]);

    // Kecamatan Tilamuta | id: 23
    Desa::create([
      "nama" => "Limbato",
      "kode" => "01",
      "kecamatan_id" => 23
    ]);
    Desa::create([
      "nama" => "Piloliyanga",
      "kode" => "02",
      "kecamatan_id" => 23
    ]);
    Desa::create([
      "nama" => "Ayuhulalo",
      "kode" => "03",
      "kecamatan_id" => 23
    ]);
    Desa::create([
      "nama" => "Hungayonaa",
      "kode" => "04",
      "kecamatan_id" => 23
    ]);
    Desa::create([
      "nama" => "Modelomo",
      "kode" => "05",
      "kecamatan_id" => 23
    ]);
    Desa::create([
      "nama" => "Pentadu Barat",
      "kode" => "06",
      "kecamatan_id" => 23
    ]);
    Desa::create([
      "nama" => "Pentadu Timur",
      "kode" => "07",
      "kecamatan_id" => 23
    ]);
    Desa::create([
      "nama" => "Bajo",
      "kode" => "08",
      "kecamatan_id" => 23
    ]);
    Desa::create([
      "nama" => "Mohungo",
      "kode" => "09",
      "kecamatan_id" => 23
    ]);
    Desa::create([
      "nama" => "Lahumbo",
      "kode" => "10",
      "kecamatan_id" => 23
    ]);
    Desa::create([
      "nama" => "Lamu",
      "kode" => "11",
      "kecamatan_id" => 23
    ]);
    Desa::create([
      "nama" => "Tenilo",
      "kode" => "18",
      "kecamatan_id" => 23
    ]);

    // Kecamatan Mananggu | id: 24
    Desa::create([
      "nama" => "Tabulo",
      "kode" => "01",
      "kecamatan_id" => 24
    ]);
    Desa::create([
      "nama" => "Kaaruyan",
      "kode" => "02",
      "kecamatan_id" => 24
    ]);
    Desa::create([
      "nama" => "Salilama",
      "kode" => "03",
      "kecamatan_id" => 24
    ]);
    Desa::create([
      "nama" => "Bendungan",
      "kode" => "04",
      "kecamatan_id" => 24
    ]);
    Desa::create([
      "nama" => "Mananggu",
      "kode" => "05",
      "kecamatan_id" => 24
    ]);
    Desa::create([
      "nama" => "Buti",
      "kode" => "06",
      "kecamatan_id" => 24
    ]);
    Desa::create([
      "nama" => "Pontolo",
      "kode" => "07",
      "kecamatan_id" => 24
    ]);
    Desa::create([
      "nama" => "Kramat",
      "kode" => "08",
      "kecamatan_id" => 24
    ]);
    Desa::create([
      "nama" => "Tabulo Selatan",
      "kode" => "09",
      "kecamatan_id" => 24
    ]);

    // Kecamatan Botumoito | id: 25
    Desa::create([
      "nama" => "Tutulo",
      "kode" => "01",
      "kecamatan_id" => 25
    ]);
    Desa::create([
      "nama" => "Hutamonu",
      "kode" => "02",
      "kecamatan_id" => 25
    ]);
    Desa::create([
      "nama" => "Patoameme",
      "kode" => "03",
      "kecamatan_id" => 25
    ]);
    Desa::create([
      "nama" => "Tapadaa",
      "kode" => "04",
      "kecamatan_id" => 25
    ]);
    Desa::create([
      "nama" => "Potanga",
      "kode" => "05",
      "kecamatan_id" => 25
    ]);
    Desa::create([
      "nama" => "Botumoito",
      "kode" => "06",
      "kecamatan_id" => 25
    ]);
    Desa::create([
      "nama" => "Bolihutuo",
      "kode" => "07",
      "kecamatan_id" => 25
    ]);
    Desa::create([
      "nama" => "Rumbia",
      "kode" => "08",
      "kecamatan_id" => 25
    ]);
    Desa::create([
      "nama" => "Dulangeya",
      "kode" => "09",
      "kecamatan_id" => 25
    ]);

    // Kecamatan Paguyaman Pantai | id: 26
    Desa::create([
      "nama" => "Bubaa",
      "kode" => "01",
      "kecamatan_id" => 26
    ]);
    Desa::create([
      "nama" => "Lito",
      "kode" => "02",
      "kecamatan_id" => 26
    ]);
    Desa::create([
      "nama" => "Limbatihu",
      "kode" => "03",
      "kecamatan_id" => 26
    ]);
    Desa::create([
      "nama" => "Bukit Karya",
      "kode" => "04",
      "kecamatan_id" => 26
    ]);
    Desa::create([
      "nama" => "Apitalawo",
      "kode" => "05",
      "kecamatan_id" => 26
    ]);
    Desa::create([
      "nama" => "Towayu",
      "kode" => "07",
      "kecamatan_id" => 26
    ]);
    Desa::create([
      "nama" => "Olibu",
      "kode" => "08",
      "kecamatan_id" => 26
    ]);
    Desa::create([
      "nama" => "Bangga",
      "kode" => "09",
      "kecamatan_id" => 26
    ]);

    // Kecamatan Kota Barat | id: 27 | temporary data
    Desa::create([
      "nama" => "Buladu",
      "kode" => "01",
      "kecamatan_id" => 20
    ]);

    // Kecamatan Kota Selatan | id: 28 | temporary data
    Desa::create([
      "nama" => "Biawu",
      "kode" => "01",
      "kecamatan_id" => 21
    ]);

    // Kecamatan Kota Utara | id: 29 | temporary data
    Desa::create([
      "nama" => "Dulomo",
      "kode" => "01",
      "kecamatan_id" => 22
    ]);
  }
}

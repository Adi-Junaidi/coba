@extends('layouts.main', [
    'title' => 'Data PIK-R',
    'heading' => 'Tambah Data PIK-R',
    'breadcrumb' => ['Data PIK-R', 'Tambah Data PIK-R'],
])

@section('link')
  <link href="{{ asset('dist') }}/assets/css/pages/fontawesome.css" rel="stylesheet">
  <link href="{{ asset('dist') }}/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <link href="{{ asset('dist') }}/assets/css/pages/datatables.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('dist') }}/assets/extensions/choices.js/public/assets/styles/choices.css">
@endsection

@section('container')
<section id="multiple-column-form">
    <div class="row match-height">
      <form class="form" action="{{ route('pikr.store') }}" method="POST">
        @csrf

        {{-- Card Identitas Kelompok --}}

        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5>A. Identitas Kelompok</h5>
            </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="nama">Nama PIK-R</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama PIK-R">
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat PIK-R">
                      </div>
                    </div>

                    <!-- Data dari dependent dropdown mohon bisa dihubungkan dengan input form dibawah ini -->
                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="provinsi">Provinsi</label>
                        <input type="text" name="provinsi" id="provinsi" class="form-control" value="75 | Gorontalo" disabled>
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="kabkota">Kabupaten/Kota</label>
                        <input type="text" name="kabkota" id="kabkota" class="form-control" value="71 | Kota Gorontalo" disabled>
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="kecamatan">Kecamatan</label>
                        <input type="text" name="kecamatan" id="kecamatan" class="form-control" value="01 | Kota Barat" disabled>
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="desa">Desa/Kelurahan</label>
                        <input type="text" name="desa_id" id="desa" class="form-control" value="01 | Buladu" disabled>
                      </div>
                    </div>

                    <!-- Akhir data dependent dropdown -->

                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="basis">Basis PIK-R</label>
                        <select name="basis" id="basis" class="form-select">
                          <option hidden>Pilih Basis PIK-R</option>
                          <optgroup label="Jalur Pendidikan">
                            <option value="SMP/Sederajat">Jalur Pendidikan - SMP/Sederajat</option>
                            <option value="SMA/Sederajat">Jalur Pendidikan - SMA/Sederajat</option>
                            <option value="Perguruan Tinggi">Jalur Pendidikan - Perguruan Tinggi</option>
                          </optgroup>
                          <optgroup label="Jalur Masyarakat">
                            <option value="Organisasi Keagamaan">Jalur Masyarakat - Organisasi Keagamaan</option>
                            <option value="LSM/Organisasi Kepemudaan/Organisasi Kemasyarakatan">Jalur Masyarakat - LSM/Organisasi Kepemudaan/Organisasi Kemasyarakatan</option>
                          </optgroup>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6 col-12">
                      <div class="form-group">
                          <label for="pembina">Jabatan Pembina</label>
                          <select id="selectPembina" class="form-select">
                              <option hidden>Pilih Jabatan</option>
                              <option value="1">PKB/PLKB</option>
                              <option value="0">Lainnya</option>
                          </select>
                      </div>
                    </div>

                    <div class="col-md-6 col-12">
                      <div class="form-group">
                          <label for="jabatanLainnya">Lainnya</label>
                          <input type="text" name="jabatan_lainnya" id="jabatanLainnya" class="form-control" placeholder="Lainnya..." disabled>
                      </div>
                    </div>

                    <div class="col-md-6 col-12">
                      <div class="form-group">
                          <label for="namaPembina">Nama Pembina</label>
                          <input class="form-control" list="datalistOptions" name="pembina_id" id="namaPembina" placeholder="Cari Nama Pembina" disabled>
                          <datalist id="datalistOptions">
                              @foreach ($pembina as $p)
                                  <option>{{ $p->nama }}</option>
                              @endforeach
                          </datalist>
                      </div>
                    </div>

                    <div class="col-md-6 col-12">
                      <div class="form-group">
                          <label for="punyaMedsos">Akun Media Sosial</label>
                          <select id="punyaMedsos" class="form-select">
                              <option hidden>Punya Akun Media Sosial?</option>
                              <option value="1">Ada</option>
                              <option value="0">Tidak</option>
                          </select>
                      </div>
                    </div>

                    <div class="col-md-6 col-12">
                      <div class="form-group">
                          <label for="akunMedsos">Nama Akun Media Sosial</label>
                          <input type="text" name="akun_medsos" id="akunMedsos" class="form-control" placeholder="Masukkan Nama Akun Media Sosial" disabled>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
        </div>

        {{-- Card Informasi Kelompok --}}

        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5>B. Informasi Kelompok</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <label for="punyaSk">SK Pengukuhan</label>
                      <select id="punyaSk" name="status" class="form-select">
                          <option hidden>Punya SK Pengukuhan?</option>
                          <option value="1">Ada</option>
                          <option value="0">Tidak</option>
                      </select>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <label for="nomorSk">Nomor SK</label>
                      <input type="text" name="no_sk" id="nomorSk" class="form-control" placeholder="Masukkan Nomor SK" disabled>
                  </div>
                </div>
                
                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <label for="tanggalSk">Tanggal SK</label>
                      <input type="date" name="tanggal_sk" id="tanggalSk" class="form-control" disabled>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="dikeluarkanOleh">Dikeluarkan Oleh</label>
                    <select name="dikeluarkan_oleh" id="dikeluarkanOleh" class="form-select" disabled>
                      <option hidden>Dikeluarkan Oleh</option>
                      <option value="Kepala Desa/Lurah">Kepala Desa/Lurah</option>
                      <option value="Camat">Camat</option>
                      <option value="OPD-KB">OPD-KB</option>
                      <option value="Bupati/Walikota">Bupati/Walikota</option>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="sumberDana">Sumber Dana</label>
                    <select name="sumber_dana" id="sumberDana" class="choices form-select multiple-remove" multiple="multiple">
                      <optgroup label="Dapat dipilih lebih dari satu">
                        <option value="APBN">APBN</option>
                        <option value="APBD">APBD</option>
                        <option value="ADD">ADD</option>
                        <option value="SWADAYA">SWADAYA</option>
                        <option value="Lainnya">Lainnya</option>
                      </optgroup>
                    </select>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <label for="keterpaduanKelompok">Keterpaduan Kelompok</label>
                      <select name="keterpaduan_kelompok" id="keterpaduanKelompok" class="form-select">
                        <option hidden>Pilih Keterpaduan Kelompok</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                  </div>
                </div>
                
                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <label for="propn">Proyek Prioritas Nasional</label>
                      <select name="pro_pn" id="propn" class="form-select">
                        <option hidden>Pilih Proyek Prioritas Nasional</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- Card Ketersediaan Materi & Sarana PIK-R --}}

        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5>C. Ketersediaan Materi & Sarana PIK-R</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <h6>Materi PIK-R</h6>
                <p>1. Kesehatan Remaja</p>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <label for="pubertas">a. Pubertas</label>
                      <select name="" id="pubertas" class="form-select">
                        <option hidden>Pilih Materi</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <label for="seksualitas">b. Seksualitas</label>
                      <select name="" id="seksualitas" class="form-select">
                        <option hidden>Pilih Materi</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <label for="reproduksi">c. Reproduksi</label>
                      <select name="" id="reproduksi" class="form-select">
                        <option hidden>Pilih Materi</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <label for="giziRemaja">d. Kesehatan dan Gizi Remaja</label>
                      <select name="" id="giziRemaja" class="form-select">
                        <option hidden>Pilih Materi</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <label for="perilakuBerisiko">e. Perilaku Berisiko</label>
                      <select name="" id="perilakuBerisiko" class="form-select">
                        <option hidden>Pilih Materi</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <label for="tindakanBerbahaya">f. Tindakan Berbahaya</label>
                      <select name="" id="tindakanBerbahaya" class="form-select">
                        <option hidden>Pilih Materi</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                  </div>
                </div>

                <p>2. Perencanaan Berkeluarga</p>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <label for="persiapanPernikahan">a. Persiapan Pernikahan</label>
                      <select name="" id="persiapanPernikahan" class="form-select">
                        <option hidden>Pilih Materi</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <label for="perkembanganKeluarga">b. Perkembangan Keluarga</label>
                      <select name="" id="perkembanganKeluarga" class="form-select">
                        <option hidden>Pilih Materi</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <label for="pengasuhanKeluarga">c. Pengasuhan Keluarga Sehat</label>
                      <select name="" id="pengasuhanKeluarga" class="form-select">
                        <option hidden>Pilih Materi</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                  </div>
                </div>

                <p>3. Life Skill</p>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <label for="softSkill">a. Soft Skill</label>
                      <select name="" id="softSkill" class="form-select">
                        <option hidden>Pilih Materi</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <label for="hardSkill">b. Hard Skill</label>
                      <select name="" id="hardSkill" class="form-select">
                        <option hidden>Pilih Materi</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                  </div>
                </div>

                <p>4. Lainnya</p>
                
                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <select name="" id="materi_lainnya" class="form-select">
                        <option hidden>Pilih Materi</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-floating">
                      <textarea name="materi_lainnya" id="materiLainnya" cols="30" rows="3" class="form-control" disabled></textarea>
                      <label for="materiLainnya">Materi Lainnya</label>
                  </div>
                </div>

                <div class="mt-3">
                  <h6>Sarana PIK-R</h6>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <label for="ruangSekretariat">1. Ruang Sekretariat</label>
                      <select name="" id="ruangSekretariat" class="form-select">
                        <option hidden>Pilih Sarana</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <label for="papanNama">2. Papan Nama</label>
                      <select name="" id="papanNama" class="form-select">
                        <option hidden>Pilih Sarana</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <label for="ruangKonseling">3. Ruang Khusus Konseling</label>
                      <select name="" id="ruangKonseling" class="form-select">
                        <option hidden>Pilih Sarana</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <label for="pedomanPikr">4. Pedoman Pengelolaan PIK-R</label>
                      <select name="" id="pedomanPikr" class="form-select">
                        <option hidden>Pilih Sarana</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <label for="modulFasilitator">5. Modul Fasilitator PIK-R</label>
                      <select name="" id="modulFasilitator" class="form-select">
                        <option hidden>Pilih Sarana</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <label for="bukuPs">6. Buku Pegangan PS</label>
                      <select name="" id="bukuPs" class="form-select">
                        <option hidden>Pilih Sarana</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <label for="modulTentangKita">7. Modul "Tentang Kita"</label>
                      <select name="" id="modulTentangKita" class="form-select">
                        <option hidden>Pilih Sarana</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <label for="lembarBalik">8. Lembar Balik</label>
                      <select name="" id="lembarBalik" class="form-select">
                        <option hidden>Pilih Sarana</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <label for="leaflet">9. Leaflet</label>
                      <select name="" id="leaflet" class="form-select">
                        <option hidden>Pilih Sarana</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <label for="poster">10. Poster</label>
                      <select name="" id="poster" class="form-select">
                        <option hidden>Pilih Sarana</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                  </div>
                </div>
                
                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <label for="genreKit">11. GenRe Kit</label>
                      <select name="" id="genreKit" class="form-select">
                        <option hidden>Pilih Sarana</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <label for="komikBerseri">12. Buku Komik Berseri</label>
                      <select name="" id="komikBerseri" class="form-select">
                        <option hidden>Pilih Sarana</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                  </div>
                </div>

                <p>13. Lainnya</p>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                      <select name="" id="sarana_lainnya" class="form-select">
                        <option hidden>Pilih Sarana</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-floating">
                      <textarea name="sarana_lainnya" id="saranaLainnya" cols="30" rows="3" class="form-control" disabled></textarea>
                      <label for="saranaLainnya">Sarana Lainnya</label>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        {{-- Card Mitra PIK-R --}}

        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5>D. Mitra PIK-R</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="namaMitra">Nama Mitra</label>
                    <input type="text" class="form-control" id="namaMitra" placeholder="Masukkan Nama Mitra" required>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="mou">MOU/Perjanjian Kerjasama</label>
                    <select name="" id="mou" class="form-select" required>
                      <option hidden>Pilih MOU/Perjanjian Kerjasama</option>
                      <option value="Ya">Ya</option>
                      <option value="Tidak">Tidak</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="bentukKerjasama">Bentuk Kerjasama</label>
                    <select name="" id="bentukKerjasama" class="form-select" required>
                      <option hidden>Pilih Bentuk Kerjasama</option>
                      <option value="Sponsorship">Sponsorship</option>
                      <option value="Narasumber">Narasumber</option>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 col-12 mt-4">
                  <button class="btn btn-primary" type="button" id="tambahMou">Tambah</button>
                </div>

                <div class="col-md-12 mt-3">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Nama Mitra</th>
                        <th>MOU/Perjanjian Kerjasama</th>
                        <th>Bentuk Kerjasama</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="tabelMitra">
                      {{-- isi tabel mitra menggunakan jquery --}}
                    </tbody>
                </table>
                </div>
                
              </div>
            </div>
          </div>
        </div>

        {{-- Card Pengurus PIK-R --}}

        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5>E. Informasi Pengurus PIK-R</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" placeholder="Masukkan Nomor Induk Kependudukan Anda" required>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="namaLengkap">Nama Lengkap</label>
                    <input type="text" class="form-control" id="namaLengkap" placeholder="Masukkan Nama Lengkap Anda" required>
                  </div>
                </div>
                
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="jabatanPengurus">Jabatan</label>
                    <select name="" id="jabatanPengurus" class="form-select">
                      <option hidden>Pilih Jabatan</option>
                      <option value="Pembina">Pembina</option>
                      <option value="Ketua">Ketua</option>
                      <option value="Sekretaris">Sekretaris</option>
                      <option value="Bendahara">Bendahara</option>
                      <option value="Ketua Bidang">Ketua Bidang</option>
                      <option value="Pendidik Sebaya">Pendidik Sebaya</option>
                      <option value="Konselor Sebaya">Konselor Sebaya</option>
                      <option value="Anggota">Anggota</option>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="noHp">No. Handphone</label>
                    <input type="text" class="form-control" id="noHp" placeholder="Masukkan Nomor Handphone Anda" required>
                  </div>
                </div>
                
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="pelatihan">Pelatihan</label>
                    <select name="" id="pelatihan" class="form-select">
                      <option hidden>Pernah Ikut Pelatihan?</option>
                      <option value="Ya">Ya</option>
                      <option value="Tidak">Tidak</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-6 col-12 mt-4">
                  <button class="btn btn-primary" type="button" id="tambahPengurus">Tambah</button>
                </div>

                <div class="col-md-12 mt-3">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Jabatan</th>
                        <th>No. Handphone</th>
                        <th>Pelatihan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="tabelPengurus">
                      {{-- isi tabel mitra menggunakan jquery --}}
                    </tbody>
                </table>
                </div>

              </div>
            </div>
          </div>
        </div>

      </form>
    </div>
  </section>
@endsection

@section('script')
  <script src="{{ asset('dist') }}/assets/extensions/jquery/jquery.min.js"></script>
  <script src="{{ asset('dist') }}/assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
  <script src="{{ asset('dist') }}/assets/js/pages/form-element-select.js"></script>

  <script>
    $(document).ready(function () {
      $('#selectPembina').click(function (e) { 
        e.preventDefault();
        const pembina = $('#selectPembina option:selected').val();
        
        // console.log(pembina);

        if (pembina === "1") {
          $("#jabatanLainnya").replaceWith(`
            <input type="text" name="jabatan_lainnya" id="jabatanLainnya" class="form-control" placeholder="Lainnya..." disabled>
          `);
          
          $('#namaPembina').replaceWith(`
            <input class="form-control" list="datalistOptions" name="pembina_id" id="namaPembina" placeholder="Cari Nama Pembina">
          `);

          $('#datalistOptions').remove();

          $(`
            <datalist id="datalistOptions">
                @foreach ($pembina as $p)
                    <option>{{ $p->nama }}</option>
                @endforeach
            </datalist>
          `).insertAfter('#namaPembina');
        } else if (pembina === "0"){
          $("#jabatanLainnya").replaceWith(`
            <input type="text" name="jabatan_lainnya" id="jabatanLainnya" class="form-control" placeholder="Lainnya...">
          `);
          
          $('#namaPembina').replaceWith(`
            <input class="form-control" list="datalistOptions" name="pembina_id" id="namaPembina" placeholder="Cari Nama Pembina">
          `);;

          $('#datalistOptions').remove();
        } else {
          $("#jabatanLainnya").replaceWith(`
            <input type="text" name="jabatan_lainnya" id="jabatanLainnya" class="form-control" placeholder="Lainnya..." disabled>
          `);

          $('#namaPembina').replaceWith(`
            <input class="form-control" list="datalistOptions" name="pembina_id" id="namaPembina" placeholder="Cari Nama Pembina" disabled>
          `);
        }
      });

      $('#punyaMedsos').click(function (e) { 
        e.preventDefault();
        
        const medsos = $('#punyaMedsos option:selected').val();

        if (medsos === "1") {
          $('#akunMedsos').replaceWith(`
          <input type="text" name="akun_medsos" id="akunMedsos" class="form-control" placeholder="Masukkan Nama Akun Media Sosial">
          `);
        } else {
          $('#akunMedsos').replaceWith(`
          <input type="text" name="akun_medsos" id="akunMedsos" class="form-control" placeholder="Masukkan Nama Akun Media Sosial" disabled>
          `);
        }
      });

      $('#punyaSk').click(function (e) { 
        e.preventDefault();
        
        const sk = $('#punyaSk option:selected').val();

        if (sk === "1") {
          $('#nomorSk').replaceWith(`
            <input type="text" name="no_sk" id="nomorSk" class="form-control" placeholder="Masukkan Nomor SK">
          `);

          $('#tanggalSk').replaceWith(`
            <input type="date" name="tanggal_sk" id="tanggalSk" class="form-control">
          `);

          $('#dikeluarkanOleh').replaceWith(`
            <select name="dikeluarkan_oleh" id="dikeluarkanOleh" class="form-select">
              <option hidden>Dikeluarkan Oleh</option>
              <option value="Kepala Desa/Lurah">Kepala Desa/Lurah</option>
              <option value="Camat">Camat</option>
              <option value="OPD-KB">OPD-KB</option>
              <option value="Bupati/Walikota">Bupati/Walikota</option>
              <option value="Lainnya">Lainnya</option>
            </select>
          `);
        } else {
          $('#nomorSk').replaceWith(`
            <input type="text" name="no_sk" id="nomorSk" class="form-control" placeholder="Masukkan Nomor SK" disabled>
          `);

          $('#tanggalSk').replaceWith(`
            <input type="date" name="tanggal_sk" id="tanggalSk" class="form-control" disabled>
          `);

          $('#dikeluarkanOleh').replaceWith(`
            <select name="dikeluarkan_oleh" id="dikeluarkanOleh" class="form-select" disabled>
              <option hidden>Dikeluarkan Oleh</option>
              <option value="Kepala Desa/Lurah">Kepala Desa/Lurah</option>
              <option value="Camat">Camat</option>
              <option value="OPD-KB">OPD-KB</option>
              <option value="Bupati/Walikota">Bupati/Walikota</option>
              <option value="Lainnya">Lainnya</option>
            </select>
          `);
        }
      });

      $('#materi_lainnya').click(function (e) { 
        e.preventDefault();
        
        const materiLainnya = $('#materi_lainnya option:selected').val();

        if (materiLainnya === "1") {
          $('#materiLainnya').replaceWith(`
            <textarea name="materi_lainnya" id="materiLainnya" cols="30" rows="3" class="form-control"></textarea>
          `);
        } else {
          $('#materiLainnya').replaceWith(`
            <textarea name="materi_lainnya" id="materiLainnya" cols="30" rows="3" class="form-control" disabled></textarea>
          `);
        }
      });

      $('#sarana_lainnya').click(function (e) { 
        e.preventDefault();

        const saranaLainnya = $('#sarana_lainnya option:selected').val();
        
        if (saranaLainnya === "1") {
          $('#saranaLainnya').replaceWith(`
            <textarea name="sarana_lainnya" id="saranaLainnya" cols="30" rows="3" class="form-control"></textarea>
          `);
        } else {
          $('#saranaLainnya').replaceWith(`
            <textarea name="sarana_lainnya" id="saranaLainnya" cols="30" rows="3" class="form-control" disabled></textarea>
          `);
        }
      });
      
      $('#tambahMou').click(function (e) { 
        e.preventDefault();

        const namaMitra = $('#namaMitra').val();
        const mou = $('#mou option:selected').val();
        const bentukKerjasama = $('#bentukKerjasama option:selected').val();

        $(`
          <tr>
            <td>${namaMitra}</td>
            <td>${mou}</td>
            <td>${bentukKerjasama}</td>
            <td>
              <button type="button" class="btn btn-danger">Hapus</button>
            </td>
          </tr>
        `).appendTo('#tabelMitra');

      });

      $('#tambahPengurus').click(function (e) { 
        e.preventDefault();
        
        const nik= $('#nik').val();
        const namaLengkap= $('#namaLengkap').val();
        const jabatanPengurus= $('#jabatanPengurus option:selected').val();
        const noHp= $('#noHp').val();
        const pelatihan= $('#pelatihan option:selected').val();

        $(`
          <tr>
            <td>${nik}</td>
            <td>${namaLengkap}</td>
            <td>${jabatanPengurus}</td>
            <td>${noHp}</td>
            <td>${pelatihan}</td>
            <td>
              <button type="button" class="btn btn-danger">Hapus</button>
            </td>
          </tr>
        `).appendTo('#tabelPengurus');
      });
      
    });
  </script>
@endsection
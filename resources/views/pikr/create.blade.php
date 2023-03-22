@extends('layouts.main', [
    'title' => 'Data PIK-R',
    'heading' => 'Tambah Data PIK-R',
    'breadcrumb' => ['Data Master', 'Data PIK-R', 'Tambah Data PIK-R'],
])

@section('link')
  <link href="{{ asset('dist') }}/assets/css/pages/fontawesome.css" rel="stylesheet">
  <link href="{{ asset('dist') }}/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <link href="{{ asset('dist') }}/assets/css/pages/datatables.css" rel="stylesheet">
  <link href="{{ asset('dist') }}/assets/extensions/choices.js/public/assets/styles/choices.css" rel="stylesheet">
@endsection

@section('container')
  <section id="multiple-column-form">
    <div class="row match-height">
      <form class="form" action="{{ route('pikr.store') }}" method="POST">
        @csrf

        {{-- Card Identitas Kelompok --}}

        <!-- FIXME: fix name dan id untuk setiap input -->
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
                    <input class="form-control" id="nama" name="nama" type="text" placeholder="Masukkan Nama PIK-R">
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input class="form-control" id="alamat" name="alamat" type="text" placeholder="Masukkan Alamat PIK-R">
                  </div>
                </div>

                <!-- Data dari dependent dropdown mohon bisa dihubungkan dengan input form dibawah ini -->
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="provinsi">Provinsi</label>
                    <input class="form-control" id="input_provinsi" name="provinsi" type="text" disabled>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="kabkota">Kabupaten/Kota</label>
                    <input class="form-control" id="input_kabkota" name="kabkota" type="text" disabled>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="kecamatan">Kecamatan</label>
                    <input class="form-control" id="input_kecamatan" name="kecamatan" type="text" disabled>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="desa">Desa/Kelurahan</label>
                    <input class="form-control" id="input_desa" name="desa_id" type="text" disabled>
                  </div>
                </div>

                <!-- Akhir data dependent dropdown -->

                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="basis">Basis PIK-R</label>
                    <select class="form-select" id="basis" name="basis">
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
                    <select class="form-select" id="selectPembina">
                      <option hidden>Pilih Jabatan</option>
                      <option value="1">PKB/PLKB</option>
                      <option value="0">Lainnya</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="jabatanLainnya">Lainnya</label>
                    <input class="form-control" id="jabatanLainnya" name="jabatan_lainnya" type="text" placeholder="Lainnya..." disabled>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="namaPembina">Nama Pembina</label>
                    <input class="form-control" id="namaPembina" name="pembina_id" list="list-pembina" placeholder="Cari Nama Pembina" disabled>
                    <datalist id="list-pembina">
                      @foreach ($pembinas as $p)
                        <option>{{ $p->nama }}</option>
                      @endforeach
                    </datalist>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="punyaMedsos" name="punyaMedsos" type="checkbox">
                      <label for="punyaMedsos">Akun Media Sosial</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="akunMedsos">Nama Akun Media Sosial</label>
                    <input class="form-control" id="akunMedsos" name="akun_medsos" type="text" placeholder="Masukkan Nama Akun Media Sosial" disabled>
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
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="punyaSk" name="punyaSk" type="checkbox">
                      <label for="punyaSk">SK Pengukuhan</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="nomorSk">Nomor SK</label>
                    <input class="form-control" id="nomorSk" name="no_sk" type="text" placeholder="Masukkan Nomor SK" disabled>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="tanggalSk">Tanggal SK</label>
                    <input class="form-control" id="tanggalSk" name="tanggal_sk" type="date" disabled>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="dikeluarkanOleh">Dikeluarkan Oleh</label>
                    <select class="form-select" id="dikeluarkanOleh" name="dikeluarkan_oleh" disabled>
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
                    <select class="choices form-select multiple-remove" id="sumberDana" name="sumber_dana" multiple="multiple">
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
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="keterpaduanKelompok" name="keterpaduanKelompok" type="checkbox">
                      <label for="keterpaduanKelompok">Keterpaduan Kelompok</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="propn" name="propn" type="checkbox">
                      <label for="propn">Proyek Prioritas Nasional</label>
                    </div>
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
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="pubertas" name="pubertas" type="checkbox">
                      <label for="pubertas">a. Pubertas</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="seksualitas" name="seksualitas" type="checkbox">
                      <label for="seksualitas">b. Seksualitas</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="reproduksi" name="reproduksi" type="checkbox">
                      <label for="reproduksi">c. Reproduksi</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="giziRemaja" name="giziRemaja" type="checkbox">
                      <label for="giziRemaja">d. Kesehatan dan Gizi Remaja</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="perilakuBerisiko" name="perilakuBerisiko" type="checkbox">
                      <label for="perilakuBerisiko">e. Perilaku Berisiko</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="tindakanBerbahaya" name="tindakanBerbahaya" type="checkbox">
                      <label for="tindakanBerbahaya">f. Tindakan Berbahaya</label>
                    </div>
                  </div>
                </div>

                <p>2. Perencanaan Berkeluarga</p>

                <div class="col-md-6 col-12">
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="persiapanPernikahan" name="persiapanPernikahan" type="checkbox">
                      <label for="persiapanPernikahan">a. Persiapan Pernikahan</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="perkembanganKeluarga" name="perkembanganKeluarga" type="checkbox">
                      <label for="perkembanganKeluarga">b. Perkembangan Keluarga</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="pengasuhanKeluarga" name="pengasuhanKeluarga" type="checkbox">
                      <label for="pengasuhanKeluarga">c. Pengasuhan Keluarga Sehat</label>
                    </div>
                  </div>
                </div>

                <p>3. Life Skill</p>

                <div class="col-md-6 col-12">
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="softSkill" name="softSkill" type="checkbox">
                      <label for="softSkill">a. Soft Skill</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="hardSkill" name="hardSkill" type="checkbox">
                      <label for="hardSkill">b. Hard Skill</label>
                    </div>
                  </div>
                </div>

                <p>4. Lainnya</p>

                <div class="col-md-6 col-12">
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="materi_lainnya" name="materi_lainnya" type="checkbox">
                      <label for="materi_lainnya">Materi Lainnya</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-floating">
                    <textarea class="form-control" id="materiLainnya" name="materi_lainnya" cols="30" rows="3" disabled></textarea>
                    <label for="materiLainnya">Materi Lainnya</label>
                  </div>
                </div>

                <div class="mt-3">
                  <h6>Sarana PIK-R</h6>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="ruangSekretariat" name="ruangSekretariat" type="checkbox">
                      <label for="ruangSekretariat">1. Ruang Sekretariat</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="papanNama" name="papanNama" type="checkbox">
                      <label for="papanNama">2. Papan Nama</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="ruangKonseling" name="ruangKonseling" type="checkbox">
                      <label for="ruangKonseling">3. Ruang Khusus Konseling</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="pedomanPikr" name="pedomanPikr" type="checkbox">
                      <label for="pedomanPikr">4. Pedoman Pengelolaan PIK-R</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="modulFasilitator" name="modulFasilitator" type="checkbox">
                      <label for="modulFasilitator">5. Modul Fasilitator PIK-R</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="bukuPs" name="bukuPs" type="checkbox">
                      <label for="bukuPs">6. Buku Pegangan PS</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="modulTentangKita" name="modulTentangKita" type="checkbox">
                      <label for="modulTentangKita">7. Modul "Tentang Kita"</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="lembarBalik" name="lembarBalik" type="checkbox">
                      <label for="lembarBalik">8. Lembar Balik</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="leaflet" name="leaflet" type="checkbox">
                      <label for="leaflet">9. Leaflet</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="poster" name="poster" type="checkbox">
                      <label for="poster">10. Poster</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="genreKit" name="genreKit" type="checkbox">
                      <label for="genreKit">11. GenRe Kit</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="komikBerseri" name="komikBerseri" type="checkbox">
                      <label for="komikBerseri">12. Buku Komik Berseri</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="sarana_lainnya" name="sarana_lainnya" type="checkbox">
                      <label for="sarana_lainnya">13. Lainnya</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-floating">
                    <textarea class="form-control" id="saranaLainnya" name="sarana_lainnya" cols="30" rows="3" disabled></textarea>
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
                    <input class="form-control" id="namaMitra" type="text" placeholder="Masukkan Nama Mitra" required>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="mou" name="mou" type="checkbox">
                      <label for="mou">MOU/Perjanjian Kerjasama</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="bentukKerjasama">Bentuk Kerjasama</label>
                    <select class="form-select" id="bentukKerjasama" name="" required>
                      <option hidden>Pilih Bentuk Kerjasama</option>
                      <option value="Sponsorship">Sponsorship</option>
                      <option value="Narasumber">Narasumber</option>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 col-12 mt-4">
                  <button class="btn btn-primary" id="tambahMou" type="button">Tambah</button>
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
                      <!-- TODO: isi tabel mitra menggunakan jquery -->
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
                    <input class="form-control" id="nik" type="text" placeholder="Masukkan Nomor Induk Kependudukan Anda" required>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="namaLengkap">Nama Lengkap</label>
                    <input class="form-control" id="namaLengkap" type="text" placeholder="Masukkan Nama Lengkap Anda" required>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="jabatanPengurus">Jabatan</label>
                    <select class="form-select" id="jabatanPengurus" name="">
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
                    <input class="form-control" id="noHp" type="text" placeholder="Masukkan Nomor Handphone Anda" required>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-check">
                    <div class="checkbox">
                      <input class="form-check-input" id="pelatihan" name="pelatihan" type="checkbox">
                      <label for="pelatihan">Pernah ikut pelatihan</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-12 mt-4">
                  <button class="btn btn-primary" id="tambahPengurus" type="button">Tambah</button>
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
                      <!-- TODO: isi tabel pengurus menggunakan jquery -->
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

  <script src="/js/pikr.create.js"></script>
@endsection

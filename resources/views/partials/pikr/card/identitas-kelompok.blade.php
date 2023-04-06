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
            <label for="jabatanLainnya">Jabatan Lainnya</label>
            <input class="form-control" id="jabatanLainnya" name="jabatan_lainnya" type="text" placeholder="Jabatan Lainnya..." disabled>
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

        <div class="col-12">
          <div class="form-group">
            <label for="">Media Sosial</label>
          </div>
        </div>

        <div class="col-12">
          <div class="form-group">
            <div class="form-check mb-2">
              <div class="checkbox">
                <input class="form-check-input" id="punyaMedsos" name="punyaMedsos" type="checkbox">
                <label for="punyaMedsos">Punya Akun Media Sosial</label>
              </div>
            </div>
            <input class="form-control" id="akunMedsos" name="akun_medsos" type="text" placeholder="Masukkan Nama Akun Media Sosial" disabled>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

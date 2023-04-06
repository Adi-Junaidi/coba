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

        <div class="col-md-6 col-12">
          <button class="ms-auto d-block btn btn-primary" id="tambahPengurus" type="button">Tambah</button>
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

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

        <div class="col-md-6 col-12">
          <div class="form-check form-group">
            <div class="checkbox">
              <input class="form-check-input" id="mou" name="mou" type="checkbox">
              <label for="mou">MOU/Perjanjian Kerjasama</label>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-12">
          <button class="ms-auto d-block btn btn-primary" id="tambahMou" type="button">Tambah</button>
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

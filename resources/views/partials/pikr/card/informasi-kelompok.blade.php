<div class="col-12">
  <div class="card">
    <div class="card-header">
      <h5>B. Informasi Kelompok</h5>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-12">
          <div class="form-group">
            <label for="">SK Pengukuhan</label>
          </div>
        </div>

        <div class="col-12">
          <div class="form-group">
            <div class="form-check">
              <div class="checkbox">
                <input class="form-check-input" id="punyaSk" name="punyaSk" type="checkbox">
                <label for="punyaSk">Punya SK Pengukuhan</label>
              </div>
            </div>
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
          <div class="form-group">
            <label for=""></label>
            <div class="form-check">
              <div class="checkbox">
                <input class="form-check-input" id="keterpaduanKelompok" name="keterpaduanKelompok" type="checkbox">
                <label for="keterpaduanKelompok">Keterpaduan Kelompok</label>
              </div>
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
</div>

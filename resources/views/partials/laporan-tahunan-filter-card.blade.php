<div class="card">
  <div class="card-body">
    <form>
      <div class="row mb-4">
        <div class="col-2"><label for="kb">Kab/Kota</label></div>
        <div class="col-4">
          <select class="form-select" id="kb" name="kb">
            <option value="">Filter Kab/Kota</option>
            @foreach ($kabkotas as $kabkota)
              <option value="{{ $kabkota->id }}" {{ $kabkota->id == $filters['kabkota_id'] ? 'selected' : '' }}>{{ $kabkota->kode }} | {{ $kabkota->nama }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-2"><label for="kc">Kecamatan</label></div>
        <div class="col-4">
          <select class="form-select" id="kc" name="kc" disabled>
            <option hidden>Filter Kecamatan</option>
            <!-- TODO: diisi dengan ajax -->
            {{-- @foreach ($kecamatans as $kecamatan)
                  <option value="{{ $kecamatan->id }}">{{ $kecamatan->kode }} | {{ $kecamatan->nama }}</option>
                @endforeach --}}
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-2"><label for="t">Periode</label></div>
        <div class="col-4">
          <input class="form-control" id="t" name="t" type="number" value="{{ $filters['tahun'] }}" min="2000" max="9999" placeholder="Tahun">
        </div>
        <div class="col-6">
          <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Cari</button>
          <button class="btn btn-danger" name="export" type="submit" value="pdf"><i class="far fa-file-pdf"></i> Cetak</button>
          <button class="btn btn-success" name="export" type="submit" value="xlsx"><i class="far fa-file-excel"></i> Cetak</button>
        </div>
      </div>
    </form>
  </div>
</div>

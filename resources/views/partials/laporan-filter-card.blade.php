<div class="card">
  <div class="card-body">
    <div class="row mb-4">
      <div class="col-2"><label for="kabkota">Kab/Kota</label></div>
      <div class="col-4">
        <select class="form-select" id="kabkota" name="kabkota">
          <option hidden>Filter Kab/Kota</option>
          @foreach ($kabkotas as $kabkota)
            <option value="{{ $kabkota->id }}">{{ $kabkota->kode }} | {{ $kabkota->nama }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-2"><label for="kecamatan">Kecamatan</label></div>
      <div class="col-4">
        <select class="form-select" id="kecamatan" name="kecamatan" disabled>
          <option hidden>Filter Kecamatan</option>
          <!-- TODO: diisi dengan ajax -->
          {{-- @foreach ($kecamatans as $kecamatan)
                  <option value="{{ $kecamatan->id }}">{{ $kecamatan->kode }} | {{ $kecamatan->nama }}</option>
                @endforeach --}}
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-2"><label for="tahun">Periode</label></div>
      <div class="col-4">
        <input class="form-control" id="tahun" name="tahun" type="number" value="{{ date('Y') }}" min="2000" max="9999" placeholder="Tahun">
      </div>
      <div class="col-6">
        <button class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
        <button class="btn btn-danger"><i class="far fa-file-pdf"></i> Cetak</button>
        <button class="btn btn-success"><i class="far fa-file-excel"></i> Cetak</button>
      </div>
    </div>
  </div>
</div>

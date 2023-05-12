<div class="card">
  <div class="card-body">
    <form action="" method="get">
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
            <option value="">Filter Kecamatan</option>
            <!-- TODO: diisi dengan ajax -->
            {{-- @foreach ($kecamatans as $kecamatan)
                  <option value="{{ $kecamatan->id }}">{{ $kecamatan->kode }} | {{ $kecamatan->nama }}</option>
                @endforeach --}}
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-2"><label>Periode</label></div>
        <div class="col-2">
          @php
            $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            $month = $months[$filters['bulan'] - 1];
          @endphp
          <select class="form-select" id="b" name="b">
            @foreach ($months as $m)
              <option value="{{ $loop->iteration <= 9 ? '0' . $loop->iteration : $loop->iteration }}" {{ $month === $m ? 'selected' : '' }}>{{ $m }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-2"><input class="form-control" id="t" name="t" type="number" value="{{ date('Y') }}" min="2000" max="9999" placeholde="Tahun"></div>
        <div class="col-6">
          <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Cari</button>
          <a class="btn btn-danger" href="#"><i class="far fa-file-pdf"></i> Cetak</a>
          <a class="btn btn-success" href="#"><i class="far fa-file-excel"></i> Cetak</a>
        </div>
      </div>
    </form>
  </div>
</div>

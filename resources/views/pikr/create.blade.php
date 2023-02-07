@extends('layouts.main', [
    'title' => 'Tambah Data PIK-R',
    'heading' => 'Tambah Data PIK-R',
    'breadcrumb' => ['Data Master', 'Data PIK-R', 'Tambah Data'],
])

@section('container')
  <div class="card">
    <div class="card-header">
      <div class="card-title">
        <h4>A. Identitas PIK-R</h4>
      </div>
    </div>

    <div class="card-body">
      <!-- TODO: Tentukan field yang required dan opsional -->
      <form action="/pikr" method="post">
        @csrf

        <div class="row mb-3">
          <div class="col-2">
            <label class="form-label" for="nama">Nama</label>
          </div>
          <div class="col">
            <input class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" type="text" placeholder="Nama PIK-R">
            @error('nama')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-2">
            <label class="form-label" for="alamat">Alamat</label>
          </div>
          <div class="col">
            <input class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" type="text" placeholder="Alamat PIK-R">
            @error('alamat')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="row justify-content-end mb-3">
          <div class="col-2">
            <label class="form-label" for="provinsi">Provinsi</label>
          </div>

          <div class="col-3">
            <select class="form-select" id="provinsi" name="provinsi" disabled>
              <option value="">75 | Gorontalo</option>
            </select>
          </div>

          <div class="col-2">
            <label class="form-label" for="kabkota">Kabupaten/Kota</label>
          </div>

          <div class="col-3">
            <select class="form-select @error('kabkota') is-invalid @enderror" id="kabkota" name="kabkota">
              <option value="" hidden>Pilih Kabupaten/Kota</option>
              @foreach ($kabkota as $kabkota)
                <option value="{{ $kabkota->id }}">{{ $kabkota->kode }} | {{ $kabkota->nama }}</option>
              @endforeach
            </select>
            @error('kabkota')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="row justify-content-end mb-3">
          <div class="col-2">
            <label class="form-label" for="kecamatan">Kecamatan</label>
          </div>

          <div class="col-3">
            <!-- TODO: Dropdown Dependent -->
            <select class="form-select @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan" disabled>
              <option value="" hidden>Pilih Kecamatan</option>
            </select>
            @error('kecamatan')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-2">
            <label class="form-label" for="desa">Desa/Kelurahan</label>
          </div>

          <div class="col-3">
            <select class="form-select @error('desa') is-invalid @enderror" id="desa" name="desa" disabled>
              <option value="" hidden>Pilih Desa/Kelurahan</option>
            </select>
            @error('desa')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-2">
            <label class="form-label" for="basis">Basis</label>
          </div>
          <div class="col">
            <select class="form-select @error('basis') is-invalid @enderror" id="basis" name="basis">
              <!-- TODO: tambahkan basis lain -->
              <option value="" hidden>Pilih Basis PIK-R</option>
              <option value="Pendidikan - SMA/Setara">Pendidikan - SMA/Setara</option>
              <option value="Pendidikan - SMP/Setara">Pendidikan - SMP/Setara</option>
            </select>
            @error('basis')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-2">
            <label class="form-label" for="pembina_id">Pembina</label>
          </div>
          <div class="col">
            <select class="form-select @error('pembina_id') is-invalid @enderror" id="pembina_id" name="pembina_id">
              <option value="" hidden>Pilih Pembina PIK-R</option>
              @foreach ($pembinas as $pembina)
                <option value="{{ $pembina->id }}">{{ $pembina->nama }} | {{ $pembina->jabatan->nama }}</option>
              @endforeach
            </select>
            @error('pembina_id')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-2">
            <label class="form-label" for="akun_medsos">Medsos</label>
          </div>
          <div class="col">
            <input class="form-control @error('akun_medsos') is-invalid @enderror" id="akun_medsos" name="akun_medsos" type="text" placeholder="Media Sosial PIK-R">
            @error('akun_medsos')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        {{-- 
            $table->string('basis');
            $table->string('akun_medsos');
            $table->string('sumber_dana');
            $table->string('keterpaduan_kelompok');
            $table->string('pro_pn');
            $table->string('materi_lainnya');
            $table->string('sarana_lainnya');
            $table->string('jabatan_lainnya');
         --}}

        <button class="d-block btn btn-primary ms-auto" type="submit">Simpan</button>
      </form>
    </div>
  </div>
@endsection

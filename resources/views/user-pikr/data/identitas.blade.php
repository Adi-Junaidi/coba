@extends('layouts.user_pikr')

@push('custom_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
@endpush

@section('content')
    <section class="row">
        <h1 class="mb-3 d-sm-block d-none">Identitas Kelompok PIK-R</h1>
        <h3 class="mb-3 d-sm-none d-block">Identitas Kelompok PIK-R</h3>
        <div class="mb-5 p-4 bg-white shadow-sm">
            <div class="form-group">
                <label for="nama">Nama PIK-R</label>
                <input class="form-control" id="nama" type="text"
                    value="{{ $pikr_info->nama }}" disabled>
            </div>

            <div class="form-group">
                <label for="nama">Basis PIK-R</label>
                <input class="form-control" id="nama" type="text"
                    value="{{ $pikr_info->basis }}" disabled>
            </div>

            <div class="form-group">
                <label for="nama">Sosial Media PIK-R</label>
                <input class="form-control" id="nama" type="text"
                    value="{{ $pikr_info->akun_medsos }}" disabled>
            </div>
            <div class="row">
                <div class="form-group col-sm-4">
                    <label for="alamat">Alamat</label>
                    <input class="form-control" id="alamat" name="alamat" type="text"
                        value="{{ $pikr_info->alamat }}" disabled>
                </div>
    
                <div class="form-group col-sm-4">
                    <label for="provinsi">Provinsi</label>
                    <input class="form-control" id="provinsi" name="provinsi" type="text" value="{{ $pikr_info->desa->kecamatan->kabkota->provinsi->nama }}"
                        disabled>
                </div>
    
                <div class="form-group col-sm-4">
                    <label for="kabkota">Kabupaten/Kota</label>
                    <input class="form-control" id="kabkota" name="kabkota" type="text"
                        value="{{ $pikr_info->desa->kecamatan->kabkota->nama }}" disabled>
                </div>
    
            </div>
            <div class="row">
    
                <div class="form-group col-sm-6">
                    <label for="kecamatan">Kecamatan</label>
                    <input class="form-control" id="kecamatan" name="kecamatan" type="text"
                        value="{{ $pikr_info->desa->kecamatan->nama }}" disabled>
                </div>
    
                <div class="form-group col-sm-6">
                    <label for="desa">Desa/Kelurahan</label>
                    <input class="form-control" id="desa" name="desa_id" type="text"
                        value="{{ $pikr_info->desa->nama }}" disabled>
                </div>
            </div>


            <div class="mt-4">
                <button class="btn btn-primary">Update</button>
            </div>

        </div>
    </section>
@endsection

@push('custom_js')
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script src="/assets/js/bs-stepper.js"></script>
@endpush

{{-- <div class="bs-stepper">
    <div class="bs-stepper-header" role="tablist">
        <!-- your steps here -->
        <div class="step" data-target="#identitas-part">
            <button type="button" class="step-trigger" role="tab" aria-controls="identitas-part"
                id="identitas-part-trigger">
                <span class="bs-stepper-circle">1</span>
                <span class="bs-stepper-label d-lg-inline-block d-none small">Identitas Kelompok</span>
            </button>
        </div>
        <div class="line"></div>
        <div class="step" data-target="#alamat-part">
            <button type="button" class="step-trigger" role="tab" aria-controls="alamat-part"
                id="alamat-part-trigger">
                <span class="bs-stepper-circle">2</span>
                <span class="bs-stepper-label d-lg-inline-block d-none small">Alamat Kelompok</span>
            </button>
        </div>

    </div>

    <div class="bs-stepper-content">
        <!-- your steps content here -->
        <div id="identitas-part" class="content" role="tabpanel" aria-labelledby="identitas-part-trigger">
            <div class="form-group">
                <label for="nama">Nama PIK-R</label>
                <input class="form-control" id="nama" type="text"
                    value="{{ $pikr_info->nama }}" disabled>
            </div>

            <div class="form-group">
                <label for="nama">Basis PIK-R</label>
                <input class="form-control" id="nama" type="text"
                    value="{{ $pikr_info->basis }}" disabled>
            </div>

            <div class="form-group">
                <label for="nama">Sosial Media PIK-R</label>
                <input class="form-control" id="nama" type="text"
                    value="{{ $pikr_info->akun_medsos }}" disabled>
            </div>
            
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
                        <option value="LSM/Organisasi Kepemudaan/Organisasi Kemasyarakatan">Jalur Masyarakat -
                            LSM/Organisasi Kepemudaan/Organisasi Kemasyarakatan</option>
                    </optgroup>
                </select>
            </div>
            
            <div class="form-group">
                <label for="nama">Nama Pembina PIK-R</label>
                <input class="form-control" id="nama" type="text"
                    value="{{ $pikr_info->pembina->nama }}" disabled>
            </div>

            <div class="form-group">
                <label for="pembina">Jabatan Pembina</label>
                <select class="form-select" id="selectPembina">
                    <option hidden>Pilih Jabatan</option>
                    <option value="1">PKB/PLKB</option>
                </select>
            </div>


            <div class="form-group">
                <label for="punyaMedsos">Akun Media Sosial</label>
                <select class="form-select" id="punyaMedsos">
                    <option hidden>Punya Akun Media Sosial?</option>
                    <option value="1">Ada</option>
                    <option value="0">Tidak</option>
                </select>
            </div>

            <div class="form-group">
                <label for="akunMedsos">Nama Akun Media Sosial</label>
                <input class="form-control" id="akunMedsos" name="akun_medsos" type="text"
                    placeholder="Masukkan Nama Akun Media Sosial" disabled>
            </div>

            <button class="btn btn-primary mt-3" onclick="stepper.next()">Selanjutnya</button>
        </div>


        <div id="alamat-part" class="content" role="tabpanel" aria-labelledby="informasi-part-trigger">
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input class="form-control" id="alamat" name="alamat" type="text"
                    placeholder="Masukkan Alamat PIK-R">
            </div>

            <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <input class="form-control" id="provinsi" name="provinsi" type="text" value="75 | Gorontalo"
                    disabled>
            </div>

            <div class="form-group">
                <label for="kabkota">Kabupaten/Kota</label>
                <input class="form-control" id="kabkota" name="kabkota" type="text"
                    value="71 | Kota Gorontalo" disabled>
            </div>

            <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <input class="form-control" id="kecamatan" name="kecamatan" type="text"
                    value="01 | Kota Barat" disabled>
            </div>

            <div class="form-group">
                <label for="desa">Desa/Kelurahan</label>
                <input class="form-control" id="desa" name="desa_id" type="text"
                    value="01 | Buladu" disabled>
            </div>

            <div class="mt-4">
                <button class="btn btn-outline-primary" onclick="stepper.previous()">Sebelumnya</button>
                <button class="btn btn-primary" onclick="stepper.next()">Selanjutnya</button>
            </div>
        </div>

        <div id="ketersediaan-part" class="content" role="tabpanel"
            aria-labelledby="ketersediaan-part-trigger">
        </div>
        <div id="mitra-part" class="content" role="tabpanel" aria-labelledby="mitra-part-trigger">
        </div>
        <div id="pengurus-part" class="content" role="tabpanel" aria-labelledby="pengurus-part-trigger">
        </div>
    </div>
</div> --}}
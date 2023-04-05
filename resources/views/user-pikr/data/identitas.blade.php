@extends('layouts.user_pikr')

@push('custom_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
@endpush

@section('content')
    <section class="row">
        <h1 class="mb-3">Identitas Kelompok PIK-R</h1>
        <div class="mb-5 p-4 bg-white shadow-sm">
            <div class="bs-stepper">
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
                            <input class="form-control" id="nama" name="nama" type="text"
                                placeholder="Masukkan Nama PIK-R">
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
                            <label for="pembina">Jabatan Pembina</label>
                            <select class="form-select" id="selectPembina">
                                <option hidden>Pilih Jabatan</option>
                                <option value="1">PKB/PLKB</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="namaPembina">Nama Pembina</label>
                            <input class="form-control" id="namaPembina" name="pembina_id" list="datalistOptions"
                                placeholder="Cari Nama Pembina" disabled>
                            <datalist id="datalistOptions">
                                {{-- @foreach ($pembinas as $p)
                                    <option>{{ $p->nama }}</option>
                                @endforeach --}}
                            </datalist>
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
            </div>
        </div>
    </section>
@endsection

@push('custom_js')
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script src="/assets/js/bs-stepper.js"></script>
@endpush

{{-- 
<h4 class="my-4">Identitas Kelompok PIK-R</h4>





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
    <label for="pembina">Jabatan Pembina</label>
    <select class="form-select" id="selectPembina">
        <option hidden>Pilih Jabatan</option>
        <option value="1">PKB/PLKB</option>
        <option value="0">Lainnya</option>
    </select>
</div>

<div class="form-group">
    <label for="jabatanLainnya">Lainnya</label>
    <input class="form-control" id="jabatanLainnya" name="jabatan_lainnya" type="text" placeholder="Lainnya..."
        disabled>
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

<div class="mt-4">
</div> --}}

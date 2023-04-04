@extends('layouts.user_pikr')

@push('custom_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
@endpush

@section('content')
    <section class="row">
        <h1 class="mb-3">Informasi Kelompok PIK-R</h1>
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
                        <button class="btn btn-primary mt-3" onclick="stepper.next()">Selanjutnya</button>
                    </div>


                    <div id="alamat-part" class="content" role="tabpanel" aria-labelledby="informasi-part-trigger">
                        <div class="form-group">
                            <label for="pubertas">a. Pubertas</label>
                            <select class="form-select" id="pubertas" name="">
                                <option hidden>Pilih Materi</option>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <button class="btn btn-outline-primary" onclick="stepper.previous()">Sebelumnya</button>
                            <button class="btn btn-primary" onclick="stepper.next()">Selanjutnya</button>
                        </div>
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


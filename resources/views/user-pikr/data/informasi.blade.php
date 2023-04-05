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
                    <div class="step" data-target="#sk-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="sk-part"
                            id="sk-part-trigger">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label d-lg-inline-block d-none small">SK PIK-R</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#ect-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="ect-part"
                            id="ect-part-trigger">
                            <span class="bs-stepper-circle">2</span>
                            <span class="bs-stepper-label d-lg-inline-block d-none small">Informasi Lainnya</span>
                        </button>
                    </div>

                </div>
                <form action="/up/data/informasi" method="post">
                    @csrf
                    <div class="bs-stepper-content">
                        <!-- your steps content here -->
                        <div id="sk-part" class="content" role="tabpanel" aria-labelledby="sk-part-trigger">
                            <div class="form-group">
                                <div class="d-inline-block">
                                    <div class="form-check">
                                        <div class="checkbox">
                                            <input type="checkbox" id="sk_checkbox" class="form-check-input">
                                            <label for="sk_checkbox">Punya SK?</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="form-sk">
                                <div class="form-group">
                                    <label for="nomorSk">Nomor SK</label>
                                    <input class="form-control" id="nomorSk" name="no_sk" type="text"
                                        placeholder="Masukkan Nomor SK" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="tanggalSk">Tanggal SK</label>
                                    <input class="form-control" id="tanggalSk" name="tanggal_sk" type="date" disabled>
                                </div>


                                <div class="form-group">
                                    <label for="dikeluarkanOleh">Dikeluarkan Oleh</label>
                                    <select class="form-select" id="dikeluarkanOleh" name="dikeluarkan_oleh" disabled>
                                        <option value="">--Pilih--</option>
                                        <option value="Kepala Desa/Lurah">Kepala Desa/Lurah</option>
                                        <option value="Camat">Camat</option>
                                        <option value="OPD-KB">OPD-KB</option>
                                        <option value="Bupati/Walikota">Bupati/Walikota</option>
                                    </select>
                                </div>
                            </div>
                            <a class="btn btn-primary mt-3" onclick="stepper.next()">Selanjutnya</a>
                        </div>


                        <div id="ect-part" class="content" role="tabpanel" aria-labelledby="ect-part-trigger">
                            <div class="form-group">
                                <label for="sumberDana">Sumber Dana</label>
                                <ul class="list-unstyled mb-0 mt-3">

                                    <li class="d-inline-block me-2 mb-1">
                                        <div class="form-check">
                                            <div class="checkbox">
                                                <input type="checkbox" class="form-check-input" name="sumber_dana[]"
                                                    value="APBN">
                                                <label>APBN</label>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="d-inline-block me-2 mb-1">
                                        <div class="form-check">
                                            <div class="checkbox">
                                                <input type="checkbox" class="form-check-input" name="sumber_dana[]"
                                                    value="APBD">
                                                <label>APBD</label>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="d-inline-block me-2 mb-1">
                                        <div class="form-check">
                                            <div class="checkbox">
                                                <input type="checkbox" class="form-check-input" name="sumber_dana[]"
                                                    value="ADD">
                                                <label>ADD</label>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="d-inline-block me-2 mb-1">
                                        <div class="form-check">
                                            <div class="checkbox">
                                                <input type="checkbox" class="form-check-input" name="sumber_dana[]"
                                                    value="Swadaya">
                                                <label>Swadaya</label>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>

                            <div class="form-group">
                                <label for="keterpaduanKelompok">Keterpaduan Kelompok</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="keterpaduan" value="1">
                                    <label class="form-check-label"> Ya </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="keterpaduan" value="0">
                                    <label class="form-check-label"> Tidak </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Proyek Prioritas Nasional</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pro_pn" value="1">
                                    <label class="form-check-label"> Ya </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pro_pn" value="0">
                                    <label class="form-check-label"> Tidak </label>
                                </div>
                            </div>

                            <div class="mt-4">
                                <a class="btn btn-outline-primary" onclick="stepper.previous()">Sebelumnya</a>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </section>
@endsection

@push('custom_js')
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script src="/assets/js/bs-stepper.js"></script>
@endpush

@push('scripts')
    <script>
        $(':checkbox').change(function() {
            if (this.checked) {
                $('#form-sk :disabled').prop("disabled", false)
            } else {
                $('#form-sk :input').prop("disabled", true)
                $('#form-sk :input').val('')
                $('#form-sk select').prop("selectedIndex", 0)
            }
        })
    </script>
@endpush

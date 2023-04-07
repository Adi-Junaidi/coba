@extends('layouts.user_pikr')

@push('custom_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
@endpush

@push('custom_js')
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
@endpush


@section('content')
    <section id="updateable" class="row">
        <h1 class="mb-3">Informasi Kelompok PIK-R</h1>
        @if (session('stepper')->step_2)
            <div class="py-4 px-5 bg-white shadow-sm mb-3">
                <h5>A. SK PIK-R</h5>
                @if (!$sk)
                    <div class="sk_part">
                        <div id="add_sk" class="btn btn-primary mt-3">Tambah SK</div>
                    </div>
                @else
                    <div class="sk_part">
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
                                @foreach ($dikeluarkan as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="update_sk" class="btn btn-primary mt-3">Ubah</div>
                    </div>
                @endif
            </div>

            <div class="py-4 px-5 bg-white shadow-sm mb-3">
                <h5>B. Informasi Lainnya</h5>
                <form action="/up/data/informasi" method="post">
                    <div class="form-group">
                        <label for="sumberDana">Sumber Dana</label>
                        <ul class="list-unstyled mb-0 mt-3">

                            @foreach ($sumber_dana as $item)
                                <li class="d-inline-block me-2 mb-1">
                                    <div class="form-check">
                                        <div class="checkbox">
                                            <input type="checkbox" class="form-check-input" name="sumber_dana[]"
                                                value="{{ $item }}"
                                                {{ in_array($item, $sumber_dana_pikr) ? 'checked' : '' }}>
                                            <label>{{ $item }}</label>
                                        </div>
                                    </div>
                                </li>
                            @endforeach


                        </ul>
                    </div>

                    @csrf
                    <div class="form-group">
                        <label for="keterpaduanKelompok">Keterpaduan Kelompok</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="keterpaduan_kelompok" value="1"
                                {{ $pikr_info->keterpaduan_kelompok ? 'checked' : '' }}>
                            <label class="form-check-label"> Ya </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="keterpaduan_kelompok" value="0"
                                {{ !$pikr_info->keterpaduan_kelompok ? 'checked' : '' }}>
                            <label class="form-check-label"> Tidak </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Proyek Prioritas Nasional</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pro_pn" value="1"
                                {{ $pikr_info->pro_pn ? 'checked' : '' }}>
                            <label class="form-check-label"> Ya </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pro_pn" value="0"
                                {{ !$pikr_info->pro_pn ? 'checked' : '' }}>
                            <label class="form-check-label"> Tidak </label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div id="update_informasi" class="btn btn-primary mt-3">Ubah</div>
                        <div id="btn_hidden" class="mt-3" hidden>
                            <div class="btn btn-secondary cancel">Batalkan</div>
                            <button class="btn btn-primary">Ubah</button>
                        </div>
                    </div>
                </form>
            </div>

            @push('scripts')
                <script>
                    $('#updateable :input').prop("disabled", true)
                    $('#update_informasi').click(function() {
                        $('#updateable :input').prop("disabled", false)
                        $(this).hide()
                        $('#btn_hidden').prop('hidden', false)
                    })

                    $('.cancel').click(function() {
                        $('#btn_hidden').prop('hidden', true)
                        $('#updateable :input').prop("disabled", true)
                        $('#update_informasi').show()
                    })
                </script>
            @endpush
        @else
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
                                                <input type="checkbox" id="sk_checkbox" class="form-check-input"
                                                    name="has_sk">
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
                                        <input class="form-control" id="tanggalSk" name="tanggal_sk" type="date"
                                            disabled>
                                    </div>


                                    <div class="form-group">
                                        <label for="dikeluarkanOleh">Dikeluarkan Oleh</label>
                                        <select class="form-select" id="dikeluarkanOleh" name="dikeluarkan_oleh"
                                            disabled>
                                            @foreach ($dikeluarkan as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <a class="btn btn-primary mt-3" onclick="stepper.next()">Selanjutnya</a>
                            </div>

                            <div id="ect-part" class="content" role="tabpanel" aria-labelledby="ect-part-trigger">
                                <div class="form-group">
                                    <label for="sumberDana">Sumber Dana</label>
                                    <ul class="list-unstyled mb-0 mt-3">

                                        @foreach ($sumber_dana as $item)
                                            <li class="d-inline-block me-2 mb-1">
                                                <div class="form-check">
                                                    <div class="checkbox">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="sumber_dana[]" value="{{ $item }}" checked>
                                                        <label>{{ $item }}</label>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>

                                <div class="form-group">
                                    <label for="keterpaduanKelompok">Keterpaduan Kelompok</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="keterpaduan_kelompok"
                                            value="1">
                                        <label class="form-check-label"> Ya </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="keterpaduan_kelompok"
                                            value="0" checked>
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
                                        <input class="form-check-input" type="radio" name="pro_pn" value="0"
                                            checked>
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

            @push('scripts')
                <script>
                    $('#sk_checkbox').change(function() {
                        if (this.checked) {
                            $('#form-sk :disabled').prop("disabled", false)
                            $(this).val(true)
                        } else {
                            $(this).val('')
                            $('#form-sk :input').prop("disabled", true)
                            $('#form-sk :input').val('')
                            $('#form-sk select').prop("selectedIndex", 0)
                        }
                    })
                </script>
            @endpush
        @endif
    </section>
@endsection

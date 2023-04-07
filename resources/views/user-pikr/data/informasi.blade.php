@extends('layouts.user_pikr')

@push('custom_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
@endpush

@push('custom_js')
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
@endpush


@section('content')
    <h1 class="mb-3">Informasi Kelompok PIK-R</h1>
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible show fade">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <section id="updateable" class="row">
        @if (session('stepper')->step_2)
            <div class="py-4 px-5 bg-white shadow-sm mb-3">
                <h5>A. SK PIK-R</h5>
                @if (!$sk)
                    <div id="sk_part">
                        <div id="add_sk" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#addModal">
                            Tambah SK</div>
                    </div>
                @else
                    <div id="sk_part">
                        <form action="/up/data/update_sk" method="post">
                            @csrf
                            <input type="hidden" name="pikr_id" value="{{ auth()->user()->id }}">
                            <div class="form-group">
                                <label for="nomorSk">Nomor SK</label>
                                <input class="form-control" id="nomorSk" name="no_sk" type="text"
                                    placeholder="Masukkan Nomor SK" value="{{ $sk->no_sk }}">
                            </div>
                            <div class="form-group">
                                <label for="tanggalSk">Tanggal SK</label>
                                <input class="form-control" id="tanggalSk" name="tanggal_sk" type="date"
                                    value="{{ $sk->tanggal_sk }}">
                            </div>

                            <div class="form-group">
                                <label for="dikeluarkanOleh">Dikeluarkan Oleh</label>
                                <select class="form-select" id="dikeluarkanOleh" name="dikeluarkan_oleh">
                                    @foreach ($dikeluarkan as $item)
                                        <option value="{{ $item }}"
                                            {{ $sk->dikeluarkan_oleh == $item ? 'selected' : '' }}>{{ $item }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div id="update_sk" class="btn btn-primary mt-3 btn_ubah">Ubah</div>
                                <div class="mt-3 btn_hidden" hidden>
                                    <div class="btn btn-secondary cancel">Batalkan</div>
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
            </div>


            <div id="informasi_part" class="py-4 px-5 bg-white shadow-sm mb-3">
                <h5>B. Informasi Lainnya</h5>

                <form action="/up/data/informasi" method="post">
                    @csrf
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
                        <div id="update_informasi" class="btn btn-primary mt-3 btn_ubah">Ubah</div>
                        <div class="mt-3 btn_hidden" hidden>
                            <div class="btn btn-secondary cancel">Batalkan</div>
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>

            @push('scripts')
                <script>
                    $('#updateable :input').prop("disabled", true)

                    $('#update_sk').click(function() {
                        $('#sk_part :input').prop("disabled", false)
                        $(this).hide()
                        $('#sk_part .btn_hidden').prop('hidden', false)
                    })

                    $('#update_informasi').click(function() {
                        $('#informasi_part :input').prop("disabled", false)
                        $(this).hide()
                        $('#informasi_part .btn_hidden').prop('hidden', false)
                    })

                    $('.cancel').click(function() {
                        $('#updateable :input').prop("disabled", true)
                        $('.btn_hidden').prop('hidden', true)
                        $('.btn_ubah').show()
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
                                                            name="sumber_dana[]" value="{{ $item }}">
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
                <script src="/assets/js/bs-stepper.js"></script>
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

@push('modal')
    <div class="modal fade text-left" id="addModal" tabindex="-1" aria-labelledby="" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title white" id="myModalLabel1">
                        Tambah SK PIK-R
                    </h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <form action="/up/data/sk/{{ auth()->user()->id }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nomorSk">Nomor SK</label>
                            <input class="form-control" id="nomorSk" name="no_sk" type="text"
                                placeholder="Masukkan Nomor SK">
                        </div>
                        <div class="form-group">
                            <label for="tanggalSk">Tanggal SK</label>
                            <input class="form-control" id="tanggalSk" name="tanggal_sk" type="date">
                        </div>


                        <div class="form-group">
                            <label for="dikeluarkanOleh">Dikeluarkan Oleh</label>
                            <select class="form-select" id="dikeluarkanOleh" name="dikeluarkan_oleh">
                                @foreach ($dikeluarkan as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Submit</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush

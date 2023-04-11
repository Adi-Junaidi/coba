@extends('layouts.user_pikr')

@push('custom_css')
    <link href="{{ asset('dist') }}/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="{{ asset('dist') }}/assets/css/pages/datatables.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
@endpush


@push('custom_js')
    <script src="/assets/js/bs-stepper.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
@endpush

@section('content')
    <section>
        <h1 class="mb-3 d-sm-block d-none">Register Kegiatan PIK-R</h1>
        <h3 class="mb-3 d-sm-none d-block">Register Kegiatan PIK-R</h3>
        <div class="row align-items-center my-4">
            <button class="btn btn-primary me-3 col-md-2" data-bs-toggle="modal" data-bs-target="#addModal">Tambah
                Kegiatan</button>
        </div>
        <div class="mb-5 p-4 bg-white shadow-sm row">
            @if (!$laporan_s)
                <p>Tidak ada data yang tersimpan</p>
            @else
                <div class="table-responsive" style="max-height: 400px">
                    <table id="laporan-table" class="table table-lg">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bulan Tahun Lapor</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan_s as $laporan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bulan[$laporan->bulan] . ' ' . $laporan->tahun }}</td>
                                    <td>
                                        <button class="btn btn-success btn-sm d-flex align">
                                            <i class="bi bi-eye-fill me-2"></i>
                                            <span>Lihat</span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('modal')
    <div class="modal fade text-left" id="addModal" tabindex="-1" aria-labelledby="" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-full" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title white" id="myModalLabel1">
                        Tambah Mitra
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
                <form action="/up/register/kegiatan" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="bs-stepper">
                            <div class="bs-stepper-header" role="tablist">
                                <!-- your steps here -->
                                <div class="step" data-target="#bulan_tahun-part">
                                    <button type="button" class="step-trigger" role="tab"
                                        aria-controls="bulan_tahun-part" id="bulan_tahun-part-trigger">
                                        <span class="bs-stepper-circle">1</span>
                                        <span class="bs-stepper-label d-lg-inline-block d-none small">Bulan Tahun
                                            Kegiatan</span>
                                    </button>
                                </div>
                                <div class="line"></div>
                                <div class="step" data-target="#pelayanan-part">
                                    <button type="button" class="step-trigger" role="tab"
                                        aria-controls="pelayanan-part" id="pelayanan-part-trigger">
                                        <span class="bs-stepper-circle">2</span>
                                        <span class="bs-stepper-label d-lg-inline-block d-none small">Pelayanan Informasi
                                            PIK-R</span>
                                    </button>
                                </div>
                                <div class="line"></div>
                                <div class="step" data-target="#konseling-part">
                                    <button type="button" class="step-trigger" role="tab"
                                        aria-controls="konseling-part" id="konseling-part-trigger">
                                        <span class="bs-stepper-circle">2</span>
                                        <span class="bs-stepper-label d-lg-inline-block d-none small">Konseling</span>
                                    </button>
                                </div>

                                <div class="line"></div>
                                <div class="step" data-target="#konseling_kelompok-part">
                                    <button type="button" class="step-trigger" role="tab"
                                        aria-controls="konseling_kelompok-part" id="konseling_kelompok-part-trigger">
                                        <span class="bs-stepper-circle">2</span>
                                        <span class="bs-stepper-label d-lg-inline-block d-none small">Konseling
                                            Kelompok</span>
                                    </button>
                                </div>

                            </div>

                            <div class="bs-stepper-content">
                                <!-- your steps content here -->
                                <div id="bulan_tahun-part" class="content" role="tabpanel"
                                    aria-labelledby="bulan_tahun-part-trigger">
                                    @csrf
                                    <div class="form-group">
                                        <label for="tahun">Tahun Lapor</label>
                                        <select class="form-select" id="tahun" name="tahun_lapor">
                                            <option hidden value="">--Pilih Tahun--</option>
                                            @for ($i = date('Y'); $i >= date('Y') - 1; $i--)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>

                                    <div class="form-group d-none" id="bulan_kemarin">
                                        <label>Bulan Lapor</label>
                                        <select class="form-select">
                                            @foreach ($bulan as $key => $value)
                                                @if (in_array($key, $tahunKemarin))
                                                    @continue
                                                @endif
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group d-none" id="bulan_ini">
                                        <label>Bulan Lapor</label>
                                        <select class="form-select">
                                            @foreach ($bulan as $key => $value)
                                                @if ($key <= date('n'))
                                                    @if (in_array($key, $tahunIni))
                                                        @continue
                                                    @endif
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <a hidden class="btn btn-primary mt-3" onclick="stepper.next()">Selanjutnya</a>
                                </div>

                                <div id="pelayanan-part" class="content" role="tabpanel"
                                    aria-labelledby="pelayanan-part-trigger">

                                    <div class="row">
                                        <div class="form-group col-sm-4">
                                            <label for="">Tanggal Kegiatan</label>
                                            <input type="date" class="form-control"
                                                placeholder="Masukkan Tanggal Kegiatan">
                                        </div>

                                        <div class="form-group col-sm-8">
                                            <label for="">Nama Kegiatan</label>
                                            <input type="text" class="form-control"
                                                placeholder="Masukkan Tanggal Kegiatan">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-sm-8">
                                            <label for="">Materi Penyuluhan</label>
                                            <select name="" id="" class="form-select">
                                                @foreach ($materi_s as $materi)
                                                    <option value="{{ $materi->nama }}">{{ $materi->nama }}</option>
                                                @endforeach
                                                <option id="materi_lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="">Materi Lainnya</label>
                                            <input type="text" class="form-control"
                                                placeholder="Tulis Materi Penyuluhan" value="Tidak Ada" disabled>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-sm-8">
                                            <label for="">Penyaji Materi Penyuluhan</label>
                                            <select name="" id="" class="form-select">
                                                @foreach ($materi_s as $materi)
                                                    <option value="{{ $materi->nama }}">{{ $materi->nama }}</option>
                                                @endforeach
                                                <option id="materi_lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="">Penyaji Lainnya</label>
                                            <input type="text" class="form-control"
                                                placeholder="Tulis Materi Penyuluhan" value="Tidak Ada" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Nama Penyaji Materi</label>
                                        <select name="" id="" class="form-select">
                                            @foreach ($materi_s as $materi)
                                                <option value="{{ $materi->nama }}">{{ $materi->nama }}</option>
                                            @endforeach
                                            <option id="materi_lainnya">Lainnya</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Jumlah Remaja Yang Mengikuti Kegiatan</label>
                                        <input type="number" class="form-control" placeholder="Tulis Materi Penyuluhan"
                                            value="1">
                                    </div>

                                    <a class="btn btn-primary" id="submit-pelayanan">Tambahkan</a>


                                    <div class="table-responsive mt-4" style="max-height: 400px">
                                        <table id="laporan-table" class="table table-lg table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal Kegiatan</th>
                                                    <th>Nama Kegiatan</th>
                                                    <th>Materi Penyuluhan</th>
                                                    <th>Penyaji Materi</th>
                                                    <th>Nama Penyaji Materi</th>
                                                    <th>Jumlah Peserta</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody-pelayanan">
                                                <tr>
                                                    <td>1</td>
                                                    <td>1</td>
                                                    <td>1</td>
                                                    <td>1</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="my-4">
                                        <a class="btn btn-outline-primary" onclick="stepper.previous()">Sebelumnya</a>
                                        <a class="btn btn-primary" onclick="validate('pelayanan')">Selanjutnya</a>
                                    </div>

                                </div>

                                <div id="konseling-part" class="content" role="tabpanel"
                                    aria-labelledby="konseling-part-trigger">
                                    <div class="mt-4">
                                        <a class="btn btn-outline-primary" onclick="stepper.previous()">Sebelumnya</a>
                                        <a class="btn btn-primary" onclick="validate('konseling')">Selanjutnya</a>
                                    </div>
                                </div>

                                <div id="konseling_kelompok-part" class="content" role="tabpanel"
                                    aria-labelledby="konseling_kelompok-part-trigger">
                                    <div class="mt-4">
                                        <a class="btn btn-outline-primary" onclick="stepper.previous()">Sebelumnya</a>
                                        <button class="btn btn-primary" type="submit"
                                            onclick="validate('konseling_kelompok')">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
    <script src="/js/datatables.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#laporan-table').DataTable({
                'paging': false,
                'info': false,
            });

            $('#tahun').change(function() {
                if ($(this).val() == {{ date('Y') }}) {
                    $("#bulan_ini").removeClass('d-none')
                    $("#bulan_ini select").removeAttr('name')
                    $("#bulan_kemarin").addClass('d-none')
                    $("#bulan_kemarin select").attr('name', 'bulan_lapor')
                } else {
                    $("#bulan_kemarin").removeClass('d-none')
                    $("#bulan_kemarin select").removeAttr('name')
                    $("#bulan_ini").addClass('d-none')
                    $("#bulan_ini select").attr('name', 'bulan_lapor')
                }

                $('#bulan_tahun-part a').removeAttr('hidden')
            })

            $('#submit-pelayanan').click(function() {
                status = validate('pelayanan');
                if (status == 'true') {
                    console.log(getAllInput('pelayanan'));
                    $.ajax({
                        url: '/kegiatan/pelayanan',
                        type: 'GET',
                        data: getAllInput('pelayanan'),
                        dataType: 'json',
                        success: function(response) {

                            console.log(response);
                            // // Kosongkan isi tabel
                            // $('#table-data tbody').empty();

                            // // Tambahkan data ke tabel
                            // $.each(response, function(index, value) {
                            //     $('#table-data tbody').append('<tr><td>' + (index + 1) +
                            //         '</td><td>' + value.nama + '</td><td>' + value
                            //         .umur + '</td></tr>');
                            // });
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });
                } else {
                    console.log('o');
                }
            })

        });
    </script>

    <script>
        function errorAlert(text) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: text,
            })
        }

        function validate(param) {

            status = true

            $("#" + param + "-part :input[type='number']").each(function() {
                if ($(this).val() < 1) {
                    errorAlert('Jumlah peserta tidak valid');
                    status = false
                }
            })

            $("#" + param + "-part :input").each(function() {
                if ($(this).val() === '') {
                    errorAlert('Harap semua field di isi');
                    status = false
                }
            })

            return status
        }

        function getAllInput(param) {
            const data = {}
            const key = [
                'tanggal',
                'nama',
                'materi',
                'materi_lainnya',
                'jabatan_narsum',
                'narsum_lainnya',
                'narsum',
                'jumlah_peserta',
            ]
            let x = 0

            $("#" + param + "-part :input").each(function() {
                data[key[x]] = ($(this).val())
                x++
            })

            return data
        }
    </script>
@endpush

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
                                <th>Status</th>
                                <th style="width: 30%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan_s as $laporan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bulan[$laporan->bulan_lapor - 1]['nama']    . ' ' . $laporan->tahun_lapor }}</td>
                                    <td><span class="badge bg-light-danger">{{ $laporan->status }}</span></td>
                                    <td>
                                        <a href="/up/kegiatan/{{ $laporan->id }}" class="btn btn-info btn-sm">
                                            <i class="bi bi-plus-circle me-md-2"></i>
                                            <span class="d-none d-md-inline">Tambah Dokumen</span>
                                        </a>
                                        <button class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square me-md-2"></i>
                                            <span class="d-none d-md-inline">Edit</span>
                                        </button>
                                        <button class="btn btn-success btn-sm">
                                            <i class="bi bi-fast-forward me-md-2"></i>
                                            <span class="d-none d-md-inline">Submit</span>
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title white" id="myModalLabel1">
                        Tambah Register Kegiatan
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
                <form action="/up/kegiatan" method="post">
                    @csrf
                    <div class="modal-body">
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
                                @foreach ($bulan as $b)
                                    @if (in_array($b['value'], $tahunKemarin))
                                        @continue
                                    @endif
                                    <option value="{{ $b['value'] }}">{{ $b['nama'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group d-none" id="bulan_ini">
                            <label>Bulan Lapor</label>
                            <select class="form-select">
                                @foreach ($bulan as $b)
                                    @if ($b['value'] <= date('n'))
                                        @if (in_array($b['value'], $tahunIni))
                                            @continue
                                        @endif
                                        <option value="{{ $b['value'] }}">{{ $b['nama'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-submit" hidden>Tambah</button>
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
                    $("#bulan_kemarin").addClass('d-none')
                    $("#bulan_kemarin select").removeAttr('name')
                    $("#bulan_ini select").attr('name', 'bulan_lapor')
                } else {
                    $("#bulan_kemarin").removeClass('d-none')
                    $("#bulan_ini").addClass('d-none')
                    $("#bulan_ini select").removeAttr('name')
                    $("#bulan_kemarin select").attr('name', 'bulan_lapor')
                }

                $('.btn-submit').removeAttr('hidden')
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

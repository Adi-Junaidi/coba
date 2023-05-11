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
                                <?php
                                
                                if ($laporan->status == 'Submited') {
                                    $status = 'warning';
                                } elseif ($laporan->status == 'Verified') {
                                    $status = 'success';
                                } else {
                                    $status = 'danger';
                                }
                                
                                ?>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bulan[$laporan->bulan_lapor - 1]['nama'] . ' ' . $laporan->tahun_lapor }}
                                    </td>
                                    <td><span class="badge bg-light-{{ $status }}">{{ $laporan->status }}</span>
                                    </td>
                                    <td>
                                        @if ($laporan->status == 'Not Submited')

                                            <a href="/up/kegiatan/{{ $laporan->id }}" class="btn btn-info btn-sm"
                                                data-toggle="tooltip" data-placement="top" title="Tambah Kegiatan">
                                                <i class="bi bi-plus-circle"></i>

                                            </a>
                                            <button class="btn btn-success btn-sm btn_submit" data-bs-toggle="modal"
                                                data-bs-target="#submitModal" data-id="{{ $laporan->id }}"
                                                data-toggle="tooltip" data-placement="top" title="Final Submit">
                                                <i class="bi bi-fast-forward"></i>
                                            </button>
                                        @else

                                            <a href="/up/kegiatan/detail/{{ $laporan->id }}" class="btn btn-info btn-sm"
                                                data-toggle="tooltip" data-placement="top" title="Lihat Kegiatan">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            @if ($laporan->status == 'Submited')
                                                <a href="/up/kegiatan/cancel/{{ $laporan->id }}"
                                                    class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                                                    title="Batalkan">
                                                    <i class="bi bi-x-circle-fill"></i>
                                                </a>
                                            @endif
                                        @endif
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

    <div class="modal fade text-left" id="submitModal" tabindex="-1" aria-labelledby="" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title white" id="myModalLabel1">
                        Final Submit Register Kegiatan
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

                <form method="post">
                    @method('patch')
                    @csrf
                    <div class="modal-body">
                        <h3 class="text-secondary mb-4">Konfirmasi Data</h3>

                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="tempat">Tempat</label>
                                <input type="text" class="form-control" id="tempat"
                                    value="{{ $pikr->desa->kecamatan->nama }}" readonly>
                            </div>

                            <div class="form-group col-sm-6">
                                <label for="tanggal">Tanggal</label>
                                <input type="text" class="form-control" id="tanggal" value="{{ date('d/m/Y') }}"
                                    disabled readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pembina">Pembina Kelompok</label>
                            <input type="text" class="form-control" id="pembina"
                                value="{{ $pikr->pembina->nama }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="ketua">Ketua Kelompok</label>
                            <input type="text" class="form-control" id="ketua"
                                value="{{ $ketua_info ? $ketua_info->nama : 'Ketua Kelompok Belum Di Set' }}" readonly>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Final Submit</button>
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

            $('.btn_submit').click(function() {
                const id = $(this).data('id')
                $('#submitModal form').attr('action', '/up/kegiatan/' + id)
            })
        });
    </script>
@endpush

@extends('layouts.main', [
    'title' => 'Validasi Data PIK-R',
    'heading' => 'Validasi Data PIK-R',
    'breadcrumb' => ['Validasi Data PIK-R'],
])

@section('link')
    <link href="{{ asset('dist') }}/assets/css/pages/fontawesome.css" rel="stylesheet">
    <link href="{{ asset('dist') }}/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="{{ asset('dist') }}/assets/css/pages/datatables.css" rel="stylesheet">
@endsection

@section('container')
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table" id="tablePikr">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No. Register</th>
                            <th>Nama</th>
                            <th>Basis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    {{-- tabel pik-r --}}
                    <tbody>
                        @foreach ($pikr as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <span id="noreg">{{ $p->no_register }}</span>
                                </td>
                                <td>
                                    <span id="nama">{{ $p->nama }}</span>
                                </td>
                                <td>
                                    <span id="basis">{{ $p->basis }}</span>
                                </td>
                                <td>
                                    <button data-bs-toggle="modal" data-bs-target="#showModal" data-id="{{ $p->id }}"
                                        class="btn-show btn btn-info btn-sm">Detail</button>

                                    @if ($p->verified)
                                        <form class="d-inline" action="/pikr/{{ $p->id }}/verify" method="post">
                                            @csrf
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" type="submit">Batalkan Verifikasi</button>
                                        </form>
                                    @else
                                        <button class="btn btn-danger btn-sm btn-deny" data-bs-toggle="modal"
                                            data-bs-target="#reasonModal" data-id="{{ $p->id }}">Tolak</button>
                                        <form class="d-inline" action="/pikr/{{ $p->id }}/verify" method="post">
                                            @csrf
                                            <button class="btn btn-success btn-sm" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" type="submit">Setuju</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@section('modals')
    <div class="modal fade text-left" id="showModal" aria-labelledby="" aria-hidden="true" tabindex="-1"
        style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showModalLabel">
                        Detail Data PIK-R
                    </h5>
                    <button class="close rounded-pill" data-bs-dismiss="modal" type="button" aria-label="Close">
                        <svg class="feather feather-x" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama PIK-R</label>
                        <input type="text" id="nama" class="form-control" value="" disabled>
                    </div>
                    <div class="form-group">
                        <label for="basis">Basis</label>
                        <input type="text" id="basis" class="form-control" value="" disabled>
                    </div>
                    <div class="form-group">
                        <label for="pengelola">Pengelola PIK-R</label>
                        <input type="text" id="pengelola" class="form-control" value="" disabled>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat PIK-R</label>
                        <input type="text" id="alamat" class="form-control" value="" disabled>
                    </div>
                    <div class="form-group">
                        <label for="kecamatan">Kecamatan PIK-R</label>
                        <input type="text" id="kecamatan" class="form-control" value="" disabled>
                    </div>
                    <div class="form-group">
                        <label for="desa">Desa PIK-R</label>
                        <input type="text" id="desa" class="form-control" value="" disabled>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-bs-dismiss="modal" type="button">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="reasonModal" aria-labelledby="" aria-hidden="true" tabindex="-1"
        style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reasonModalLabel">
                        Alasan Penolakan PIK-R
                    </h5>
                    <button class="close rounded-pill" data-bs-dismiss="modal" type="button" aria-label="Close">
                        <svg class="feather feather-x" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <form method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="reason" class="form-label">Alasan</label>
                            <textarea class="form-control" id="reason" name="reason" rows="3" placeholder="Deskripsikan Disini..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ms-1" data-bs-toggle="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Konfirmasi</span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="{{ asset('dist') }}/assets/extensions/jquery/jquery.min.js"></script>
    <script src="/js/datatables.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        }, false);

        $('.btn-show').click(function() {
            const id = $(this).data('id')

            fetch('/utility/getPikr/' + id)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    $('#showModal #nama').val(data.nama)
                    $('#showModal #basis').val(data.basis)
                    $('#showModal #pengelola').val(data.pembina.nama)
                    $('#showModal #alamat').val(data.alamat)
                    $('#showModal #kecamatan').val(data.desa.kecamatan.nama)
                    $('#showModal #desa').val(data.desa.nama)
                })
        })

        $('.btn-deny').click(function() {
            const id = $(this).data('id')
            $('#reasonModal form').attr('action', '/pikr/deny/' + id)
        })
    </script>

    <script src="/js/pikr.js"></script>
@endsection

@extends('layouts.main', [
    'title' => 'Register Kegiatan',
    'heading' => 'Register Kegiatan PIK-R',
    'breadcrumb' => ['Register Kegiatan'],
])

@section('link')
    <link href="{{ asset('dist') }}/assets/css/pages/fontawesome.css" rel="stylesheet">
    <link href="{{ asset('dist') }}/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="{{ asset('dist') }}/assets/css/pages/datatables.css" rel="stylesheet">
@endsection

@section('container')
    <section>

        <div class="card">
            <div class="card-body">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama PIK-R</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($pikrs as $pikr)
                            @can('verify', $pikr)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $pikr->nama }}</td>
                                    <td>
                                        <!-- Button trigger for next table -->
                                        <a href="/registrasi-kegiatan/show_register/{{ $pikr->id }}"
                                            class="btn btn-info btn-sm">Detail</a>
                                    </td>
                                </tr>
                                @php $i++; @endphp
                            @endcan
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <div class="modal fade text-left" id="verifyModal" tabindex="-1" aria-labelledby="" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title white" id="myModalLabel1">
                        Verifikasi Kegiatan
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
                <div class="modal-body">
                    Tekan tombol Konfirmasi untuk memvalidasi kegiatan PIK-R
                </div>
                <form method="post">
                    @method('patch')
                    @csrf
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-success ms-1" data-bs-toggle="modal">
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
    <script src="/assets/js/kegiatan.js"></script>

    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        }, false);


        $(document).on('click', '.verify-btn', function() {
            const id = $(this).data('id')
            $('#verifyModal form').attr('action', '/registrasi-kegiatan/' + id)
        });
    </script>
@endsection

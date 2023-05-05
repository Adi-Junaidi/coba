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
                            @can('verifyPikr', $p)
                                <tr>
                                    <td>{{ $p->id }}</td>
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

                                        <form class="d-inline" action="/pikr/{{ $p->id }}/verify" method="post">
                                            @csrf
                                            @if ($p->verified)
                                                <button class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" type="submit">Batalkan Verifikasi </button>
                                            @else
                                                <button class="btn btn-success btn-sm" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" type="submit">Verifikasi PIK-R</button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                            @endcan
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
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
    </script>

    <script src="/js/pikr.js"></script>
@endsection

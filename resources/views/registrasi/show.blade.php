@extends('layouts.main', [
    'title' => 'Data Laporan',
    'heading' => 'Data Data Laporan PIK-R',
    'breadcrumb' => ['Data Laporan', 'Laporan Per Bulan'],
])

@section('link')
    <link href="{{ asset('dist') }}/assets/css/pages/fontawesome.css" rel="stylesheet">
    <link href="{{ asset('dist') }}/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="{{ asset('dist') }}/assets/css/pages/datatables.css" rel="stylesheet">
@endsection

@section('container')
    {{-- <section>
    <div class="card">
      <div class="card-body">
        <table class="table" id="table">
          <thead>
            <tr>
              <th>No. Register</th>
              <th>Nama</th>
              <th>Bulan Lapor</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td>
                  <span id="noreg">{{ $pikr->no_register }}</span>
                </td>
                <td>
                  <span id="nama">{{ $pikr->nama }}</span>
                </td>
                <td>
                  <span id="basis">Mei 2022</span>
                </td>
                <td>
                  <!-- Button trigger for next table -->
                  <a href="" class="btn btn-info btn-sm" id="showKegiatan">
                    <span>
                      <span class="fa-fw fas select-all"></span>
                    </span>
                  </a>
                </td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section> --}}

    @include('registrasi.detail.pelayanan')
    @include('registrasi.detail.konseling')
    @include('registrasi.detail.konseling_kelompok')
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
    </script>
@endsection

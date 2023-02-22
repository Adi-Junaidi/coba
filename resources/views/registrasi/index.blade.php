@extends('layouts.main', [
    'title' => 'Register Kegiatan',
    'heading' => 'Data Register Kegiatan PIK-R',
    'breadcrumb' => ['Register Kegiatan', ''],
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
              <th>No. Register</th>
              <th>Nama</th>
              <th>Basis</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pikr as $p)
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
                  <!-- Button trigger for next table -->
                  <a href="{{ route('registrasi-kegiatan.show', $p->id) }}" class="btn btn-info btn-sm" id="showKegiatan">
                    <span>
                      <span class="fa-fw fas select-all"></span>
                    </span>
                  </a>
                </td>
              </tr>
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
  <script src="/assets/js/kegiatan.js"></script>

  <script>
    $(document).ready(function(){
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

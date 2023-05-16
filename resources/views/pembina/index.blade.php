@extends('layouts.main', [
    'title' => 'Data PKB/PLKB',
    'heading' => 'Data PKB/PLKB',
    'breadcrumb' => ['Data Master', 'Data PLKB'],
])

@section('link')
  <link href="{{ asset('dist') }}/assets/css/pages/fontawesome.css" rel="stylesheet">
  <link href="{{ asset('dist') }}/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <link href="{{ asset('dist') }}/assets/css/pages/datatables.css" rel="stylesheet">
@endsection

@section('container')
  @foreach (['username', 'email', 'password', 'konfirmasiPassword', 'nama'] as $field)
    @error($field)
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ $message }}
        <button class="btn-close" data-bs-dismiss="alert" type="button" aria-label="Close"></button>
      </div>
    @enderror
  @endforeach


  @include('partials.dropdown-dependent-filter-card', ['objek' => 'PKB/PLKB'])


  <section class="section">
    <div class="card">
      <div class="card-body">
        <div class="row g-2 mb-3">
          <div class="col-md">
            <div class="d-flex justify-content-end">
              <button class="btn btn-primary" id="btnTambah" data-bs-toggle="modal" data-bs-target="#modalCreate" disabled><span class="fa-fw fas me-2 select-all"></span>Tambah Data PKB/PLKB</button>
            </div>
          </div>
        </div>

        <table class="table" id="tablePembina">
          <thead>
            <tr>
              <th>No.</th>
              <th>No. Register</th>
              <th>Nama</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @include('partials.table-pembina', ['pembina' => $pembina])
          </tbody>
        </table>
      </div>
    </div>
  </section>
@endsection

@section('modals')
  @include('partials.pembina-modal-create')
  @include('partials.pembina-modal-edit')
  @include('partials.pembina-modal-detail')
  @include('partials.pembina-modal-delete')
@endsection

@section('script')
  <script src="{{ asset('dist') }}/assets/extensions/jquery/jquery.min.js"></script>
  <script src="/js/datatables.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
      const tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
      })
    }, false);
  </script>

  <script>
    const CSRF = "{{ csrf_token() }}";
  </script>
  <script src="/assets/js/pembina.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection

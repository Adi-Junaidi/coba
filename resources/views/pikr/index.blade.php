@extends('layouts.main', [
    'title' => 'Data PIK-R',
    'heading' => 'Data PIK-R',
    'breadcrumb' => ['Data Master', 'Data PIK-R'],
])

@section('link')
  <link href="{{ asset('dist') }}/assets/css/pages/fontawesome.css" rel="stylesheet">
  <link href="{{ asset('dist') }}/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <link href="{{ asset('dist') }}/assets/css/pages/datatables.css" rel="stylesheet">
@endsection

@section('container')
  @include('partials.dropdown-dependent-filter-card', ['objek' => 'PIK-R'])

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

          <tbody>
            @foreach ($pikr as $p)
              @can('view', $p)
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
                    <a class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Detail PIK-R" href="/pikr/{{ $p->id }}">
                      <i class="bi bi-eye-fill"></i>
                    </a>
                    <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $p->id }}" data-nama="{{ $p->nama }}" data-bs-toggle="modal" data-bs-target="#deleteModal">
                      <i class="bi bi-trash3" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus PIK-R"></i>
                    </button>
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

{{-- Ini bagian modal detail data registrasi PIK-R nya --}}
@section('modals')
  <div class="modal fade text-left" id="deleteModal" aria-labelledby="" aria-hidden="true" tabindex="-1" style="display: none;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title white" id="myModalLabel1">
            Hapus Data PIK-R
          </h5>
          <button class="close rounded-pill" data-bs-dismiss="modal" type="button" aria-label="Close">
            <svg class="feather feather-x" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="18" y1="6" x2="6" y2="18"></line>
              <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
          </button>
        </div>
        <div class="modal-body">
          <h6>Yakin ingin menghapus data <span id="delete__nama">PIK-R</span></h6>
          Data yang sudah terhapus tidak dapat dikembalikan.
        </div>
        <form method="post">
          @method('delete')
          @csrf
          <div class="modal-footer">
            <button class="btn" data-bs-dismiss="modal" type="button">
              <i class="bx bx-x d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Close</span>
            </button>
            <button class="btn btn-danger ms-1" data-bs-dismiss="modal" type="submit">
              <i class="bx bx-check d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Hapus</span>
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
  </script>


  <script>
    $(document).on('click', '.btn-delete', function() {
      const id = $(this).data('id');
      const nama = $(this).data('nama');
      $('#deleteModal form').attr('action', '/pikr/' + id);
      $('#delete__nama').text(nama);
    });
  </script>

  <script src="/js/pikr.js"></script>
@endsection

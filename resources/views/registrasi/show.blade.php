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
  @include('registrasi.detail.pelayanan')
  @include('registrasi.detail.konseling')
  @include('registrasi.detail.konseling_kelompok')
@endsection

@push('modals')
  <div class="modal fade" id="imageModal" aria-labelledby="imageModalLabel" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="imageModalLabel">Modal title</h1>
          <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img id="imageModalImage" src="https://placehold.it/200x200?text=Image" alt="" style="width: 100%; max-height: 50vh; object-fit: contain;" />
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Tutup</button>
        </div>
      </div>
    </div>
  </div>
@endpush

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

  <script>
    const imageModal = document.getElementById('imageModal');
    imageModal.addEventListener('show.bs.modal', (e) => {
      const triggerBtn = e.relatedTarget;

      // change image
      const imageUrl = triggerBtn.src;
      const imageTarget = document.getElementById('imageModalImage');
      imageTarget.src = imageUrl;

      // change modal title
      const modalTitle = triggerBtn.dataset.title;
      const titleTarget = document.getElementById('imageModalLabel');
      titleTarget.textContent = modalTitle;
    })
  </script>
@endsection

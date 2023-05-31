@extends('layouts.user_pikr')

@push('scripts')
  <script>
    function previewImage(self, previewId) {
      const imgPreview = document.getElementById(previewId);
      const blob = URL.createObjectURL(self.files[0]);
      imgPreview.src = blob;
    }

    const imageModal = document.getElementById('imageModal')
    imageModal.addEventListener('show.bs.modal', (e) => {
      const triggerBtn = e.relatedTarget;

      // change image
      const imageUrl = triggerBtn.dataset.image;
      const imageTarget = document.getElementById('imageModalImage');
      imageTarget.src = imageUrl;

      // change modal title
      const modalTitle = triggerBtn.dataset.title;
      const titleTarget = document.getElementById('imageModalLabel');
      titleTarget.textContent = modalTitle;
    })
  </script>
@endpush

@push('modal')
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

@section('content')
  <section>
    <h1 class="d-sm-block d-none mb-3">Tambah Kegiatan PIK-R</h1>
    <article class="mb-4">
      @include('user-pikr.kegiatan.include.pelayanan')
      @include('user-pikr.kegiatan.include.konseling')
      @include('user-pikr.kegiatan.include.konseling_kelompok')
    </article>
  </section>
@endsection

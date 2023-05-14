<!-- Modal Delete -->
<form id="formDelete" action="/pembina/{id}" method="post">
  @csrf
  @method('delete')
  <div class="modal fade text-left" id="modalDelete" role="dialog" aria-labelledby="judulModalDelete" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h4 class="modal-title text-light" id="judulModalDelete">Hapus PLKB</h4>
          <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <div class="row mb-3">
            <div class="col">
              <h1 class="text-center">Anda ingin menghapus data <span id="delete__nama">PLKB</span>?</h1>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-center">
          <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">
            <i class="bx bx-x d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Batal</span>
          </button>
          <button class="btn btn-outline-danger" data-bs-dismiss="modal" type="submit">
            <i class="bx bx-x d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Ya</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</form>

@push('script')
  <script>
    const formDelete = $("#formDelete");

    $(document).on("click", ".btnDelete", function() {
      const id = $(this).data("id");
      const nama = $(this).data("nama");

      formDelete.attr("action", `/pembina/${id}`);
      $("#delete__nama").text(nama);
    });
  </script>
@endpush

<!-- Modal Update -->
<form id="formUpdate" action="/pembina/{id}" method="post">
  @csrf
  @method('put')
  <div class="modal fade text-left" id="modalUpdate" role="dialog" aria-labelledby="judulModalUpdate" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h4 class="modal-title text-light" id="judulModalUpdate">Update Pembina</h4>
          <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Tutup"></button>
        </div>

        <div class="modal-body">
          <!-- Identitas -->
          <div class="row my-3">
            <div class="col">
              <hr />
              <h5>Identitas</h5>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <label for="update__nama">Nama Lengkap</label>
            </div>
            <div class="col-md-8 form-group">
              <input class="form-control" id="update__nama" name="nama" type="text" value="{{ old('nama') }}" placeholder="Nama Lengkap" required />
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <label for="update__jabatan">Jabatan</label>
            </div>
            <div class="col-md-8 form-group">
              <input class="form-control" id="update__jabatan" name="jabatan" type="text" value="PKB/PLKB" placeholder="Jabatan" readonly disabled />
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <label for="update__noUrut">No. Urut Pembina</label>
            </div>
            <div class="col-md-8 form-group">
              <input class="form-control" id="update__noUrut" name="noUrut" type="text" value="02" placeholder="No. Urut Pembina" readonly disabled />
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <label for="update__noRegister">No. Register</label>
            </div>
            <div class="col-md-8 form-group">
              <input class="form-control" id="update__noRegister" name="noRegister" type="text" value="000000A00" placeholder="No. Register" readonly disabled />
            </div>
          </div>

          <!-- Alamat -->
          <div class="row my-3">
            <div class="col">
              <hr />
              <h5>Alamat</h5>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <label for="update__provinsi">Provinsi</label>
            </div>
            <div class="col-md-8 form-group">
              <input class="form-control" id="update__provinsi" name="provinsi" type="text" value="{{ $provinsi->kode . ' | ' . $provinsi->nama }}" placeholder="Provinsi" readonly disabled />
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <label for="update__kabKota">Kab/Kota</label>
            </div>
            <div class="col-md-8 form-group">
              <input class="form-control" id="update__kabKota" name="kabKota" type="text" placeholder="Kab/Kota" readonly disabled />
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <label for="update__kecamatan">Kecamatan</label>
            </div>
            <div class="col-md-8 form-group">
              <input class="form-control" id="update__kecamatan" name="kecamatan" type="text" placeholder="Kecamatan" readonly disabled />
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <label for="update__desaKel">Desa/Kel</label>
            </div>
            <div class="col-md-8 form-group">
              <input class="form-control" id="update__desaKel" name="desaKel" type="text" placeholder="Desa/Kel" readonly disabled />
              <input id="hidden__desaKel" name="desa_id" type="hidden">
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">
            <i class="bx bx-x d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Batal</span>
          </button>
          <button class="btn btn-warning" type="submit">
            <i class="bx bx-x d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Simpan</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</form>

@push('script')
  <script>
    const formUpdate = $("#formUpdate");

    $(document).on("click", ".btnUpdate", function() {
      const {
        id,
        noreg,
        nourut,
        nama,
        provinsi,
        kabkota,
        kecamatan,
        desakel,
        jabatan,
      } = getData($(this));

      formUpdate.attr("action", `/pembina/${id}`);
      $("#update__noRegister").val(noreg);
      $("#update__noUrut").val(nourut);
      $("#update__nama").val(nama);
      $("#update__provinsi").val(provinsi);
      $("#update__kabKota").val(kabkota);
      $("#update__kecamatan").val(kecamatan);
      $("#update__desaKel").val(desakel);
      $("#update__jabatan").val(jabatan);
    });

    function getData(self) {
      const id = self.data("id");
      const noreg = self.data("noreg");
      const nourut = self.data("nourut");
      const nama = self.data("nama");
      const provinsi = self.data("provinsi");
      const kabkota = self.data("kabkota");
      const kecamatan = self.data("kecamatan");
      const desakel = self.data("desakel");
      const jabatan = self.data("jabatan");

      return {
        id,
        noreg,
        nourut,
        nama,
        provinsi,
        kabkota,
        kecamatan,
        desakel,
        jabatan,
      };
    }
  </script>
@endpush

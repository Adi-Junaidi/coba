<!-- Modal Detail -->
<div class="modal fade text-left" id="modalDetail" role="dialog" aria-labelledby="judulModalDetail" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title text-light" id="judulModalDetail">Tambah Pembina</h4>
        <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Tutup"></button>
      </div>

      <div class="modal-body">
        <!-- Identitas -->
        <div class="row my-3">
          <div class="col">
            <h5>Identitas</h5>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <label for="detail__nama">Nama Lengkap</label>
          </div>
          <div class="col-md-8 form-group">
            <input class="form-control" id="detail__nama" name="nama" type="text" placeholder="Nama Lengkap" readonly disabled />
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <label for="detail__jabatan">Jabatan</label>
          </div>
          <div class="col-md-8 form-group">
            <input class="form-control" id="detail__jabatan" name="jabatan" type="text" value="PKB/PLKB" placeholder="Jabatan" readonly disabled />
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <label for="detail__noUrut">No. Urut Pembina</label>
          </div>
          <div class="col-md-8 form-group">
            <input class="form-control" id="detail__noUrut" name="noUrut" type="text" value="02" placeholder="No. Urut Pembina" readonly disabled />
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <label for="detail__noRegister">No. Register</label>
          </div>
          <div class="col-md-8 form-group">
            <input class="form-control" id="detail__noRegister" name="noRegister" type="text" value="000000A00" placeholder="No. Register" readonly disabled />
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
            <label for="detail__provinsi">Provinsi</label>
          </div>
          <div class="col-md-8 form-group">
            <input class="form-control" id="detail__provinsi" name="provinsi" type="text" value="{{ $provinsi->kode . ' | ' . $provinsi->nama }}" placeholder="Provinsi" readonly disabled />
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <label for="detail__kabKota">Kab/Kota</label>
          </div>
          <div class="col-md-8 form-group">
            <input class="form-control" id="detail__kabKota" name="kabKota" type="text" placeholder="Kab/Kota" readonly disabled />
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <label for="detail__kecamatan">Kecamatan</label>
          </div>
          <div class="col-md-8 form-group">
            <input class="form-control" id="detail__kecamatan" name="kecamatan" type="text" placeholder="Kecamatan" readonly disabled />
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <label for="detail__desaKel">Desa/Kel</label>
          </div>
          <div class="col-md-8 form-group">
            <input class="form-control" id="detail__desaKel" name="desaKel" type="text" placeholder="Desa/Kel" readonly disabled />
            <input id="hidden__desaKel" name="desa_id" type="hidden">
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">
          <i class="bx bx-x d-block d-sm-none"></i>
          <span class="d-none d-sm-block">Tutup</span>
        </button>
      </div>
    </div>
  </div>
</div>

@push('script')
  <script>
    // modal untuk menampilkan detail data pembina
    $(document).on("click", ".btnDetail", function() {
      const {
        noreg,
        nourut,
        nama,
        provinsi,
        kabkota,
        kecamatan,
        desakel,
        jabatan,
      } = getData($(this));

      $("#detail__noRegister").val(noreg);
      $("#detail__noUrut").val(nourut);
      $("#detail__nama").val(nama);
      $("#detail__provinsi").val(provinsi);
      $("#detail__kabKota").val(kabkota);
      $("#detail__kecamatan").val(kecamatan);
      $("#detail__desaKel").val(desakel);
      $("#detail__position").val(jabatan);
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

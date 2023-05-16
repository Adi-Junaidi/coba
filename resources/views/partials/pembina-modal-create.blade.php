<!-- Modal Create -->
<form id="formTambah" action="/pembina" method="post">
  @csrf
  <div class="modal fade text-left" id="modalCreate" role="dialog" aria-labelledby="judulModalCreate" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title text-light" id="judulModalCreate">Tambah Pembina</h4>
          <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Tutup"></button>
        </div>

        <div class="modal-body">
          <!-- Akun -->
          <div class="row my-3">
            <div class="col">
              <h5>Akun</h5>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <label for="tambah__username">Username</label>
            </div>
            <div class="col-md-8 form-group">
              <input class="form-control" id="tambah__username" name="username" type="text" value="{{ old('username') }}" placeholder="Username" required />
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <label for="tambah__email">Email</label>
            </div>
            <div class="col-md-8 form-group">
              <input class="form-control" id="tambah__email" name="email" type="email" value="{{ old('email') }}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Email" required />
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <label for="tambah__password">Password</label>
            </div>
            <div class="col-md-8 form-group">
              <input class="form-control" id="tambah__password" name="password" type="password" placeholder="Password" required />
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <label for="tambah__konfirmasiPassword">Konfirmasi Password</label>
            </div>
            <div class="col-md-8 form-group">
              <input class="form-control" id="tambah__konfirmasiPassword" name="konfirmasiPassword" type="password" placeholder="Konfirmasi Password" required />
            </div>
          </div>

          <!-- Identitas -->
          <div class="row my-3">
            <div class="col">
              <hr />
              <h5>Identitas</h5>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <label for="tambah__nama">Nama Lengkap</label>
            </div>
            <div class="col-md-8 form-group">
              <input class="form-control" id="tambah__nama" name="nama" type="text" value="{{ old('nama') }}" placeholder="Nama Lengkap" required />
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <label for="tambah__jabatan">Jabatan</label>
            </div>
            <div class="col-md-8 form-group">
              <input class="form-control" id="tambah__jabatan" name="jabatan" type="text" value="PKB/PLKB" placeholder="Jabatan" readonly disabled />
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <label for="tambah__noUrut">No. Urut Pembina</label>
            </div>
            <div class="col-md-8 form-group">
              <input class="form-control" id="tambah__noUrut" name="noUrut" type="text" value="02" placeholder="No. Urut Pembina" readonly disabled />
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <label for="tambah__noRegister">No. Register</label>
            </div>
            <div class="col-md-8 form-group">
              <input class="form-control" id="tambah__noRegister" name="noRegister" type="text" value="000000A00" placeholder="No. Register" readonly disabled />
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
              <label for="tambah__provinsi">Provinsi</label>
            </div>
            <div class="col-md-8 form-group">
              <input class="form-control" id="tambah__provinsi" name="provinsi" type="text" value="{{ $provinsi->kode . ' | ' . $provinsi->nama }}" placeholder="Provinsi" readonly disabled />
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <label for="tambah__kabKota">Kab/Kota</label>
            </div>
            <div class="col-md-8 form-group">
              <input class="form-control" id="tambah__kabKota" name="kabKota" type="text" placeholder="Kab/Kota" readonly disabled />
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <label for="tambah__kecamatan">Kecamatan</label>
            </div>
            <div class="col-md-8 form-group">
              <input class="form-control" id="tambah__kecamatan" name="kecamatan" type="text" placeholder="Kecamatan" readonly disabled />
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <label for="tambah__desaKel">Desa/Kel</label>
            </div>
            <div class="col-md-8 form-group">
              <input class="form-control" id="tambah__desaKel" name="desaKel" type="text" placeholder="Desa/Kel" readonly disabled />
              <input id="hidden__desaKel" name="desa_id" type="hidden">
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">
            <i class="bx bx-x d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Batal</span>
          </button>
          <button class="btn btn-primary" type="submit">
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
    $('#ddKabKota').on("change", function() {
      const kabkotaID = $(this).val();
      const namaKabKota = $(this).find(":selected").text();

      $.ajax({
        type: "get",
        url: `/api/kabkota/${kabkotaID}/kecamatans/`,
        dataType: "json",
        success: function(data) {
          if (!data) return;

          $("#tambah__kabKota").val(namaKabKota);
        },
      });
    });

    $("#ddKecamatan").on("change", async function() {
      const kecamatanId = $(this).val();
      const namaKecamatan = $(this).find(":selected").text();

      $.ajax({
        type: "get",
        url: `/api/kecamatan/${kecamatanId}/desas/`,
        dataType: "json",
        success: function(data) {
          if (!data) return;

          $("#tambah__kecamatan").val(namaKecamatan);
        },
      });
      const nomorUrut = await getNomorUrut(kecamatanId);
      updateNoRegister(nomorUrut);
    });

    $("#ddDesa").on("change", function() {
      const desaId = $(this).val();
      const namaDesa = $(this).find(":selected").text();

      $("#tambah__desaKel").val(namaDesa);
      $("#hidden__desaKel").val(desaId);
    });

    function getNomorUrut(kecamatanId) {
      return $.ajax({
        type: "get",
        url: `/api/kecamatan/${kecamatanId}/no_urut_pembina/`,
        dataType: "json",
      });
    }

    function updateNoRegister(nomorUrut) {
      const kodeJabatan = "B"; // kode jabatan PLKB
      const kodeProvinsi = $("#ddProvinsi").find(":selected").data("kode");
      const kodeKabKot = $('#ddKabKota').find(":selected").data("kode");
      const kodeKecamatan = $("#ddKecamatan").find(":selected").data("kode");

      const noRegister = `${kodeProvinsi}${kodeKabKot}${kodeKecamatan}${kodeJabatan}${nomorUrut}`;

      $("#tambah__noRegister").val(noRegister);
      $("#tambah__noUrut").val(nomorUrut);
    }
  </script>
@endpush

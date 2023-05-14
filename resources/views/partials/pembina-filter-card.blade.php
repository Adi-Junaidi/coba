<section class="section">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Pencarian Berdasarkan Alamat Pembina</h4>
    </div>

    <div class="card-body">
      <div class="row">
        <label class="col-md-3" for="ddProvinsi">Provinsi</label>
        <fieldset class="form-group col-md-3">
          <select class="form-select" id="ddProvinsi" disabled>
            <option data-kode="{{ $provinsi->kode }}" selected>{{ $provinsi->kode . ' | ' . $provinsi->nama }}</option>
          </select>
        </fieldset>

        <label class="col-md-3" for="ddKabKota">Kabupaten/Kota</label>
        <fieldset class="form-group col-md-3">
          <select class="form-select" id="ddKabKota" name="ddKabKota">
            <option hidden>Kabupaten/Kota</option>
            @foreach ($kabkotas as $p)
              <option data-kode="{{ $p->kode }}" value="{{ $p->id }}">{{ $p->kode . ' | ' . $p->nama }}</option>
            @endforeach
          </select>
        </fieldset>
      </div>

      <div class="row">
        <label class="col-md-3" for="ddKecamatan">Kecamatan</label>
        <fieldset class="form-group col-md-3">
          <select class="form-select" id="ddKecamatan" name="ddKecamatan" disabled>
            <option hidden>Kecamatan</option>
          </select>
        </fieldset>

        <label class="col-md-3" for="ddDesa">Desa/Kelurahan</label>
        <fieldset class="form-group col-md-3">
          <select class="form-select" id="ddDesa" name="ddDesa" disabled>
            <option hidden>Desa/Kelurahan</option>
          </select>
        </fieldset>
      </div>

      <div class="d-grid gap-2">
        <button class="btn btn-primary" id="btnCari" type="submit" disabled>Cari</button>
      </div>
    </div>
  </div>
</section>

@push('script')
  <script>
    const btnCari = $("#btnCari");
    const ddKabKota = $("#ddKabKota");
    const ddKecamatan = $("#ddKecamatan");
    const ddDesa = $("#ddDesa");

    ddKabKota.on("change", function() {
      disable(btnCari);
      disable(ddDesa);
      const kabkotaID = $(this).val();
      const namaKabKota = $(this).find(":selected").text();

      empty(ddKecamatan, "Kecamatan");
      empty(ddDesa, "Desa/Kelurahan");

      $.ajax({
        type: "get",
        url: `/api/kabkota/${kabkotaID}/kecamatans/`,
        dataType: "json",
        success: function(data) {
          if (data) {
            $.each(data, function(key, kecamatan) {
              ddKecamatan.append(`<option data-kode="${kecamatan.kode}" value="${kecamatan.id}">${kecamatan.kode} | ${kecamatan.nama}</option>`);
            });
            enable(ddKecamatan);
          } else {
            disable(ddKecamatan);
          }
        },
      });
    });

    ddKecamatan.on("change", function() {
      disable(btnCari);
      const kecamatanId = $(this).val();
      const namaKecamatan = $(this).find(":selected").text();

      empty(ddDesa, "Desa/Kelurahan");

      $.ajax({
        type: "get",
        url: `/api/kecamatan/${kecamatanId}/desas/`,
        dataType: "json",
        success: function(data) {
          if (data) {
            $.each(data, function(key, desa) {
              ddDesa.append(`<option value="${desa.id}">${desa.kode} | ${desa.nama}</option>`);
            });
            enable(ddDesa);
          } else {
            disable(ddDesa);
          }
        },
      });
    });

    ddDesa.on("change", function() {
      enable(btnCari);
    });

    function disable(element) {
      element.prop("disabled", true);
    }

    function enable(element) {
      element.prop("disabled", false);
    }

    function empty(element, placeholder) {
      element.empty();
      element.append(`<option hidden>${placeholder}</option>`);
    }
  </script>
@endpush

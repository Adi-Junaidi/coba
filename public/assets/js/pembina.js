$(document).ready(function () {
  const tablePembina = $("#tablePembina").DataTable({
    columnDefs: [
      {
        defaultContent: "-",
        targets: "_all",
      },
    ],

    oLanguage: {
      sEmptyTable: "Data Pembina tidak ditemukan",
    },
  });

  const btnCari = $("#btnCari");
  const btnTambah = $("#btnTambah");
  const ddKabKota = $("#ddKabKota");
  const ddKecamatan = $("#ddKecamatan");
  const ddDesa = $("#ddDesa");

  btnCari.on("click", function () {
    getPembina({
      desa: ddDesa.val(),
    });
  });

  // dropdown dependent
  ddKabKota.on("change", function () {
    const kabkotaID = $(this).val();

    $.ajax({
      type: "get",
      url: `/api/kabkota/${kabkotaID}/kecamatans/`,
      dataType: "json",
      success: function (data) {
        if (data) return;

        btnTambah.prop("disabled", true);
      },
    });
  });

  ddKecamatan.on("change", function () {
    const kecamatanId = $(this).val();

    $.ajax({
      type: "get",
      url: `/api/kecamatan/${kecamatanId}/desas/`,
      dataType: "json",
      success: function (data) {
        if (!data) return;

        btnTambah.prop("disabled", true);
      },
    });
  });

  ddDesa.on("change", function () {
    btnTambah.prop("disabled", false);
  });

  function getPembina(data) {
    $.ajax({
      type: "get",
      url: "/api/pembina",
      data,
      success: function (data) {
        tablePembina.clear();
        if (data.error) {
          tablePembina.draw();
          return;
        }
        tablePembina.rows
          .add(
            data.map((d, i) => [
              i + 1,
              d.no_register,
              d.nama,
              `
              <button class="btn btn-info btn-sm btnDetail" data-bs-toggle="modal" data-bs-target="#modalDetail" data-jabatan_id="${d.jabatan.id}" data-noreg="${d.no_register}" data-nourut="${d.no_urut}" data-nama="${d.nama}" data-provinsi="${d.desa.kecamatan.kabkota.provinsi.kode} | ${d.desa.kecamatan.kabkota.provinsi.nama}" data-kabkota="${d.desa.kecamatan.kabkota.kode} | ${d.desa.kecamatan.kabkota.nama}" data-kecamatan="${d.desa.kecamatan.kode} | ${d.desa.kecamatan.nama}" data-desakel="${d.desa.kode} | ${d.desa.nama}" data-jabatan="${d.jabatan.nama}" type="button">
                <span class="fa-fw fas select-all" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail"></span>
              </button>

              <button class="btn btn-warning btn-sm btnUpdate" data-bs-toggle="modal" data-bs-target="#modalUpdate" data-id="${d.id}" data-jabatan_id="${d.jabatan.id}" data-noreg="${d.no_register}" data-nourut="${d.no_urut}" data-nama="${d.nama}" data-provinsi="${d.desa.kecamatan.kabkota.provinsi.kode} | ${d.desa.kecamatan.kabkota.provinsi.nama}" data-kabkota="${d.desa.kecamatan.kabkota.kode} | ${d.desa.kecamatan.kabkota.nama}" data-kecamatan="${d.desa.kecamatan.kode} | ${d.desa.kecamatan.nama}" data-desakel="${d.desa.kode} | ${d.desa.nama}" data-jabatan="${d.jabatan.nama}" type="button">
                <span class="fa-fw fas select-all" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></span>
              </button>

              <button class="btn btn-danger btn-sm btnDelete" data-bs-toggle="modal" data-bs-target="#modalDelete" data-id="${d.id}" data-nama="${d.nama}" type="button">
                <span class="fa-fw fas select-all" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"></span>
              </button>`,
            ])
          )
          .draw();
      },
    });
  }
});

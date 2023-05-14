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
  const formUpdate = $("#formUpdate");

  function updateNoRegister(nomorUrut) {
    console.log(nomorUrut);
    const kodeJabatan = "B";
    const kodeProvinsi = $("#ddProvinsi").find(":selected").data("kode");
    const kodeKabKot = ddKabKota.find(":selected").data("kode");
    const kodeKecamatan = ddKecamatan.find(":selected").data("kode");

    const noRegister = `${kodeProvinsi}${kodeKabKot}${kodeKecamatan}${kodeJabatan}${nomorUrut}`;

    $("#tambah__noRegister").val(noRegister);
    $("#tambah__noUrut").val(nomorUrut);
  }

  function getNomorUrut(kecamatanId) {
    return $.ajax({
      type: "get",
      url: `/api/kecamatan/${kecamatanId}/no_urut/`,
      dataType: "json",
    });
  }

  // modal untuk menampilkan detail data pembina
  $(document).on("click", ".btnDetail", function () {
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

  $(document).on("click", ".btnUpdate", function () {
    const {
      id,
      noreg,
      nourut,
      nama,
      provinsi,
      kabkota,
      kecamatan,
      desakel,
      jabatan_id,
    } = getData($(this));

    formUpdate.attr("action", `/pembina/${id}`);
    $("#update__noRegister").val(noreg);
    $("#update__noUrut").val(nourut);
    $("#update__nama").val(nama);
    $("#update__provinsi").val(provinsi);
    $("#update__kabKota").val(kabkota);
    $("#update__kecamatan").val(kecamatan);
    $("#update__desaKel").val(desakel);
    $("#update__jabatan").val(jabatan_id);
  });

  btnCari.on("click", function () {
    getPembina({
      desa: ddDesa.val(),
    });
  });

  // dropdown dependent
  ddKabKota.on("change", function () {
    const kabkotaID = $(this).val();
    const namaKabKota = $(this).find(":selected").text();

    if (kabkotaID) {
      $.ajax({
        type: "get",
        url: `/api/kabkota/${kabkotaID}/kecamatans/`,
        dataType: "json",
        success: function (data) {
          if (data) {
            ddKecamatan.empty();
            ddKecamatan.append("<option hidden>Kecamatan</option>");
            $.each(data, function (key, kecamatan) {
              $('select[name="ddKecamatan"]').append(
                `<option data-kode="${kecamatan.kode}" value="${kecamatan.id}">${kecamatan.kode} | ${kecamatan.nama}</option>`
              );
            });
            ddKecamatan.prop("disabled", false);

            $("#tambah__kabKota").val(namaKabKota);
          } else {
            ddKecamatan.empty();
            ddKecamatan.prop("disabled", true);
            btnCari.prop("disabled", true);
            btnTambah.prop("disabled", true);
          }
        },
      });
    } else {
      ddKecamatan.empty();
      ddKecamatan.prop("disabled", true);
      btnCari.prop("disabled", true);
      btnTambah.prop("disabled", true);
    }
  });

  ddKecamatan.on("change", async function () {
    const kecamatanId = $(this).val();
    const namaKecamatan = $(this).find(":selected").text();

    if (kecamatanId) {
      $.ajax({
        type: "get",
        url: `/api/kecamatan/${kecamatanId}/desas/`,
        dataType: "json",
        success: function (data) {
          if (data) {
            ddDesa.empty();
            ddDesa.append("<option hidden>Desa/Kelurahan</option>");
            $.each(data, function (key, desa) {
              $('select[name="ddDesa"]').append(
                `<option value="${desa.id}">${desa.kode} | ${desa.nama}</option>`
              );
            });
            ddDesa.prop("disabled", false);

            $("#tambah__kecamatan").val(namaKecamatan);
          } else {
            ddDesa.empty();
            ddDesa.prop("disabled", true);
            btnCari.prop("disabled", true);
            btnTambah.prop("disabled", true);
          }
        },
      });
      const nomorUrut = await getNomorUrut(kecamatanId);
      updateNoRegister(nomorUrut);
    } else {
      ddDesa.empty();
      ddDesa.prop("disabled", true);
      btnCari.prop("disabled", true);
      btnTambah.prop("disabled", true);
    }
  });

  ddDesa.on("change", function () {
    const desaId = $(this).val();
    const namaDesa = $(this).find(":selected").text();

    if (desaId) {
      btnCari.prop("disabled", false);
      btnTambah.prop("disabled", false);

      $("#tambah__desaKel").val(namaDesa);
      $("#hidden__desaKel").val(desaId);
    } else {
      btnCari.prop("disabled", true);
      btnTambah.prop("disabled", true);
    }
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
              d.jabatan.nama,
              `
              <button class="btn btn-info btn-sm btnDetail" data-bs-toggle="modal" data-bs-target="#modalDetail" data-jabatan_id="${d.jabatan.id}" data-noreg="${d.no_register}" data-nourut="${d.no_urut}" data-nama="${d.nama}" data-provinsi="${d.desa.kecamatan.kabkota.provinsi.kode} | ${d.desa.kecamatan.kabkota.provinsi.nama}" data-kabkota="${d.desa.kecamatan.kabkota.kode} | ${d.desa.kecamatan.kabkota.nama}" data-kecamatan="${d.desa.kecamatan.kode} | ${d.desa.kecamatan.nama}" data-desakel="${d.desa.kode} | ${d.desa.nama}" data-jabatan="${d.jabatan.nama}" type="button">
                <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail">
                  <span class="fa-fw select-all fas"></span>
                </span>
              </button>

              <button class="btn btn-warning btn-sm btnEdit" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-target="#modalUpdate" data-id="${d.id}" data-jabatan_id="${d.jabatan.id}" data-noreg="${d.no_register}" data-nourut="${d.no_urut}" data-nama="${d.nama}" data-provinsi="${d.desa.kecamatan.kabkota.provinsi.kode} | ${d.desa.kecamatan.kabkota.provinsi.nama}" data-kabkota="${d.desa.kecamatan.kabkota.kode} | ${d.desa.kecamatan.kabkota.nama}" data-kecamatan="${d.desa.kecamatan.kode} | ${d.desa.kecamatan.nama}" data-desakel="${d.desa.kode} | ${d.desa.nama}" data-jabatan="${d.jabatan.nama}" type="button">
                <span class="fa-fw select-all fas" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></span>
              </button>

              <form class="d-inline" action="/pembina/${d.id}" method="post">
                <input type="hidden" name="_token" value="${CSRF}" />
                <input type="hidden" name="_method" value="delete" />
                <button class="btn btn-danger btn-sm" id="delete" data-bs-toggle="tooltip" data-bs-placement="bottom" type="submit" title="Delete">
                  <span class="fa-fw select-all fas"></span>
                </button>
              </form>`,
            ])
          )
          .draw();
      },
    });
  }

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
    const jabatan_id = self.data("jabatan_id");

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
      jabatan_id,
    };
  }
});

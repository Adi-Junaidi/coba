$(document).ready(function () {
  const tablePikr = $("#tablePikr").DataTable({
    columnDefs: [
      {
        defaultContent: "-",
        targets: "_all",
      },
    ],
    // custom pesan data kosong
    language: {
      emptyTable: "Data PIK-R tidak ditemukan",
    },
  });

  // modal untuk menampilkan detail data pembina
  $(document).on("click", "#detail", function () {
    const noreg = $(this).data("noreg");
    const nourut = $(this).data("nourut");
    const nama = $(this).data("nama");
    const provinsi = $(this).data("provinsi");
    const kabkota = $(this).data("kabkota");
    const kecamatan = $(this).data("kecamatan");
    const desakel = $(this).data("desakel");
    const jabatan = $(this).data("jabatan");

    $("#noRegister").val(noreg);
    $("#noUrut").val(nourut);
    $("#name").val(nama);
    $("#provinsi").val(provinsi);
    $("#kabKota").val(kabkota);
    $("#kecamatan").val(kecamatan);
    $("#desaKel").val(desakel);
    $("#position").val(jabatan);
  });

  const filters = {
    kabkota: null,
    kecamatan: null,
    desa: null,
  };

  // tombol cari pembina berdasarkan nama with ajax
  $(document).on("keyup", "#cari", function () {
    const keyword = $("#cari").val();
    const data = {
      keyword,
    };

    if (filters.kabkota) data.kabkota = filters.kabkota;
    if (filters.kecamatan) data.kecamatan = filters.kecamatan;
    if (filters.desa) data.desa = filters.desa;

    $.ajax({
      type: "get",
      url: "/api/pembina",
      data,
      success: function (data) {
        console.log(data);
        $("tbody").html(data);
      },
    });
  });

  // dropdown dependent
  $("#ddKabKota").on("change", function () {
    const kabkotaID = $(this).val();
    const ddKecamatan = $("#ddKecamatan");
    const ddDesa = $("#ddDesa");

    if (kabkotaID) {
      $.ajax({
        type: "get",
        url: `/api/kabkota/${kabkotaID}/kecamatans/`,
        dataType: "json",
        success: function (data) {
          if (data) {
            ddKecamatan.empty();
            ddKecamatan.append("<option value='' hidden>Kecamatan</option>");
            $.each(data, function (key, kecamatan) {
              $('select[name="ddKecamatan"]').append(
                '<option value="' +
                  kecamatan.id +
                  '">' +
                  kecamatan.kode +
                  " | " +
                  kecamatan.nama +
                  "</option>"
              );
            });
            ddKecamatan.prop("disabled", false);

            ddDesa.val("");
            ddDesa.prop("disabled", true);
          } else {
            ddKecamatan.empty();
            ddKecamatan.prop("disabled", true);
          }
        },
      });
    } else {
      ddKecamatan.empty();
      ddKecamatan.prop("disabled", true);
    }
  });

  $("#ddKecamatan").on("change", function () {
    const kecamatanId = $(this).val();
    const ddDesa = $("#ddDesa");

    if (kecamatanId) {
      $.ajax({
        type: "get",
        url: `/api/kecamatan/${kecamatanId}/desas/`,
        dataType: "json",
        success: function (data) {
          if (data) {
            ddDesa.empty();
            ddDesa.append("<option value='' hidden>Desa/Kelurahan</option>");
            $.each(data, function (key, desa) {
              $('select[name="ddDesa"]').append(
                '<option value="' +
                  desa.id +
                  '">' +
                  desa.kode +
                  " | " +
                  desa.nama +
                  "</option>"
              );
            });
            ddDesa.prop("disabled", false);
          } else {
            ddDesa.empty();
            ddDesa.prop("disabled", true);
          }
        },
      });
    } else {
      ddDesa.empty();
      ddDesa.prop("disabled", true);
    }
  });

  $("#ddDesa").on("change", function () {
    const desaId = $(this).val();
    const tombolCari = $("#tombolCari");
    if (desaId) {
      // Enable tombol cari
      tombolCari.prop("disabled", false);
    } else {
      // Disable tombol cari
      tombolCari.prop("disabled", false);
    }
  });

  $("#tombolCari").on("click", () => {
    const desaId = $("#ddDesa").val();
    sessionStorage.setItem("desa-id", desaId);

    // Update tabel pikr
    const data = {
      kabkota: $("#ddKabKota").val(),
      kecamatan: $("#ddKecamatan").val(),
      desa: $("#ddDesa").val(),
    };
    $.ajax({
      type: "get",
      url: `/api/pikr`,
      data,
      success(data) {
        if (data.error) {
          // TODO: Tampilkan error dengan sweetalert
          console.log(
            `%c${data.error}`,
            "color: red; font-family: Arial, Helvetica, sans-serif; font-size: 2em; font-weight: bold;"
          );
          tablePikr.clear().draw();
          return;
        }

        const { pikrs, desa, kecamatan, kabkota, provinsi } = data;
        tablePikr
          .clear()
          .rows.add(
            pikrs.map((pikr, i) => [
              i + 1, // no.
              pikr.no_register, // no. register
              pikr.nama, // nama
              pikr.basis, // basis
              `
            <button class="btn btn-info btn-sm" id="detail" data-bs-toggle="modal" data-bs-target="#modal1" data-noreg="${
              pikr.no_register
            }" data-nourut="${pikr.no_urut}" data-nama="${
                pikr.nama
              }" data-alamat="${pikr.alamat}" data-provinsi="${
                provinsi.kode + " | " + provinsi.nama
              }" data-kabkota="${
                kabkota.kode + " | " + kabkota.nama
              }" data-kecamatan="${
                kecamatan.kode + " | " + kecamatan.nama
              }" data-desakel="${desa.kode + " | " + desa.nama}" data-basis="${
                pikr.basis
              }" data-jabatan="${
                pikr.pembina.jabatan.nama
              }" data-namajabatan="${pikr.pembina.nama}" data-medsos="${
                pikr.akun_medsos
              }" data-sk="${pikr.sk.status}" data-nomorsk="${
                pikr.sk.no_sk
              }" data-tanggalsk="${pikr.sk.tanggal}" data-dikeluarkanoleh="${
                pikr.sk.dikeluarkan_oleh
              }" type="button">
              <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail">
                <span class="fa-fw fas select-all"></span>
              </span>
            </button>

            <button class="btn btn-warning btn-sm" id="edit" data-bs-toggle="tooltip" data-bs-placement="bottom" type="button" title="Edit">
              <span class="fa-fw fas select-all"></span>
            </button>

            <button class="btn btn-danger btn-sm" id="delete" data-bs-toggle="tooltip" data-bs-placement="bottom" type="button" title="Delete">
              <span class="fa-fw fas select-all"></span>
            </button>`, // aksi
            ])
          )
          .draw();
      },
    });

    // Enable tombol tambah
    const tombolTambah = $("#tombolTambah");
    const href = tombolTambah.data("href");
    tombolTambah.prop("href", href);
    tombolTambah.prop("aria-disabled", false);
    tombolTambah.removeClass("disabled");
  });
});

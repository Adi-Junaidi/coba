// const getStr = (kecamatanId) => {
//   const trs = [];
//   for(let e = $0; e.nextSibling; e = e.nextSibling) trs.push(e);
//   const strs = [];
//   for(const tr of trs) {
//     let [,, kode, nama] = tr.children;
//     kode = kode.textContent.slice(-2);
//     nama = nama.textContent;
//     strs.push(`Desa::create([
//     "nama" => "${nama}",
//     "kode" => "${kode}",
//     "kecamatan_id" => ${kecamatanId}
//   ]);`);
//   }
//   const str = strs.join('\n');
//   console.log(str);
// };

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

  $("#btnCari").on("click", () => {
    console.log("hello mfs");
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
          // console.log(
          //   `%c${data.error}`,
          //   "color: red; font-family: Arial, Helvetica, sans-serif; font-size: 2em; font-weight: bold;"
          // );
          tablePikr.clear().draw();
          return;
        }

        tablePikr
          .clear()
          .rows.add(
            data.pikrs.map((pikr, i) => [
              i + 1, // no.
              pikr.no_register, // no. register
              pikr.nama, // nama
              pikr.basis, // basis
              `
              <a class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Detail PIK-R" href="/pikr/${pikr.id}">
                <i class="bi bi-eye-fill"></i>
              </a>
              <button class="btn btn-sm btn-danger btn-delete" data-id="${pikr.id}" data-bs-toggle="modal" data-bs-target="#deleteModal">
                <i class="bi bi-trash3" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus PIK-R"></i>
              </button>`,
            ])
          )
          .draw();
      },
    });
  });
});

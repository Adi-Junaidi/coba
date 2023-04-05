$(document).ready(function () {
  /* ========== DD ==========
  Mengambil data dari dropdown dependent (Desa & Kecamatan & Kabkota & Provinsi)
  */
  const desaId = sessionStorage.getItem("desa-id");
  $.ajax({
    type: "get",
    url: `/api/desa/${desaId}`,
    success(data) {
      const desa = data;
      const kecamatan = data.kecamatan;
      const kabkota = kecamatan.kabkota;
      const provinsi = kabkota.provinsi;

      const inputs = {
        desa: $("#input_desa"),
        kabkota: $("#input_kabkota"),
        kecamatan: $("#input_kecamatan"),
        provinsi: $("#input_provinsi"),
      };

      inputs.desa.val(`${desa.kode} | ${desa.nama}`);
      inputs.kabkota.val(`${kabkota.kode} | ${kabkota.nama}`);
      inputs.kecamatan.val(`${kecamatan.kode} | ${kecamatan.nama}`);
      inputs.provinsi.val(`${provinsi.kode} | ${provinsi.nama}`);
    },
  });
  /* ========== End DD ========== */

  $("#selectPembina").click(function (e) {
    // FIXME: bagian ini masih bisa direfactoring
    const pembina = $("#selectPembina option:selected").val();

    if (pembina === "1") {
      $("#jabatanLainnya").replaceWith(`
        <input class="form-control" type="text" name="jabatan_lainnya" id="jabatanLainnya"  placeholder="Lainnya..." disabled>
      `);

      $("#namaPembina").replaceWith(`
        <input class="form-control" list="datalistOptions" name="pembina_id" id="namaPembina" placeholder="Cari Nama Pembina">
      `);

      $("#datalistOptions").remove();

      // FIXME: jangan gunakan directive blade di dalam javascript
      $(`
        <datalist id="datalistOptions">
            @foreach ($pembinas as $p)
                <option>{{ $p->nama }}</option>
            @endforeach
        </datalist>
      `).insertAfter("#namaPembina");
    } else if (pembina === "0") {
      $("#jabatanLainnya").replaceWith(`
        <input type="text" name="jabatan_lainnya" id="jabatanLainnya" class="form-control" placeholder="Lainnya...">
      `);

      $("#namaPembina").replaceWith(`
        <input class="form-control" list="datalistOptions" name="pembina_id" id="namaPembina" placeholder="Cari Nama Pembina">
      `);

      $("#datalistOptions").remove();
    } else {
      $("#jabatanLainnya").replaceWith(`
        <input type="text" name="jabatan_lainnya" id="jabatanLainnya" class="form-control" placeholder="Lainnya..." disabled>
      `);

      $("#namaPembina").replaceWith(`
        <input class="form-control" list="datalistOptions" name="pembina_id" id="namaPembina" placeholder="Cari Nama Pembina" disabled>
      `);
    }
  });

  $("#punyaMedsos").click(function (e) {
    const punyaMedsos = $(this).is(":checked");
    const inputAkunMedsos = $("#akunMedsos");

    inputAkunMedsos.prop("disabled", !punyaMedsos);
  });

  $("#punyaSk").click(function (e) {
    const punyaSk = $(this).is(":checked");
    const inputNomorSk = $("#nomorSk");
    const inputTanggalSk = $("#tanggalSk");
    const selectDikeluarkan = $("#dikeluarkanOleh");

    inputNomorSk.prop("disabled", !punyaSk);
    inputTanggalSk.prop("disabled", !punyaSk);
    selectDikeluarkan.prop("disabled", !punyaSk);
  });

  $("#materi_lainnya").click(function (e) {
    const punyaMateriLainnya = $(this).is(":checked");
    const inputMateriLainnya = $("#materiLainnya");
    inputMateriLainnya.prop("disabled", !punyaMateriLainnya);
  });

  $("#sarana_lainnya").click(function (e) {
    const punyaSaranaLainnya = $(this).is(":checked");
    const inputSaranaLainnya = $("#saranaLainnya");
    inputSaranaLainnya.prop("disabled", !punyaSaranaLainnya);
  });

  $("#tambahMou").click(function (e) {
    e.preventDefault();

    const namaMitra = $("#namaMitra").val();
    const mou = $("#mou option:selected").val();
    const bentukKerjasama = $("#bentukKerjasama option:selected").val();

    $(`
      <tr>
        <td>${namaMitra}</td>
        <td>${mou}</td>
        <td>${bentukKerjasama}</td>
        <td>
          <button type="button" class="btn btn-danger">Hapus</button>
        </td>
      </tr>
    `).appendTo("#tabelMitra");
  });

  $("#tambahPengurus").click(function (e) {
    e.preventDefault();

    const nik = $("#nik").val();
    const namaLengkap = $("#namaLengkap").val();
    const jabatanPengurus = $("#jabatanPengurus option:selected").val();
    const noHp = $("#noHp").val();
    const pelatihan = $("#pelatihan option:selected").val();

    $(`
      <tr>
        <td>${nik}</td>
        <td>${namaLengkap}</td>
        <td>${jabatanPengurus}</td>
        <td>${noHp}</td>
        <td>${pelatihan}</td>
        <td>
          <button type="button" class="btn btn-danger">Hapus</button>
        </td>
      </tr>
    `).appendTo("#tabelPengurus");
  });
});

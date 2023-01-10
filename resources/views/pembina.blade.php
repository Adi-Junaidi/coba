@extends('layouts.main')

@section('link')
  <link href="{{ asset('dist') }}/assets/css/pages/fontawesome.css" rel="stylesheet">
  <link href="{{ asset('dist') }}/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <link href="{{ asset('dist') }}/assets/css/pages/datatables.css" rel="stylesheet">
@endsection

@section('container')
  <div class='layout-navbar' id="main">
    @include('partials.navbar')
    <div id="main-content">
      <div class="page-heading">
        <div class="page-title">
          <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>Data Pembina</h3>
            </div>

            <div class="col-12 col-md-6 order-md-2 order-first">
              <nav class="breadcrumb-header float-start float-lg-end" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Data Master</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Pembina</li>
                </ol>
              </nav>
            </div>
          </div>

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
                      @foreach ($kabkota as $p)
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
        </div>

        <!-- Tables start -->
        <section class="section">
          <div class="card">
            <div class="card-body">
              <div class="row g-2 mb-3">
                <div class="col-md">
                  <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><span class="fa-fw select-all fas"></span></span>
                    <input class="form-control" id="cari" name="cari" type="text" placeholder="Cari..." autocomplete="off">
                  </div>
                </div>

                <div class="col-md">
                  <div class="d-flex justify-content-end ">
                    <button class="btn btn-primary" id="btnTambah" data-bs-toggle="modal" data-bs-target="#modalCreate" disabled><span class="fa-fw select-all fas me-2"></span>Tambah Data Pembina</button>
                  </div>
                </div>
              </div>

              <table class="table" id="table1">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>No. Register</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @include('partials.table-pembina', ['pembina' => $pembina])
                </tbody>
              </table>

              {{-- <div class="row">
                <span class="pagination justify-content-end">{{ $pembina->links() }}</span>
              </div> --}}
            </div>
          </div>
        </section>
        <!-- Tables end -->
      </div>
    </div>

    <!-- Modal Create -->
    <div class="modal fade text-left" id="modalCreate" role="dialog" aria-labelledby="judulModalCreate" aria-hidden="true" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h4 class="modal-title text-light" id="judulModalCreate">Tambah Pembina</h4>
            <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Tutup"></button>
          </div>

          <form id="formTambah">
            @csrf
            <div class="modal-body">
              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label" for="tambah__noRegister">No. Register</label>
                <div class="col-sm-4">
                  <input class="form-control" id="tambah__noRegister" type="text" placeholder="Pilih jabatan terlebih dahulu" readonly>
                </div>

                <label class="col-sm-2 col-form-label" for="tambah__noUrut">No. Urut Pembina</label>
                <div class="col-sm-4">
                  <input class="form-control" id="tambah__noUrut" type="text" value="02" readonly>
                </div>
              </div>

              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label" for="tambah__nama">Nama</label>
                <div class="col-sm-4">
                  <input class="form-control" id="tambah__nama" type="text" placeholder="Nama Pembina">
                </div>

                <label class="col-sm-2 col-form-label" for="tambah__jabatan">Jabatan</label>
                <div class="col-sm-4">
                  <select class="form-select" id="tambah__jabatan" required>
                    <option value="" hidden>Pilih Jabatan</option>
                    @foreach ($jabatans as $jabatan)
                      <option data-kode="{{ $jabatan->kode }}" value="{{ $jabatan->id }}">{{ $jabatan->nama }}</option>
                    @endforeach
                    {{-- <option value="Lainnya">Lainnya</option> --}}
                  </select>
                </div>
              </div>

              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label" for="tambah__alamat">Alamat</label>
                <label class="col-sm-2 col-form-label" for="tambah__provinsi">Provinsi</label>
                <div class="col-sm-3">
                  <input class="form-control" id="tambah__provinsi" type="text" value="{{ $provinsi->kode . ' | ' . $provinsi->nama }}" readonly>
                </div>

                <label class="col-sm-2 col-form-label" for="tambah__kabKota">Kab/Kota</label>
                <div class="col-sm-3">
                  <input class="form-control" id="tambah__kabKota" type="text" readonly>
                </div>
              </div>

              <div class="mb-3 row">
                <div class="col-sm-2 col-form-label"></div>

                <label class="col-sm-2 col-form-label" for="tambah__kecamatan">Kecamatan</label>
                <div class="col-sm-3">
                  <input class="form-control" id="tambah__kecamatan" type="text" readonly>
                </div>

                <label class="col-sm-2 col-form-label" for="tambah__desaKel">Desa/Kel</label>
                <div class="col-sm-3">
                  <input class="form-control" id="tambah__desaKel" type="text" readonly>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Batal</span>
              </button>
              <button class="btn btn-primary" data-bs-dismiss="modal" type="submit">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Simpan</span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade text-left" id="detailModal" role="dialog" aria-labelledby="judulModalDetail" aria-hidden="true" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header bg-info">
            <h4 class="modal-title text-light" id="judulModalDetail">Detail Data Pembina</h4>
            <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
          </div>

          <form action="#">
            <div class="modal-body">
              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label" for="noRegister">No. Register</label>
                <div class="col-sm-4">
                  <input class="form-control" id="noRegister" type="text" disabled readonly>
                </div>

                <label class="col-sm-2 col-form-label" for="noUrut">No. Urut Pembina</label>
                <div class="col-sm-4">
                  <input class="form-control" id="noUrut" type="text" value="02" disabled readonly>
                </div>
              </div>

              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                <div class="col-sm-10">
                  <input class="form-control" id="name" type="text" disabled readonly>
                </div>
              </div>

              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
                <label class="col-sm-2 col-form-label" for="provinsi">Provinsi</label>
                <div class="col-sm-3">
                  <input class="form-control" id="provinsi" type="text" value="Gorontalo" disabled readonly>
                </div>

                <label class="col-sm-2 col-form-label" for="kabupaten">Kab/Kota</label>
                <div class="col-sm-3">
                  <input class="form-control" id="kabKota" type="text" value="Kota Gorontalo" disabled readonly>
                </div>
              </div>

              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label" for=""></label>

                <label class="col-sm-2 col-form-label" for="kecamatan">Kecamatan</label>
                <div class="col-sm-3">
                  <input class="form-control" id="kecamatan" type="text" value="Kota Tengah" disabled readonly>
                </div>

                <label class="col-sm-2 col-form-label" for="desaKel">Desa/Kel</label>
                <div class="col-sm-3">
                  <input class="form-control" id="desaKel" type="text" value="Liluwo" disabled readonly>
                </div>
              </div>

              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label" for="jabatan">Jabatan</label>
                <div class="col-sm-4">
                  <input class="form-control" id="position" type="text" disabled readonly>
                </div>

                <div class="col-sm-4">
                  <input class="form-control" id="lainnya" type="text" placeholder="Lainnya" disabled readonly>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-light-secondary" data-bs-dismiss="modal" type="button">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Batal</span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="{{ asset('dist') }}/assets/extensions/jquery/jquery.min.js"></script>
  <script src="/js/datatables.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
      const tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
      })
    }, false);
  </script>

  <script>
    $(document).ready(function() {
      const tablePembina = $("#table1").DataTable({
        columnDefs: [{
          "defaultContent": "-",
          "targets": "_all"
        }]
      });

      const btnCari = $('#btnCari');
      const btnTambah = $('#btnTambah');

      // modal untuk menampilkan detail data pembina
      $(document).on("click", "#detail", function() {
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

      btnCari.on('click', function() {
        getPembina({
          desa: $('#ddDesa').val()
        })
      });

      // tombol cari pembina berdasarkan nama with ajax
      /* $(document).on("keyup", "#cari", function() {
        getPembina({
          keyword: $("#cari").val(),
          desa: $('#ddDesa').val() === 'Desa/Kelurahan' ? null : $('#ddDesa').val()
        })
      }); */

      // dropdown dependent
      $('#ddKabKota').on('change', function() {
        const kabkotaID = $(this).val();
        const namaKabKota = $(this).find(':selected').text();
        const ddKecamatan = $('#ddKecamatan');

        if (kabkotaID) {
          $.ajax({
            type: "get",
            url: `/api/kabkota/${kabkotaID}/kecamatans/`,
            dataType: "json",
            success: function(data) {
              if (data) {
                ddKecamatan.empty();
                ddKecamatan.append('<option hidden>Kecamatan</option>');
                $.each(data, function(key, kecamatan) {
                  // $('select[name="ddKecamatan"]').append('<option value="' + kecamatan.id + '">' + kecamatan.kode + ' | ' + kecamatan.nama + '</option>');
                  $('select[name="ddKecamatan"]').append(`<option data-kode="${kecamatan.kode}" value="${kecamatan.id}">${kecamatan.kode} | ${kecamatan.nama}</option>`);
                });
                ddKecamatan.prop('disabled', false);

                $('#tambah__kabKota').val(namaKabKota);
              } else {
                ddKecamatan.empty();
                ddKecamatan.prop('disabled', true);
                btnCari.prop('disabled', true);
                btnTambah.prop('disabled', true);
              }
            }
          });
        } else {
          ddKecamatan.empty();
          ddKecamatan.prop('disabled', true);
          btnCari.prop('disabled', true);
          btnTambah.prop('disabled', true);
        }
      });

      $('#ddKecamatan').on('change', function() {
        const kecamatanId = $(this).val();
        const namaKecamatan = $(this).find(':selected').text();
        const ddDesa = $('#ddDesa');

        if (kecamatanId) {
          $.ajax({
            type: "get",
            url: `/api/kecamatan/${kecamatanId}/desas/`,
            dataType: "json",
            success: function(data) {
              if (data) {
                ddDesa.empty();
                ddDesa.append('<option hidden>Desa/Kelurahan</option>');
                $.each(data, function(key, desa) {
                  // $('select[name="ddDesa"]').append('<option value="' + desa.id + '">' + desa.kode + ' | ' + desa.nama + '</option>');
                  $('select[name="ddDesa"]').append(`<option value="${desa.id}">${desa.kode} | ${desa.nama}</option>`);
                });
                ddDesa.prop('disabled', false);

                $('#tambah__kecamatan').val(namaKecamatan);
              } else {
                ddDesa.empty();
                ddDesa.prop('disabled', true);
                btnCari.prop('disabled', true);
                btnTambah.prop('disabled', true);
              }
            }
          });
        } else {
          ddDesa.empty();
          ddDesa.prop('disabled', true);
          btnCari.prop('disabled', true);
          btnTambah.prop('disabled', true);
        }
      });

      $('#ddDesa').on('change', function() {
        const desaId = $(this).val();
        const namaDesa = $(this).find(':selected').text();

        if (desaId) {
          btnCari.prop('disabled', false);
          btnTambah.prop('disabled', false);

          $('#tambah__desaKel').val(namaDesa);
        } else {
          btnCari.prop('disabled', true);
          btnTambah.prop('disabled', true);
        }
      });

      // generate nomor registrasi ketika jabatan dipilih
      $('#tambah__jabatan').on('change', function() {
        if ($(this).val() !== 'Lainnya') {
          const kodeJabatan = $(this).find(':selected').data('kode');
          const kodeProvinsi = $('#ddProvinsi').find(':selected').data('kode');
          const kodeKabKot = $('#ddKabKota').find(':selected').data('kode');
          const kodeKecamatan = $('#ddKecamatan').find(':selected').data('kode');
          const nomorUrut = '01';

          const noRegister = '' + kodeProvinsi + kodeKabKot + kodeKecamatan + kodeJabatan + nomorUrut;

          $('#tambah__noRegister').val(noRegister);
        }
      });

      $('#formTambah').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
          type: 'post',
          url: '/pembina',
          data: {
            nama: $('#tambah__nama').val(),
            jabatanId: $('#tambah__jabatan').val(),
            desaId: $('#ddDesa').val(),
            _token: '{{ csrf_token() }}'
          },
          dataType: 'json',
          encode: true,
          success: function(data) {
            $('#tambah__nama').val('');
            $('#tambah__jabatan').val('');
            alert(`${data.status}: ${data.message}`);

            getPembina({
              desa: $('#ddDesa').val()
            });
          },
        });
      });

      function getPembina(data) {
        $.ajax({
          type: "get",
          url: "/api/pembina",
          data,
          success: function(data) {
            data = data.map((d, i) => {
              return [
                i + 1,
                d.no_register,
                d.nama,
                d.jabatan.nama,
                `<button class="btn btn-info btn-sm" id="detail" data-bs-toggle="modal" data-bs-target="#detailModal" data-noreg="${d.no_register}" data-nourut="${d.no_urut }" data-nama="${d.nama }" data-provinsi="${ d.desa.kecamatan.kabkota.provinsi.kode } | ${ d.desa.kecamatan.kabkota.provinsi.nama }" data-kabkota="${ d.desa.kecamatan.kabkota.kode } | ${ d.desa.kecamatan.kabkota.nama }" data-kecamatan="${ d.desa.kecamatan.kode } | ${ d.desa.kecamatan.nama }" data-desakel="${ d.desa.kode } | ${ d.desa.nama }" data-jabatan="${ d.jabatan.nama }" type="button">
                  <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail">
                    <span class="fa-fw select-all fas"></span>
                  </span>
                </button>

                <button class="btn btn-warning btn-sm" id="edit" data-bs-toggle="tooltip" data-bs-placement="bottom" type="button" title="Edit">
                  <span class="fa-fw select-all fas"></span>
                </button>

                <button class="btn btn-danger btn-sm" id="delete" data-bs-toggle="tooltip" data-bs-placement="bottom" type="button" title="Delete">
                  <span class="fa-fw select-all fas"></span>
                </button>`
              ]
            });
            tablePembina.clear().rows.add(data).draw();
          }
        });
      }
    })
  </script>
@endsection

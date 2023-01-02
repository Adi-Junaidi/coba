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
                      @foreach ($pembina as $p)
                        <option>{{ $p->desa->kecamatan->kabkota->provinsi->kode . ' | ' . $p->desa->kecamatan->kabkota->provinsi->nama }}</option>
                      @endforeach
                    </select>
                  </fieldset>

                  <label class="col-md-3" for="ddKabKota">Kabupaten/Kota</label>
                  <fieldset class="form-group col-md-3">
                    <select class="form-select" id="ddKabKota" name="ddKabKota">
                      <option hidden>Kabupaten/Kota</option>
                      @foreach ($kabkota as $p)
                        <option value="{{ $p->id }}">{{ $p->kode . ' | ' . $p->nama }}</option>
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
                    <button class="btn btn-primary" type="submit"><span class="fa-fw select-all fas me-2"></span>Tambah Data Pembina</button>
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

              <div class="row">
                <span class="pagination justify-content-end">{{ $pembina->links() }}</span>
              </div>
            </div>
          </div>
        </section>
        <!-- Tables end -->
      </div>

      <!-- Modal -->
      <div class="modal fade text-left" id="detailModal" role="dialog" aria-labelledby="judulModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h4 class="modal-title text-light" id="judulModal">Detail Data Pembina</h4>
              <button class="close" data-bs-dismiss="modal" type="button" aria-label="Close">
                <i data-feather="x"></i>
              </button>
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
                  <label class="col-sm-1 col-form-label" for="provinsi">Provinsi</label>
                  <div class="col-sm-3">
                    <input class="form-control" id="provinsi" type="text" value="Gorontalo" disabled readonly>
                  </div>

                  <label class="col-sm-1 col-form-label" for="kabupaten">Kab/Kota</label>
                  <div class="col-sm-3">
                    <input class="form-control" id="kabKota" type="text" value="Kota Gorontalo" disabled readonly>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label class="col-sm-2 col-form-label" for=""></label>
                  <label class="col-sm-1 col-form-label" for="kecamatan">Kecamatan</label>
                  <div class="col-sm-3">
                    <input class="form-control" id="kecamatan" type="text" value="Kota Tengah" disabled readonly>
                  </div>

                  <label class="col-sm-1 col-form-label" for="desaKel">Desa/Kel</label>
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
                  <span class="d-none d-sm-block">Close</span>
                </button>
                {{-- <button class="btn btn-primary ml-1" data-bs-dismiss="modal" type="button">
                  <i class="bx bx-check d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">login</span>
                </button> --}}
              </div>
            </form>
          </div>
        </div>
      </div>
    @endsection

    @section('script')
      <script src="{{ asset('dist') }}/assets/extensions/jquery/jquery.min.js"></script>

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
          const btnCari = $('#btnCari');

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
          $(document).on("keyup", "#cari", function() {
            getPembina({
              keyword: $("#cari").val(),
              desa: $('#ddDesa').val() === 'Desa/Kelurahan' ? null : $('#ddDesa').val()
            })
          });

          // dropdown dependent
          $('#ddKabKota').on('change', function() {
            const kabkotaID = $(this).val();
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
                      $('select[name="ddKecamatan"]').append('<option value="' + kecamatan.id + '">' + kecamatan.kode + ' | ' + kecamatan.nama + '</option>');
                    });
                    ddKecamatan.prop('disabled', false);
                  } else {
                    ddKecamatan.empty();
                    ddKecamatan.prop('disabled', true);
                    btnCari.prop('disabled', true);
                  }
                }
              });
            } else {
              ddKecamatan.empty();
              ddKecamatan.prop('disabled', true);
              btnCari.prop('disabled', true);
            }
          });

          $('#ddKecamatan').on('change', function() {
            const kecamatanId = $(this).val();
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
                      $('select[name="ddDesa"]').append('<option value="' + desa.id + '">' + desa.kode + ' | ' + desa.nama + '</option>');
                    });
                    ddDesa.prop('disabled', false);
                  } else {
                    ddDesa.empty();
                    ddDesa.prop('disabled', true);
                    btnCari.prop('disabled', true);
                  }
                }
              });
            } else {
              ddDesa.empty();
              ddDesa.prop('disabled', true);
              btnCari.prop('disabled', true);
            }
          });

          $('#ddDesa').on('change', function() {
            const desaId = $(this).val();

            if (desaId) {
              btnCari.prop('disabled', false);
            } else {
              btnCari.prop('disabled', true);
            }
          });

          function getPembina(data) {
            $.ajax({
              type: "get",
              url: "/api/pembina",
              data,
              success: function(data) {
                $('tbody').html(data);
              }
            });
          }
        })
      </script>
    @endsection

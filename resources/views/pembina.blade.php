@extends('layouts.main', [
    'title' => 'Data Pembina',
    'heading' => 'Data Pembina',
    'breadcrumb' => ['Data Master', 'Data Pembina'],
])

@section('link')
  <link href="{{ asset('dist') }}/assets/css/pages/fontawesome.css" rel="stylesheet">
  <link href="{{ asset('dist') }}/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <link href="{{ asset('dist') }}/assets/css/pages/datatables.css" rel="stylesheet">
@endsection

@section('container')
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

  <section class="section">
    <div class="card">
      <div class="card-body">
        <div class="row g-2 mb-3">
          <div class="col-md">
            <div class="d-flex justify-content-end">
              <button class="btn btn-primary" id="btnTambah" data-bs-toggle="modal" data-bs-target="#modalCreate" disabled><span class="fa-fw fas me-2 select-all"></span>Tambah Data Pembina</button>
            </div>
          </div>
        </div>

        <table class="table" id="tablePembina">
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
      </div>
    </div>
  </section>
@endsection

@section('modals')
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
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="tambah__noRegister">No. Register</label>
              <div class="col-sm-4">
                <input class="form-control" id="tambah__noRegister" type="text" placeholder="Pilih jabatan terlebih dahulu" readonly disabled>
              </div>

              <label class="col-sm-2 col-form-label" for="tambah__noUrut">No. Urut Pembina</label>
              <div class="col-sm-4">
                <input class="form-control" id="tambah__noUrut" type="text" value="02" readonly disabled>
              </div>
            </div>

            <div class="row mb-3">
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

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="tambah__alamat">Alamat</label>
              <label class="col-sm-2 col-form-label" for="tambah__provinsi">Provinsi</label>
              <div class="col-sm-3">
                <input class="form-control" id="tambah__provinsi" type="text" value="{{ $provinsi->kode . ' | ' . $provinsi->nama }}" readonly disabled>
              </div>

              <label class="col-sm-2 col-form-label" for="tambah__kabKota">Kab/Kota</label>
              <div class="col-sm-3">
                <input class="form-control" id="tambah__kabKota" type="text" readonly disabled>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-sm-2 col-form-label"></div>

              <label class="col-sm-2 col-form-label" for="tambah__kecamatan">Kecamatan</label>
              <div class="col-sm-3">
                <input class="form-control" id="tambah__kecamatan" type="text" readonly disabled>
              </div>

              <label class="col-sm-2 col-form-label" for="tambah__desaKel">Desa/Kel</label>
              <div class="col-sm-3">
                <input class="form-control" id="tambah__desaKel" type="text" readonly disabled>
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

  <!-- Modal Update -->
  <div class="modal fade text-left" id="modalUpdate" role="dialog" aria-labelledby="judulModalUpdate" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h4 class="modal-title text-light" id="judulModalUpdate">Edit Pembina</h4>
          <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Tutup"></button>
        </div>

        <form id="formUpdate">
          @csrf
          <div class="modal-body">
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="update__noRegister">No. Register</label>
              <div class="col-sm-4">
                <input class="form-control" id="update__noRegister" type="text" placeholder="Pilih jabatan terlebih dahulu" readonly disabled>
              </div>

              <label class="col-sm-2 col-form-label" for="update__noUrut">No. Urut Pembina</label>
              <div class="col-sm-4">
                <input class="form-control" id="update__noUrut" type="text" value="02" readonly disabled>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="update__nama">Nama</label>
              <div class="col-sm-4">
                <input class="form-control" id="update__nama" type="text" placeholder="Nama Pembina">
              </div>

              <label class="col-sm-2 col-form-label" for="update__jabatan">Jabatan</label>
              <div class="col-sm-4">
                <select class="form-select" id="update__jabatan" required>
                  <option value="" hidden>Pilih Jabatan</option>
                  @foreach ($jabatans as $jabatan)
                    <option data-kode="{{ $jabatan->kode }}" value="{{ $jabatan->id }}">{{ $jabatan->nama }}</option>
                  @endforeach
                  {{-- <option value="Lainnya">Lainnya</option> --}}
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="update__alamat">Alamat</label>
              <label class="col-sm-2 col-form-label" for="update__provinsi">Provinsi</label>
              <div class="col-sm-3">
                <input class="form-control" id="update__provinsi" type="text" value="{{ $provinsi->kode . ' | ' . $provinsi->nama }}" readonly disabled>
              </div>

              <label class="col-sm-2 col-form-label" for="update__kabKota">Kab/Kota</label>
              <div class="col-sm-3">
                <input class="form-control" id="update__kabKota" type="text" readonly disabled>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-sm-2 col-form-label"></div>

              <label class="col-sm-2 col-form-label" for="update__kecamatan">Kecamatan</label>
              <div class="col-sm-3">
                <input class="form-control" id="update__kecamatan" type="text" readonly disabled>
              </div>

              <label class="col-sm-2 col-form-label" for="update__desaKel">Desa/Kel</label>
              <div class="col-sm-3">
                <input class="form-control" id="update__desaKel" type="text" readonly disabled>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-light-secondary" data-bs-dismiss="modal" type="button">
              <i class="bx bx-x d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Batal</span>
            </button>
            <button class="btn btn-warning" data-bs-dismiss="modal" type="submit">
              <i class="bx bx-x d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Simpan</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Detail -->
  <div class="modal fade text-left" id="modalDetail" role="dialog" aria-labelledby="judulModalDetail" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title text-light" id="judulModalDetail">Detail Data Pembina</h4>
          <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
        </div>

        <form action="#">
          <div class="modal-body">
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="noRegister">No. Register</label>
              <div class="col-sm-4">
                <input class="form-control" id="detail__noRegister" type="text" disabled readonly>
              </div>

              <label class="col-sm-2 col-form-label" for="noUrut">No. Urut Pembina</label>
              <div class="col-sm-4">
                <input class="form-control" id="detail__noUrut" type="text" value="02" disabled readonly>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="nama">Nama</label>
              <div class="col-sm-10">
                <input class="form-control" id="detail__nama" type="text" disabled readonly>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
              <label class="col-sm-2 col-form-label" for="provinsi">Provinsi</label>
              <div class="col-sm-3">
                <input class="form-control" id="detail__provinsi" type="text" value="Gorontalo" disabled readonly>
              </div>

              <label class="col-sm-2 col-form-label" for="kabupaten">Kab/Kota</label>
              <div class="col-sm-3">
                <input class="form-control" id="detail__kabKota" type="text" value="Kota Gorontalo" disabled readonly>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for=""></label>

              <label class="col-sm-2 col-form-label" for="kecamatan">Kecamatan</label>
              <div class="col-sm-3">
                <input class="form-control" id="detail__kecamatan" type="text" value="Kota Tengah" disabled readonly>
              </div>

              <label class="col-sm-2 col-form-label" for="desaKel">Desa/Kel</label>
              <div class="col-sm-3">
                <input class="form-control" id="detail__desaKel" type="text" value="Liluwo" disabled readonly>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="jabatan">Jabatan</label>
              <div class="col-sm-4">
                <input class="form-control" id="detail__position" type="text" disabled readonly>
              </div>

              <div class="col-sm-4">
                <input class="form-control" id="detail__lainnya" type="text" placeholder="Lainnya" disabled readonly>
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
    const CSRF = "{{ csrf_token() }}";
  </script>
  <script src="/assets/js/pembina.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  @if (session()->has('success'))
    <script>
      swal({
        title: "Berhasil",
        text: "{{ session('success') }}",
        icon: "success",
        button: true,
      });
    </script>
  @endif
@endsection

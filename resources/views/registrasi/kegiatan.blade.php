@extends('layouts.main', [
    'title' => 'Registrasi Kegiatan',
    'heading' => 'Data Pembina',
    'breadcrumb' => ['Data Master', 'Data Pembina'],
])

@section('link')
  <link href="{{ asset('dist') }}/assets/css/pages/fontawesome.css" rel="stylesheet">
  <link href="{{ asset('dist') }}/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <link href="{{ asset('dist') }}/assets/css/pages/datatables.css" rel="stylesheet">
@endsection

@section('container')
  <section class="section" id="section1">
    <div class="card">
      <div class="card-body">
        <table class="table" id="table">
          <thead>
            <tr>
              <th>No.</th>
              <th>No. Register</th>
              <th>Nama</th>
              <th>Basis</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pikr as $p)
              <tr>
                <td>{{ $p->id }}</td>
                <td>
                  <span id="noreg">{{ $p->no_register }}</span>
                </td>
                <td>
                  <span id="nama">{{ $p->nama }}</span>
                </td>
                <td>
                  <span id="basis">{{ $p->basis }}</span>
                </td>
                <td>
                  <!-- Button trigger for next table -->
                  <button class="btn btn-info btn-sm" id="detail1" type="button">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail">
                      <span class="fa-fw fas select-all"></span>
                    </span>
                  </button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>
@endsection

@section('modals')
  <!-- Modal -->
  <div class="modal fade text-left" id="modal1" role="dialog" aria-labelledby="judulModal" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="judulModal">Detail Data Pembina</h4>
          <button class="close" data-bs-dismiss="modal" type="button" aria-label="Close">
            <i data-feather="x"></i>
          </button>
        </div>
        <form action="#">
          <div class="modal-body">
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="noRegister">No. Register</label>
              <div class="col-sm-4">
                <input class="form-control" id="noRegister" type="text" disabled readonly>
              </div>

              <label class="col-sm-2 col-form-label" for="noUrut">No. Urut Pembina</label>
              <div class="col-sm-4">
                <input class="form-control" id="noUrut" type="text" value="02" disabled readonly>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="nama">Nama</label>
              <div class="col-sm-10">
                <input class="form-control" id="name" type="text" disabled readonly>
              </div>
            </div>

            <div class="row mb-3">
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

            <div class="row mb-3">
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

            <div class="row mb-3">
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
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="{{ asset('dist') }}/assets/extensions/jquery/jquery.min.js"></script>
  <script src="/js/datatables.min.js"></script>
  <script src="/assets/js/kegiatan.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
      var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
      })
    }, false);
  </script>
@endsection

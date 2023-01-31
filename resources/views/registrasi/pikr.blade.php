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
              <h3>{{ $title }}</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
              <nav class="breadcrumb-header float-start float-lg-end" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Data PIK-R</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                </ol>
              </nav>
            </div>
          </div>
          <section class="section">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Pencarian Berdasarkan Alamat PIK-R</h4>
              </div>

              {{-- form cari berdasarkan alamat --}}
              <div class="card-body">
                <div class="row">
                  <label class="col-md-2">Provinsi</label>
                  <fieldset class="form-group col-md-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">75 | Gorontalo</option>
                    </select>
                  </fieldset>
                  <label class="col-md-2">Kabupaten/Kota</label>
                  <fieldset class="form-group col-md-4">
                    <select class="form-select" id="ddKabKota" name="ddKabKota">
                      <option hidden>Kabupaten/Kota</option>
                        @foreach ($kabkota as $p)
                            <option value="{{ $p->id }}">{{ $p->kode . ' | ' . $p->nama }}</option>
                        @endforeach
                    </select>
                  </fieldset>
                </div>
                <div class="row">
                  <label class="col-md-2">Kecamatan</label>
                  <fieldset class="form-group col-md-4">
                    <select class="form-select" id="ddKecamatan" name="ddKecamatan" disabled>
                        <option hidden>Kecamatan</option>
                    </select>
                  </fieldset>
                  <label class="col-md-2">Desa/Kelurahan</label>
                  <fieldset class="form-group col-md-4">
                    <select class="form-select" id="ddDesa" name="ddDesa" disabled>
                        <option hidden>Desa/Kelurahan</option>
                    </select>
                  </fieldset>
                </div>
                <div class="d-grid gap-2">
                  <button class="btn btn-primary" type="submit">Cari</button>
                </div>
              </div>

            </div>
          </section>
        </div>

        <!-- Tables start -->
        <section class="section">
          <div class="card">
            <div class="card-body">
              {{-- <div class="row mb-3">
                <div class="col-sm-4">
                  <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><span class="fa-fw select-all fas"></span></span>
                    <input class="form-control" id="cari" name="cari" type="text" placeholder="Cari..." autocomplete="off">
                  </div>
                </div>
              </div> --}}
              <div class="row g-2 mb-3">
                <div class="col-md">
                  <div class="d-flex justify-content-end ">
                    <button class="btn btn-primary" type="submit"><span class="fa-fw select-all fas me-2"></span>Tambah Data PIK-R</button>
                  </div>
                </div>
              </div>
              <table class="table" id="table1">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>No. Register</th>
                    <th>Nama</th>
                    <th>Basis</th>
                    <th>Aksi</th>
                  </tr>
                </thead>

                {{-- tabel pik-r --}}
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

                        {{-- Untuk data yang dikirimkan pada modal yang akan menampilkan informasi registrasi pik-r, belum sempat sy lengkapi --}}

                        <!-- Button trigger for form modal -->
                        <button class="btn btn-info btn-sm" id="detail" data-bs-toggle="modal" data-bs-target="#modal1" data-noreg="{{ $p->no_register }}" data-nourut="{{ $p->no_urut }}" data-nama="{{ $p->nama }}" data-alamat="{{ $p->alamat }}" data-provinsi="{{ $p->desa->kecamatan->kabkota->provinsi->kode . ' | ' . $p->desa->kecamatan->kabkota->provinsi->nama }}" data-kabkota="{{ $p->desa->kecamatan->kabkota->kode . ' | ' . $p->desa->kecamatan->kabkota->nama }}" data-kecamatan="{{ $p->desa->kecamatan->kode . ' | ' . $p->desa->kecamatan->nama }}" data-desakel="{{ $p->desa->kode . ' | ' . $p->desa->nama }}" data-basis="{{ $p->basis }}" data-jabatan="{{ $p->pembina->jabatan->nama }}" data-namajabatan="{{ $p->pembina->nama }}" data-medsos="{{ $p->akun_medsos }}" data-sk="{{ $p->sk->status }}" data-nomorsk="{{ $p->sk->no_sk }}" data-tanggalsk="{{ $p->sk->tanggal }}" data-dikeluarkanoleh="{{ $p->sk->dikeluarkan_oleh }}" type="button">
                          <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail">
                            <span class="fa-fw select-all fas"></span>
                          </span>
                        </button>

                        <button class="btn btn-warning btn-sm" id="edit" data-bs-toggle="tooltip" data-bs-placement="bottom" type="button" title="Edit">
                          <span class="fa-fw select-all fas"></span>
                        </button>

                        <button class="btn btn-danger btn-sm" id="delete" data-bs-toggle="tooltip" data-bs-placement="bottom" type="button" title="Delete">
                          <span class="fa-fw select-all fas"></span>
                        </button>
                      </td>
                    </tr>
                  @endforeach
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

      {{-- Ini bagian modal detail data registrasi PIK-R nya --}}

      <!-- Modal Identitas dan Informasi Kelompok -->
      <div class="modal fade" id="modal1" role="dialog" aria-labelledby="modal1" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h4 class="modal-title text-light" id="judulModal">Detail Data Registrasi PIK-R</h4>
              <button class="close" data-bs-dismiss="modal" type="button" aria-label="Close">
                <i data-feather="x"></i>
              </button>
            </div>
            <form action="#">
              <div class="modal-body">
                <h6 class="mb-4 text-secondary">A. Identitas Kelompok</h6>
                <div class="mb-3 row">
                  <label class="col-sm-2 col-form-label" for="noRegister">No. Register</label>
                  <div class="col-sm-4">
                    <input class="form-control" id="noRegister" type="text" disabled readonly>
                  </div>

                  <label class="col-sm-2 col-form-label" for="noUrut">No. Urut PIK-R</label>
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
                  <div class="col-sm-10">
                    <input class="form-control" id="alamat" type="text" value="Jl. Poigar" disabled readonly>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label class="col-sm-2 col-form-label" for="alamat"></label>
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

                <div class="mb-2 row">
                  {{-- <label class="col-sm-2 col-form-label" for="basis">Basis</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="basis" type="text" disabled readonly>
                  </div> --}}
                  <label class="col-sm-2 col-form-label">Basis</label>
                  <fieldset class="form-group col-sm-10">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Pendidikan - SMA/Sederajat</option>
                    </select>
                  </fieldset>
                </div>
                
                <div class="mb-2 row">
                  {{-- <label class="col-sm-2 col-form-label" for="jabatan">Jabatan</label>
                  <div class="col-sm-4">
                    <input class="form-control" id="position" type="text" disabled readonly>
                  </div> --}}
                  <label class="col-sm-2 col-form-label">Jabatan</label>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">PKB/PLKB</option>
                    </select>
                  </fieldset>
                  
                  <div class="col-sm-4">
                    <input class="form-control" id="jabatanLainnya" type="text" placeholder="Lainnya" disabled readonly>
                  </div>
                </div>
                
                <div class="mb-3 row">
                  <label class="col-sm-2 col-form-label" for="namaPembina">Nama Pembina</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="namaPembina" type="text" value="Dewi H. Yasin, Amd.Kom" disabled readonly>
                  </div>
                </div>

                <div class="mb-2 row">
                  <label class="col-sm-2 col-form-label">Akun Media Sosial</label>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Ada</option>
                    </select>
                  </fieldset>
                  
                  <div class="col-sm-4">
                    <input class="form-control" id="akunMedsos" type="text" value="Instagram (@pikr-assalam)" disabled readonly>
                  </div>
                </div>

                <h6 class="mb-4 text-secondary">B. Informasi Kelompok</h6>
                <div class="mb-2 row">
                  <label class="col-sm-2 col-form-label">SK Pengukuhan</label>
                  <fieldset class="form-group col-sm-10">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Ada</option>
                    </select>
                  </fieldset>
                </div>

                <div class="mb-3 row">
                  <label class="col-sm-2 col-form-label" for="nomorSK">Nomor</label>
                  <div class="col-sm-4">
                    <input class="form-control" id="nomorSK" type="text" value="25" disabled readonly>
                  </div>

                  <label class="col-sm-2 col-form-label" for="tanggalSK">Tanggal</label>
                  <div class="col-sm-4">
                    <input class="form-control" id="tanggalSK" type="text" value="12 Desember 2012" disabled readonly>
                  </div>
                </div>

                <div class="mb-2 row">
                  <label class="col-sm-2 col-form-label">Dikeluarkan Oleh</label>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">OPD-KB</option>
                    </select>
                  </fieldset>

                  <label class="col-sm-2">Sumber Dana Kegiatan</label>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Lainnya</option>
                    </select>
                  </fieldset>
                </div>

                <div class="mb-2 row">
                  <label class="col-sm-2">Keterpaduan Kelompok</label>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Ada</option>
                    </select>
                  </fieldset>

                  <label class="col-sm-2">Proyek Prioritas Nasional</label>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Ada</option>
                    </select>
                  </fieldset>
                </div>

              </div>
              <div class="modal-footer">
                <button class="btn btn-info" data-bs-target="#modal2" data-bs-toggle="modal" type="button">
                  <i class="bx bx-x d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">Selanjutnya <span class="fa-fw select-all fas"></span></span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Modal Materi dan Sarana PIK-R -->
      <div class="modal fade" id="modal2" role="dialog" aria-labelledby="modal2" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h4 class="modal-title text-light" id="judulModal">Detail Data Registrasi PIK-R</h4>
              <button class="close" data-bs-dismiss="modal" type="button" aria-label="Close">
                <i data-feather="x"></i>
              </button>
            </div>
            <form action="#">
              <div class="modal-body">
                <h6 class="mb-4 text-secondary">C. Ketersediaan Materi PIK-R</h6>
                <h6 class="mb-0 text-secondary">1. Kesehatan Remaja</h6>
                <div class="mb-2 row">
                  <label class="col-sm-6 col-form-label">a. Pubertas</label>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Ada</option>
                    </select>
                  </fieldset>
                </div>
                <div class="mb-2 row">
                  <label class="col-sm-6 col-form-label">b. Seksualitas</label>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Ada</option>
                    </select>
                  </fieldset>
                </div>
                <div class="mb-2 row">
                  <label class="col-sm-6 col-form-label">c. Reproduksi</label>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Ada</option>
                    </select>
                  </fieldset>
                </div>
                <div class="mb-2 row">
                  <label class="col-sm-6 col-form-label">d. Kesehatan & Gizi Remaja</label>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Ada</option>
                    </select>
                  </fieldset>
                </div>
                <div class="mb-2 row">
                  <label class="col-sm-6 col-form-label">e. Perilaku Beresiko</label>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Ada</option>
                    </select>
                  </fieldset>
                </div>
                <div class="mb-2 row">
                  <label class="col-sm-6 col-form-label">f. Tindakan Berbahaya</label>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Ada</option>
                    </select>
                  </fieldset>
                </div>
                <h6 class="mb-0 text-secondary">2. Perencanaan Berkeluarga</h6>
                <div class="mb-2 row">
                  <label class="col-sm-6 col-form-label">a. Persiapan Pernikahan</label>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Ada</option>
                    </select>
                  </fieldset>
                </div>
                <div class="mb-2 row">
                  <label class="col-sm-6 col-form-label">b. Perkembangan Keluarga</label>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Ada</option>
                    </select>
                  </fieldset>
                </div>
                <div class="mb-2 row">
                  <label class="col-sm-6 col-form-label">c. Pengasuhan Keluarga Sehat</label>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Ada</option>
                    </select>
                  </fieldset>
                </div>
                <h6 class="mb-0 text-secondary">3. Life Skill</h6>
                <div class="mb-2 row">
                  <label class="col-sm-6 col-form-label">a. Soft Skill</label>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Ada</option>
                    </select>
                  </fieldset>
                </div>
                <div class="mb-2 row">
                  <label class="col-sm-6 col-form-label">b. Hard Skill</label>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Ada</option>
                    </select>
                  </fieldset>
                </div>
                <div class="mb-2 row">
                  <h6 class="mb-0 col-sm-6 text-secondary">4. Lainnya</h6>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Tidak</option>
                    </select>
                  </fieldset>
                </div>
                <div class="mb-4 row">
                  <label class="col-sm-6 col-form-label" for="materiLainnya"></label>
                  <div class="col-sm-4">
                    <input class="form-control" id="materiLainnya" type="text" placeholder="Lainnya" disabled readonly>
                  </div>
                </div>
                <h6 class="mb-4 text-secondary">D. Ketersediaan Sarana PIK-R</h6>
                <div class="mb-2 row">
                  <label class="col-sm-6 col-form-label">1. Ruang Sekretariat</label>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Ada</option>
                    </select>
                  </fieldset>
                </div>
                <div class="mb-2 row">
                  <label class="col-sm-6 col-form-label">2. Papan Nama</label>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Ada</option>
                    </select>
                  </fieldset>
                </div>
                <div class="mb-2 row">
                  <label class="col-sm-6 col-form-label">3. Ruang Khusus Konseling</label>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Ada</option>
                    </select>
                  </fieldset>
                </div>
                <div class="mb-2 row">
                  <label class="col-sm-6 col-form-label">4. Pedoman Pengelolaan PIK-R</label>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Ada</option>
                    </select>
                  </fieldset>
                </div>
                <div class="mb-2 row">
                  <label class="col-sm-6 col-form-label">5. Modul Fasilitator PIK-R</label>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Ada</option>
                    </select>
                  </fieldset>
                </div>
                <div class="mb-2 row">
                  <label class="col-sm-6 col-form-label">6. Modul Tentang Kita</label>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Ada</option>
                    </select>
                  </fieldset>
                </div>
                <div class="mb-2 row">
                  <label class="col-sm-6 col-form-label">7. Lembar Balik</label>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Ada</option>
                    </select>
                  </fieldset>
                </div>
                <div class="mb-2 row">
                  <label class="col-sm-6 col-form-label">8. Leaflet</label>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Ada</option>
                    </select>
                  </fieldset>
                </div>
                <div class="mb-2 row">
                  <label class="col-sm-6 col-form-label">9. Poster</label>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Ada</option>
                    </select>
                  </fieldset>
                </div>
                <div class="mb-2 row">
                  <label class="col-sm-6 col-form-label">10. GenRe Kit</label>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Ada</option>
                    </select>
                  </fieldset>
                </div>
                <div class="mb-2 row">
                  <label class="col-sm-6 col-form-label">11. Buku Komik Berseri</label>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Ada</option>
                    </select>
                  </fieldset>
                </div>
                <div class="mb-2 row">
                  <h6 class="mb-0 col-sm-6 text-secondary">12. Lainnya</h6>
                  <fieldset class="form-group col-sm-4">
                    <select class="form-select" id="basicSelect" disabled>
                        <option value="">Tidak</option>
                    </select>
                  </fieldset>
                </div>
                <div class="mb-4 row">
                  <label class="col-sm-6 col-form-label" for="saranaLainnya"></label>
                  <div class="col-sm-4">
                    <input class="form-control" id="saranaLainnya" type="text" placeholder="Lainnya" disabled readonly>
                  </div>
                </div>


              </div>
              <div class="modal-footer d-flex justify-content-between">
                <div>
                <button class="btn btn-info" data-bs-target="#modal1" data-bs-toggle="modal" type="button">
                  <i class="bx bx-x d-block d-sm-none"></i>
                  <span class="d-none d-sm-block"><span class="fa-fw select-all fas"></span> Sebelumnya</span>
                </button>
                </div>

                <div>
                <button class="btn btn-info" data-bs-target="#modal3" data-bs-toggle="modal" type="button">
                  <i class="bx bx-x d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">Selanjutnya <span class="fa-fw select-all fas"></span></span>
                </button>
                </div>

              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Modal Mitra PIK-R -->
      <div class="modal fade" id="modal3" role="dialog" aria-labelledby="modal3" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h4 class="modal-title text-light" id="judulModal">Detail Data Registrasi PIK-R</h4>
              <button class="close" data-bs-dismiss="modal" type="button" aria-label="Close">
                <i data-feather="x"></i>
              </button>
            </div>
            <form action="#">
              <div class="modal-body">
                <h6 class="mb-4 text-secondary">E. Mitra PIK-R</h6>
                {{-- <div class="row mb-2">
                  <div class="col-sm-4">
                    <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><span class="fa-fw select-all fas"></span></span>
                      <input class="form-control" id="cariMitra" name="cariMitra" type="text" placeholder="Cari..." autocomplete="off">
                    </div>
                  </div>
                </div> --}}
                <table class="table" id="table1">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Mitra</th>
                      <th>MOU/Perjanjian Kerjasama</th>
                      <th>Bentuk Kerjasama</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>

              <div class="modal-footer d-flex justify-content-between">
                <div>
                <button class="btn btn-info" data-bs-target="#modal2" data-bs-toggle="modal" type="button">
                  <i class="bx bx-x d-block d-sm-none"></i>
                  <span class="d-none d-sm-block"><span class="fa-fw select-all fas"></span> Sebelumnya</span>
                </button>
                </div>

                <div>
                <button class="btn btn-info" data-bs-target="#modal4" data-bs-toggle="modal" type="button">
                  <i class="bx bx-x d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">Selanjutnya <span class="fa-fw select-all fas"></span></span>
                </button>
                </div>

              </div>
            </form>

          </div>
        </div>
      </div>

      <!-- Modal Informasi Pengurus PIK-R -->
      <div class="modal fade" id="modal4" role="dialog" aria-labelledby="modal4" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h4 class="modal-title text-light" id="judulModal">Detail Data Registrasi PIK-R</h4>
              <button class="close" data-bs-dismiss="modal" type="button" aria-label="Close">
                <i data-feather="x"></i>
              </button>
            </div>
            <form action="#">
              <div class="modal-body">
                <h6 class="mb-4 text-secondary">F. Informasi Pengurus PIK-R</h6>
                {{-- <div class="row mb-2">
                  <div class="col-sm-4">
                    <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><span class="fa-fw select-all fas"></span></span>
                      <input class="form-control" id="cariPengurus" name="cariPengurus" type="text" placeholder="Cari..." autocomplete="off">
                    </div>
                  </div>
                </div> --}}
                <table class="table" id="table1">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>NIK</th>
                      <th>Nama Lengkap</th>
                      <th>Jabatan</th>
                      <th>No. Handphone</th>
                      <th>Pelatihan</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>

              <div class="modal-footer d-flex justify-content-between">
                <div>
                <button class="btn btn-info" data-bs-target="#modal3" data-bs-toggle="modal" type="button">
                  <i class="bx bx-x d-block d-sm-none"></i>
                  <span class="d-none d-sm-block"><span class="fa-fw select-all fas"></span> Sebelumnya</span>
                </button>
                </div>

                <div>
                <button class="btn btn-info" data-bs-target="#modal5" data-bs-toggle="modal" type="button">
                  <i class="bx bx-x d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">Selanjutnya <span class="fa-fw select-all fas"></span></span>
                </button>
                </div>

              </div>
            </form>

          </div>
        </div>
      </div>

      <!-- Modal Persutujuan Registrasi -->
      <div class="modal fade" id="modal5" role="dialog" aria-labelledby="modal5" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h4 class="modal-title text-light" id="judulModal">Detail Data Registrasi PIK-R</h4>
              <button class="close" data-bs-dismiss="modal" type="button" aria-label="Close">
                <i data-feather="x"></i>
              </button>
            </div>
            <form action="#">
              <div class="modal-body">
                <h6 class="mb-4 text-secondary">G. Persetujuan Registrasi PIK-R</h6>
                <div class="mb-2 row">
                  <label class="col-sm-1 col-form-label" for="tempat">Tempat</label>
                  <div class="col-sm-3">
                    <input class="form-control" id="tempat" type="text" value="Sipatana" disabled readonly>
                  </div>

                  <label class="col-sm-1 col-form-label" for="tanggal">Tanggal</label>
                  <div class="col-sm-3">
                    <input class="form-control" id="tanggal" type="text" value="12/12/2012" disabled readonly>
                  </div>
                </div>
                <div class="mb-2 row">
                  <label class="col-sm-1 col-form-label" for="tempat">Pembina</label>
                  <div class="col-sm-3">
                    <input class="form-control" id="namaPembina" type="text" value="Hariyati Jusuf, S.IP" disabled readonly>
                  </div>

                  <label class="col-sm-1 col-form-label" for="tanggal">Ketua</label>
                  <div class="col-sm-3">
                    <input class="form-control" id="namaKetua" type="text" value="Aulia Raudhatul Jannah Nur" disabled readonly>
                  </div>
                </div>
              </div>

              <div class="modal-footer d-flex justify-content-between">
                <div>
                <button class="btn btn-info" data-bs-target="#modal3" data-bs-toggle="modal" type="button">
                  <i class="bx bx-x d-block d-sm-none"></i>
                  <span class="d-none d-sm-block"><span class="fa-fw select-all fas"></span> Sebelumnya</span>
                </button>
                </div>

                <div>
                <button class="btn btn-light-secondary" data-bs-target="#modal5" data-bs-toggle="modal" type="button">
                  <i class="bx bx-x d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">Batal</span>
                </button>
                </div>

              </div>
            </form>

          </div>
        </div>
      </div>
              
    @endsection

    @section('script')
      <script src="{{ asset('dist') }}/assets/extensions/jquery/jquery.min.js"></script>
      <script src="/js/datatables.min.js"></script>

      <script>
        document.addEventListener('DOMContentLoaded', function() {
          var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
          var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
          })
        }, false);
      </script>

      <script>
        $(document).ready(function(){
          $('.table').DataTable();
        });
      </script>

<script>
    $(document).ready(function() {
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

      const filters = {
        kabkota: null,
        kecamatan: null,
        desa: null,
      };

      // tombol cari pembina berdasarkan nama with ajax
      $(document).on("keyup", "#cari", function() {
        const keyword = $("#cari").val();
        const data = {
          keyword
        };

        if (filters.kabkota) data.kabkota = filters.kabkota;
        if (filters.kecamatan) data.kecamatan = filters.kecamatan;
        if (filters.desa) data.desa = filters.desa;

        $.ajax({
          type: "get",
          url: "/api/pembina",
          data,
          success: function(data) {
            console.log(data);
            $('tbody').html(data);
          }
        });
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
              }
            }
          });
        } else {
          ddKecamatan.empty();
          ddKecamatan.prop('disabled', true);
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
              }
            }
          });
        } else {
          ddDesa.empty();
          ddDesa.prop('disabled', true);
        }
      });
    })
</script>
    @endsection

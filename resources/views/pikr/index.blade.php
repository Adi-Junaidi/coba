@extends('layouts.main', [
    'title' => 'Data PIK-R',
    'heading' => 'Data PIK-R',
    'breadcrumb' => ['Data Master', 'Data PIK-R'],
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
                            <option value="" hidden>Kabupaten/Kota</option>
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
                            <option value="" hidden>Kecamatan</option>
                        </select>
                    </fieldset>
                    <label class="col-md-2">Desa/Kelurahan</label>
                    <fieldset class="form-group col-md-4">
                        <select class="form-select" id="ddDesa" name="ddDesa" disabled>
                            <option value="" hidden>Desa/Kelurahan</option>
                        </select>
                    </fieldset>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" id="tombolCari" type="submit" disabled>Cari</button>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table" id="tablePikr">
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
                            @can('verifyPikr', $p)
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
                                        <button class="btn btn-info btn-sm" id="detail" data-bs-toggle="modal"
                                            data-bs-target="#modal1" data-noreg="{{ $p->no_register }}"
                                            data-nourut="{{ $p->no_urut }}" data-nama="{{ $p->nama }}"
                                            data-alamat="{{ $p->alamat }}"
                                            data-provinsi="{{ $p->desa->kecamatan->kabkota->provinsi->kode . ' | ' . $p->desa->kecamatan->kabkota->provinsi->nama }}"
                                            data-kabkota="{{ $p->desa->kecamatan->kabkota->kode . ' | ' . $p->desa->kecamatan->kabkota->nama }}"
                                            data-kecamatan="{{ $p->desa->kecamatan->kode . ' | ' . $p->desa->kecamatan->nama }}"
                                            data-desakel="{{ $p->desa->kode . ' | ' . $p->desa->nama }}"
                                            data-basis="{{ $p->basis }}" data-jabatan="{{ $p->pembina->jabatan->nama }}"
                                            data-namajabatan="{{ $p->pembina->nama }}" data-medsos="{{ $p->akun_medsos }}"
                                            data-sk="{{ $p->sk?->status }}" data-nomorsk="{{ $p->sk?->no_sk }}"
                                            data-tanggalsk="{{ $p->sk?->tanggal }}"
                                            data-dikeluarkanoleh="{{ $p->sk?->dikeluarkan_oleh }}" type="button">
                                            <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail">
                                                <span class="fa-fw fas select-all"></span>
                                            </span>
                                        </button>

                                        {{-- <button class="btn btn-warning btn-sm" id="edit" data-bs-toggle="tooltip" data-bs-placement="bottom" type="button" title="Edit">
                    <span class="fa-fw fas select-all"></span>
                  </button>

                  <button class="btn btn-danger btn-sm" id="delete" data-bs-toggle="tooltip" data-bs-placement="bottom" type="button" title="Hapus">
                    <span class="fa-fw fas select-all"></span>
                  </button> --}}
                                    </td>
                                </tr>
                            @endcan
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

{{-- Ini bagian modal detail data registrasi PIK-R nya --}}
@section('modals')
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
                        <h6 class="text-secondary mb-4">A. Identitas Kelompok</h6>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="noRegister">No. Register</label>
                            <div class="col-sm-4">
                                <input class="form-control" id="noRegister" type="text" disabled readonly>
                            </div>

                            <label class="col-sm-2 col-form-label" for="noUrut">No. Urut PIK-R</label>
                            <div class="col-sm-4">
                                <input class="form-control" id="noUrut" type="text" value="02" disabled
                                    readonly>
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
                            <div class="col-sm-10">
                                <input class="form-control" id="alamat" type="text" value="Jl. Poigar" disabled
                                    readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="alamat"></label>
                            <label class="col-sm-1 col-form-label" for="provinsi">Provinsi</label>
                            <div class="col-sm-3">
                                <input class="form-control" id="provinsi" type="text" value="Gorontalo" disabled
                                    readonly>
                            </div>

                            <label class="col-sm-1 col-form-label" for="kabupaten">Kab/Kota</label>
                            <div class="col-sm-3">
                                <input class="form-control" id="kabKota" type="text" value="Kota Gorontalo"
                                    disabled readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for=""></label>
                            <label class="col-sm-1 col-form-label" for="kecamatan">Kecamatan</label>
                            <div class="col-sm-3">
                                <input class="form-control" id="kecamatan" type="text" value="Kota Tengah" disabled
                                    readonly>
                            </div>

                            <label class="col-sm-1 col-form-label" for="desaKel">Desa/Kel</label>
                            <div class="col-sm-3">
                                <input class="form-control" id="desaKel" type="text" value="Liluwo" disabled
                                    readonly>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label class="col-sm-2 col-form-label">Basis</label>
                            <fieldset class="form-group col-sm-10">
                                <select class="form-select" id="basicSelect" disabled>
                                    <option value="">Pendidikan - SMA/Sederajat</option>
                                </select>
                            </fieldset>
                        </div>

                        <div class="row mb-2">
                            <label class="col-sm-2 col-form-label">Jabatan</label>
                            <fieldset class="form-group col-sm-4">
                                <select class="form-select" id="basicSelect" disabled>
                                    <option value="">PKB/PLKB</option>
                                </select>
                            </fieldset>

                            <div class="col-sm-4">
                                <input class="form-control" id="jabatanLainnya" type="text" placeholder="Lainnya"
                                    disabled readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="namaPembina">Nama Pembina</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="namaPembina" type="text"
                                    value="Dewi H. Yasin, Amd.Kom" disabled readonly>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label class="col-sm-2 col-form-label">Akun Media Sosial</label>
                            <fieldset class="form-group col-sm-4">
                                <select class="form-select" id="basicSelect" disabled>
                                    <option value="">Ada</option>
                                </select>
                            </fieldset>

                            <div class="col-sm-4">
                                <input class="form-control" id="akunMedsos" type="text"
                                    value="Instagram (@pikr-assalam)" disabled readonly>
                            </div>
                        </div>

                        <h6 class="text-secondary mb-4">B. Informasi Kelompok</h6>
                        <div class="row mb-2">
                            <label class="col-sm-2 col-form-label">SK Pengukuhan</label>
                            <fieldset class="form-group col-sm-10">
                                <select class="form-select" id="basicSelect" disabled>
                                    <option value="">Ada</option>
                                </select>
                            </fieldset>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="nomorSK">Nomor</label>
                            <div class="col-sm-4">
                                <input class="form-control" id="nomorSK" type="text" value="25" disabled
                                    readonly>
                            </div>

                            <label class="col-sm-2 col-form-label" for="tanggalSK">Tanggal</label>
                            <div class="col-sm-4">
                                <input class="form-control" id="tanggalSK" type="text" value="12 Desember 2012"
                                    disabled readonly>
                            </div>
                        </div>

                        <div class="row mb-2">
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

                        <div class="row mb-2">
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
                            <span class="d-none d-sm-block">Selanjutnya <span class="fa-fw fas select-all"></span></span>
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
                        <h6 class="text-secondary mb-4">C. Ketersediaan Materi PIK-R</h6>
                        <h6 class="text-secondary mb-0">1. Kesehatan Remaja</h6>
                        <div class="row mb-2">
                            <label class="col-sm-6 col-form-label">a. Pubertas</label>
                            <fieldset class="form-group col-sm-4">
                                <select class="form-select" id="basicSelect" disabled>
                                    <option value="">Ada</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-6 col-form-label">b. Seksualitas</label>
                            <fieldset class="form-group col-sm-4">
                                <select class="form-select" id="basicSelect" disabled>
                                    <option value="">Ada</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-6 col-form-label">c. Reproduksi</label>
                            <fieldset class="form-group col-sm-4">
                                <select class="form-select" id="basicSelect" disabled>
                                    <option value="">Ada</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-6 col-form-label">d. Kesehatan & Gizi Remaja</label>
                            <fieldset class="form-group col-sm-4">
                                <select class="form-select" id="basicSelect" disabled>
                                    <option value="">Ada</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-6 col-form-label">e. Perilaku Beresiko</label>
                            <fieldset class="form-group col-sm-4">
                                <select class="form-select" id="basicSelect" disabled>
                                    <option value="">Ada</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-6 col-form-label">f. Tindakan Berbahaya</label>
                            <fieldset class="form-group col-sm-4">
                                <select class="form-select" id="basicSelect" disabled>
                                    <option value="">Ada</option>
                                </select>
                            </fieldset>
                        </div>
                        <h6 class="text-secondary mb-0">2. Perencanaan Berkeluarga</h6>
                        <div class="row mb-2">
                            <label class="col-sm-6 col-form-label">a. Persiapan Pernikahan</label>
                            <fieldset class="form-group col-sm-4">
                                <select class="form-select" id="basicSelect" disabled>
                                    <option value="">Ada</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-6 col-form-label">b. Perkembangan Keluarga</label>
                            <fieldset class="form-group col-sm-4">
                                <select class="form-select" id="basicSelect" disabled>
                                    <option value="">Ada</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-6 col-form-label">c. Pengasuhan Keluarga Sehat</label>
                            <fieldset class="form-group col-sm-4">
                                <select class="form-select" id="basicSelect" disabled>
                                    <option value="">Ada</option>
                                </select>
                            </fieldset>
                        </div>
                        <h6 class="text-secondary mb-0">3. Life Skill</h6>
                        <div class="row mb-2">
                            <label class="col-sm-6 col-form-label">a. Soft Skill</label>
                            <fieldset class="form-group col-sm-4">
                                <select class="form-select" id="basicSelect" disabled>
                                    <option value="">Ada</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-6 col-form-label">b. Hard Skill</label>
                            <fieldset class="form-group col-sm-4">
                                <select class="form-select" id="basicSelect" disabled>
                                    <option value="">Ada</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="row mb-2">
                            <h6 class="col-sm-6 text-secondary mb-0">4. Lainnya</h6>
                            <fieldset class="form-group col-sm-4">
                                <select class="form-select" id="basicSelect" disabled>
                                    <option value="">Tidak</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-6 col-form-label" for="materiLainnya"></label>
                            <div class="col-sm-4">
                                <input class="form-control" id="materiLainnya" type="text" placeholder="Lainnya"
                                    disabled readonly>
                            </div>
                        </div>
                        <h6 class="text-secondary mb-4">D. Ketersediaan Sarana PIK-R</h6>
                        <div class="row mb-2">
                            <label class="col-sm-6 col-form-label">1. Ruang Sekretariat</label>
                            <fieldset class="form-group col-sm-4">
                                <select class="form-select" id="basicSelect" disabled>
                                    <option value="">Ada</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-6 col-form-label">2. Papan Nama</label>
                            <fieldset class="form-group col-sm-4">
                                <select class="form-select" id="basicSelect" disabled>
                                    <option value="">Ada</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-6 col-form-label">3. Ruang Khusus Konseling</label>
                            <fieldset class="form-group col-sm-4">
                                <select class="form-select" id="basicSelect" disabled>
                                    <option value="">Ada</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-6 col-form-label">4. Pedoman Pengelolaan PIK-R</label>
                            <fieldset class="form-group col-sm-4">
                                <select class="form-select" id="basicSelect" disabled>
                                    <option value="">Ada</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-6 col-form-label">5. Modul Fasilitator PIK-R</label>
                            <fieldset class="form-group col-sm-4">
                                <select class="form-select" id="basicSelect" disabled>
                                    <option value="">Ada</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-6 col-form-label">6. Modul Tentang Kita</label>
                            <fieldset class="form-group col-sm-4">
                                <select class="form-select" id="basicSelect" disabled>
                                    <option value="">Ada</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-6 col-form-label">7. Lembar Balik</label>
                            <fieldset class="form-group col-sm-4">
                                <select class="form-select" id="basicSelect" disabled>
                                    <option value="">Ada</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-6 col-form-label">8. Leaflet</label>
                            <fieldset class="form-group col-sm-4">
                                <select class="form-select" id="basicSelect" disabled>
                                    <option value="">Ada</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-6 col-form-label">9. Poster</label>
                            <fieldset class="form-group col-sm-4">
                                <select class="form-select" id="basicSelect" disabled>
                                    <option value="">Ada</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-6 col-form-label">10. GenRe Kit</label>
                            <fieldset class="form-group col-sm-4">
                                <select class="form-select" id="basicSelect" disabled>
                                    <option value="">Ada</option>
                                </select>
                            </fieldset>
                        </div>

                        <div class="row mb-2">
                            <label class="col-sm-6 col-form-label">11. Buku Komik Berseri</label>
                            <fieldset class="form-group col-sm-4">
                                <select class="form-select" id="basicSelect" disabled>
                                    <option value="">Ada</option>
                                </select>
                            </fieldset>
                        </div>

                        <div class="row mb-2">
                            <h6 class="col-sm-6 text-secondary mb-0">12. Lainnya</h6>
                            <fieldset class="form-group col-sm-4">
                                <select class="form-select" id="basicSelect" disabled>
                                    <option value="">Tidak</option>
                                </select>
                            </fieldset>
                        </div>

                        <div class="row mb-4">
                            <label class="col-sm-6 col-form-label" for="saranaLainnya"></label>
                            <div class="col-sm-4">
                                <input class="form-control" id="saranaLainnya" type="text" placeholder="Lainnya"
                                    disabled readonly>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-between">
                        <div>
                            <button class="btn btn-info" data-bs-target="#modal1" data-bs-toggle="modal" type="button">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block"><span class="fa-fw fas select-all"></span>
                                    Sebelumnya</span>
                            </button>
                        </div>

                        <div>
                            <button class="btn btn-info" data-bs-target="#modal3" data-bs-toggle="modal" type="button">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Selanjutnya <span
                                        class="fa-fw fas select-all"></span></span>
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
                        <h6 class="text-secondary mb-4">E. Mitra PIK-R</h6>
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
                                <span class="d-none d-sm-block"><span class="fa-fw fas select-all"></span>
                                    Sebelumnya</span>
                            </button>
                        </div>

                        <div>
                            <button class="btn btn-info" data-bs-target="#modal4" data-bs-toggle="modal" type="button">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Selanjutnya <span
                                        class="fa-fw fas select-all"></span></span>
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
                        <h6 class="text-secondary mb-4">F. Informasi Pengurus PIK-R</h6>
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
                                <span class="d-none d-sm-block"><span class="fa-fw fas select-all"></span>
                                    Sebelumnya</span>
                            </button>
                        </div>

                        <div>
                            <button class="btn btn-info" data-bs-target="#modal5" data-bs-toggle="modal" type="button">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Selanjutnya <span
                                        class="fa-fw fas select-all"></span></span>
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
                        <h6 class="text-secondary mb-4">G. Persetujuan Registrasi PIK-R</h6>
                        <div class="row mb-2">
                            <label class="col-sm-1 col-form-label" for="tempat">Tempat</label>
                            <div class="col-sm-3">
                                <input class="form-control" id="tempat" type="text" value="Sipatana" disabled
                                    readonly>
                            </div>

                            <label class="col-sm-1 col-form-label" for="tanggal">Tanggal</label>
                            <div class="col-sm-3">
                                <input class="form-control" id="tanggal" type="text" value="12/12/2012" disabled
                                    readonly>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-1 col-form-label" for="tempat">Pembina</label>
                            <div class="col-sm-3">
                                <input class="form-control" id="namaPembina" type="text" value="Hariyati Jusuf, S.IP"
                                    disabled readonly>
                            </div>

                            <label class="col-sm-1 col-form-label" for="tanggal">Ketua</label>
                            <div class="col-sm-3">
                                <input class="form-control" id="namaKetua" type="text"
                                    value="Aulia Raudhatul Jannah Nur" disabled readonly>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-between">
                        <div>
                            <button class="btn btn-info" data-bs-target="#modal3" data-bs-toggle="modal" type="button">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block"><span class="fa-fw fas select-all"></span>
                                    Sebelumnya</span>
                            </button>
                        </div>

                        <div>
                            <button class="btn btn-light-secondary" data-bs-target="#modal5" data-bs-toggle="modal"
                                type="button">
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

    <script src="/js/pikr.js"></script>
@endsection

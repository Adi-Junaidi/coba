@extends('layouts.user_pikr')

@section('content')
    <section class="row">
        <h1 class="mb-3">Pengurus PIK-R</h1>
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                    Tambah Data Pengurus
                </button>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jabatan</th>
                                    <th>No. Handphone</th>
                                    <th>Pelatihan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-bold-500">Michael Right</td>
                                    <td>$15/hr</td>
                                    <td class="text-bold-500">UI/UX</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('modal')
    <div class="modal fade text-left" id="addModal" tabindex="-1" aria-labelledby="" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">
                        Tambah Data Pengurus
                    </h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <form action="/up/data/pengurus" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>NIK</label>
                            <input class="form-control" type="text">
                        </div>

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input class="form-control" type="text">

                            <div class="form-group">
                                <label>Nomor Handphone</label>
                                <input class="form-control" type="text">
                            </div>

                            <div class="form-group">
                                <label>Jabatan</label>
                                <select class="form-select" name="">
                                    <option hidden="">Pilih Jabatan</option>
                                    <option value="Pembina">Pembina</option>
                                    <option value="Ketua">Ketua</option>
                                    <option value="Sekretaris">Sekretaris</option>
                                    <option value="Bendahara">Bendahara</option>
                                    <option value="Ketua Bidang">Ketua Bidang</option>
                                    <option value="Pendidik Sebaya">Pendidik Sebaya</option>
                                    <option value="Konselor Sebaya">Konselor Sebaya</option>
                                    <option value="Anggota">Anggota</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="my-2">Pernah Ikut Pelatihan?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="mou" value="1">
                                    <label class="form-check-label"> Pernah </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="mou" value="0">
                                    <label class="form-check-label"> Tidak Pernah </label>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Submit</span>
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endpush

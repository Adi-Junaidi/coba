@extends('layouts.user_pikr')

@push('custom_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
@endpush

@section('content')
    <section class="row">
        <h1 class="mb-3 d-sm-block d-none">Identitas Kelompok PIK-R</h1>
        <h3 class="mb-3 d-sm-none d-block">Identitas Kelompok PIK-R</h3>
        <div class="mb-5 p-4 bg-white shadow-sm">
            <div class="form-group">
                <label for="nama">Nama PIK-R</label>
                <input class="form-control" id="nama" type="text" value="{{ $pikr_info->nama }}" disabled>
            </div>

            <div class="form-group">
                <label for="basis">Basis PIK-R</label>
                <input class="form-control" id="basis" type="text" value="{{ $pikr_info->basis }}" disabled>
            </div>

            <div class="form-group">
                <label for="sosmed">Sosial Media PIK-R</label>
                <input class="form-control" id="sosmed" type="text" value="{{ $pikr_info->akun_medsos }}"
                 disabled>
            </div>
            <div class="row">
                <div class="form-group col-sm-4">
                    <label for="alamat">Alamat</label>
                    <input class="form-control" id="alamat" type="text"
                        value="{{ $pikr_info->alamat }}" disabled>
                </div>

                <div class="form-group col-sm-4">
                    <label for="provinsi">Provinsi</label>
                    <input class="form-control" id="provinsi" type="text"
                        value="{{ $pikr_info->desa->kecamatan->kabkota->provinsi->nama }}" disabled>
                </div>

                <div class="form-group col-sm-4">
                    <label for="kabkota">Kabupaten/Kota</label>
                    <input class="form-control" id="kabkota" type="text"
                        value="{{ $pikr_info->desa->kecamatan->kabkota->nama }}" disabled>
                </div>

            </div>
            <div class="row">

                <div class="form-group col-sm-6">
                    <label for="kecamatan">Kecamatan</label>
                    <input class="form-control" id="kecamatan" type="text"
                        value="{{ $pikr_info->desa->kecamatan->nama }}" disabled>
                </div>

                <div class="form-group col-sm-6">
                    <label for="desa">Desa/Kelurahan</label>
                    <input class="form-control" id="desa" type="text"
                        value="{{ $pikr_info->desa->nama }}" disabled>
                </div>
            </div>

            <div class="mt-4">
                <button data-bs-toggle="modal" data-bs-target="#editModal" class="btn btn-primary">Edit</button>
            </div>

        </div>
    </section>
@endsection

@push('modal')
    <div class="modal fade text-left" id="editModal" tabindex="-1" aria-labelledby="" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title white" id="myModalLabel1">Edit Data</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
            <form method="post" action="/up/data/identitas/{{ $pikr_info->id }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="sosmed">Sosial Media PIK-R</label>
                            <input class="form-control" id="sosmed" type="text"
                                value="{{ $pikr_info->akun_medsos }}" name="sosmed">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Update</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush

@push('custom_js')
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script src="/assets/js/bs-stepper.js"></script>
@endpush

@push('scripts')
    <script>
        // $('.btn-primary').click(function() {
        //     $('#sosmed').removeAttr('disabled')
        // })
    </script>
@endpush

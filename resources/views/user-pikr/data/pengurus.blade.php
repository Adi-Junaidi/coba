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
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jabatan</th>
                                    <th>No. Handphone</th>
                                    <th>Ikut Pelatihan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengurus as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->nik }}</td>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->jabatan }}</td>
                                        <td>{{ $p->no_hp }}</td>
                                        <td>{{ $p->pernah_pelatihan ? 'Pernah' : 'Tidak Pernah' }}</td>
                                        <td>
                                            <button type="button" href="/up/data/mitra"
                                                class="btn btn-warning btn-sm edit_btn" data-bs-toggle="modal"
                                                data-bs-target="#editModal" data-id="{{ $p->id }}">Edit</button>
                                            <button type="button" href="/up/data/mitra"
                                                class="btn btn-danger btn-sm delete_btn" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal" data-nama="{{ $p->nama }}"
                                                data-id="{{ $p->id }}">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
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
                <div class="modal-header bg-primary">
                    <h5 class="modal-title white" id="myModalLabel1">
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
                            <input class="form-control @error('nik') is-invalid @enderror"" type="text" name="nik"
                                placeholder="Masukkan NIK" required value="{{ old('nik') }}">
                            @error('nik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Lengkap" required value="{{ old('nik') }}">
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nomor Handphone</label>
                            <input class="form-control" type="text" name="no_hp"
                                placeholder="Masukkan Nomor Handphone" required value="{{ old('nik') }}">
                            @error('nik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Jabatan</label>
                            <select class="form-select" name="jabatan">
                                @foreach ($jabatan as $jab)
                                    @if ($jab == old('jabatan'))
                                        <option value="{{ $jab }}" selected>{{ $jab }}</option>
                                    @else
                                        <option value="{{ $jab }}">{{ $jab }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="my-2">Pernah Ikut Pelatihan?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pernah_pelatihan" value="1"
                                    {{ old('pernah_pelatihan') == '1' ? 'checked' : '' }}>
                                <label class="form-check-label"> Pernah </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pernah_pelatihan" value="0"
                                    {{ old('pernah_pelatihan') == '0' ? 'checked' : '' }}>
                                <label class="form-check-label"> Tidak Pernah </label>
                            </div>
                            @error('pernah_pelatihan')
                                <div class="small text-danger">Tidak boleh dikosongkan</div>
                            @enderror
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

@if ($errors->any())
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#addModal').modal('show');
            });
        </script>
    @endpush
@endif

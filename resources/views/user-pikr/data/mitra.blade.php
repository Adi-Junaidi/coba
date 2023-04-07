@extends('layouts.user_pikr')

@section('content')
    <section class="row">
        <h1 class="mb-3">Mitra PIK-R</h1>
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                    Tambah Mitra
                </button>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive" style="max-height: 400px">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Mitra</th>
                                    <th>MOU/Perjanjian KerjaSama</th>
                                    <th>Bentuk Kerjasama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mitra_s as $mitra)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $mitra->nama }}</td>
                                        <td>{{ $mitra->mou ? 'Ada' : 'Tidak Ada' }}</td>
                                        <td>{{ $mitra->bentuk_kerjasama }}</td>
                                        <td>
                                            <button type="button" href="/up/data/mitra"
                                                class="btn btn-warning btn-sm edit_btn" data-bs-toggle="modal"
                                                data-bs-target="#editModal" data-id="{{ $mitra->id }}">Edit</button>
                                            <button type="button" href="/up/data/mitra"
                                                class="btn btn-danger btn-sm delete_btn" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal" data-nama="{{ $mitra->nama }}" data-id="{{ $mitra->id }}">Hapus</button>
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
                        Tambah Mitra
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
                <form action="/up/data/mitra" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="namaMitra">Nama Mitra</label>
                            <input class="form-control @error('nama') is-invalid @enderror" id="namaMitra" type="text"
                                placeholder="Masukkan Nama Mitra" name="nama" value="{{ old('nama') }}" required>
                        </div>

                        <div class="form-group">
                            <label class="my-2">MOU/Perjanjian Kerjasama</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="mou" value="1"
                                    {{ old('mou') == '1' ? 'checked' : '' }}>
                                <label class="form-check-label"> Ada </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="mou" value="0"
                                    {{ old('mou') == '0' ? 'checked' : '' }}>
                                <label class="form-check-label"> Tidak Ada </label>
                            </div>
                            @error('mou')
                                <div class="small text-danger">Tidak boleh dikosongkan</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="bentukKerjasama">Bentuk Kerjasama</label>
                            <select class="form-select" id="bentukKerjasama" name="bentuk_kerjasama">
                                @foreach ($bentuk_kerjasama as $b)
                                    @if ($b == old('bentuk_kerjasama'))
                                        <option value="{{ $b }}" selected>{{ $b }}</option>
                                    @else
                                        <option value="{{ $b }}">{{ $b }}</option>
                                    @endif
                                @endforeach
                            </select>
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

    {{-- Edit Modal --}}
    <div class="modal fade text-left" id="editModal" tabindex="-1" aria-labelledby="" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title white" id="myModalLabel1">
                        Edit Mitra
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
                <form method="post">

                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="namaMitra">Nama Mitra</label>
                            <input class="form-control @error('nama') is-invalid @enderror" id="namaMitra" type="text"
                                placeholder="Masukkan Nama Mitra" name="nama" value="{{ old('nama') }}" required>
                        </div>

                        <div class="form-group">
                            <label class="my-2">MOU/Perjanjian Kerjasama</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="mou" value="1"
                                    id="radio_1" {{ old('mou') == '1' ? 'checked' : '' }}>
                                <label class="form-check-label"> Ada </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="mou" value="0"
                                    id="radio_2" {{ old('mou') == '0' ? 'checked' : '' }}>
                                <label class="form-check-label"> Tidak Ada </label>
                            </div>
                            @error('mou')
                                <div class="small text-danger">Tidak boleh dikosongkan</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="bentukKerjasama">Bentuk Kerjasama</label>
                            <select class="form-select" id="bentukKerjasama" name="bentuk_kerjasama">
                                @foreach ($bentuk_kerjasama as $b)
                                    @if ($b == old('bentuk_kerjasama'))
                                        <option value="{{ $b }}" selected>{{ $b }}</option>
                                    @else
                                        <option value="{{ $b }}">{{ $b }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-warning ms-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Submit</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Delete Modal --}}
    <div class="modal fade text-left" id="deleteModal" tabindex="-1" aria-labelledby="" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title white" id="myModalLabel1">
                        Hapus Mitra <span id="mitra-nama"></span>
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
                <div class="modal-body">
                    Jika Ingin menghapus data mitra silahkan tekan tombol Hapus
                </div>
                <form method="post">
                    @method('delete')
                    @csrf

                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-danger ms-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Hapus</span>
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



@push('scripts')
    <script>
        $(document).on('click', '.edit_btn', function() {
            const id = $(this).data('id');
            $('#editModal form').attr('action', '/up/data/mitra/' + id);
            $.ajax({
                url: '/up/data/mitra/' + id + '/edit',
                type: 'GET',
                success: function(response) {
                    console.log(response.bentuk_kerjasama);
                    $('#editModal input[name="nama"]').val(response.nama);
                    if (response.mou == 1) {
                        $('#editModal #radio_1').attr('checked', true)
                    } else {
                        $('#editModal #radio_2').attr('checked', true)
                    }
                    $('#editModal #bentukKerjasama').val(response.bentuk_kerjasama);
                }
            });
        });

        $(document).on('click', '.delete_btn', function() {
            const id = $(this).data('id')
            const nama = $(this).data('nama')
            $('#deleteModal form').attr('action', '/up/data/mitra/' + id)
            $('#mitra-nama').html(nama)
            
        });
    </script>
@endpush

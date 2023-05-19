@if ($mitra_s->isEmpty())
    <p>Tidak Ada Mitra</p>
@else
    <div id="table-mitra" class="table-responsive" style="max-height: 400px">
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
                            <button type="button" href="/up/data/mitra" class="btn btn-warning btn-sm edit_btn"
                                data-bs-toggle="modal" data-bs-target="#editMitraModal"
                                data-id="{{ $mitra->id }}">Edit</button>
                            <button type="button" href="/up/data/mitra" class="btn btn-danger btn-sm delete_btn"
                                data-bs-toggle="modal" data-bs-target="#deleteMitraModal" data-nama="{{ $mitra->nama }}"
                                data-id="{{ $mitra->id }}">Hapus</button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endif

@push('modals')

    {{-- Edit Modal --}}
    <div class="modal fade text-left" id="editMitraModal" tabindex="-1" aria-labelledby="" style="display: none;"
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
    <div class="modal fade text-left" id="deleteMitraModal" tabindex="-1" aria-labelledby="" style="display: none;"
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
@endPush

@push('scripts')
    <script>
        $(document).on('click', '#table-mitra .edit_btn', function() {
            const id = $(this).data('id');
            $('#editMitraModal form').attr('action', '/mitra/' + id);
            $.ajax({
                url: '/mitra/getData/' + id,
                type: 'GET',
                success: function(response) {
                    $('#editMitraModal input[name="nama"]').val(response.nama);
                    if (response.mou == 1) {
                        $('#editMitraModal #radio_1').attr('checked', true)
                    } else {
                        $('#editMitraModal #radio_2').attr('checked', true)
                    }
                    $('#editMitraModal #bentukKerjasama').val(response.bentuk_kerjasama);
                }
            });
        });

        $(document).on('click', '#table-mitra .delete_btn', function() {
            const id = $(this).data('id')
            const nama = $(this).data('nama')
            $('#deleteMitraModal form').attr('action', '/mitra/delete/' + id)
            $('#mitra-nama').html(nama)
            
        });
    </script>
@endpush
@if ($pengurus->isEmpty())
    <p>Tidak Ada Pengurus</p>
@else
    <div id="table-pengurus" class="table-responsive">
        <table class="table table-lg">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>Jabatan</th>
                    <th>No. Hp</th>
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
                            <button type="button" class="btn btn-warning btn-sm edit_btn" data-bs-toggle="modal"
                                data-bs-target="#editModal" data-id="{{ $p->id }}">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm delete_btn" data-bs-toggle="modal"
                                data-bs-target="#deleteModal" data-nama="{{ $p->nama }}"
                                data-id="{{ $p->id }}">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

@push('modals')
    {{-- Edit Modal --}}
    <div class="modal fade text-left" id="editModal" tabindex="-1" aria-labelledby="" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title white" id="myModalLabel1">
                        Edit Pengurus
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
                            <label>NIK</label>
                            <input class="form-control" type="text" name="e_nik" placeholder="Masukkan NIK" required>
                            <div class="small text-muted">Nik hanya memuat angka</div>
                        </div>

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input class="form-control" type="text" name="e_nama" placeholder="Masukkan Nama Lengkap"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Nomor Handphone</label>
                            <input class="form-control" type="text" name="e_no_hp" placeholder="Masukkan Nomor Handphone"
                                required>
                            <div class="small text-muted">Nomor Hp hanya memuat angka</div>
                        </div>

                        <div class="form-group">
                            <label class="my-2">Pernah Ikut Pelatihan?</label>
                            <div class="form-check">
                                <input class="form-check-input radio_1" type="radio" name="e_pernah_pelatihan"
                                    value="1">
                                <label class="form-check-label"> Pernah </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input radio_2" type="radio" name="e_pernah_pelatihan"
                                    value="0">
                                <label class="form-check-label"> Tidak Pernah </label>
                            </div>
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
                        Hapus Pengurus <span id="pengurus-nama"></span>
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

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Terjadi Error saat melakukan edit data'
            });
        </script>
    @endif
    <script>
        $(document).on('click', '#table-pengurus .edit_btn', function() {
            const id = $(this).data('id');
            $('#editModal form').attr('action', '/pengurus/' + id);
            $.ajax({
                url: '/pengurus/getData/' + id,
                type: 'GET',
                success: function(response) {
                    $('#editModal input[name="e_nik"]').val(response.nik);
                    $('#editModal input[name="e_nama"]').val(response.nama);
                    $('#editModal input[name="e_no_hp"]').val(response.no_hp);
                    if (response.pernah_pelatihan == 1) {
                        $('#editModal .radio_1').attr('checked', true)
                    } else {
                        $('#editModal .radio_2').attr('checked', true)
                    }
                    $('#editModal #jabatan').val(response.jabatan);
                }
            });
        });

        $(document).on('click', '#table-pengurus .delete_btn', function() {
            const id = $(this).data('id')
            const nama = $(this).data('nama')
            $('#deleteModal form').attr('action', '/pengurus/delete/' + id)
            $('#pengurus-nama').html(nama)

        });
    </script>
@endpush

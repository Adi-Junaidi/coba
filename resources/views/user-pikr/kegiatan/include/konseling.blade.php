<div class="mb-5 p-4 bg-white shadow-sm">
    <form action="/kegiatan/konseling/individu" method="post">
        <h4 class="mb-4">Konseling Individu</h4>
        @csrf
        <input type="hidden" name="laporan_id" value="{{ $laporan->id }}">
        <div class="row">
            <div class="form-group col-sm-3">
                <label for="tanggal_ki">Tanggal Kegiatan</label>
                <input class="form-control @error('tanggal_ki') is-invalid @enderror" id="tanggal_ki" name="tanggal_ki"
                    type="date" value="{{ old('tanggal_ki') }}">
                @error('tanggal_ki')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-sm-9">
                <label for="konseb_ki">Nama Konselor Sebaya</label>
                <select class="form-select" id="konseb_ki" name="konseb_ki">
                    @foreach ($konseb_s as $konseb)
                        <option value="{{ $konseb->id }}" {{ $konseb->id != old('konseb_ki') ?: 'selected' }}>
                            {{ $konseb->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-6">
                <label for="cowok_ki">Jumlah Remaja Laki-Laki</label>
                <input class="form-control @error('cowok_ki') is-invalid @enderror" id="cowok_ki" name="cowok_ki"
                    min="0" type="number" value="{{ old('cowok_ki', 0) }}">
                @error('cowok_ki')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-sm-6">
                <label for="cewek_ki">Jumlah Remaja Perempuan</label>
                <input class="form-control @error('cewek_ki') is-invalid @enderror" id="cewek_ki" name="cewek_ki"
                    min="0" type="number" value="{{ old('cewek_ki', 0) }}">
                @error('cewek_ki')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-4">
                <label for="kel1_ki">Kelompok Umur 10-14 Tahun</label>
                <input class="form-control @error('kel1_ki') is-invalid @enderror" id="kel1_ki" name="kel1_ki"
                    min="0" type="number" value="{{ old('kel1_ki', 0) }}">
                @error('kel1_ki')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-sm-4">
                <label for="kel2_ki">Kelompok Umur 15-20 Tahun</label>
                <input class="form-control @error('kel2_ki') is-invalid @enderror" id="kel2_ki" name="kel2_ki"
                    min="0" type="number" value="{{ old('kel2_ki', 0) }}">
                @error('kel2_ki')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-sm-4">
                <label for="kel3_ki">Kelompok Umur 21-24 Tahun</label>
                <input class="form-control @error('kel3_ki') is-invalid @enderror" id="kel3_ki" name="kel3_ki"
                    min="0" type="number" value="{{ old('kel3_ki', 0) }}">
                @error('kel3_ki')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-6">
                <label for="materi_ki">Materi Penyuluhan</label>
                <select class="form-select" id="materi_ki" name="materi_ki">
                    @foreach ($materi_s as $materi)
                        <option value="{{ $materi->id }}" {{ $materi->id != old('materi_ki') ?: 'selected' }}>
                            {{ $materi->nama }}</option>
                    @endforeach
                    <option {{ old('materi_ki') != 'Lainnya' ?: 'selected' }}>Lainnya</option>
                </select>
            </div>

            <div class="form-group col-sm-6">
                <label for="materi_ki_lainnya">Materi Lainnya</label>
                <input class="form-control @error('materi_ki_lainnya') is-invalid @enderror" id="materi_ki_lainnya"
                    name="materi_ki_lainnya" type="text" value="{{ old('materi_ki_lainnya', 'Tidak Ada') }}"
                    {{ old('materi_ki_lainnya') ?: 'disabled' }}>
                @error('materi_ki_lainnya')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Tambahkan</button>
        </div>
    </form>

    <div class="mt-4">
        <div class="table-responsive" style="max-height: 400px">
            <table id="laporan-table" class="table table-lg table-bordered">
                <thead>
                    <tr>
                        <th rowspan="3">No</th>
                        <th rowspan="3">Tanggal</th>
                        <th rowspan="3">Nama Konselor Sebaya</th>
                        <th colspan="5">Jumlah Remaja Yang Mendapat Konseling</th>
                        <th rowspan="3">Materi Konseling</th>
                        <th rowspan="3">Aksi</th>
                    </tr>
                    <tr>
                        <th colspan="2">Menurut Jenis Kelamin</th>
                        <th colspan="3">Menurut Kelompok Umur</th>
                    </tr>
                    <tr>
                        <th>Laki-Laki</th>
                        <th>Perempuan</th>
                        <th>10-14</th>
                        <th>15-20</th>
                        <th>21-24</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ki_s as $ki)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $ki->tanggal }}</td>
                            <td>{{ $ki->pengurus->nama }}</td>
                            <td>{{ $ki->jumlah_cowok }}</td>
                            <td>{{ $ki->jumlah_cewek }}</td>
                            <td>{{ $ki->jumlah_rawal }}</td>
                            <td>{{ $ki->jumlah_rtengah }}</td>
                            <td>{{ $ki->jumlah_rakhir }}</td>
                            <td>{{ $ki->materi_id == 0 ? $ki->materi_lainnya : $ki->materi->nama }}
                            </td>
                            <td>
                                <button class="btn btn-danger delete_btn_ki" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-id="{{ $ki->id }}">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@push('modal')
    <div class="modal fade text-left" id="deleteModal" tabindex="-1" aria-labelledby="" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title white" id="myModalLabel1">
                        Konfirmasi Hapus <span id="item-name"></span>
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
                    Jika Ingin menghapus data ini silahkan tekan tombol Hapus
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

@push('scripts')
    <script>
        $('#materi_ki').change(function() {
            if ($(this).val() == 'Lainnya') {
                $('#materi_ki_lainnya').removeAttr('disabled')
                $('#materi_ki_lainnya').attr('placeholder', 'Tulis Materi Disini')
            } else {
                $('#materi_ki_lainnya').attr('disabled', true)
                $('#materi_ki_lainnya').val('Tidak Ada')
            }
        })

        $('.delete_btn_ki').click(function() {
            const id = $(this).data('id')
            $('#deleteModal form').attr('action', '/kegiatan/konseling/individu/' + id)
            $('#item-name').html(nama)
        })
    </script>

@endpush
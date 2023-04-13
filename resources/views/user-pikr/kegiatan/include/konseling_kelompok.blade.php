<div class="mb-5 p-4 bg-white shadow-sm">
    <form action="/kegiatan/konseling/kelompok" method="post">
        <h4 class="mb-4">Konseling Kelompok</h4>
        @csrf
        <input type="hidden" name="laporan_id" value="{{ $laporan->id }}">
        <div class="row">
            <div class="form-group col-sm-3">
                <label for="tanggal_kk">Tanggal Kegiatan</label>
                <input class="form-control @error('tanggal_kk') is-invalid @enderror" id="tanggal_kk" name="tanggal_kk"
                    type="date" value="{{ old('tanggal_kk') }}">
                @error('tanggal_kk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-sm-9">
                <label for="konseb_kk">Nama Konselor Sebaya</label>
                <select class="form-select" id="konseb_kk" name="konseb_kk">
                    @foreach ($konseb_s as $konseb)
                        <option value="{{ $konseb->id }}" {{ $konseb->id != old('konseb_kk') ?: 'selected' }}>
                            {{ $konseb->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-6">
                <label for="cowok_kk">Jumlah Remaja Laki-Laki</label>
                <input class="form-control @error('cowok_kk') is-invalid @enderror" id="cowok_kk" name="cowok_kk"
                    min="0" type="number" value="{{ old('cowok_kk', 0) }}">
                @error('cowok_kk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-sm-6">
                <label for="cewek_kk">Jumlah Remaja Perempuan</label>
                <input class="form-control @error('cewek_kk') is-invalid @enderror" id="cewek_kk" name="cewek_kk"
                    min="0" type="number" value="{{ old('cewek_kk', 0) }}">
                @error('cewek_kk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-4">
                <label for="kel1_kk">Kelompok Umur 10-14 Tahun</label>
                <input class="form-control @error('kel1_kk') is-invalid @enderror" id="kel1_kk" name="kel1_kk"
                    min="0" type="number" value="{{ old('kel1_kk', 0) }}">
                @error('kel1_kk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-sm-4">
                <label for="kel2_kk">Kelompok Umur 15-20 Tahun</label>
                <input class="form-control @error('kel2_kk') is-invalid @enderror" id="kel2_kk" name="kel2_kk"
                    min="0" type="number" value="{{ old('kel2_kk', 0) }}">
                @error('kel2_kk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-sm-4">
                <label for="kel3_kk">Kelompok Umur 21-24 Tahun</label>
                <input class="form-control @error('kel3_kk') is-invalid @enderror" id="kel3_kk" name="kel3_kk"
                    min="0" type="number" value="{{ old('kel3_kk', 0) }}">
                @error('kel3_kk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-6">
                <label for="materi_kk">Materi Penyuluhan</label>
                <select class="form-select" id="materi_kk" name="materi_kk">
                    @foreach ($materi_s as $materi)
                        <option value="{{ $materi->id }}" {{ $materi->id != old('materi_kk') ?: 'selected' }}>
                            {{ $materi->nama }}</option>
                    @endforeach
                    <option {{ old('materi_kk') != 'Lainnya' ?: 'selected' }}>Lainnya</option>
                </select>
            </div>

            <div class="form-group col-sm-6">
                <label for="materi_kk_lainnya">Materi Lainnya</label>
                <input class="form-control @error('materi_kk_lainnya') is-invalid @enderror" id="materi_kk_lainnya"
                    name="materi_kk_lainnya" type="text" value="{{ old('materi_kk_lainnya', 'Tidak Ada') }}"
                    {{ old('materi_kk_lainnya') ?: 'disabled' }}>
                @error('materi_kk_lainnya')
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
                    @foreach ($kk_s as $kk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kk->tanggal }}</td>
                            <td>{{ $kk->pengurus->nama }}</td>
                            <td>{{ $kk->jumlah_cowok }}</td>
                            <td>{{ $kk->jumlah_cewek }}</td>
                            <td>{{ $kk->jumlah_rawal }}</td>
                            <td>{{ $kk->jumlah_rtengah }}</td>
                            <td>{{ $kk->jumlah_rakhir }}</td>
                            <td>{{ $kk->materi_id == 0 ? $kk->materi_lainnya : $kk->materi->nama }}
                            </td>
                            <td>
                                <button class="btn btn-danger delete_btn_kk" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-id="{{ $kk->id }}">
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
        $('#materi_kk').change(function() {
            if ($(this).val() == 'Lainnya') {
                $('#materi_kk_lainnya').removeAttr('disabled')
                $('#materi_kk_lainnya').attr('placeholder', 'Tulis Materi Disini')
            } else {
                $('#materi_kk_lainnya').attr('disabled', true)
                $('#materi_kk_lainnya').val('Tidak Ada')
            }
        })

        $('.delete_btn_kk').click(function() {
            const id = $(this).data('id')
            $('#deleteModal form').attr('action', '/kegiatan/konseling/individu/' + id)
            $('#item-name').html(nama)
        })
    </script>

@endpush
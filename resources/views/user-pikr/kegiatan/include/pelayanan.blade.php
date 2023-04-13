<div class="mb-5 p-4 bg-white shadow-sm">
    <form action="/kegiatan/pelayanan" method="post">
        <h4 class="mb-4">Pelayanan Informasi</h4>
        @csrf
        <input type="hidden" name="laporan_id" value="{{ $laporan->id }}">
        <div class="row">
            <div class="form-group">
                <label for="nama_pelayanan">Nama Kegiatan</label>
                <input class="form-control @error('nama_pelayanan') is-invalid @enderror" id="nama_pelayanan"
                    name="nama_pelayanan" type="text" value="{{ old('nama_pelayanan') }}"
                    placeholder="Masukkan Nama Kegiatan">
                @error('nama_pelayanan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-6">
                <label for="materi_pelayanan">Materi Penyuluhan</label>
                <select class="form-select" id="materi_pelayanan" name="materi_pelayanan">
                    @foreach ($materi_s as $materi)
                        <option value="{{ $materi->id }}" {{ $materi->id != old('materi_pelayanan') ?: 'selected' }}>
                            {{ $materi->nama }}</option>
                    @endforeach
                    <option>Lainnya</option>
                </select>
            </div>

            <div class="form-group col-sm-6">
                <label for="materi_pelayanan_lainnya">Materi Lainnya</label>
                <input class="form-control @error('materi_pelayanan_lainnya') is-invalid @enderror"
                    id="materi_pelayanan_lainnya" name="materi_pelayanan_lainnya" type="text" value="Tidak Ada"
                    disabled>
                @error('materi_pelayanan_lainnya')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-6">
                <label for="narsum_pelayanan">Penyaji Materi</label>
                <select class="form-select" id="narsum_pelayanan" name="narsum_pelayanan">
                    @foreach ($narsum as $n)
                        <option value="{{ $n }}">{{ $n }}</option>
                    @endforeach
                    <option>Lainnya</option>
                </select>
            </div>

            <div class="form-group col-sm-6">
                <label for="nama_narsum_pelayanan">Nama Narasumber</label>
                <div id="select_narsum_pelayanan">
                    <select class="form-select" id="nama_narsum_pelayanan" name="nama_narsum_pelayanan">
                        @foreach ($pembina_s as $pembina)
                            <option value="{{ $pembina }}"
                                {{ $pembina != old('nama_narsum_pelayanan') ?: 'selected' }}>{{ $pembina }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="form-group col-sm-4 col-md-3">
                <label for="tanggal_pelayanan">Tanggal Kegiatan</label>
                <input class="form-control @error('tanggal_pelayanan') is-invalid @enderror" id="tanggal_pelayanan"
                    name="tanggal_pelayanan" type="date" placeholder="Masukkan Judul Artikel"
                    value="{{ old('tanggal_pelayanan') }}">
                @error('tanggal_pelayanan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-sm-8 col-md-9">
                <label for="jumlah_remaja">Jumlah Remaja Yang Mengikuti Kegiatan</label>
                <input min="1" class="form-control @error('jumlah_remaja') is-invalid @enderror"
                    id="jumlah_remaja" name="jumlah_remaja" type="number" value="{{ old('jumlah_remaja') }}"
                    placeholder="Masukkan Jumlah Remaja">
                @error('jumlah_remaja')
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
                        <th>No</th>
                        <th>Tanggal Kegiatan</th>
                        <th>Nama Kegiatan</th>
                        <th>Materi Penyuluhan</th>
                        <th>Narasumber</th>
                        <th>Nama Narasumber</th>
                        <th>Jumlah Remaja</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelayanan_s as $pelayanan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pelayanan->tanggal }}</td>
                            <td>{{ $pelayanan->nama }}</td>
                            <td>{{ $pelayanan->materi_id == 0 ? $pelayanan->materi_lainnya : $pelayanan->materi->nama }}
                            </td>
                            <td>{{ $pelayanan->jabatan_narsum }}</td>
                            <td>{{ $pelayanan->narsum }}</td>
                            <td>{{ $pelayanan->jumlah_peserta }}</td>
                            <td>
                                <button class="btn btn-danger delete_btn_pelayanan" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                    data-nama="{{ $pelayanan->nama }}" data-id="{{ $pelayanan->id }}">
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
        $('#materi_pelayanan').change(function() {
            if ($(this).val() == 'Lainnya') {
                $('#materi_pelayanan_lainnya').removeAttr('disabled')
                $('#materi_pelayanan_lainnya').attr('placeholder', 'Tulis Materi Disini')
            } else {
                $('#materi_pelayanan_lainnya').attr('disabled', true)
                $('#materi_pelayanan_lainnya').val('Tidak Ada')
            }
        })

        $('#narsum_pelayanan').change(function() {
            if ($(this).val() == 'Lainnya') {
                $('#select_narsum_pelayanan *').remove()
                const input = $('<input>').attr({
                    'type': 'text',
                    'name': 'nama_narsum_pelayanan',
                    'id': 'nama_narsum_pelayanan',
                    'class': 'form-control',
                    'placeholder': 'Masukkan Nama Narasumber',
                })
                $('#select_narsum_pelayanan').append(input)


            } else if ($(this).val() == 'Pendidik Sebaya') {
                makeSelectPelayanan('/utility/getPendidikSebaya')

            } else if ($(this).val() == 'Konselor Sebaya') {
                makeSelectPelayanan('/utility/getKonselorSebaya')

            } else {
                makeSelectPelayanan('/utility/getPLKB')
            }
        })

        $('.delete_btn_pelayanan').click(function() {
            const id = $(this).data('id')
            const nama = $(this).data('nama')
            $('#deleteModal form').attr('action', '/kegiatan/pelayanan/' + id)
            $('#item-name').html(nama)
        })

        function makeSelectPelayanan(link) {
            const select = $('<select>').addClass('form-select').attr({
                'name': 'nama_narsum_pelayanan',
                'id': 'nama_narsum_pelayanan'
            })

            fetch(link).then(response => response.json()).then(function(data) {
                for (var i = 0; i < data.length; i++) {
                    var option = $('<option>').attr('value', data[i].nama).text(data[i].nama);
                    select.append(option);
                }
            })

            $('#select_narsum_pelayanan *').remove()
            $('#select_narsum_pelayanan').append(select)

        }
    </script>
@endpush
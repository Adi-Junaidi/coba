<div class="mb-5 p-4 bg-white shadow-sm">
    <h2 class="mb-4">Kegiatan Pelayanan Informasi</h2>
    <div class="table-responsive" style="max-height: 400px">
        <table id="laporan-table" class="table table-lg table-bordered ">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No</th>
                    <th>Tanggal Kegiatan</th>
                    <th>Nama Kegiatan</th>
                    <th>Materi Penyuluhan</th>
                    <th>Narasumber</th>
                    <th>Nama Narasumber</th>
                    <th>Jumlah Remaja</th>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

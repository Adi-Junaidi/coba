<div class="mb-5 p-4 bg-white shadow-sm">
    <h2 class="mb-4">Kegiatan Konseling Kelompok</h2>
    <div class="table-responsive" style="max-height: 400px">
        <table id="laporan-table" class="table table-lg table-bordered ">
            <thead class="bg-primary text-white">
                <tr>
                    <th rowspan="3">No</th>
                    <th rowspan="3">Tanggal</th>
                    <th rowspan="3">Nama Konselor Sebaya</th>
                    <th colspan="5">Jumlah Remaja Yang Mendapat Konseling</th>
                    <th rowspan="3">Materi Konseling</th>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

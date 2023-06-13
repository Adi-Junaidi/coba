  <div class="mb-5 bg-white p-4 shadow-sm">
    <h2 class="mb-4">Kegiatan Konseling Kelompok</h2>
    <div class="table-responsive" style="max-height: 400px">
      <table class="table-lg table-bordered table" id="laporan-table">
        <thead class="bg-primary text-white">
          <tr>
            <th rowspan="3">No</th>
            <th rowspan="3">Tanggal</th>
            <th rowspan="3">Nama Konselor Sebaya</th>
            <th colspan="5">Jumlah Remaja Yang Mendapat Konseling</th>
            <th rowspan="3">Materi Konseling</th>
            <th rowspan="3">Dokumentasi</th>
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
          @forelse ($kk_s as $kk)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $kk->tanggal }}</td>
              <td>{{ $kk->pengurus->nama }}</td>
              <td>{{ $kk->jumlah_cowok }}</td>
              <td>{{ $kk->jumlah_cewek }}</td>
              <td>{{ $kk->jumlah_rawal }}</td>
              <td>{{ $kk->jumlah_rtengah }}</td>
              <td>{{ $kk->jumlah_rakhir }}</td>
              <td>{{ $kk->materi_id == 0 ? $kk->materi_lainnya : $kk->materi->nama }}</td>
              <td><img data-bs-toggle="modal" data-bs-target="#imageModal" data-title="Pelaporan Konseling Kelompok" src="{{ asset("storage/{$kk->dokumentasi}") }}" style="width: 150px; height: 150px; object-fit: cover;"></td>
            </tr>
          @empty
            <tr>
              <td class="text-muted p-2 text-center" colspan="10">Tidak ada data konseling kelompok</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

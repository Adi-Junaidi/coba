<div class="mb-5 bg-white p-4 shadow-sm">
  <h2 class="mb-4">Kegiatan Pelayanan Informasi</h2>
  <div class="table-responsive" style="max-height: 400px">
    <table class="table-lg table-bordered table" id="laporan-table">
      <thead class="bg-primary text-white">
        <tr>
          <th>No</th>
          <th>Tanggal Kegiatan</th>
          <th>Nama Kegiatan</th>
          <th>Materi Penyuluhan</th>
          <th>Narasumber</th>
          <th>Nama Narasumber</th>
          <th>Jumlah Remaja</th>
          <th>Dokumentasi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($pelayanan_s as $pelayanan)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $pelayanan->tanggal }}</td>
            <td>{{ $pelayanan->nama }}</td>
            <td>{{ $pelayanan->materi_id == 0 ? $pelayanan->materi_lainnya : $pelayanan->materi->nama }}</td>
            <td>{{ $pelayanan->jabatan_narsum }}</td>
            <td>{{ $pelayanan->narsum }}</td>
            <td>{{ $pelayanan->jumlah_peserta }}</td>
            <td><img data-bs-toggle="modal" data-bs-target="#imageModal" data-title="{{ $pelayanan->nama }}" src="{{ asset("storage/{$pelayanan->dokumentasi}") }}" style="width: 150px; height: 150px; object-fit: cover;"></td>
          </tr>
        @empty
          <tr>
            <td class="text-muted p-2 text-center" colspan="8">Tidak ada data pelayanan informasi</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

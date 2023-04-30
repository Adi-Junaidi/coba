@if ($pengurus->isEmpty())
    <p>Tidak Ada Pengurus</p>
@else
    <div class="table-responsive">
        <table class="table table-lg">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>Jabatan</th>
                    <th>No. Handphone</th>
                    <th>Ikut Pelatihan</th>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

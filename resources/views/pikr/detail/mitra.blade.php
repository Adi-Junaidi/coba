@if ($mitra_s->isEmpty())
    <p>Tidak Ada Mitra</p>
@else
    <div class="table-responsive" style="max-height: 400px">
        <table class="table table-lg">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Mitra</th>
                    <th>MOU/Perjanjian KerjaSama</th>
                    <th>Bentuk Kerjasama</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mitra_s as $mitra)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mitra->nama }}</td>
                        <td>{{ $mitra->mou ? 'Ada' : 'Tidak Ada' }}</td>
                        <td>{{ $mitra->bentuk_kerjasama }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endif

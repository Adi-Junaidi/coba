@foreach ($pembina as $p)
    <tr>
        <td>{{ $p->id }}</td>
        <td>
            <span id="noreg">{{ $p->no_register }}</span>
        </td>
        <td>
            <span id="nama">{{ $p->nama }}</span>
        </td>
        <td>
            <span id="jabatan">{{ $p->jabatan->nama }}</span>
        </td>
        <td>
            <!-- Button trigger for form modal -->
            <button type="button" id="detail" class="btn btn-info btn-sm" data-bs-toggle="modal"  data-bs-target="#detailModal" data-noreg="{{ $p->no_register }}" data-nourut="{{ $p->no_urut }}" data-nama="{{ $p->nama }}" data-provinsi="{{ $p->desa->kecamatan->kabkota->provinsi->kode . " | " . $p->desa->kecamatan->kabkota->provinsi->nama }}" data-kabkota="{{ $p->desa->kecamatan->kabkota->kode . " | " . $p->desa->kecamatan->kabkota->nama }}" data-kecamatan="{{ $p->desa->kecamatan->kode . " | " . $p->desa->kecamatan->nama }}" data-desakel="{{ $p->desa->kode . " | " . $p->desa->nama }}" data-jabatan="{{ $p->jabatan->nama }}">
                <span data-bs-toggle="tooltip"
                data-bs-placement="bottom" title="Detail">
                <span class="fa-fw select-all fas"></span>
                </span>
            </button>

            <button type="button" id="edit" class="btn btn-warning btn-sm" data-bs-toggle="tooltip"
            data-bs-placement="bottom" title="Edit">
                <span class="fa-fw select-all fas"></span>
            </button>

            <button type="button" id="delete" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
            data-bs-placement="bottom" title="Delete">
                <span class="fa-fw select-all fas"></span>
            </button>
            
        </td>
    </tr>
@endforeach
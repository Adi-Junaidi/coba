@foreach ($pembina as $p)
  <tr>
    <td>{{ $loop->iteration }}</td>
    <td><span id="noreg">{{ $p->no_register }}</span></td>
    <td><span id="nama">{{ $p->nama }}</span></td>
    <td><span id="jabatan">{{ $p->jabatan->nama }}</span></td>
    <td>
      <!-- Button trigger for form modal -->
      <button class="btn btn-info btn-sm" id="detail" data-bs-toggle="modal" data-bs-target="#detailModal" data-noreg="{{ $p->no_register }}" data-nourut="{{ $p->no_urut }}" data-nama="{{ $p->nama }}" data-provinsi="{{ $p->desa->kecamatan->kabkota->provinsi->kode . ' | ' . $p->desa->kecamatan->kabkota->provinsi->nama }}" data-kabkota="{{ $p->desa->kecamatan->kabkota->kode . ' | ' . $p->desa->kecamatan->kabkota->nama }}" data-kecamatan="{{ $p->desa->kecamatan->kode . ' | ' . $p->desa->kecamatan->nama }}" data-desakel="{{ $p->desa->kode . ' | ' . $p->desa->nama }}" data-jabatan="{{ $p->jabatan->nama }}" type="button">
        <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail">
          <span class="fa-fw select-all fas"></span>
        </span>
      </button>

      <button class="btn btn-warning btn-sm" id="edit" data-bs-toggle="tooltip" data-bs-placement="bottom" type="button" title="Edit">
        <span class="fa-fw select-all fas"></span>
      </button>

      <button class="btn btn-danger btn-sm" id="delete" data-bs-toggle="tooltip" data-bs-placement="bottom" type="button" title="Delete">
        <span class="fa-fw select-all fas"></span>
      </button>
    </td>
  </tr>
@endforeach

@foreach ($pembina as $p)
  <tr>
    <td>{{ $loop->iteration }}</td>
    <td><span id="noreg">{{ $p->no_register }}</span></td>
    <td><span id="nama">{{ $p->nama }}</span></td>
    <td>
      <button class="btn btn-info btn-sm btnDetail" data-bs-toggle="modal" data-bs-target="#modalDetail" data-jabatan="{{ $p->jabatan->nama }}" data-noreg="{{ $p->no_register }}" data-nourut="{{ $p->no_urut }}" data-nama="{{ $p->nama }}" data-provinsi="{{ $p->desa->kecamatan->kabkota->provinsi->kode }} | {{ $p->desa->kecamatan->kabkota->provinsi->nama }}" data-kabkota="{{ $p->desa->kecamatan->kabkota->kode }} | {{ $p->desa->kecamatan->kabkota->nama }}" data-kecamatan="{{ $p->desa->kecamatan->kode }} | {{ $p->desa->kecamatan->nama }}" data-desakel="{{ $p->desa->kode }} | {{ $p->desa->nama }}" data-jabatan="{{ $p->jabatan->nama }}" type="button">
        <span class="fa-fw fas select-all" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail"></span>
      </button>

      <button class="btn btn-warning btn-sm btnUpdate" data-bs-toggle="modal" data-bs-target="#modalUpdate" data-id="{{ $p->id }}" data-jabatan="{{ $p->jabatan->nama }}" data-noreg="{{ $p->no_register }}" data-nourut="{{ $p->no_urut }}" data-nama="{{ $p->nama }}" data-provinsi="{{ $p->desa->kecamatan->kabkota->provinsi->kode }} | {{ $p->desa->kecamatan->kabkota->provinsi->nama }}" data-kabkota="{{ $p->desa->kecamatan->kabkota->kode }} | {{ $p->desa->kecamatan->kabkota->nama }}" data-kecamatan="{{ $p->desa->kecamatan->kode }} | {{ $p->desa->kecamatan->nama }}" data-desakel="{{ $p->desa->kode }} | {{ $p->desa->nama }}" data-jabatan="{{ $p->jabatan->nama }}" type="button">
        <span class="fa-fw fas select-all" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></span>
      </button>

      <button class="btn btn-danger btn-sm btnDelete" data-bs-toggle="modal" data-bs-target="#modalDelete" data-id="{{ $p->id }}" data-nama="{{ $p->nama }}" type="button">
        <span class="fa-fw fas select-all" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"></span>
      </button>
    </td>
  </tr>
@endforeach

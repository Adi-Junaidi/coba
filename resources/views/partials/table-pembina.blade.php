@foreach ($pembina as $p)
  <tr>
    @if ($p->desa == null)
      <td>@dd($p)</td>
    @endif
    <td>{{ $loop->iteration }}</td>
    <td><span id="noreg">{{ $p->no_register }}</span></td>
    <td><span id="nama">{{ $p->nama }}</span></td>
    <td>
      <button class="btn btn-info btn-sm btnDetail" data-bs-toggle="modal" data-bs-target="#modalDetail" data-jabatan="{{ $p->jabatan?->nama ?? $p->jabatan_lainnya }}" data-noreg="{{ $p->no_register }}" data-nourut="{{ $p->no_urut }}" data-nama="{{ $p->nama }}" data-provinsi="{{ $p->provinsi->kode }} | {{ $p->provinsi->nama }}" data-kabkota="{{ $p->kabkota->kode }} | {{ $p->kabkota->nama }}" data-kecamatan="{{ $p->kecamatan->kode }} | {{ $p->kecamatan->nama }}" data-desakel="{{ $p->desa->kode }} | {{ $p->desa->nama }}" type="button">
        <span class="fa-fw fas select-all" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail"></span>
      </button>

      <button class="btn btn-warning btn-sm btnUpdate" data-bs-toggle="modal" data-bs-target="#modalUpdate" data-id="{{ $p->id }}" data-jabatan="{{ $p->jabatan?->nama ?? $p->jabatan_lainnya }}" data-noreg="{{ $p->no_register }}" data-nourut="{{ $p->no_urut }}" data-nama="{{ $p->nama }}" data-provinsi="{{ $p->provinsi->kode }} | {{ $p->provinsi->nama }}" data-kabkota="{{ $p->kabkota->kode }} | {{ $p->kabkota->nama }}" data-kecamatan="{{ $p->kecamatan->kode }} | {{ $p->kecamatan->nama }}" data-desakel="{{ $p->desa->kode }} | {{ $p->desa->nama }}" type="button">
        <span class="fa-fw fas select-all" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></span>
      </button>

      <button class="btn btn-danger btn-sm btnDelete" data-bs-toggle="modal" data-bs-target="#modalDelete" data-id="{{ $p->id }}" data-nama="{{ $p->nama }}" type="button">
        <span class="fa-fw fas select-all" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"></span>
      </button>
    </td>
  </tr>
@endforeach

@foreach ($pembina as $p)
  <tr>
    <td>{{ $loop->iteration }}</td>
    <td><span id="noreg">{{ $p->no_register }}</span></td>
    <td><span id="nama">{{ $p->nama }}</span></td>
    <td><span id="jabatan">{{ $p->jabatan->nama }}</span></td>
    <td>
      <!-- Button trigger for form modal -->
      <button class="btn btn-info btn-sm btnDetail" data-bs-toggle="modal" data-bs-target="#modalDetail" data-jabatan_id="{{ $p->jabatan->id }}" data-noreg="{{ $p->no_register }}" data-nourut="{{ $p->no_urut }}" data-nama="{{ $p->nama }}" data-provinsi="{{ $p->desa->kecamatan->kabkota->provinsi->kode . ' | ' . $p->desa->kecamatan->kabkota->provinsi->nama }}" data-kabkota="{{ $p->desa->kecamatan->kabkota->kode . ' | ' . $p->desa->kecamatan->kabkota->nama }}" data-kecamatan="{{ $p->desa->kecamatan->kode . ' | ' . $p->desa->kecamatan->nama }}" data-desakel="{{ $p->desa->kode . ' | ' . $p->desa->nama }}" data-jabatan="{{ $p->jabatan->nama }}" type="button">
        <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail">
          <span class="fa-fw fas select-all"></span>
        </span>
      </button>

      <button class="btn btn-warning btn-sm btnUpdate" data-bs-toggle="modal" data-bs-placement="bottom" data-id="{{ $p->id }}" data-bs-target="#modalUpdate" data-jabatan_id="{{ $p->jabatan->id }}" data-noreg="{{ $p->no_register }}" data-nourut="{{ $p->no_urut }}" data-nama="{{ $p->nama }}" data-provinsi="{{ $p->desa->kecamatan->kabkota->provinsi->kode . ' | ' . $p->desa->kecamatan->kabkota->provinsi->nama }}" data-kabkota="{{ $p->desa->kecamatan->kabkota->kode . ' | ' . $p->desa->kecamatan->kabkota->nama }}" data-kecamatan="{{ $p->desa->kecamatan->kode . ' | ' . $p->desa->kecamatan->nama }}" data-desakel="{{ $p->desa->kode . ' | ' . $p->desa->nama }}" data-jabatan="{{ $p->jabatan->nama }}" type="button">
        <span class="fa-fw fas select-all" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></span>
      </button>

      <form class="d-inline" action="/pembina/{{ $p->id }}" method="post">
        @csrf
        @method('delete')
        <button class="btn btn-danger btn-sm" id="delete" data-bs-toggle="tooltip" data-bs-placement="bottom" type="submit" title="Delete">
          <span class="fa-fw fas select-all"></span>
        </button>
      </form>
    </td>
  </tr>
@endforeach

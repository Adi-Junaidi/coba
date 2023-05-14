@extends('layouts.main', [
    'title' => 'Kriteria SPK',
    'heading' => 'Kriteria SPK',
    'breadcrumb' => ['SPK', 'Kriteria SPK'],
])

@section('container')
    <div class="row">
        <div class="col-md-6 col-xl-4 card shadow">
            <form action="/spk/criteria" method="post">
                @csrf
                <div class="card-header">
                    <h5>Tambah Kriteria</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama Kriteria</label>
                        <input type="text" name="nama" id="nama" placeholder="Masukkan nama kriteria"
                            class="form-control @error('nama') is-invalid @enderror" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status Kriteria</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="cost">Cost</option>
                            <option value="benefit">Benefit</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bobot">Bobot Kriteria</label>
                        <input type="number" name="bobot" id="bobot" placeholder="Masukkan bobot kriteria"
                            class="form-control @error('bobot') is-invalid @enderror" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Tambah</button>
                </div>
            </form>
        </div>
        <div class="col-md-6 col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h4>Kriteria SPK</h4>
                    <div class="table-responsive" style="max-height: 400px">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Bobot</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($criterias as $criteria)
                                    <tr>
                                        <td>{{ $criteria->nama }}</td>
                                        <td>{{ $criteria->status }}</td>
                                        <td>{{ $criteria->bobot }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-danger btn-delete" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal" data-id="{{ $criteria->id }}">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modals')
    <div class="modal fade text-left" id="deleteModal" tabindex="-1" aria-labelledby="" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title white"> Hapus Kriteria </h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Jika kriteria tersebut dihapus maka akan berpengaruh terhadap penilaian yang sudah pernah dilakukan!</p>
                    <b class="mt-2">Harap berhati-hati dalam menghapus kriteria</b>
                </div>
                <form method="post">
                    @method('delete')
                    @csrf

                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-danger ms-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Hapus</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).on('click', '.btn-delete', function() {
            const id = $(this).data('id')
            $('#deleteModal form').attr('action', '/spk/criteria/' + id)
        });
    </script>
@endpush

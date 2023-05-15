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
                @method('patch')
                <div class="card-header">
                    <h5>Ubah Kriteria</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Kriteria</label>
                        <select id="nama" class="form-select" required>
                            <option hidden>Pilih Kriteria</option>
                            @foreach ($criterias as $criteria)
                                <option value="{{ $criteria->id }}">{{ $criteria->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="form-bobot" class="form-group">
                        <label for="bobot">Bobot Kriteria</label>
                        <input type="number" name="bobot" id="bobot" placeholder="Masukkan bobot kriteria"
                            class="form-control @error('bobot') is-invalid @enderror" required disabled>
                    </div> 
                </div>
                <div class="card-footer">
                    <button class="btn btn-warning" type="submit" disabled>Ubah</button>
                </div>
            </form>
        </div>
        <div class="col-md-6 col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h4>Kriteria SPK</h4>
                    <div class="table-responsive" style="max-height: 300px">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($criterias as $criteria)
                                    <tr>
                                        <td>{{ $criteria->nama }}</td>
                                        <td>{{ $criteria->status }}</td>
                                        <td>{{ $criteria->bobot }}</td>
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

@push('script')
    <script>
        $('#nama').change(function() {
            const id = $(this).val()
            $('#bobot').removeAttr('disabled')
            $('.btn-warning').removeAttr('disabled')
            $('form').attr('action', '/spk/criteria/' + id)
        });
    </script>
@endpush

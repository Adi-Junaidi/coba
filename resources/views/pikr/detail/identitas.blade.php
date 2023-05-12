<form id="form-identitas" method="post" action="/pikr/{{ $pikr_info->id }}">
    @csrf
    @method('patch')
    <div class="form-group">
        <label for="nama">Nama PIK-R</label>
        <input class="form-control" name="nama" type="text" value="{{ $pikr_info->nama }}" disabled>
    </div>

    <div class="form-group">
        <label for="basis">Basis PIK-R</label>
        <select name="basis" id="basis" class="form-select" disabled>
            <optgroup label="Jalur Pendidikan">
                <option value="SMP/Sederajat" {{ $pikr_info->basis == 'SMP/Sederajat' ? 'selected' : '' }}>Jalur
                    Pendidikan - SMP/Sederajat</option>
                <option value="SMA/Sederajat" {{ $pikr_info->basis == 'SMA/Sederajat' ? 'selected' : '' }}>Jalur
                    Pendidikan - SMA/Sederajat</option>
                <option value="Perguruan Tinggi" {{ $pikr_info->basis == 'Perguruan Tinggi' ? 'selected' : '' }}>Jalur
                    Pendidikan - Perguruan Tinggi</option>
            </optgroup>
            <optgroup label="Jalur Masyarakat">
                <option value="Organisasi Keagamaan"
                    {{ $pikr_info->basis == 'Organisasi Keagamaan' ? 'selected' : '' }}>Jalur Masyarakat - Organisasi
                    Keagamaan</option>
                <option value="LSM/Organisasi Kepemudaan/Organisasi Kemasyarakatan"
                    {{ $pikr_info->basis == 'LSM/Organisasi Kepemudaan/Organisasi Kemasyarakatan' ? 'selected' : '' }}>
                    Jalur Masyarakat - LSM/Organisasi Kepemudaan/Organisasi Kemasyarakatan</option>
            </optgroup>
        </select>
    </div>

    <div class="form-group">
        <label for="sosmed">Sosial Media PIK-R</label>
        <input class="form-control" name="sosmed" type="text" value="{{ $pikr_info->akun_medsos }}" disabled>
    </div>
    <div class="row">
        <div class="form-group col-sm-4">
            <label for="alamat">Alamat</label>
            <input class="form-control" name="alamat" type="text" value="{{ $pikr_info->alamat }}" disabled>
        </div>

        <div class="form-group col-sm-4">
            <label for="provinsi">Provinsi</label>
            <input class="form-control" name="provinsi" type="text"
                value="{{ $pikr_info->desa->kecamatan->kabkota->provinsi->nama }}" disabled>

        </div>

        <div class="form-group col-sm-4">
            <label for="kabkota">Kabupaten/Kota</label>
            <input class="form-control" name="kabkota" type="text"
                value="{{ $pikr_info->desa->kecamatan->kabkota->nama }}" disabled>
        </div>

    </div>
    <div class="row">

        <div class="form-group col-sm-6">
            <label for="kecamatan">Kecamatan</label>
            <input class="form-control" name="kecamatan" type="text" value="{{ $pikr_info->desa->kecamatan->nama }}"
                disabled>
        </div>

        <div class="form-group col-sm-6">
            <label for="desa">Desa/Kelurahan</label>
            <input class="form-control" name="desa" type="text" value="{{ $pikr_info->desa->nama }}" disabled>
        </div>
    </div>
    </div>

    <div class="row mt-2">
        <div class="d-inline-block">
            <button type="button" class="btn btn-secondary btn-cancel" hidden>Batalkan</button>
            <button type="button" class="btn btn-primary btn-edit">Ubah</button>
            <button type="submit" class="btn btn-success btn-submit" hidden>Submit</button>
        </div>
    </div>

    @push('scripts')
        <script>
            $(function() {
                $('#identitas .btn-edit').click(function() {
                    $('#identitas .btn-cancel').removeAttr('hidden')
                    $('#identitas .btn-submit').removeAttr('hidden')
                    $('input[name=sosmed]').removeAttr('disabled')
                    $(this).attr('hidden', true)
                    // alert('oke')
                })

                $('#identitas .btn-cancel').click(function() {
                    $('input[name=sosmed]').attr('disabled', true)
                    $(this).attr('hidden', true)
                    $('#identitas .btn-submit').attr('hidden', true)
                    $('#identitas .btn-edit').removeAttr('hidden')
                })
            })
        </script>
    @endpush

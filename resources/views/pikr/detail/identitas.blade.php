<form id="form-identitas" method="post" action="/pikr/{{ $pikr_info->id }}">
    @csrf
    @method('patch')
    <div class="form-group">
        <label for="nama">Nama PIK-R</label>
        <input class="form-control" name="nama" type="text" value="{{ $pikr_info->nama }}" disabled>
    </div>

    <div class="form-group">
        <label for="basis">Basis PIK-R</label>
        <input class="form-control" name="basis" type="text" value="{{ $pikr_info->basis }}" disabled>
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
</form>
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

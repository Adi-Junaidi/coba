<div class="form-group">
    <label for="nama">Nama PIK-R</label>
    <input class="form-control" id="nama" type="text" value="{{ $pikr_info->nama }}" disabled>
</div>

<div class="form-group">
    <label for="basis">Basis PIK-R</label>
    <input class="form-control" id="basis" type="text" value="{{ $pikr_info->basis }}" disabled>
</div>

<div class="form-group">
    <label for="sosmed">Sosial Media PIK-R</label>
    <input class="form-control" id="sosmed" type="text" value="{{ $pikr_info->akun_medsos }}"
     disabled>
</div>
<div class="row">
    <div class="form-group col-sm-4">
        <label for="alamat">Alamat</label>
        <input class="form-control" id="alamat" type="text"
            value="{{ $pikr_info->alamat }}" disabled>
    </div>

    <div class="form-group col-sm-4">
        <label for="provinsi">Provinsi</label>
        <input class="form-control" id="provinsi" type="text"
            value="{{ $pikr_info->desa->kecamatan->kabkota->provinsi->nama }}" disabled>
    </div>

    <div class="form-group col-sm-4">
        <label for="kabkota">Kabupaten/Kota</label>
        <input class="form-control" id="kabkota" type="text"
            value="{{ $pikr_info->desa->kecamatan->kabkota->nama }}" disabled>
    </div>

</div>
<div class="row">

    <div class="form-group col-sm-6">
        <label for="kecamatan">Kecamatan</label>
        <input class="form-control" id="kecamatan" type="text"
            value="{{ $pikr_info->desa->kecamatan->nama }}" disabled>
    </div>

    <div class="form-group col-sm-6">
        <label for="desa">Desa/Kelurahan</label>
        <input class="form-control" id="desa" type="text"
            value="{{ $pikr_info->desa->nama }}" disabled>
    </div>
</div>
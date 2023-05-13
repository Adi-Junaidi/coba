<div class="card">
  <div class="card-body">
    <form>
      <div class="row mb-4">
        <div class="col-2"><label for="kb">Kab/Kota</label></div>
        <div class="col-4">
          <select class="form-select" id="kb" name="kb">
            <option value="">Filter Kab/Kota</option>
            @foreach ($kabkotas as $item)
              <option value="{{ $item->id }}" {{ $item->id == $filters['kabkota_id'] ? 'selected' : '' }}>{{ $item->kode }} | {{ $item->nama }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-2"><label for="kc">Kecamatan</label></div>
        <div class="col-4">
          <select class="form-select" id="kc" name="kc" {{ !$filters['kabkota_id'] ? 'disabled' : '' }}>
            <option value="">Filter Kecamatan</option>
            @if ($filters['kabkota_id'])
              @foreach ($kabkota->kecamatan as $item)
                <option value="{{ $item->id }}" {{ $item->id == $filters['kecamatan_id'] ? 'selected' : '' }}>{{ $item->kode }} | {{ $item->nama }}</option>
              @endforeach
            @endif
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-2"><label for="t">Periode</label></div>
        <div class="col-4">
          <input class="form-control" id="t" name="t" type="number" value="{{ $filters['tahun'] }}" min="2000" max="9999" placeholder="Tahun">
        </div>
        <div class="col-6">
          <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Cari</button>
          <button class="btn btn-danger" name="export" type="submit" value="pdf"><i class="far fa-file-pdf"></i> Cetak</button>
          <button class="btn btn-success" name="export" type="submit" value="xlsx"><i class="far fa-file-excel"></i> Cetak</button>
        </div>
      </div>
    </form>
  </div>
</div>

@push('script')
  <!-- It needs jQuery -->
  <script src="http://localhost:8000/dist/assets/extensions/jquery/jquery.min.js"></script>

  <script>
    $("#kb").on("change", function() {
      const kabkotaID = $(this).val();
      const selectKecamatan = $("#kc");

      selectKecamatan.empty();
      selectKecamatan.append('<option value="">Filter Kecamatan</option>');

      if (kabkotaID) {
        $.ajax({
          type: "get",
          url: `/api/kabkota/${kabkotaID}/kecamatans/`,
          dataType: "json",
          success: function(data) {
            if (data) {
              $.each(data, (key, kecamatan) => selectKecamatan.append(`'<option value="${kecamatan.id}">${kecamatan.kode} | ${kecamatan.nama}</option>`));
              selectKecamatan.prop("disabled", false);
            } else {
              selectKecamatan.prop("disabled", true);
            }
          },
        });
      } else {
        selectKecamatan.prop("disabled", true);
      }
    });
  </script>
@endpush

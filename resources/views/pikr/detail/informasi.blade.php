<form id="informasi" action="/pikr/{{ $pikr_info->id }}" method="post">
    @csrf
    @method('patch')
    <div id="form-informasi">
        @if ($pikr_info->sk)
            <div class="form-group">
                <label>Nomor SK</label>
                <input class="form-control" disabled value="{{ $pikr_info->sk->no_sk }}">
            </div>
            <div class="form-group">
                <label>Tanggal SK</label>
                <input class="form-control"disabled value="{{ $pikr_info->sk->tanggal_sk }}">
            </div>

            <div class="form-group">
                <label>Dikeluarkan Oleh</label>
                <input class="form-control" disabled value="{{ $pikr_info->sk->dikeluarkan_oleh }}">
            </div>
        @endif
        <div class="row">
            <div class="form-group col-md-4">
                <label>Sumber Dana</label>
                <input class="form-control" name="sumber_dana" disabled value="{{ $pikr_info->sumber_dana }}">
            </div>
            
            <div class="form-group col-md-4">
                <label>Keterpaduan Kelompok</label>
                <select name="keterpaduan_kelompok" id="keterpaduan_kelompok" class="form-select" disabled>
                    <option value="1" {{ $pikr_info->keterpaduan_kelompok == 1 ? 'selected' : '' }}>Ada</option>
                    <option value="0" {{ $pikr_info->keterpaduan_kelompok == 0 ? 'selected' : '' }}>Tidak Ada</option>
                </select>
            </div>
            
            <div class="form-group col-md-4">
                <label>Proyek Prioritas Nasional</label>
                <select name="pro_pn" id="pro_pn" class="form-select" disabled>
                    <option value="1" {{ $pikr_info->pro_pn == 1 ? 'selected' : '' }}>Ada</option>
                    <option value="0" {{ $pikr_info->pro_pn == 0 ? 'selected' : '' }}>Tidak Ada</option>
                </select>
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
            $('#informasi .btn-edit').click(function() {
                $('#informasi .btn-cancel').removeAttr('hidden')
                $('#informasi .btn-submit').removeAttr('hidden')
                $('#form-informasi :disabled').removeAttr('disabled')
                $(this).attr('hidden', true)
            })

            $('#informasi .btn-cancel').click(function() {
                $('#form-informasi :enabled').attr('disabled', true)
                $(this).attr('hidden', true)
                $('#informasi .btn-submit').attr('hidden', true)
                $('#informasi .btn-edit').removeAttr('hidden')
            })
        })
    </script>
@endpush

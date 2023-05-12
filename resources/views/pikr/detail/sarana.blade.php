@if (!$sarana_pikr)
    <p>Sarana Belum Di Set</p>
@else
    <form id="sarana" action="/sarana/{{ $sarana_pikr->id }}" method="post">
        @csrf
        <div id="form-sarana">
            @foreach ($sarana as $item)
                @php
                    $slug = Str::slug($item->nama, '_');
                @endphp
                <div class="form-group">
                    <label>{{ $item->nama }}</label>
                    <select name="{{ $slug }}" id="{{ $item->$slug }}" class="form-select" disabled>
                        <option value="1" {{ $sarana_pikr->$slug == 1 ? 'selected' : '' }}>Ada</option>
                        <option value="0" {{ $sarana_pikr->$slug == 0 ? 'selected' : '' }}>Tidak Ada</option>
                    </select>
                </div>
            @endforeach
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
                $('#sarana .btn-edit').click(function() {
                    $('#sarana .btn-cancel').removeAttr('hidden')
                    $('#sarana .btn-submit').removeAttr('hidden')
                    $('#form-sarana :disabled').removeAttr('disabled')
                    $(this).attr('hidden', true)
                    // alert('oke')
                })

                $('#sarana .btn-cancel').click(function() {
                    $('#form-sarana :enabled').attr('disabled', true)
                    $(this).attr('hidden', true)    
                    $('#sarana .btn-submit').attr('hidden', true)
                    $('#sarana .btn-edit').removeAttr('hidden')
                })
            })
        </script>
    @endpush
@endif

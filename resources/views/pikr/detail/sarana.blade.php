@if (!$sarana_pikr)
    <p>Sarana Belum Di Set</p>
@else
    @foreach ($sarana as $item)
        @php
            $slug = Str::slug($item->nama, '_');
        @endphp
        <div class="form-group">
            <label class="my-2"><b>{{ $item->nama }}</b></label>
            <div class="form-check">
                <input class="form-check-input" type="radio" disabled {{ $sarana_pikr->$slug ? 'checked' : '' }}>
                <label class="form-check-label"> Ada </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" disabled {{ !$sarana_pikr->$slug ? 'checked' : '' }}>
                <label class="form-check-label"> Tidak Ada </label>
            </div>
        </div>
    @endforeach
@endif

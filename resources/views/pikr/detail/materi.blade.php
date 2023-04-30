@if (!$materi_pikr)
    <p>Materi Belum Di Set</p>
@else
    @foreach ($materi as $m)
        @php
            $slug = Str::slug($m->nama, '_');
        @endphp
        {{-- @if ($m->kategori != $item)
        @continue
    @endif --}}
        <div class="form-group">
            <label class="my-2"><b>{{ $m->nama }}</b></label>
            <div class="form-check">
                <input class="form-check-input" type="radio" disabled {{ $materi_pikr->$slug ? 'checked' : '' }}>
                <label class="form-check-label"> Ada </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" disabled {{ !$materi_pikr->$slug ? 'checked' : '' }}>
                <label class="form-check-label"> Tidak Ada </label>
            </div>
        </div>
    @endforeach
@endif

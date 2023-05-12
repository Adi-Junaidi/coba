@if (!$materi_pikr)
    <p>Materi Belum Di Set</p>
@else
    <form id="materi" action="/materi/{{ $materi_pikr->id }}" method="post">
        @csrf
        <div id="form-materi">
            @foreach ($materi as $m)
                @php
                    $slug = Str::slug($m->nama, '_');
                @endphp
                <div class="form-group">
                    <label>{{ $m->nama }}</label>
                    <select name="{{ $slug }}" id="{{ $m->$slug }}" class="form-select" disabled>
                        <option value="1" {{ $materi_pikr->$slug == 1 ? 'selected' : '' }}>Ada</option>
                        <option value="0" {{ $materi_pikr->$slug == 0 ? 'selected' : '' }}>Tidak Ada</option>
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
                $('#materi .btn-edit').click(function() {
                    $('#materi .btn-cancel').removeAttr('hidden')
                    $('#materi .btn-submit').removeAttr('hidden')
                    $('#form-materi :disabled').removeAttr('disabled')
                    $(this).attr('hidden', true)
                    // alert('oke')
                })

                $('#materi .btn-cancel').click(function() {
                    $('form-materi :enabled').attr('disabled', true)
                    $(this).attr('hidden', true)
                    $('#materi .btn-submit').attr('hidden', true)
                    $('#materi .btn-edit').removeAttr('hidden')
                })
            })
        </script>
    @endpush

@endif

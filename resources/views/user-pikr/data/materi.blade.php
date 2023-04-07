@extends('layouts.user_pikr')

@push('custom_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
@endpush

@section('content')

    <section class="row">
        <h1 class="mb-3">Informasi Kelompok PIK-R</h1>
        <div class="mb-5 p-4 bg-white shadow-sm">
            <div class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    @foreach ($kategori as $item)
                        <div class="step" data-target="#{{ Str::slug($item) }}-part">
                            <button type="button" class="step-trigger" role="tab"
                                aria-controls="{{ Str::slug($item) }}-part" id="{{ Str::slug($item) }}-part-trigger">
                                <span class="bs-stepper-circle">{{ $loop->iteration }}</span>
                                <span class="bs-stepper-label d-lg-inline-block d-none small">{{ $item }}</span>
                            </button>
                        </div>
                        @if ($loop->last)
                        @else
                            <div class="line"></div>
                        @endif
                    @endforeach

                </div>

                <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <form action="/up/data/materi" method="post">
                        @foreach ($kategori as $item)
                            <div id="{{ Str::slug($item) }}-part" class="content" role="tabpanel"
                                aria-labelledby="{{ Str::slug($item) }}-part-trigger">
                                @csrf
                                @foreach ($materi as $m)
                                    @if ($m->kategori != $item)
                                        @continue
                                    @endif
                                    <div class="form-group">
                                        <label class="my-2"><b>{{ $m->nama }}</b></label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="{{ Str::slug($m->nama, '_') }}"
                                                value="1">
                                            <label class="form-check-label"> Ada </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="{{ Str::slug($m->nama, '_') }}"
                                                value="0" checked>
                                            <label class="form-check-label"> Tidak Ada </label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_materi" value="{{ $m->id }}">
                                @endforeach

                                @if ($loop->first)
                                    <a class="btn btn-primary mt-3" onclick="stepper.next()">Selanjutnya</a>
                                @elseif ($loop->last)
                                    <div class="mt-3">
                                        <a class="btn btn-outline-primary" onclick="stepper.previous()">Sebelumnya</a>
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                @else
                                    <div class="mt-3">
                                        <a class="btn btn-outline-primary" onclick="stepper.previous()">Sebelumnya</a>
                                        <a class="btn btn-primary" onclick="stepper.next()">Selanjutnya</a>
                                    </div>
                                @endif

                            </div>
                        @endforeach
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection

@push('custom_js')
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script src="/assets/js/bs-stepper.js"></script>
@endpush

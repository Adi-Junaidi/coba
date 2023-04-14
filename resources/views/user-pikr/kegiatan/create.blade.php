@extends('layouts.user_pikr')

@section('content')
    <section>
        <h1 class="mb-3 d-sm-block d-none">Tambah Kegiatan PIK-R</h1>
        <h3 class="mb-3 d-sm-none d-block">Tambah Kegiatan PIK-R</h3>
        <article class="mb-4">
            @include('user-pikr.kegiatan.include.pelayanan')
            @include('user-pikr.kegiatan.include.konseling')
            @include('user-pikr.kegiatan.include.konseling_kelompok')
        </article>
    </section>
@endsection

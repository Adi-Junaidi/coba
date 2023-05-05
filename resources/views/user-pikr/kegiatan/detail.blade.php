@extends('layouts.user_pikr', [
    'title' => 'Register Kegiatan',
])

@section('content')
    @include('user-pikr.kegiatan.detail.pelayanan')
    @include('user-pikr.kegiatan.detail.konseling')
    @include('user-pikr.kegiatan.detail.konseling_kelompok')
@endsection


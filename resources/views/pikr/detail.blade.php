@extends('layouts.main', [
    'title' => 'Detail Data PIK-R',
    'heading' => 'Detail Data PIK-R',
    'breadcrumb' => ['Data Master', 'Data PIK-R', 'Detail'],
])

@section('container')
    <section>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Identitas Kelompok</h5>
                <div class="card-text">
                    @include('pikr.detail.identitas')
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Informasi Kelompok</h5>
                <div class="card-text">
                    @include('pikr.detail.informasi')
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ketersediaan Materi</h5>
                <div class="card-text">
                    @include('pikr.detail.materi')
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ketersediaan Sarana</h5>
                <div class="card-text">
                    @include('pikr.detail.sarana')
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Mitra</h5>
                <div class="card-text">
                    @include('pikr.detail.mitra')
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Pengurus</h5>
                <div class="card-text">
                    @include('pikr.detail.pengurus')
                </div>
            </div>
        </div>
    </section>
@endsection

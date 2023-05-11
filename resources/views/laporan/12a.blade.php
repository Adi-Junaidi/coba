@extends('layouts.main', [
    'title' => 'Tabel 12A',
    'heading' => 'Laporan Tahunan Tabel 12A',
    'breadcrumb' => ['Laporan', 'Tahunan', 'Tabel 12A'],
])

@section('link')
  <link href="/dist/assets/css/pages/fontawesome.css" rel="stylesheet">
@endsection

@section('container')
  <section class="row">
    <div class="col">
      @include('partials.laporan-filter-card')
    </div>
  </section>

  <section class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <div class="overflow-auto">
            @include('partials.exports.12a')
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

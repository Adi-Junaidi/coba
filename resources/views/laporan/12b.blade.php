@extends('layouts.main', [
    'title' => 'Tabel 12B',
    'heading' => 'Laporan Tahunan Tabel 12B',
    'breadcrumb' => ['Laporan', 'Tahunan', 'Tabel 12B'],
])

@section('link')
  <link href="/dist/assets/css/pages/fontawesome.css" rel="stylesheet">
@endsection

@section('container')
  <section class="row">
    <div class="col">
      @include('partials.laporan-tahunan-filter-card')
    </div>
  </section>

  <section class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <div class="overflow-auto">
            @include('partials.exports.12b')
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@extends('layouts.main', [
    'title' => 'Tabel 7A',
    'heading' => 'Laporan Bulanan Tabel 7A',
    'breadcrumb' => ['Laporan', 'Bulanan', 'Tabel 7A'],
])

@section('link')
  <link href="/dist/assets/css/pages/fontawesome.css" rel="stylesheet">
@endsection

@section('container')
  <section class="row">
    <div class="col">
      @include('partials.laporan-bulanan-filter-card')
    </div>
  </section>

  <section class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <div class="overflow-auto">
            @include('partials.exports.7a')
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

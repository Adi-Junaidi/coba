@extends('layouts.main', [
    'title' => 'Tabel 7B',
    'heading' => 'Laporan Bulanan Tabel 7B',
    'breadcrumb' => ['Laporan', 'Bulanan', 'Tabel 7B'],
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
            @include('partials.exports.7b')
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

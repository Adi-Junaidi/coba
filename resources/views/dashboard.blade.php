@extends('layouts.main', [
    'title' => 'Dashboard',
    'heading' => 'Dashboard',
    'breadcrumb' => ['Dashboard'],
])

@section('container')

  @if (auth()->user()->isAdmin())
    <section class="row">
      <div class="col-12">
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="card">
              <div class="card-body py-4-5 px-3">
                <div class="row">
                  <div class="col-2 d-flex justify-content-start">
                    <div class="stats-icon green mb-2">
                      <i class="iconly-boldProfile"></i>
                    </div>
                  </div>
                  <div class="col-10">
                    <h6 class="text-muted font-semibold">Jumlah PIK-R Terdaftar</h6>
                    <h4 class="mb-0 font-extrabold">
                      {{ $pikr->count() }}
                    </h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="card">
              <div class="card-body py-4-5 px-3">
                <div class="row">
                  <div class="col-2 d-flex justify-content-start">
                    <div class="stats-icon purple mb-2">
                      <i class="iconly-boldShow"></i>
                    </div>
                  </div>
                  <div class="col-10">
                    <h6 class="text-muted font-semibold">Jumlah PLKB</h6>
                    <h4 class="mb-0 font-extrabold">
                      {{ $pembina->count() }}
                    </h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  @else
    <section class="row">
      <div class="col-12">
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="card">
              <div class="card-body py-4-5 px-3">
                <div class="row">
                  <div class="col-2 d-flex justify-content-start">
                    <div class="stats-icon green mb-2">
                      <i class="iconly-boldProfile"></i>
                    </div>
                  </div>
                  <div class="col-10">
                    <h6 class="text-muted font-semibold">Jumlah PIK-R Terdaftar</h6>
                    <h4 class="mb-0 font-extrabold">
                      @php
                        $count = 0;
                      @endphp
                      @foreach ($pikr as $p)
                        @can('verify', $p)
                          @php
                            $count += 1;
                          @endphp
                        @endcan
                      @endforeach
                      {{ $count }}
                    </h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="card">
              <div class="card-body py-4-5 px-3">
                <div class="row">
                  <div class="col-2 d-flex justify-content-start">
                    <div class="stats-icon purple mb-2">
                      <i class="iconly-boldShow"></i>
                    </div>
                  </div>
                  <div class="col-10">
                    <h6 class="text-muted font-semibold">Data Pelaporan</h6>
                    <h4 class="mb-0 font-extrabold">
                      @php
                        $count = 0;
                      @endphp
                      @foreach ($laporan as $item)
                        @can('valid_reports', $item)
                          @php
                            $count += 1;
                          @endphp
                        @endcan
                      @endforeach
                      {{ $count }}
                    </h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  @endif

@endsection

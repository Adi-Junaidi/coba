@extends('layouts.user_pikr')

@section('content')
  <section class="row">
    <h1 class="mb-4">Dashboard</h1>
    <div class="col-12 col-lg-12">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body py-3 px-3">
              <div class="d-flex justify-content-start gap-3">
                <div class="stats-icon {{ auth()->user()->pikr->verified ? 'green' : 'red' }}">
                  @if (auth()->user()->pikr->verified)
                    <i class="iconly-boldTick-Square"></i>
                  @else
                    <i class="iconly-boldDanger"></i>
                  @endif
                </div>
                <div class="d-flex flex-column">
                  <h6 class="text-muted my-0 font-semibold">Status PIK-R</h6>
                  <h4 class="my-0 font-extrabold">{{ auth()->user()->pikr->verified ? 'Sudah' : 'Belum' }} diverifikasi</h4>
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
                  <div class="stats-icon red mb-2">
                    <i class="iconly-boldProfile"></i>
                  </div>
                </div>
                <div class="col-10">
                  <h6 class="text-muted font-semibold">Status Data PIK-R</h6>
                  <h4 class="mb-0 font-extrabold">{{ session('stepper')->current_step }}</h4>
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
                  <h6 class="text-muted font-semibold">Peringkat PIK-R</h6>
                  <h4 class="mb-0 font-extrabold">0</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
@endsection

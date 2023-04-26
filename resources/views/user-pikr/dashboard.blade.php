@extends('layouts.user_pikr')

@section('content')
  <section class="row">
    <h1 class="mb-4">Dashboard</h1>
    <div class="col-12">
      <div class="row">
        <div class="col-12 col-md-6">
          <div class="card">
            <div class="card-body py-4-5 px-3">
              <div class="row">
                <div class="col-2 d-flex justify-content-start">
                  <div class="stats-icon {{ session('stepper')->current_step == 'Complete' ? 'green' : 'red' }} mb-2">
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
                  <h6 class="text-muted font-semibold">Peringkat PIK-R Bulan Ini</h6>
                  <h4 class="mb-0 font-extrabold">{{ $peringkat }}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
@endsection

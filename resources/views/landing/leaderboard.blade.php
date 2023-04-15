@extends('layouts.landing')

@section('main')
  <section class="py-5" id="leaderboard">
    <div class="container">
      <div class="d-flex w-75 align-items-center mx-auto mb-5 gap-5">
        <hr class="bg-primary" style="flex-grow: 1; height: 2px; border: none; opacity: 1" />
        <h2 class="text-primary text-center">Pemeringkatan</h2>
        <hr class="bg-primary" style="flex-grow: 1; height: 2px; border: none; opacity: 1" />
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-10">
          @include('partials.leaderboard');
        </div>
      </div>
    </div>
  </section>
@endsection

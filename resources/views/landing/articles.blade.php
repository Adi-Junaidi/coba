@extends('layouts.landing')

@section('main')
  <!-- Artikel -->
  <section class="py-5" id="artikel">
    <div class="container">
      <div class="d-flex w-75 align-items-center mx-auto mb-5 gap-5">
        <hr class="bg-primary" style="flex-grow: 1; height: 2px; border: none; opacity: 1" />
        <h2 class="text-primary text-center">Artikel</h2>
        <hr class="bg-primary" style="flex-grow: 1; height: 2px; border: none; opacity: 1" />
      </div>

      <div class="row">
        @foreach ($articles as $article)
          @include('partials.card-article', ['article' => $article])
        @endforeach
      </div>
    </div>
  </section>
  <!-- End Artikel -->
@endsection

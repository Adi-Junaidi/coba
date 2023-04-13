@extends('layouts.landing')

@section('main')
  <!-- Berita -->
  <section class="py-5" id="berita">
    <div class="container">
      <div class="d-flex w-75 align-items-center mx-auto mb-5 gap-5">
        <hr class="bg-primary" style="flex-grow: 1; height: 2px; border: none; opacity: 1" />
        <h2 class="text-primary text-center">Artikel</h2>
        <hr class="bg-primary" style="flex-grow: 1; height: 2px; border: none; opacity: 1" />
      </div>

      <div class="row">
        @foreach ($articles as $article)
          <div class="col-12 col-sm-6 col-md-4">
            <div class="card">
              <img class="card-img-top" src="{{ uploads($article->image) }}" alt="{{ $article->title }}" />
              <div class="card-body">
                <h5 class="card-title mb-0">{{ $article->title }}</h5>
                <p class="text-muted fs-6">PIK-R: {{ $article->pikr->nama }}</p>
                <p class="card-text">{{ $article->getTruncatedBody() }}</p>
                <a class="btn icon btn-primary d-inline-flex align-items-center gap-2" href="/article/{{ $article->id }}/read">Selengkapnya<i class="bi bi-arrow-right d-flex align-items-center"></i></a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- End Berita -->
@endsection

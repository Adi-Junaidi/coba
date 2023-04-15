@extends('layouts.landing')

@section('main')
  <div class="container py-5">
    <h1>{{ $article->title }}</h1>
    <h5 class="text-muted">By: {{ $article->pikr->nama }}</h5>
    <img class="mb-5" src="{{ asset("storage/{$article->image}") }}" alt="{{ $article->title }}" style="display: block; width: 100%; aspect-ratio: 3/1; object-fit: cover">
    <div class="row">
      <div class="col">
        {!! $article->body !!}
      </div>
    </div>
  </div>
@endsection

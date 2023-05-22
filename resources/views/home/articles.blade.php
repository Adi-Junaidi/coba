@extends('home.layout')

@section('title', 'Artikel PIK-R')

@section('content')
  @include('home.partials.articles-section', ['articles' => $articles])
@endsection

@extends('home.layout')

@section('content')
    @include('home.partials.navbar')
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-3">
                    <div class="d-flex align-items-center mt-lg-5 mb-4">
                        <div class="ms-3">
                            <div class="fw-bold">{{ $article->pikr->nama }}</div>
                            <div class="text-muted">{{ $article->pikr->basis }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">{{ $article->title }}</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">{{ $article->updated_at->diffForHumans() }}</div>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4">
                            <img class="img-fluid rounded" src="{{ asset("storage/{$article->image}") }}" alt="..." />
                        </figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            {!! $article->body !!}
                        </section>
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection

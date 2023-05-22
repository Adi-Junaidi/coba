@extends('home.layout')

@section('title', 'Detail Artikel')

@section('content')
  <section class="py-5">
    <div class="container my-5 px-5">
      <div class="row gx-5">
        <div class="col-lg-3">
          <div class="d-flex align-items-center mt-lg-5 mb-4">
            <div class="ms-3">
              <div class="fw-bold">{{ $article->pikr->nama }}</div>
              <div class="text-muted">{{ $article->pikr->basis }}</div>

              @if ($article->document)
                <div class="mt-3">
                  <a href="/storage/{{ $article->document }}" target="_blank" rel="noopener noreferrer">
                    <img data-toggle="tooltip" data-placement="top" src="/assets/img/acrobat-file-pdf-seeklogo.com.svg" title="Lihat Dokumen Artikel" alt="Logo PDF" width="50">
                  </a>
                </div>
              @endif
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
              <img class="img-fluid rounded" src="{{ $article->image ? asset("storage/{$article->image}") : 'https://dummyimage.com/640x360/555/aaa' }}" alt="..." />
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

@push('scripts')
  <script>
    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>
@endpush

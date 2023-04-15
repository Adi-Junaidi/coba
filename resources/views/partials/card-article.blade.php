<div class="col-12 col-sm-6 col-md-4">
  <div class="card shadow">
    <img class="card-img-top" src="{{ asset("storage/{$article->image}") }}" alt="{{ $article->title }}" style="aspect-ratio: 2/1; object-fit: cover;" />
    <div class="card-body">
      <h5 class="card-title mb-0">{{ $article->title }}</h5>
      <h6 class="text-muted mb-0">{{ $article->pikr->nama }}</h6>
      <p class="text-muted fs-6">{{ $article->updated_at->diffForHumans() }}</p>
      <p class="card-text">{{ $article->getExcerpt() }}</p>
      <a class="btn icon btn-primary d-inline-flex align-items-center gap-2" href="/articles/{{ $article->slug }}">Selengkapnya<i class="bi bi-arrow-right d-flex align-items-center"></i></a>
    </div>
  </div>
</div>

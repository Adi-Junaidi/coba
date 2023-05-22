<div class="col-lg-4 mb-5">
  <div class="card h-100 border-0 shadow">
    <div class="card-img-top" style="height: 220px; overflow: hidden;">
      <img src="{{ $article->image ? asset("storage/{$article->image}") : 'https://dummyimage.com/640x360/555/aaa' }}" alt="{{ $article->title }}" style="width: 100%; height: 100%; object-fit: cover" />
    </div>
    <div class="card-body p-4">
      <h5 class="card-title mb-3">{{ $article->title }}</h5>
      </a>
      <p class="card-text mb-0">{{ $article->getExcerpt() }}</p>
      <a class="small text-primary" href="/article/{{ $article->slug }}">Selengkapnya</a>
    </div>
    <div class="card-footer border-top-0 bg-transparent p-4 pt-0">
      <div class="d-flex align-items-end justify-content-between">
        <div class="d-flex align-items-center">
          <div class="small">
            <div class="fw-bold">{{ $article->pikr->nama }}</div>
            <div class="text-muted">
              {{ $article->updated_at->diffForHumans() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<section id="blogs">
  <div class="container my-5 px-5">
    <div class="row gx-5 justify-content-center">
      <div class="col-lg-8 col-xl-6">
        <div class="text-center">
          <h2 class="fw-bolder">Artikel PIK-R</h2>
          <p class="fw-normal text-muted mb-5">
            Berikut merupakan deretan kegiatan yang telah dilaksanakan oleh masing-masing PIK-R yang ada di Provinsi Gorontalo.
          </p>
        </div>
      </div>
    </div>

    <div class="row gx-5">
      @foreach ($articles as $article)
        @include('home.partials.article-card', ['article' => $article])
      @endforeach

      @if (isset($selengkapnya) && $selengkapnya)
        <div class="col-lg-4 mb-5">
          <a class="text-decoration-none" href="/articles" style="color: inherit;">
            <div class="card h-100 border-0 shadow" style="background-color: #ccc;">
              <div class="card-body d-flex justify-content-center align-items-center p-4">
                <h3 class="m-0">Artikel Lainnya &rarr;</h3>
              </div>
            </div>
          </a>
        </div>
      @endif
    </div>
  </div>
</section>

<nav class="navbar bg-primary navbar-dark navbar-expand-lg py-2">
  <div class="container">
    <a class="navbar-brand" href="/"><img class="rounded-circle bg-white p-2" src="{{ asset('dist/assets/images/logo/favicon.svg') }}" alt="{{ env('APP_NAME') }}" style="height: 2em; aspect-ratio: 1/1; object-fit: contain" /></a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar" type="button" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbar">
      <div class="navbar-nav">
        <a class="nav-link d-inline-flex align-items-center gap-2" href="#proker"><i class="bi bi-list-check d-flex align-items-center"></i>Program Kerja</a>
        <a class="nav-link d-inline-flex align-items-center gap-2" href="#event"><i class="bi bi-calendar-event-fill d-flex align-items-center"></i>Event</a>
        <a class="nav-link d-inline-flex align-items-center gap-2" href="#galeri"><i class="bi bi-image-fill d-flex align-items-center"></i>Galeri</a>
        <a class="nav-link d-inline-flex align-items-center gap-2" href="#berita"><i class="bi bi-newspaper d-flex align-items-center"></i>Berita</a>
        <a class="nav-link d-inline-flex align-items-center gap-2" href="#peta"><i class="bi bi-map-fill d-flex align-items-center"></i>Peta</a>
      </div>

      <a class="btn icon btn-outline-light ms-auto d-inline-flex align-items-center my-2 gap-2" href="/login">Masuk<i class="bi bi-box-arrow-right d-flex align-items-center"></i></a>
    </div>
  </div>
</nav>

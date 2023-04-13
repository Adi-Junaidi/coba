<nav class="navbar bg-primary navbar-dark navbar-expand-lg py-2" id="top">
  <div class="container">
    <a class="navbar-brand" href="/"><img class="rounded-circle bg-white p-2" src="{{ asset('dist/assets/images/logo/favicon.svg') }}" alt="{{ env('APP_NAME') }}" style="height: 2em; aspect-ratio: 1/1; object-fit: contain" /></a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar" type="button" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbar">
      <div class="navbar-nav">
        <a class="nav-link d-inline-flex align-items-center gap-2" href="#top"><i class="bi bi-house-fill d-flex align-items-center"></i>Home</a>
        <a class="nav-link d-inline-flex align-items-center gap-2" href="#artikel"><i class="bi bi-newspaper d-flex align-items-center"></i>Artikel</a>
      </div>

      <a class="btn icon btn-outline-light ms-auto d-inline-flex align-items-center my-2 gap-2" href="/login">Masuk<i class="bi bi-box-arrow-right d-flex align-items-center"></i></a>
    </div>
  </div>
</nav>

<!-- Navigation-->
<nav class="navbar navbar-expand-lg {{ Request::is('article/*') ? 'navbar-dark bg-dark' : '' }}">
    <div class="container px-5">
        <a class="navbar-brand" href="index.html">SI-PIKR</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="/home">Home</a>
                </li>
                @if (Request::is('home'))
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('articles/*') ? 'active' : '' }}" href="#blogs">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#rank">Peringkat</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

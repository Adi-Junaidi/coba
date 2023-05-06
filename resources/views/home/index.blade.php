@extends('home.layout')

@section('content')
    @include('home.partials.navbar')
    <!-- Header-->
    <header id="header" class="bg-dark py-5">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-white mb-2">
                            Sistem Informasi PIK-R
                        </h1>
                        <p class="fw-normal text-white-50 mb-4">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Distinctio neque vero voluptatibus.
                        </p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-primary btn-lg px-4 me-sm-3" href="/login">Login</a>
                            <div class="dropdown">
                                <button class="btn btn-outline-light btn-lg px-4 dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Download Panduan PIK-R
                                </button>

                                <ul class="dropdown-menu " aria-labelledby="navbarDropdownBlog">
                                    <li>
                                        <a target="_blank" class="dropdown-item"
                                            href="{{ asset('assets') }}/panduan/anemia.pdf">Modul Edukasi dan Aksi Remaja
                                            Untuk Gizi dan Pencegahan Anemia</a>
                                    </li>
                                    <li>
                                        <a target="_blank" class="dropdown-item"
                                            href="{{ asset('assets') }}/panduan/beraksi.pdf">Modul Tentang Kita Beraksi</a>
                                    </li>
                                    <li>
                                        <a target="_blank" class="dropdown-item"
                                            href="{{ asset('assets') }}/panduan/berani.pdf">Modul Tentang Kita Berani</a>
                                    </li>
                                    <li>
                                        <a target="_blank" class="dropdown-item"
                                            href="{{ asset('assets') }}/panduan/kolab.pdf">Modul Tentang Kita
                                            Berkolaborasi</a>
                                    </li>
                                    <li>
                                        <a target="_blank" class="dropdown-item"
                                            href="{{ asset('assets') }}/panduan/lifeskill.pdf">Panduan Belajar Lifeskill
                                            Layout BKKBN</a>
                                    </li>
                                    <li>
                                        <a target="_blank" class="dropdown-item"
                                            href="{{ asset('assets') }}/panduan/kurikulum.pdf">Tentang Kita Kurikulum
                                            Pelatihan</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                    <img class="img-fluid rounded-3 my-5" src="{{ asset('assets') }}/img/undraw_join_re_w1lh.svg"
                        alt="..." width="700" />
                </div>
            </div>
        </div>
    </header>

    <!-- Features section-->
    <section class="py-5" id="features">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h2 class="fw-bolder mb-0">
                        Fitur-fitur yang ada pada sistem informasi ini
                    </h2>
                </div>
                <div class="col-lg-8">
                    <div class="row gx-5 row-cols-1 row-cols-md-2">
                        <div class="col mb-5 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3">
                                <i class="bi bi-collection"></i>
                            </div>
                            <h2 class="h5">Manajemen PIK-R</h2>
                            <p class="mb-0">
                                Paragraph of text beneath the heading to explain the
                                heading. Here is just a bit more text.
                            </p>
                        </div>
                        <div class="col mb-5 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3">
                                <i class="bi bi-building"></i>
                            </div>
                            <h2 class="h5">Sistem Pendukung Keputusan</h2>
                            <p class="mb-0">
                                Paragraph of text beneath the heading to explain the
                                heading. Here is just a bit more text.
                            </p>
                        </div>
                        <div class="col mb-5 mb-md-0 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3">
                                <i class="bi bi-toggles2"></i>
                            </div>
                            <h2 class="h5">Validasi PIK-R</h2>
                            <p class="mb-0">
                                Paragraph of text beneath the heading to explain the
                                heading. Here is just a bit more text.
                            </p>
                        </div>
                        <div class="col h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3">
                                <i class="bi bi-toggles2"></i>
                            </div>
                            <h2 class="h5">Post Artikel</h2>
                            <p class="mb-0">
                                Paragraph of text beneath the heading to explain the
                                heading. Here is just a bit more text.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog preview section-->
    <section id="blogs">
        <div class="container px-5 my-5">

            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="text-center">
                        <h2 class="fw-bolder">Artikel PIK-R</h2>
                        <p class="fw-normal text-muted mb-5">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                            Possimus sed et obcaecati?
                        </p>
                    </div>
                </div>
            </div>

            <div class="row gx-5">
                @foreach ($articles as $article)
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <div class="card-img-top" style="height: 220px; overflow: hidden;">
                                <img class="" width="100%" src="{{ asset("storage/{$article->image}") }}"
                                    alt="..." />
                            </div>
                            <div class="card-body p-4">
                                <h5 class="card-title mb-3">Judul: {{ $article->title }}</h5>
                                </a>
                                <p class="card-text mb-0">
                                    {{ $article->getExcerpt() }}
                                </p>
                                <a class="small text-primary" href="/articles/{{ $article->slug }}">Selengkapnya</a>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
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
                @endforeach
            </div>
        </div>
    </section>

    <!-- Rank section-->
    <section id="rank">
        <div class="container px-5 my-5">

            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="text-center">
                        <h2 class="fw-bolder">Peringkat PIK-R Bulan Ini</h2>
                        <p class="fw-normal text-muted mb-5">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                            Possimus sed et obcaecati?
                        </p>
                    </div>
                </div>
            </div>

            <div class="mb-5 p-4 bg-white shadow-sm">
                @if ($ranks->isEmpty())
                    <p class="text-center">Belum ada pemeringkatan</p>
                @else
                    <div class="table-responsive" style="max-height: 400px">
                        <table id="rank-table" class="table table-lg">
                            <thead>
                                <tr>
                                    <th>Peringkat</th>
                                    <th>Nama PIK-R</th>
                                    <th>Poin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ranks as $rank)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $rank->pikr->nama }}</td>
                                        <td>{{ $rank->point }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

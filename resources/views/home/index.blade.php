@extends('home.layout')

@section('title', 'Homepage')

@section('content')
  <!-- Header-->
  <header class="bg-dark py-5" id="header">
    <div class="container px-5">
      <div class="row gx-5 align-items-center justify-content-center">
        <div class="col-lg-8 col-xl-7 col-xxl-6">
          <div class="text-xl-start my-5 text-center">
            <h1 class="display-5 fw-bolder mb-2 text-white">
              Sistem Informasi Pengelolaan PIK-R
            </h1>
            <p class="fw-normal text-white-50 mb-4">
              Sistem informasi ini bertujuan untuk memudahkan pengurus pusat informasi dan konseling remaja di Provinsi Gorontalo dalam mengelola data pencatatan dan pelaporan mereka.
            </p>
            <div class="d-grid d-sm-flex justify-content-sm-center justify-content-xl-start gap-3">
              <a class="btn btn-primary btn-lg me-sm-3 px-4" href="/login">Login</a>
              <div class="dropdown">
                <button class="btn btn-outline-light btn-lg dropdown-toggle px-4" data-bs-toggle="dropdown" aria-expanded="false">
                  Download Panduan PIK-R
                </button>

                <ul class="dropdown-menu" aria-labelledby="navbarDropdownBlog">
                  <li>
                    <a class="dropdown-item" href="{{ asset('assets') }}/panduan/anemia.pdf" target="_blank">Modul Edukasi dan Aksi Remaja
                      Untuk Gizi dan Pencegahan Anemia</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ asset('assets') }}/panduan/beraksi.pdf" target="_blank">Modul Tentang Kita Beraksi</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ asset('assets') }}/panduan/berani.pdf" target="_blank">Modul Tentang Kita Berani</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ asset('assets') }}/panduan/kolab.pdf" target="_blank">Modul Tentang Kita
                      Berkolaborasi</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ asset('assets') }}/panduan/lifeskill.pdf" target="_blank">Panduan Belajar Lifeskill
                      Layout BKKBN</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ asset('assets') }}/panduan/kurikulum.pdf" target="_blank">Tentang Kita Kurikulum
                      Pelatihan</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
          <img class="img-fluid rounded-3 my-5" src="{{ asset('assets') }}/img/undraw_join_re_w1lh.svg" alt="..." width="700" />
        </div>
      </div>
    </div>
  </header>

  <!-- Features section-->
  <section class="py-5" id="features">
    <div class="container my-5 px-5">
      <div class="row gx-5">
        <div class="col-lg-4 mb-lg-0 mb-5">
          <h2 class="fw-bolder mb-0">
            Fitur Unggulan Sistem Informasi Pengelolaan PIK-R
          </h2>
        </div>
        <div class="col-lg-8">
          <div class="row gx-5 row-cols-1 row-cols-md-2">
            <div class="col h-100 mb-5">
              <div class="feature bg-primary bg-gradient rounded-3 mb-3 text-white">
                <i class="bi bi-file-earmark-text"></i>
              </div>
              <h2 class="h5">Pengelolaan Data Pencatatan</h2>
              <p class="mb-0">
                Pencatatan PIK-R terdiri dari informasi dan identitas PIK-R, materi dan sarana, serta jalinan mitra serta pengurus PIK-R.
              </p>
            </div>
            <div class="col h-100 mb-5">
              <div class="feature bg-primary bg-gradient rounded-3 mb-3 text-white">
                <i class="bi bi-file-earmark-spreadsheet"></i>
              </div>
              <h2 class="h5">Pengelolaan Data Pelaporan</h2>
              <p class="mb-0">
                Pelaporan PIK-R terdiri dari berbagai kegiatan yang telah dilaksanakan oleh PIK-R, mulai dari pelayanan informasi, konseling individu maupun kelompok.
              </p>
            </div>
            <div class="col mb-md-0 h-100 mb-5">
              <div class="feature bg-primary bg-gradient rounded-3 mb-3 text-white">
                <i class="bi bi-calendar-event"></i>
              </div>
              <h2 class="h5">Artikel Kegiatan PIK-R</h2>
              <p class="mb-0">
                Fitur artikel ini memungkinkan setiap PIK-R untuk dapat mempromosikan kegiatan yang telah mereka selenggarakan.
              </p>
            </div>
            <div class="col h-100">
              <div class="feature bg-primary bg-gradient rounded-3 mb-3 text-white">
                <i class="bi bi-sort-down"></i>
              </div>
              <h2 class="h5">Pemeringkatan PIK-R Terbaik</h2>
              <p class="mb-0">
                Melalui berbagai data yang telah dikumpulkan pada aplikasi ini, setiap bulannya aplikasi akan merilis PIK-R terbaik pada bulan tersebut.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Blog preview section-->
  @include('home.partials.articles-section', ['articles' => $articles, 'selengkapnya' => true])

  <!-- Rank section-->
  <section id="rank">
    <div class="container my-5 px-5">

      <div class="row gx-5 justify-content-center">
        <div class="col-lg-8 col-xl-6">
          <div class="text-center">
            <h2 class="fw-bolder">Peringkat PIK-R Bulan Ini</h2>
            <p class="fw-normal text-muted mb-5">
              Berikut merupakan hasil pemeringkatan PIK-R terbaik bulan ini, yang telah dinilai berdasarkan berbagai kegiatan yang telah mereka laksanakan.
            </p>
          </div>
        </div>
      </div>

      <div class="mb-5 bg-white p-4 shadow-sm">
        @if ($ranks->isEmpty())
          <p class="text-center">Belum ada pemeringkatan</p>
        @else
          <div class="table-responsive" style="max-height: 400px">
            <table class="table-lg table" id="rank-table">
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

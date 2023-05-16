@extends('layouts.user_pikr')
@push('custom_css')
    <link href="{{ asset('dist') }}/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush

@section('content')
    <h1 class="mb-3 d-sm-block d-none">Artikel Kegiatan</h1>
    <h3 class="mb-3 d-sm-none d-block">Artikel Kegiatan</h3>

    @if (auth()->user()->isPikr())
        <a href="/up/article/create" class="btn btn-primary">Tambah Artikel</a>
    @endif

    <section class="row mt-3">
        <div class="mb-5 p-4 bg-white shadow-sm">
            <div class="table-responsive" style="max-height: 400px">
                <table id="article-table" class="table table-lg">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama PIKR</th>
                            <th>Judul Artikel</th>
                            <th>Tanggal Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($articles as $article)
                            @can('view', $article)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $article->pikr->nama }}</td>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ $article->created_at }}</td>
                                    <td>

                                        <button class="btn btn-info btn-sm btn-show" data-bs-toggle="modal"
                                            data-bs-target="#showModal" data-slug="{{ $article->slug }}">
                                            Detail
                                        </button>

                                        <a href="/up/article/{{ $article->slug }}/edit" class="btn btn-warning btn-sm">
                                            Edit
                                        </a>

                                        <button class="btn btn-danger btn-sm btn-delete" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal" data-title="{{ $article->title }}"
                                            data-slug="{{ $article->slug }}">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endcan

                            @can('viewAny', App\Models\Article::class)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $article->pikr->nama }}</td>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ $article->created_at }}</td>
                                    <td>
                                        <button class="btn btn-info btn-sm btn-show" data-bs-toggle="modal"
                                            data-bs-target="#showModal" data-slug="{{ $article->slug }}">
                                            Detail
                                        </button>

                                        <button class="btn btn-danger btn-sm btn-delete" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal" data-title="{{ $article->title }}"
                                            data-slug="{{ $article->slug }}">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            @endcan

                            @can('afiliate', $article)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ $article->created_at }}</td>
                                    <td>
                                        <button class="btn btn-info btn-sm btn-show" data-bs-toggle="modal"
                                            data-bs-target="#showModal" data-slug="{{ $article->slug }}">
                                            Detail
                                        </button>

                                        <button class="btn btn-danger btn-sm btn-delete" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal" data-title="{{ $article->title }}"
                                            data-slug="{{ $article->slug }}">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endcan
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection


@push('modal')
    <div class="modal fade text-left" id="deleteModal" tabindex="-1" aria-labelledby="" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title white" id="myModalLabel1">
                        Hapus Artikel "<span id="article-title"></span>"
                    </h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    Jika Ingin menghapus Artikel silahkan tekan tombol Hapus
                </div>
                <form method="post">
                    @method('delete')
                    @csrf

                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-danger ms-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Hapus</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="showModal" tabindex="-1" aria-labelledby="" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">
                        Detail Artikel
                    </h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <img class="card-img-top article-img" src="" alt=""
                    style="aspect-ratio: 2/1; object-fit: cover;" />
                <div class="modal-body">
                    <h3 class="card-title mb-3"><span class="article-title"></span></h3>
                    <h6>Oleh: <span class="article-nama"></span></h6>
                    <p class="text-muted fs-6 article-updated"></p>
                    <hr>
                    <p class="card-text article-body"></p>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
    <script src="/js/datatables.min.js"></script>
    <script>
        $(document).on('click', '.btn-delete', function() {
            const slug = $(this).data('slug')
            const title = $(this).data('title')
            $('#deleteModal form').attr('action', '/up/article/' + slug)
            $('#article-title').html(title)
        });

        $(document).on('click', '.btn-show', function() {

            fetch('/utility/getArticle/' + $(this).data('slug'))
                .then(response => response.json())
                .then(data => {
                    $('.article-img').attr('src', '{{ asset('storage') }}/' + data.image).attr('alt', data
                        .title)
                    $('.article-title').html(data.title)
                    $('.article-nama').html(data.nama_pikr)
                    $('.article-updated').html(data.update)
                    $('.article-body').html(data.body)
                    // console.log(data);

                })
                .catch(error => console.log(error));
        });

        $('#article-table').DataTable({});
    </script>
@endpush

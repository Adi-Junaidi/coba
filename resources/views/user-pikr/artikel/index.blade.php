@extends('layouts.user_pikr')

@push('custom_css')
@endpush

@push('custom_js')
@endpush


@section('content')
    <h1 class="mb-3 d-sm-block d-none">Artikel Kegiatan</h1>
    <h3 class="mb-3 d-sm-none d-block">Artikel Kegiatan</h3>
    <a href="/up/article/create" class="btn btn-primary">Tambah Artikel</a>
    <section class="row mt-3">
        <div class="mb-5 p-4 bg-white shadow-sm">
            <div class="table-responsive" style="max-height: 400px">
                <table id="laporan-table" class="table table-lg">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Artikel</th>
                            <th>Tanggal Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->created_at }}</td>
                                <td>
                                    
                                    <a href="/up/article/{{ $article->slug }}/edit" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <button class="btn btn-danger btn-sm btn-delete" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal" data-title="{{ $article->title }}" data-slug="{{ $article->slug }}">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
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
@endpush

@push('scripts')
    <script>
        $(document).on('click', '.btn-delete', function() {
            const slug = $(this).data('slug')
            const title = $(this).data('title')
            $('#deleteModal form').attr('action', '/up/article/' + slug)
            $('#article-title').html(title)

        });
    </script>
@endpush
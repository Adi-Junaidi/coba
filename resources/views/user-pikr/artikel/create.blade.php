@extends('layouts.user_pikr')

@push('custom_css')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <style>
        trix-toolbar [data-trix-button-group='file-tools'] {
            display: none;
        }
    </style>
@endpush

@push('custom_js')
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <script>
        document.addEventListener('trix-file.accept', function(e) {
            e.preventDefault()
        })
    </script>
@endpush


@section('content')
    <h1 class="mb-3 d-sm-block d-none">Tambah Artikel Kegiatan</h1>
    <h3 class="mb-3 d-sm-none d-block">Tambah Artikel Kegiatan</h3>
    <a href="/up/article" class="btn btn-secondary">Kembali</a>

    <section class="row mt-3">
        <div class="mb-5 p-4 bg-white shadow-sm">
            <form action="/up/article" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="title">Judul Artikel</label>
                        <input class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                            type="text" placeholder="Masukkan Judul Artikel" value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="slug">Slug</label>
                        <input class="form-control" id="slug" name="slug" type="text" value="{{ old('slug') }}"
                            placeholder="Field ini otomatis terisi" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="image">Upload Gambar</label>
                        <input class="form-control @error('image') is-invalid @enderror" id="image" type="file"
                        name="image" onchange="previewImage()">
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group col-sm-6">
                        <label for="document">Upload Dokumen</label>
                        <input class="form-control @error('document') is-invalid @enderror" id="document" type="file"
                        name="document">
                        @error('document')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <img id="img-preview" class="img-fluid" style="max-height: 200px; max-width:200px">

                <div class="form-group mt-3">
                    <label for="body">Isi Artikel</label>
                    <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                    <trix-editor input="body"></trix-editor>
                    @error('body')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>

        </div>

    </section>
@endsection


@push('scripts')
    <script>
        const slug = document.querySelector('#slug');

        $('#title').change(function() {
            fetch('/utility/check-slug?title=' + $('#title').val())
                .then(response => response.json())
                .then(function(data) {
                    slug.value = data.slug
                })
        })

        function previewImage() {
            const image = document.querySelector('#image')
            const imgPreview = document.querySelector('#img-preview')
            const blob = URL.createObjectURL(image.files[0]);
            imgPreview.src = blob;
            $('#img-preview').addClass('my-2 d-block col-sm-3')
        }

    </script>
@endpush

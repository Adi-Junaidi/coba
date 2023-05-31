@extends('layouts.user_pikr')

@push('custom_css')
  <link type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css" rel="stylesheet">
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
  <h1 class="d-sm-block d-none mb-3">Edit Artikel Kegiatan</h1>
  <h3 class="d-sm-none d-block mb-3">Edit Artikel Kegiatan</h3>
  <a class="btn btn-secondary" href="/up/article">Kembali</a>

  <section class="row mt-3">
    <div class="mb-5 bg-white p-4 shadow-sm">
      <form action="/up/article/{{ $article->slug }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="row">
          <div class="form-group col-sm-6">
            <label for="title">Judul Artikel</label>
            <input class="form-control @error('title') is-invalid @enderror" id="title" name="title" type="text" value="{{ old('title', $article->title) }}" placeholder="Masukkan Judul Artikel">
            @error('title')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group col-sm-6">
            <label for="slug">Slug</label>
            <input class="form-control" id="slug" name="slug" type="text" value="{{ old('slug', $article->slug) }}" placeholder="Field ini otomatis terisi" readonly>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-sm-6">
            <label for="image">Upload Gambar</label>
            <input class="form-control @error('image') is-invalid @enderror" id="image" name="image" type="file" onchange="previewImage()">
            @error('image')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group col-sm-6">
            <label for="document">Upload Dokumen</label>
            <input class="form-control @error('document') is-invalid @enderror" id="document" name="document" type="file">
            @error('document')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @if ($article->document)
              <a href="{{ asset('storage/' . $article->document) }}" target="_blank">Dokumen Sebelumnya</a>
            @endif
          </div>
        </div>

        <img class="img-fluid" id="img-preview" src="{{ asset('storage/' . $article->image) }}" style="height: 200px;width: min-content;object-fit: contain">

        <div class="form-group mt-3">
          <label for="body">Isi Artikel</label>
          <input id="body" name="body" type="hidden" value="{{ old('body', $article->body) }}">
          <trix-editor input="body"></trix-editor>
          @error('body')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>


        <div class="mt-4">
          <button class="btn btn-primary" type="submit">Ubah</button>
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

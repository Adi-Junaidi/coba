<nav class="breadcrumb-header float-start float-lg-end" aria-label="breadcrumb">
  <ol class="breadcrumb">
    @foreach ($breadcrumb as $item)
      <li class="breadcrumb-item">{{ $item }}</li>
    @endforeach
  </ol>
</nav>

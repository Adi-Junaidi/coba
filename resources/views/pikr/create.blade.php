@extends('layouts.main', [
    'title' => 'Data Pencatatan',
    'heading' => 'Tambah Data Pencatatan',
    'breadcrumb' => ['Data Master', 'Data Pencatatan', 'Tambah Data Pencatatan'],
])

@section('link')
  <link href="{{ asset('dist') }}/assets/css/pages/fontawesome.css" rel="stylesheet">
  <link href="{{ asset('dist') }}/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <link href="{{ asset('dist') }}/assets/css/pages/datatables.css" rel="stylesheet">
  <link href="{{ asset('dist') }}/assets/extensions/choices.js/public/assets/styles/choices.css" rel="stylesheet">
@endsection

@section('container')
  <section id="multiple-column-form">
    <div class="row match-height">
      <form class="form" action="{{ route('pikr.store') }}" method="POST">
        @csrf

        {{-- Card Identitas Kelompok --}}
        @include('partials.pikr.card.identitas-kelompok')

        {{-- Card Informasi Kelompok --}}
        @include('partials.pikr.card.informasi-kelompok')

        {{-- Card Ketersediaan Materi & Sarana PIK-R --}}
        @include('partials.pikr.card.materi-sarana')

        {{-- Card Mitra PIK-R --}}
        @include('partials.pikr.card.mitra')

        {{-- Card Pengurus PIK-R --}}
        @include('partials.pikr.card.pengurus')
      </form>
    </div>
  </section>
@endsection

@section('script')
  <script src="{{ asset('dist') }}/assets/extensions/jquery/jquery.min.js"></script>
  <script src="{{ asset('dist') }}/assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
  <script src="{{ asset('dist') }}/assets/js/pages/form-element-select.js"></script>

  <script src="/js/pikr.create.js"></script>
@endsection

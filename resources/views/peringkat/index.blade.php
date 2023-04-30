@extends('layouts.main', [
    'heading' => '',
    'breadcrumb' => [''],
])
@section('container')
    <h1 class="mb-3 d-sm-block d-none">Peringkat PIK-R {{ $periode }}</h1>
    <h3 class="mb-3 d-sm-none d-block">Peringkat PIK-R {{ $periode }}</h3>
    <section class="row mt-3">
        <div class="mb-3 p-4 bg-white shadow-sm col-lg-8 col-xl-7">
            <form action="/peringkat/filter" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-9">
                        <div class="form-group">
                            <select name="bulan_tahun" id="" class="form-select">
                                <option value="null" hidden>--Pilih Periode Pemeringkatan--</option>
                                @foreach ($bulan_tahun as $item)
                                    <option value="{{ $item->bulan_tahun }}">{{ convertBulanTahun($item->bulan_tahun) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button class="btn btn-primary w-100">Cari</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="mb-5 p-4 bg-white shadow-sm">
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
        </div>
    </section>
@endsection

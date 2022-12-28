@extends('layouts.main')

@section('link')
    <link rel="stylesheet" href="{{ asset('dist') }}/assets/css/pages/fontawesome.css">
    <link rel="stylesheet" href="{{ asset('dist') }}/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('dist') }}/assets/css/pages/datatables.css">
@endsection

@section('container')
    <div id="main" class='layout-navbar'>
            @include('partials.navbar')
    <div id="main-content">
            
    <div class="page-heading">
    <div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Pembina</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Data Master</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Pembina</li>
                </ol>
            </nav>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pencarian Berdasarkan Alamat Pembina</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <label class="col-md-2">Provinsi</label>
                    <fieldset class="form-group col-md-4">
                        <select class="form-select" id="basicSelect" disabled>
                            @foreach ($pembina as $p)
                                <option>{{ $p->desa->kecamatan->kabkota->provinsi->kode . " | " . $p->desa->kecamatan->kabkota->provinsi->nama }}</option>
                            @endforeach
                        </select>
                    </fieldset>
                    <label class="col-md-2">Kabupaten/Kota</label>
                    <fieldset class="form-group col-md-4" >
                        <select class="form-select" id="ddKabKota" name="ddKabKota">
                            <option hidden>Kabupaten/Kota</option>
                            @foreach ($kabkota as $p)
                                <option value="{{ $p->id }}">{{ $p->kode . " | " . $p->nama }}</option>
                            @endforeach
                        </select>
                    </fieldset>
                </div>
                <div class="row">
                    <label class="col-md-2">Kecamatan</label>
                    <fieldset class="form-group col-md-4">
                        <select class="form-select" id="ddKecamatan" name="ddKecamatan">
                            {{-- @foreach ($kecamatan as $p)
                                <option>{{ $p->kode . " | " . $p->nama }}</option>
                            @endforeach --}}
                        </select>
                    </fieldset>
                    <label class="col-md-2">Desa/Kelurahan</label>
                    <fieldset class="form-group col-md-4">
                        <select class="form-select" id="basicSelect">
                            <option hidden>Desa/Kelurahan</option>
                            @foreach ($desa as $p)
                                <option>{{ $p->kode . " | " . $p->nama }}</option>
                            @endforeach
                        </select>
                    </fieldset>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </div>
        </div>
    </section>
    
    </div>
    <!-- Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-body">

                <div class="row g-2 mb-3">
                    <div class="col-md">
                      <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><span class="fa-fw select-all fas"></span></span>
                        <input type="text" id="cari" class="form-control" placeholder="Cari..." name="cari" autocomplete="off">
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="d-flex justify-content-end ">
                        <button class="btn btn-primary" type="submit"><span class="fa-fw select-all fas me-2"></span>Tambah Data Pembina</button>
                      </div>
                    </div>
                  </div>
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No. Register</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembina as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>
                                <span id="noreg">{{ $p->no_register }}</span>
                            </td>
                            <td>
                                <span id="nama">{{ $p->nama }}</span>
                            </td>
                            <td>
                                <span id="jabatan">{{ $p->jabatan->nama }}</span>
                            </td>
                            <td>
                                <!-- Button trigger for form modal -->
                                <button type="button" id="detail" class="btn btn-info btn-sm" data-bs-toggle="modal"  data-bs-target="#detailModal" data-noreg="{{ $p->no_register }}" data-nourut="{{ $p->no_urut }}" data-nama="{{ $p->nama }}" data-provinsi="{{ $p->desa->kecamatan->kabkota->provinsi->kode . " | " . $p->desa->kecamatan->kabkota->provinsi->nama }}" data-kabkota="{{ $p->desa->kecamatan->kabkota->kode . " | " . $p->desa->kecamatan->kabkota->nama }}" data-kecamatan="{{ $p->desa->kecamatan->kode . " | " . $p->desa->kecamatan->nama }}" data-desakel="{{ $p->desa->kode . " | " . $p->desa->nama }}" data-jabatan="{{ $p->jabatan->nama }}">
                                    <span data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Detail">
                                    <span class="fa-fw select-all fas"></span>
                                    </span>
                                </button>

                                <button type="button" id="edit" class="btn btn-warning btn-sm" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="Edit">
                                    <span class="fa-fw select-all fas"></span>
                                </button>

                                <button type="button" id="delete" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="Delete">
                                    <span class="fa-fw select-all fas"></span>
                                </button>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <span class="pagination justify-content-end">{{ $pembina->links() }}</span>
                </div>
            </div>
        </div>

    </section>
    <!-- Tables end -->
    </div>

    <!-- Modal -->
    <div class="modal fade text-left" id="detailModal" tabindex="-1" role="dialog"
        aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="judulModal">Detail Data Pembina</h4>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="#">
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="noRegister" class="col-sm-2 col-form-label">No. Register</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="noRegister" disabled readonly>
                            </div>

                            <label for="noUrut" class="col-sm-2 col-form-label">No. Urut Pembina</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="noUrut" value="02" disabled readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" disabled readonly>
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <label for="provinsi" class="col-sm-1 col-form-label">Provinsi</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="provinsi" value="Gorontalo" disabled readonly>
                            </div>

                            <label for="kabupaten" class="col-sm-1 col-form-label">Kab/Kota</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="kabKota" value="Kota Gorontalo" disabled readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label"></label>
                            <label for="kecamatan" class="col-sm-1 col-form-label">Kecamatan</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="kecamatan" value="Kota Tengah" disabled readonly>
                            </div>

                            <label for="desaKel" class="col-sm-1 col-form-label">Desa/Kel</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="desaKel" value="Liluwo" disabled readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="position" disabled readonly>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="lainnya" placeholder="Lainnya" disabled readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        {{-- <button type="button" class="btn btn-primary ml-1"
                            data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">login</span>
                        </button> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script src="{{ asset('dist') }}/assets/extensions/jquery/jquery.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        }, false);
    </script>

    <script>

    $(document).ready(function () {

        // modal untuk menampilkan detail data pembina
        $(document).on("click", "#detail", function (){
            var noreg = $(this).data("noreg");
            var nourut = $(this).data("nourut");
            var nama = $(this).data("nama");
            var provinsi = $(this).data("provinsi");
            var kabkota = $(this).data("kabkota");
            var kecamatan = $(this).data("kecamatan");
            var desakel = $(this).data("desakel");
            var jabatan = $(this).data("jabatan");

            $("#noRegister").val(noreg);
            $("#noUrut").val(nourut);
            $("#name").val(nama);
            $("#provinsi").val(provinsi);
            $("#kabKota").val(kabkota);
            $("#kecamatan").val(kecamatan);
            $("#desaKel").val(desakel);
            $("#position").val(jabatan);
        })

        // tombol cari pembina berdasarkan nama with ajax
        $(document).on("keyup", "#cari", function () { 
            var keyword = $("#cari").val();

            $.ajax({
                type: "get",
                url: "{{ URL::to('/pembina/{pembina}') }}",
                data: {"keyword": keyword},
                success: function (data) {
                    $('tbody').html(data);
                }
            });
            // return console.log(keyword);
        });

        // dropdown dependent
        $document('#ddKabKota').on('change', function() {
            var kabkotaID = $(this).val();

            if (kabkotaID) {
                
                $.ajax({
                    type: "get",
                    url: "/pembina/dd-kecamatan/" + kabkotaID,
                    data: "{"_token":"{{ csrf_token() }}"}",
                    dataType: "json",
                    success: function (data) {
                        if (data) {
                            $('#ddKecamatan').empty();
                            $('#ddKecamatan').append('<option hidden>Kecamatan</option>');
                            $.each(data, function (key, kecamatan) { 
                                 $('select[name="ddKecamatan"]').append('<option value="' + key + '">' + ddkecamatan.kode + '|' + ddkecamatan.nama + '</option>');
                            });
                        } else {
                            $('#ddKecamatan').empty();
                        }
                    }
                });

            } else {
                $('#ddKecamatan').empty();
            }
        });
    })

    </script>
@endsection
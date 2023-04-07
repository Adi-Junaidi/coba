@extends('layouts.auth')

@section('title', 'Daftar PIK-R')

@section('styles')
  <link href="/auth/css/bs-stepper.min.css" rel="stylesheet">
@endsection

@section('form')
  <form class="login100-form validate-form p-b-33 p-t-5" id="stepper-form" action="/register" method="post" novalidate>
    @csrf
    <div class="bs-stepper">
      <div class="bs-stepper-header" role="tablist">
        <!-- your steps here -->
        <div class="step" data-target="#identitas-part">
          <button class="step-trigger" id="identitas-part-trigger" type="button" role="tab" aria-controls="identitas-part">
            <span class="bs-stepper-circle">1</span>
            <span class="bs-stepper-label">Identitas</span>
          </button>
        </div>

        <div class="line"></div>

        <div class="step" data-target="#alamat-part">
          <button class="step-trigger" id="alamat-part-trigger" type="button" role="tab" aria-controls="alamat-part">
            <span class="bs-stepper-circle">2</span>
            <span class="bs-stepper-label">Alamat</span>
          </button>
        </div>

        <div class="line"></div>

        <div class="step" data-target="#account-part">
          <button class="step-trigger" id="account-part-trigger" type="button" role="tab" aria-controls="account-part">
            <span class="bs-stepper-circle">3</span>
            <span class="bs-stepper-label">Akun</span>
          </button>
        </div>
      </div>
      <div class="bs-stepper-content">
        <!-- your steps content here -->
        <div class="content" id="identitas-part" role="tabpanel" aria-labelledby="identitas-part-trigger">
          <div class="wrap-input100 validate-input" data-validate="Masukkan nama PIK-R">
            <input class="input100" name="nama" type="text" required placeholder="Nama PIK-R">
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Masukkan basis PIK-R">
            <select class="input100" name="Basis" type="text" required>
              <option value="" hidden>Pilih Basis PIK-R</option>
              <optgroup label="Jalur Pendidikan">
                <option value="SMP/Sederajat">Jalur Pendidikan - SMP/Sederajat</option>
                <option value="SMA/Sederajat">Jalur Pendidikan - SMA/Sederajat</option>
                <option value="Perguruan Tinggi">Jalur Pendidikan - Perguruan Tinggi</option>
              </optgroup>
              <optgroup label="Jalur Masyarakat">
                <option value="Organisasi Keagamaan">Jalur Masyarakat - Organisasi Keagamaan</option>
                <option value="LSM/Organisasi Kepemudaan/Organisasi Kemasyarakatan">Jalur Masyarakat - LSM/Organisasi Kepemudaan/Organisasi Kemasyarakatan</option>
              </optgroup>
            </select>
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Masukkan nama pembina">
            <input class="input100" name="pembina" type="text" required list="list-pembina" placeholder="Nama pembina">
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
            <datalist id="list-pembina">
              @foreach ($pembinas as $p)
                <option>{{ $p->nama }}</option>
              @endforeach
            </datalist>
          </div>

          <div class="container-login100-form-btn m-t-32">
            <button class="login100-form-btn primary" type="button" onclick="stepper_next()">Selanjutnya</button>
          </div>
        </div>

        <div class="content" id="alamat-part" role="tabpanel" aria-labelledby="alamat-part-trigger">
          {{-- Dropdown --}}
          <div class="row">
            <fieldset class="form-group col-md-6">
              <select class="form-control" id="basicSelect" disabled>
                <option value="">75 | Gorontalo</option>
              </select>
            </fieldset>
            <fieldset class="form-group col-md-6">
              <select class="form-control" id="ddKabKota" name="ddKabKota">
                <option value="" hidden>Kabupaten/Kota</option>
                @foreach ($kabkotas as $kabkota)
                  <option value="{{ $kabkota->id }}">{{ $kabkota->kode . ' | ' . $kabkota->nama }}</option>
                @endforeach
              </select>
            </fieldset>
          </div>

          <div class="row">
            <fieldset class="form-group col-md-6">
              <select class="form-control" id="ddKecamatan" name="ddKecamatan" disabled>
                <option value="" hidden>Kecamatan</option>
              </select>
            </fieldset>
            <fieldset class="form-group col-md-6">
              <select class="form-control" id="ddDesa" name="ddDesa" disabled>
                <option value="" hidden>Desa/Kelurahan</option>
              </select>
            </fieldset>
          </div>
          {{-- End Dropdown --}}

          <div class="wrap-input100 validate-input" data-validate="Masukkan alamat">
            <input class="input100" name="alamat" type="text" required placeholder="Masukkan alamat lengkap PIK-R">
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>

          <div class="container-login100-form-btn m-t-32">
            <button class="login100-form-btn secondary" type="button" onclick="stepper_prev()">Sebelumnya</button>
            <button class="login100-form-btn primary" type="button" onclick="stepper_next()">Selanjutnya</button>
          </div>
        </div>

        <div class="content" id="account-part" role="tabpanel" aria-labelledby="account-part-trigger">
          <div class="wrap-input100 validate-input" data-validate="Masukkan username">
            <input class="input100" name="username" type="text" required placeholder="Username">
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Masukkan email yang valid">
            <input class="input100" name="email" type="email" required placeholder="Email">
            <span class="focus-input100" data-placeholder="&#xe818;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Masukkan password">
            <input class="input100" name="password" type="password" required placeholder="Masukkan Password">
            <span class="focus-input100" data-placeholder="&#xe80f;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Konfirmasi password">
            <input class="input100" name="passwordConfirm" type="password" required placeholder="Konfirmasi Password">
            <span class="focus-input100" data-placeholder="&#xe80f;"></span>
          </div>

          <div class="container-login100-form-btn m-t-32">
            <button class="login100-form-btn secondary" type="button" onclick="stepper_prev()">Sebelumnya</button>
            <button class="login100-form-btn primary" type="submit">Daftar</button>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-3 text-center">Sudah punya akun? <a href="/login">Login</a></div>
  </form>
@endsection

@section('scripts')
  <script src="/auth/js/bs-stepper.min.js"></script>

  <script>
    const stepperEl = document.getElementById('stepper-form');
    const stepper = new Stepper(stepperEl);

    const stepperPanels = stepperEl.querySelectorAll('.bs-stepper-content > *');

    stepperEl.addEventListener('show.bs-stepper', e => {
      const fromStepIndex = e.detail.from;
      const fromPanel = stepperPanels[fromStepIndex];
      const invalids = fromPanel.querySelectorAll(':invalid');
      if (invalids.length > 0) {
        for (const input of invalids) {
          showValidate(input);
        }

        e.preventDefault();
      }
    });

    function showValidate(input) {
      const thisAlert = $(input).parent();

      $(thisAlert).addClass('alert-validate');
    }

    function stepper_next() {
      stepper.next();
    }

    function stepper_prev() {
      stepper.previous();
    }
  </script>

  {{-- Dropdown dependent --}}
  <script>
    $("#ddKabKota").on("change", function() {
      const kabkotaID = $(this).val();
      const ddKecamatan = $("#ddKecamatan");
      const ddDesa = $("#ddDesa");

      if (kabkotaID) {
        $.ajax({
          type: "get",
          url: `/api/kabkota/${kabkotaID}/kecamatans/`,
          dataType: "json",
          success: function(data) {
            if (data) {
              ddKecamatan.empty();
              ddKecamatan.append("<option value='' hidden>Kecamatan</option>");
              $.each(data, function(key, kecamatan) {
                $('select[name="ddKecamatan"]').append(
                  '<option value="' +
                  kecamatan.id +
                  '">' +
                  kecamatan.kode +
                  " | " +
                  kecamatan.nama +
                  "</option>"
                );
              });
              ddKecamatan.prop("disabled", false);

              ddDesa.val("");
              ddDesa.prop("disabled", true);
            } else {
              ddKecamatan.empty();
              ddKecamatan.prop("disabled", true);
            }
          },
        });
      } else {
        ddKecamatan.empty();
        ddKecamatan.prop("disabled", true);
      }
    });

    $("#ddKecamatan").on("change", function() {
      const kecamatanId = $(this).val();
      const ddDesa = $("#ddDesa");

      if (kecamatanId) {
        $.ajax({
          type: "get",
          url: `/api/kecamatan/${kecamatanId}/desas/`,
          dataType: "json",
          success: function(data) {
            if (data) {
              ddDesa.empty();
              ddDesa.append("<option value='' hidden>Desa/Kelurahan</option>");
              $.each(data, function(key, desa) {
                $('select[name="ddDesa"]').append(
                  '<option value="' +
                  desa.id +
                  '">' +
                  desa.kode +
                  " | " +
                  desa.nama +
                  "</option>"
                );
              });
              ddDesa.prop("disabled", false);
            } else {
              ddDesa.empty();
              ddDesa.prop("disabled", true);
            }
          },
        });
      } else {
        ddDesa.empty();
        ddDesa.prop("disabled", true);
      }
    });

    $("#ddDesa").on("change", function() {
      const desaId = $(this).val();
      const tombolCari = $("#tombolCari");
      if (desaId) {
        // Enable tombol cari
        tombolCari.prop("disabled", false);
      } else {
        // Disable tombol cari
        tombolCari.prop("disabled", false);
      }
    });
  </script>
@endsection
